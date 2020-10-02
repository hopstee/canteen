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
                            Дополнительное меню
                        </h2>
                        @if($menu == null)
                            <p class="card-text">
                                Отсутствует
                            </p>
                            <a href="/home/menu/add/create" class="card-link">
                                Создать
                            </a>
                        @else
                            <a href="/home/menu/add/update" class="card-link">
                                Редактировать
                            </a>
                            <a href="/home/menu/add/delete" class="card-link">
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
                        @if($daily_menu == null)
                            <p class="card-text">
                                Отсутствует
                            </p>
                            <a href="/home/menu/daily/create" class="card-link">
                                Создать
                            </a>
                        @else
                            <a href="/home/menu/daily/update" class="card-link">
                                Редактировать
                            </a>
                            <a href="/home/menu/daily/delete" class="card-link">
                                Удалить
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
