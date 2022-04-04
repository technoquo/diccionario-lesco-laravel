<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Senas;
use App\Models\SenasFavoritas;

class SenasFavoritasController extends Controller

{


      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 

     $favoritos = Senas::join('senas_favoritas', 'senas_favoritas.id_sena', '=', 'senas.id')
              ->where('senas_favoritas.id_user','=', auth()->user()->id)
              ->get();

     $total_favoritos = SenasFavoritas::where('id_user','=', auth()->user()->id)->count();
         
         

        
         return view('senasfavoritas', ['favoritos'=>$favoritos,'total_favoritos' => $total_favoritos]);
       
    }
}
