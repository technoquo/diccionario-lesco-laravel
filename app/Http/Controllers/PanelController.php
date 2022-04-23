<?php

namespace App\Http\Controllers;

use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Senas;

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
            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin')->with(['message' => 'Correo electrónico o contraseña inválida']);
        }
        } else {
            return redirect('/admin')->with('message', 'Solamente para los internos de Hands On');
            return redirect('/admin')->with(['message' => 'Solamente para los internos de Hands On']);
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

    public function activo()
    {

        
        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {

            $senas = Senas::where('estado', '=', 'A')->orderBy('palabra', 'ASC')->get();
            return view('admin.dashboard', ['senas' => $senas, 'defecto' =>'activo', 'seccion'=>'activo', 'select' => 'asc']);
        } else {
           return redirect('/'); 
        }
        
    }

    public function inactivo()
    {

        
        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {

            $senas = Senas::where('estado', '=', 'I')->orderBy('palabra', 'ASC')->get();
            return view('admin.dashboard', ['senas' => $senas , 'defecto' =>'inactivo', 'seccion'=>'inactivo', 'select' => 'asc']);
        } else {
           return redirect('/'); 
        }
        
    }

    public function pendiente()
    {

        
        $validar =  UsersAdmin::where('email', '=', auth()->user()->email)->where('estado', '=', 'A')->count();
        if ($validar == 1) {

            $senas = Senas::where('estado', '=', '')->orderBy('palabra', 'ASC')->get();
            return view('admin.dashboard', ['senas' => $senas,  'defecto' =>'pendiente', 'seccion'=>'pendiente',  'select' => 'asc']);
        } else {
           return redirect('/'); 
        }
        
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $sena = Senas::find($id);
       

       return view('admin.show')->with('sena', $sena);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
