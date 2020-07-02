<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the application dashboard.app
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $animale = \DB::table('animals')->where('status', '0')->get();
        return view('acasa')->with('animale', $animale);
    }


    public function cereri() {
        return view('cereri');
    }

    public function despre() {
        return view('despre');
    }

    public function contact() {

        return view('contact');
    }
}
