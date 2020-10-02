<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function univs() 
    {
        $univs = Menu::select('univ')->get();
        $univs = json_decode($univs);
        return view('pages.univs')->with('univs', $univs);
    }

    public function menu($name) 
    {
        $menu = Menu::select('univ', 'menu', 'daily_menu')->where('univ', $name)->get();
        $menu = json_decode($menu);
        $menu[0]->menu = json_decode($menu[0]->menu);
        $menu[0]->daily_menu = json_decode($menu[0]->daily_menu);
        // var_dump($menu[0]->daily_menu[0]);die();
        return view('pages.menu')->with('menu', $menu);
    }

    public function create($name) 
    {
        return response()->json($name, 200);
    }

    public function update($name) 
    {
        return response()->json($name, 200);
    }

    public function delete($name) 
    {
        return response()->json($name, 200);
    }
}
