@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Дополнительное меню
            </h2>
            @if(isset($menu[0]->menu))
                @foreach($menu[0]->menu as $item)
                    <h3 class="card-title">{{ $item->name }}</h3>
                    <div class="grid">
                        @foreach($item->menu as $i)
                            <div class="card card-float" data-price="{{ $i->price }}" data-good="{{ $i->name }}">
                                <div class="card-body">
                                    <div class="card-title">
                                        Товар: {{ $i->name }}
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
            @else
                <p class="card-text">
                    Меню отсутствует
                </p>
            @endif
        </div>
    </div>

    <div class="delimeter"></div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Ежедневное меню
            </h2>
            @if(isset($menu[0]->daily_menu))
                @foreach($menu[0]->daily_menu as $item)
                    <h3 class="card-title">{{ $item->name }}</h3>
                    <div class="grid">
                        @foreach($item->menu as $i)
                            <div class="card card-float" data-price="{{ $i->price }}" data-good="{{ $i->name }}">
                                <div class="card-body">
                                    <div class="card-title">
                                        Товар: {{ $i->name }}
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
            @else
                <p class="card-text">
                    Меню отсутствует
                </p>
            @endif
        </div>
    </div>
</div>

<div class="add-list">
    <div class="card shadow">
        <div class="card-body centered justify-content-between btn-group-vertical dropdown">
            <div class="d-flex justify-content-between w-100">
                <div class="card-title">
                    Сумма: <span id="sum">0</span>
                </div>
                <div>
                    <a class="dropdown-toggle mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="toggle_menu" href="#" class="card-link">Показать</a>
                    <a id="clean_sum" href="#" class="card-link">Очистить</a>
                </div>
            </div>
            <ul class="dropdown-menu" aria-labelledby="toggle_menu" id="list"></ul>
        </div>
    </div>
</div>

<script>
    const sum = document.getElementById('sum');
    const clean_sum = document.getElementById('clean_sum');
    const list = document.getElementById('add_list');
    const goods = document.querySelectorAll(".card-float");
    const ul = document.getElementById('list')

    let itemsArray = localStorage.getItem('items')
        ? JSON.parse(localStorage.getItem('items'))
        : [];

    let total = localStorage.getItem('totalSum')
        ? localStorage.getItem('totalSum')
        : 0;

    localStorage.setItem('items', JSON.stringify(itemsArray));
    localStorage.setItem('total', total);

    const liMaker = (name, price) => {
        const li = document.createElement('li');
        li.classList.add('dropdown-item');
        li.textContent = name + ": " + price;
        ul.appendChild(li);
    }

    setPrice(total);
    displayList();

    goods.forEach(good => {
        good.addEventListener('click', function() {
            let g = good.getAttribute('data-good');
            let p = Number(good.getAttribute('data-price'));

            total = Number(total) + p;
            setPrice(total);

            itemsArray.push({"name": g, "price": p});
            localStorage.setItem('items', JSON.stringify(itemsArray));
            localStorage.setItem('total', total);

            displayList();
        });
    });

    clean_sum.addEventListener('click', (e) => {
        e.preventDefault();
        total = 0;
        itemsArray = [];
        sum.innerHTML = total;
        localStorage.setItem('items', '');
        localStorage.setItem('total', total);

        displayList();
        setPrice(0);
    });

    function displayList()
    {
        ul.innerHTML = '';
        itemsArray.forEach((item) => {
            liMaker(item.name, item.price);
        })
    }

    function setPrice(price)
    {
        sum.innerHTML = price;
    }
</script>

@endsection('content')