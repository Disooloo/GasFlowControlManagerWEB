<?php
$references = [
    "Dashboard" => "Приборная панель",
    "Monitoring" => "Мониторинг",
    "company" => "Компании",
    "branches" => "Филиалы",
    "location" => "Местоположение",
    "status" => "Статусы",
    "workTime" => "График работы сотрудников",
    "organizations" => "Организации",
    "view_object" => "Виды обьектов",
    "type_object" => "Типы обьектов",
    "type_work" => "Типы работ",
    'admins' => "Пользователи",
    'mObject' => "Обьекты",
    'repair' => 'Ремонты'
]

?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Администратор</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        @if(\Illuminate\Support\Facades\Auth::user())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ \Illuminate\Support\Facades\Auth::user()->Image }}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#"
                       class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                </div>
            </div>
        @else
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="{{route('login')}}"
                       class="d-block">Вы не авторизованны</a>
                </div>
            </div>
        @endif
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Основные</li>
                <li class="nav-item">
                    <a href="{{route("home")}}" class="nav-link
                    {{ request()->routeIs('home.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            {{$references['Dashboard']}}
                        </p>
                    </a>
                </li> <li class="nav-item">
                    <a href="{{route("monitoring")}}" class="nav-link
                     {{ request()->routeIs('monitoring.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            {{$references['Monitoring']}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Статьи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Настройки
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-link"></i>
                                <p>Настройки подключения</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shield"></i>
                                <p>Настройки безопасности</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>Настройки уведомлений</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>Настройки системы мониторинга</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-flux-capacitor"></i>
                                <p>Настройки интерфейса</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-audio-description"></i>
                                <p>Журналирование и аудит</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-yandex-international"></i>
                                <p>Интеграции</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-backspace"></i>
                                <p>Резервное копирование и восстановление</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">Прочие</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <span class="badge fas fa-print">2</span>
                        <p>
                            Документооборот
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Добавляем обработчик клика на ссылку меню
        $('.nav-link').click(function(e) {
            e.preventDefault(); // Предотвращаем переход по ссылке

            // Получаем родительский элемент текущей ссылки
            var parent = $(this).parent();

            // Переключаем класс "active" для родительского элемента
            parent.toggleClass('active');

            // Если родительский элемент имеет класс "active", раскрываем вложенное меню
            if (parent.hasClass('active')) {
                parent.find('.nav-treeview').slideDown();
            } else {
                parent.find('.nav-treeview').slideUp();
            }
        });
    });
</script>
