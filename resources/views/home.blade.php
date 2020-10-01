@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="card card-float">
                    <div class="card-body">
                        <h2 class="card-title">
                            Меню
                        </h2>
                        @if(count($menu) == 0)
                            <p class="card-text">
                                Отсутствует
                            </p>
                            <a href="/home/menu/create" class="card-link">
                                Создать
                            </a>
                        @else
                            <a href="/home/menu/update" class="card-link">
                                Редактировать
                            </a>
                            <a href="/home/menu/delete" class="card-link">
                                Удалить
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card card-float">
                    <div class="card-body">
                        <h2 class="card-title">
                            Ежедневное меню
                        </h2>
                        @if(count($daily_menu) == 0)
                            <p class="card-text">
                                Отсутствует
                            </p>
                            <a href="/home/menu/create" class="card-link">
                                Создать
                            </a>
                        @else
                            <a href="/home/menu/update" class="card-link">
                                Редактировать
                            </a>
                            <a href="/home/menu/delete" class="card-link">
                                Удалить
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card" style="width: 100%; margin-top: 15px;">
                <div class="card-body">
                    <h2 class="card-title mb-0">
                        Заказы
                    </h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item ">
                        <h5>
                            Иван Иванов
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Борщ
                            </li>
                            <li class="list-group-item">
                                Летний салат
                            </li>
                            <li class="list-group-item">
                                Компот яблочный
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <h5>
                            Петор Петров
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Борщ
                            </li>
                            <li class="list-group-item">
                                Летний салат
                            </li>
                            <li class="list-group-item">
                                Компот яблочный
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <h5>
                            Василий Сидоров
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Борщ
                            </li>
                            <li class="list-group-item">
                                Летний салат
                            </li>
                            <li class="list-group-item">
                                Компот яблочный
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
