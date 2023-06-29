@extends('layouts.home')
@section('title', 'мониторинг')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="callout callout-info ">
            <h5><i class="fas fa-info"></i> Подсказка:</h5>
            Мониторинг АГП позволяет отслеживать состояние и работу газоперекачивающих агрегатов.
            В нем отображаются данные о максимальном и текущем давлении, скорости потока, а также расчет эффективности.
            Состояние подключения агрегатов отображается с помощью переключателей: зеленый - агрегат подключен и работает,
            красный - агрегат не подключен или связь пропала. Иконка Wi-Fi также указывает на состояние связи: красный - связь
            пропала, зеленый - связь установлена.
        </div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Мониторинг</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Мониторинг</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="tools d-flex">
                <button type="button" class="btn btn-outline-success m-3" data-toggle="modal" data-target="#modal-secondary">
                    Добавить
                </button>
                <form action="{{ route('update-monitoring-values') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-success m-3">Обновить значения мониторинга</button>
                </form>
            </div>
            <div class="modal fade" id="modal-secondary" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <h4 class="modal-title">Добавить ГПА</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{ route('monitoring.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Наименование</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Наименование">
                                    </div>
                                    <div class="form-group">
                                        <label for="manufacturer">Производитель</label>
                                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Производитель">
                                    </div>
                                    <div class="form-group">
                                        <label for="max_pressure">Максимальная мощьность</label>
                                        <input type="number" class="form-control" id="max_pressure" name="max_pressure" placeholder="Максимальная мощьность">
                                    </div>
                                    <div class="form-group">
                                        <label for="max_flow_rate">Максимальное давление</label>
                                        <input type="number" class="form-control" id="max_flow_rate" name="max_flow_rate" placeholder="Максимальное давление">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($GasCompressors as $GasCompressor)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        <h2 class="lead"><b>{{$GasCompressor->name}} <small>({{$GasCompressor->id}})</small></b></h2>
                                        <div class="isPower ml-auto">
                                            @if($GasCompressor->power)
                                                <i class="fas fa-toggle-on" style="color: green"></i>
                                            @else
                                                <i class="fas fa-toggle-off" style="color: red"></i>
                                            @endif

                                            @if($GasCompressor->connect)
                                                <i class="fas fa-wifi" style="color: green"></i>
                                            @else
                                                <i class="fas fa-wifi" style="color: red"></i>
                                            @endif

                                            @if($GasCompressor->warning)
                                                <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <p class="text-muted text-sm"><b>Краткое описание</b></p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Производитель:
                                                        <span><b>{{$GasCompressor->manufacturer}}</b></span>
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Максимальное давление:
                                                        <span><b>{{$GasCompressor->max_flow_rate}}</b></span>
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Максимальная скорость:
                                                        <span><b>{{$GasCompressor->max_pressure}}</b></span>
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Комб. эффективность:
                                                        <span><b>{{ ($GasCompressor->current_pressure / $GasCompressor->max_pressure) + ($GasCompressor->current_flow_rate / $GasCompressor->max_flow_rate) / 2 * 100 }}%</b></span>
                                                    </li>
                                                    <br><hr/><br>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Текущее давление:
                                                        @if($GasCompressor->current_flow_rate > $GasCompressor->max_flow_rate)
                                                            <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                            <span style="color: red"><b>{{$GasCompressor->current_flow_rate}}</b></span>
                                                        @elseif($GasCompressor->current_flow_rate == $GasCompressor->max_flow_rate)
                                                            <span style="color: green"><b>{{$GasCompressor->current_flow_rate}}</b></span>
                                                        @else
                                                            <span><b>{{$GasCompressor->current_flow_rate}}</b></span>
                                                        @endif
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-circle"></i></span> Текущая скорость:
                                                        @if($GasCompressor->current_pressure > $GasCompressor->max_pressure)
                                                            <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                            <span style="color: red"><b>{{$GasCompressor->current_pressure}}</b></span>
                                                        @elseif($GasCompressor->current_pressure == $GasCompressor->max_pressure)
                                                            <span style="color: green"><b>{{$GasCompressor->current_pressure}}</b></span>
                                                        @else
                                                            <span><b>{{$GasCompressor->current_pressure}}</b></span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                @if(!$GasCompressor->Image)
                                                    <img src="{{asset("/Image/23278.jpg")}}" alt="user-avatar" class="img-circle img-fluid">
                                                @else
                                                    <img src="{{$GasCompressor->Image}}" alt="user-avatar" class="img-circle img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{route('monitoring.show', $GasCompressor->id)}}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                                Просмотреть
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                   {{$GasCompressors->links()}}
                </nav>
            </div>
            <!-- /.card-footer -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
