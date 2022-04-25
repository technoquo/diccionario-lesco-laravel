<?php

namespace App\Http\Controllers;

use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Senas;
use App\Models\Categorias;
use App\Http\Requests\CreateValidationRequest;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.login');
    }

    public function check_login(Request $request)
    {

         $validar =  UsersAdmin::where('email', '=', $request->email)->where('estado', '=', 'A')->count();

        if ($validar == 1) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return redirect('/admin')->with(['message' => 'Correo electrónico o contraseña inválida']);
        }
        } else {
            return redirect('/admin')->with('message', 'Solamente para los internos de Hands On');
         
        }
    }

    public function log_out(Request $request)
    {
        Auth::logout();
        return redirect('/admin');
    }

 /**
     * Display the specified resource.
     *
     * @param  string  $seccion
     * @return \Illuminate\Http\Response
    
    **/
    public function dashboard()
    {

        
        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {

            $senas = Senas::orderBy('palabra', 'ASC')->get();
            return view('admin.dashboard', ['senas' => $senas, 'defecto' =>'todos','seccion'=>'dashboard','select' => 'asc']);
        } else {
           return redirect('/'); 
        }
        
    }

    public function estado($estado){
        return $estado;
    }


    public function order($seccion, $ordenar)
    {
    

        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {
            switch ($seccion) {
                case 'activo':
                   $condicion = Senas::where('estado', '=', 'A')->orderBy('palabra', $ordenar)->get();
                    break;
                case 'inactivo':
                    $condicion = Senas::where('estado', '=', 'I')->orderBy('palabra', $ordenar)->get();
                    break;
                case 'pendiente':
                    $condicion = Senas::where('estado', '=', '')->orderBy('palabra', $ordenar)->get();
                    break;
                case 'dashboard':
                    $condicion = Senas::orderBy('palabra', $ordenar)->get();
                    break;
            }
            
            $senas = $condicion;
            return view('admin.dashboard', ['senas' => $senas, 'defecto' =>$seccion, 'seccion'=>$seccion, 'select' => $ordenar]);
        } else {
           return redirect('/'); 
        }
        
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::where('estado', '=', 'A')->orderBy('categoria', 'ASC')->get();
        return view('admin.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validar = Senas::where('palabra', '=', $request->input('palabra'))->count();
        if ($validar == 0) {;

       if ($request->input('estado') == 'on'){
               $estado = 'A';
       } else {
               $estado = 'I';
       }

       $request->validate([
        'palabra' => 'required',
        'video' => 'required',
        'letra' => 'required',       
    ]);
    
      Senas::create([
            'palabra' => $request->input('palabra'),
            'video'=> $request->input('video'),
            'cod_categoria' =>  $request->input('cod_categoria'), 
            'letra' =>  $request->input('letra'), 
            'estado' => $estado, 
          
            
        ]);

          

         return redirect('/admin/dashboard');
      } else {
        return redirect('/admin/create')->with('message', 'La palabra '. $request->input('palabra'). ' ya se encuentra en la base de datos');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show($seccion)
    {
        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {
            switch ($seccion) {
                case 'activo':
                   $condicion = Senas::where('estado', '=', 'A')->get();
                    break;
                case 'inactivo':
                    $condicion = Senas::where('estado', '=', 'I')->get();
                    break;
                case 'pendiente':
                    $condicion = Senas::where('estado', '=', '')->get();
                    break;
                case 'dashboard':
                    $condicion = Senas::orderBy('palabra', 'ASC')->get();
                    break;
            }
            
            $senas = $condicion;
            return view('admin.dashboard', ['senas' => $senas, 'defecto' =>$seccion, 'seccion'=>$seccion, 'select' => 'asc']);
        } else {
           return redirect('/'); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $senas = Senas::find($id);
        $categorias = Categorias::where('estado', '=', 'A')->orderBy('categoria', 'ASC')->get();
        return view('admin.edit', ['categorias' => $categorias])->with('sena', $senas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->input('estado') == 'on'){
            $estado = 'A';
         } else {
            $estado = 'I';
         }

         $request->validate([
            'palabra' => 'required',
            'video' => 'required',
            'letra' => 'required',       
        ]);
                
        Senas::where('id',$id)
                 ->update([
                    'palabra' => $request->input('palabra'),
                    'video'=> $request->input('video'),
                    'cod_categoria' =>  $request->input('cod_categoria'), 
                    'letra' =>  $request->input('letra'), 
                    'estado' => $estado, 
            
        ]);

       // return redirect('/admin/editar/'.$id)->with('message', 'Actualizado');
       return redirect('/admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
