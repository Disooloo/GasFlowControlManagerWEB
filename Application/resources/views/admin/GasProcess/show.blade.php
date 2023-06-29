@extends('layouts.home')
@section('title', "ГПА - " . $monitoring['name'] . " | " . config('app.name'))

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ГПА | {{$monitoring['name']}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('monitoring.index')}}">Назад</a></li>
                            <li class="breadcrumb-item active">{{$monitoring['name']}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(!$monitoring->Image)
                                        <img src="{{asset("/Image/23278.jpg")}}"
                                             style="width: 400px"
                                             alt="user-avatar"
                                             class="card-img-top">
                                    @else
                                        <img src="{{$monitoring->Image}}" alt="user-avatar"
                                             class="card-img-top">
                                    @endif
                                </div>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Табельный номер</b> <a class="float-right">{{$monitoring['id']}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Производитель</b> <a class="float-right">{{$monitoring['manufacturer']}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Максимальное давление:</b> <a class="float-right">{{$monitoring['max_flow_rate']}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Максимальная скорость</b> <a class="float-right">{{$monitoring['max_pressure']}}</a>
                                    </li>
                                </ul>
                                <form method="post" action="123">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="1" name="Dismissed_team">

                                    @if($monitoring['Dismissed_team'] == 0)
                                        <input type="date" style="color:black" name="Dismissed" id="Dismissed_team_data"
                                               name="Dismissed">
                                        <script>
                                            document.getElementById('Dismissed_team_data').valueAsDate = new Date();
                                        </script>

                                        <input value="Удалить" type="submit" id="Successfully_dismissed_employee"
                                               class="btn btn-danger btn-block Successfully_dismissed_employee"/>
                                    @endif
                                </form>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong><i class="fas fa-book mr-1"></i> Статус</strong>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p class="text-muted">
                                   @if($monitoring['status'] == 0)
                                        Добавлен
                                    @elseif($monitoring['status'] == 1)
                                       Были редактирования
                                    @elseif($monitoring['status'] == 2)
                                        Был в ремонте
                                    @elseif($monitoring['status'] == 3)
                                        Ошибка
                                    @elseif($monitoring['status'] == 4)
                                        На списании
                                   @endif
                                </p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Данные
                                            {{$monitoring['name']}}</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-success">
                                                     {{$monitoring['created_at']}}
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <h3 class="timeline-header"><a href="#">Системная информация</a>
                                                        Добавлен</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($states_logs as $state_log)
                                        <div class="active tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                        {{$state_log->updated_at}}
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-envelope bg-primary"></i>
                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <a href="#">Системная информация</a>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body p-0">
                                                                        <table class="table table-sm m-3">
                                                                            <thead>
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Сообщение</th>
                                                                                <th>Скорость</th>
                                                                                <th>Давление</th>
                                                                                <th>Основания</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>{{$state_log->id}}</td>
                                                                                <td>{{$state_log->state_name}}</td>
                                                                                <td>{{$state_log->current_power}}</td>
                                                                                <td>{{$state_log->current_pressure}}</td>
                                                                                <td>{{$state_log->Based}}</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                            </h3>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{ route('monitoring.update', $monitoring->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Наименование</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name"
                                                           name="name"
                                                           placeholder="Наименование" value="{{$monitoring->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="manufacturer" class="col-sm-2 col-form-label">Производитель</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="manufacturer"
                                                           placeholder="Производитель" value="{{$monitoring->manufacturer}}"
                                                           name="manufacturer">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="max_pressure" class="col-sm-2 col-form-label">Максимальная мощьность</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="max_pressure"
                                                           placeholder="Максимальная мощьность" value="{{$monitoring->max_pressure}}"
                                                           name="max_pressure">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="max_flow_rate" class="col-sm-2 col-form-label">Максимальное давление</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="max_flow_rate"
                                                           placeholder="Максимальное давление" value="{{$monitoring->max_pressure}}"
                                                           name="max_flow_rate">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="power" class="col-sm-2 col-form-label">Включение</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="status" name="power">
                                                        <option value="0" {{ $monitoring->power == 0 ? 'selected' : '' }}>Выключен</option>
                                                        <option value="1" {{ $monitoring->power == 1 ? 'selected' : '' }}>Включен</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="status" class="col-sm-2 col-form-label">Статус</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="0" {{ $monitoring->status == 0 ? 'selected' : '' }}>В работе</option>
                                                        <option value="1" {{ $monitoring->status == 1 ? 'selected' : '' }}>Изменения</option>
                                                        <option value="2" {{ $monitoring->status == 2 ? 'selected' : '' }}>Ошибка </option>
                                                        <option value="2" {{ $monitoring->status == 3 ? 'selected' : '' }}>На списание</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="connect" class="col-sm-2 col-form-label">Подключение</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="status" name="connect">
                                                        <option value="0" {{ $monitoring->status == 0 ? 'connect' : '' }}>Нет подлючения</option>
                                                        <option value="1" {{ $monitoring->status == 1 ? 'connect' : '' }}>Подключен</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group row">
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <input type="submit"
                                                               class="btn btn-info" value="Изменить"/>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

@endsection
