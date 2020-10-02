<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('univs');
});

Route::get("univs", "Menu\MenuController@univs");
Route::get("univs/menu/{name}", "Menu\MenuController@menu");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/home/menu/daily/create", function() {
    return view('dashboard.menu.create.daily');
});
Route::get("/home/menu/add/create", function() {
    return view('dashboard.menu.create.add');
});
Route::post("/home/menu/{type}/create", "HomeController@create");
Route::post("/home/menu/{type}/create", "HomeController@create");

Route::get("/home/menu/daily/update", function() {
    return view('dashboard.menu.update.daily');
});
Route::get("/home/menu/add/update", function() {
    return view('dashboard.menu.update.add');
});
Route::post("/home/menu/{type}/update", "HomeController@update");

Route::get("/home/menu/{type}/delete", "HomeController@delete");
