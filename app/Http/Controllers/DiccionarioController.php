<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Senas;
use App\Models\SenasFavoritas;
use Mail;
use App\Mail\Mail as DemoMail;

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
        
        
        $categorias = Categorias::where('estado', '=', 'A')->orderBy('categoria', 'ASC')->get();
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
            'id_user'  => auth()->user()->id,
            'id_sena' => $request->id,           
            
            
        ]);
           
        $data = array('message'=>'success','id' => $request->id);
        

        echo json_encode($data);
     }

     public function QuitarSenaFavorita(Request $request){
     
       

        $sena = SenasFavoritas::where('id_sena', '=', $request->id)->where('id_user', '=', auth()->user()->id);
        $sena->delete();

        $data = array('message'=>'success','id' => $request->id);
       echo json_encode($data);
    }


    public function SenaFavoritaUsuario(Request $request){

         
        $arr['data'] = SenasFavoritas::where('id_sena', '=', $request->id_sena)->where('id_user', '=', auth()->user()->id)->get();
         

        echo json_encode($arr);
        exit;
    }


    public function CorazonFavorito(){

       if (auth()->user() != NULL) {
        $arr['data'] = SenasFavoritas::where('id_user', '=', auth()->user()->id)->get();
        

        echo json_encode($arr);
        exit;
       } else {
        $arr['data'] = 'vacio';
        

        echo json_encode($arr);
        exit;
       }
       
    }


    public function MostrarVideo(Request $request){

         
        $arr['data'] = Senas::where('id', '=', $request->id)->get();
         
        
        echo json_encode($arr);
        exit;
    }

    
    
    public function Verificar(Request $request)
    {
        
        $arr['data'] = Senas::where('palabra', '=', $request->palabra)->count();
        echo json_encode($arr);
        exit;
    }

   /**
     * Write code on Method
     *
     * @return response()
     */
    public function send()
    {
        $mailData = [
            'title' => 'Mail from codingspoint.com',
            'body' => 'This is for testing email using smtp.'
        ];
          
        $myUsers = 'leonel.lopez@accesovisualcr.com';
        $myMoreUsers ='soporte@handsonlesco.com';
        $evenMyMoreUsers = 'technoquo@gmail.com';
        
        Mail::to($myUsers)
            ->cc($myMoreUsers)
            ->bcc($evenMyMoreUsers)      
            ->send(new DemoMail($mailData));
            
        dd("Email is sent successfully.");
    }
   
 
}