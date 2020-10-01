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
    public function index(Request $request)
    {
        $name = Auth::user()->name;

        $menu = Menu::select('menu')->where('univ', $name)->get();
        $daily_menu = Menu::select('daily_menu')->where('univ', $name)->get();

        return view('home')->with('menu', $menu)->with('daily_menu', $daily_menu)->with('name', $name);
    }

    public function create(Request $request)
    {
        return $this->index();
    }

    public function update(Request $request)
    {
        return $this->index();
    }

    public function delete(Request $request)
    {
        return $this->index();
    }
}
