<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiccionarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()  /// OJO es importante cuando termina el desarrallo descomentar
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diccionario');
    }
}