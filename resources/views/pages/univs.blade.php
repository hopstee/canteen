@extends('layouts.layout')

@section('content')

<div class="grid container">
    @if(count($univs) == 0)
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Меню отсутствуют!</h4>
            <hr>
            <p class="mb-0">Появятся в скором времени.</p>
        </div>
    @else
        @foreach($univs as $univ)
            <div class="card card-float">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $univ->univ }}
                    </h5>
                    <a href="/univs/menu/{{ $univ->univ }}" class="btn btn-primary">
                        Посмотреть меню
                    </a>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection('content')