<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = Auth::user()->name;

        $menu = Menu::select('menu')->where('univ', $name)->get();
        $daily_menu = Menu::select('daily_menu')->where('univ', $name)->get();

        return view('home')->with('menu', $menu[0]['menu'])->with('daily_menu', $daily_menu[0]['daily_menu'])->with('name', $name);
    }

    public function create(Request $request, $type)
    {
        $name = Auth::user()->name;

        $field = $type == 'daily' ? 'daily_menu' : 'menu';

        $menu = $request->input('menu');
        Menu::updateOrInsert(['univ' => $name], ["$field" => $menu]);
        return $this->index();
    }

    public function update(Request $request)
    {
        return $this->index();
    }

    public function delete($type)
    {
        $name = Auth::user()->name;

        $field = $type == 'daily' ? 'daily_menu' : 'menu';

        Menu::where('univ', $name)->update([$field => null]);
        return $this->index();
    }
}
