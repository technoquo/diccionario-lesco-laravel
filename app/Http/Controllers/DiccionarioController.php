<?php

namespace App\Http\Controllers;


use App\Models\Categorias;
use App\Models\Senas;
use App\Models\SenasFavoritas;
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


    public function MostrarLetra(Request $request) 
    {

        if (isset($request->cod_categoria)){
             $cod_categoria = $request->cod_categoria;
        }
         
        if (($request->letra != 'todas') && ($cod_categoria != 0)){ 
            $arr['data'] = Senas::where('letra', '=', $request->letra)->where('cod_categoria', '=', $request->cod_categoria)->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
            
        }else{   
            $arr['data'] = Senas::where('letra', '=', $request->letra)->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
        }

            
       
        echo json_encode($arr);
        exit;
     }
        
    

  


    public function MostrarCategoria(Request $request){
     
         
        if($request->cod_categoria==0){ 
            $arr['data'] =Senas::orderBy('palabra', 'ASC')->get(); 
        }else{   
            $arr['data'] = Senas::where('cod_categoria', '=', $request->cod_categoria)->where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
        }
   
        echo json_encode($arr);
        exit;
     }

     public function AgregarSenaFavorita(Request $request){
     
       

         SenasFavoritas::create([
            'id_sena' => $request->id,           
            'email'  => auth()->user()->email,
            
        ]);
           
        $data = array('message'=>'success','id' => $request->id);
        

        echo json_encode($data);
     }

     public function QuitarSenaFavorita(Request $request){
     
       

        $sena = SenasFavoritas::where('id_sena', '=', $request->id)->where('email', '=', auth()->user()->email);
        $sena->delete();

        $data = array('message'=>'success','id' => $request->id);
       echo json_encode($data);
    }


   
 
}