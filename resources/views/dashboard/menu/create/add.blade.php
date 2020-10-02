@extends('layouts.app')

@section('content')

<div class="modal fade" id="cat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая категория</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_name" class="col-form-label">Категория</label>
                    <input class="form-control" id="category_name" autofocus>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="submit_category">Добавить категорию</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая позиция</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="item_name" class="col-form-label">Позиция</label>
                    <input class="form-control" id="item_name" autofocus>
                </div>
                <div class="form-group">
                    <label for="item_price" class="col-form-label">Цена</label>
                    <input class="form-control" id="item_price" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="submit_item">Добавить позицию</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            Создать меню
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="col-12">
                    <h3>Меню:</h3>
                    <div id="menu"></div>
                </div>
                <input type="hidden" name="menu" id="json_menu" value="">
                <div class="col-12">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#cat_modal">
                        <i class="fa fa-plus"></i>
                        Добавить категорию
                    </button>
                </div>
                <br>
                <button id="create_menu" type="submit" class="btn btn-primary">
                    {{ __('Создать') }}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    var create_menu = document.getElementById('create_menu');
    var menu_block = document.getElementById('menu');
    var json_menu = document.getElementById('json_menu');
    var menu = [];
    var category = {
        name: "",
        menu: []
    };
    var item = {
        name: "",
        price: 0
    };

    var cat, it;

    function category_template(name)
    {
        let cat = Object.assign({}, category);
        cat['name'] = name;
        cat['menu'] = [];
        return cat;
    }

    function item_template(name, price)
    {
        let it = Object.assign({}, item);
        it['name'] = name;
        it['price'] = price; 
        return it;    
    }

    var cat_submit = document.getElementById('submit_category');
    var cat_name = document.getElementById('category_name');
    var item_submit = document.getElementById('submit_item');
    var item_name = document.getElementById('item_name');
    var item_price = document.getElementById('item_price');
    var modal_id;

    cat_submit.addEventListener('click', function() {
        if(cat_name.value.length > 0)
        {
            let val = cat_name.value;
            cat = category_template(val);
            menu.push(cat);
            renderMenu();
        }
    });

    item_submit.addEventListener('click', function() {
        if(item_name.value.length > 0 && item_price.value.length > 0)
        {
            let name = item_name.value;
            let price = item_price.value;
            it = item_template(name, price);
            menu[modal_id].menu.push(it);
            renderMenu();
        }
    });

    function renderMenu()
    {
        menu_block.innerHTML = "";
        menu.forEach((element, index) => {
            let items = "";
            element.menu.forEach((el, i) => {
                items += `
                    <div class="card my-2" data-parentid="${index}" data-elementid="${i}">
                        <div class="card-body">
                            <p class="card-title">
                                Товар: ${el.name}
                            </p>
                            <p class="card-text">
                                Цена: ${el.price}
                            </p>
                        </div>
                    </div>
                `;
            });
            let cat = `
                <div>
                    <h4>
                        ${element.name}
                        <button id="${index}" type="button" class="btn btn-link add-position" data-toggle="modal" data-target="#item_modal">
                            <i class="fa fa-plus"></i>
                            Добавить позицию
                        </button>
                        ${items}
                    </h4>
                </div>
            `;
            menu_block.insertAdjacentHTML('beforeend', cat);
            json_menu.value = JSON.stringify(menu);
        });

        var modal_toggle = document.querySelectorAll(".add-position");
        modal_toggle.forEach(el => {
            el.addEventListener('click', function() {
                modal_id = el.id;
            });
        });
    }

</script>
@endsection
