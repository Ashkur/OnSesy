<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edital;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editais = Edital::all();
        return view('home', compact('editais'));
    }
}
