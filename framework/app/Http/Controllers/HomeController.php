<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;
use Auth;

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
        $links = Link::whereUserId(Auth::user()->id)->get();
        return view('home', ['links' => $links]);
    }
}
