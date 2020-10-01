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

Route::get("/home/menu/create", function() {
    return view('dashboard.create');
});
Route::post("/home/menu/create", "HomeController@create");

Route::get("/home/menu/update", function() {
    return view('dashboard.update');
});
Route::post("/home/menu/update", "HomeController@update");

Route::post("/home/menu/delete", "HomeController@delete");
