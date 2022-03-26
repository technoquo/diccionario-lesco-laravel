<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Senas;
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
        
        
        $categorias = Categorias::orderBy('categoria', 'ASC')->get();
        $senas = Senas::orderBy('palabra', 'ASC')->get();
        $total = Senas::where('estado', '=', 'A')->count();
        
         return view('diccionario', ['categorias' => $categorias, 'senas' => $senas, 'total' => $total]);
       
    }
 
}