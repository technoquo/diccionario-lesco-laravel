<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Senas;
use App\Models\SenasFavoritas;
use App\Models\Categorias;

class ListaSenasController extends Controller
{
        /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $categorias = Categorias::orderBy('categoria', 'ASC')->get();
        $senas = Senas::where('letra', '=', 'A')->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
        $total = Senas::where('estado', '=', 'A')->count();
        $defecto = Senas::where('estado', '=', 'A')->first();
       
        
        
         return view('listasenas', ['categorias' => $categorias, 'senas' => $senas, 'total' => $total, 'defecto' => $defecto]);
       
       
    }

     public function MostrarLetra(Request $request) 
    {

        if (isset($request->cod_categoria)){
             $cod_categoria = $request->cod_categoria;
        }
         
        if (($request->letra == 'todas') && ($cod_categoria == 0)){ 
            $arr['data'] = Senas::where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
            echo json_encode($arr);
        } else if (($request->letra != 'todas') && ($cod_categoria != 0) ){   
            $arr['data'] = Senas::where('letra', '=', $request->letra)->where('cod_categoria', '=', $request->cod_categoria)->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
            echo json_encode($arr);
        } else if (($request->letra != 'todas') && ($cod_categoria == 0) ){   
            $arr['data'] = Senas::where('letra', '=', $request->letra)->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
            echo json_encode($arr);
        }

        exit;
     }

 
        
}
