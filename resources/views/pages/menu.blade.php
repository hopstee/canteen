@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Меню
            </h2>
            <div class="grid">
                @foreach($menu[0]->menu as $item)
                    <div class="card card-float" data-price="{{ $item->price }}" data-good="{{ $item->title }}">
                        <div class="card-body">
                            <div class="card-title">
                                Товар: {{ $item->title }}
                            </div>
                            <p class="card-text">
                                Цена: {{ $item->price }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="delimeter"></div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Ежедневное меню
            </h2>
            @foreach($menu[0]->daily_menu as $item)
                <h3 class="card-title">{{ $item->title }}</h3>
                <div class="grid">
                    @foreach($item->menu as $i)
                        <div class="card card-float" data-price="{{ $i->price }}" data-good="{{ $i->title }}">
                            <div class="card-body">
                                <div class="card-title">
                                    Товар: {{ $i->title }}
                                </div>
                                <p class="card-text">
                                    Цена: {{ $i->price }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="delimeter"></div>
            @endforeach
        </div>
    </div>
</div>

<div class="add-list">
    <div class="card shadow">
        <div class="card-body centered flex-row justify-content-between">
            <div class="card-title">
                Сумма: <span id="sum">0</span>
            </div>
            <a id="clean_sum" href="#" class="card-link">Очистить</a>
        </div>
    </div>
</div>

<script>
    var sum = document.getElementById('sum');
    var clean_sum = document.getElementById('clean_sum');
    var list = document.getElementById('add_list');
    var goods = document.querySelectorAll(".card-float");


    goods.forEach(good => {
        good.addEventListener('click', function() {
            let g = good.getAttribute('data-good');
            let p = Number(good.getAttribute('data-price'));
            let total = Number(sum.textContent);

            total = total + p;
            sum.innerHTML = total;

            // if(localStorage.getItem(`${g}`) === null) {
            //     localStorage.setItem(`${g}`, p);
            // } else {
            //     let old_value = localStorage.getItem(`${g}`);
            //     let new_value = Number(old_value) + Number(p);
            //     localStorage.setItem(`${g}`, new_value);
            // }
        });
    });

    clean_sum.addEventListener('click', (e) => {
        e.preventDefault();
        sum.innerHTML = 0;
    });
</script>

@endsection('content')