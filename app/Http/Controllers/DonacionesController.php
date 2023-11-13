<?php

namespace App\Http\Controllers;

use App\Models\Senas;
use App\Models\Donaciones;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Mail as DemoMail;


class DonacionesController extends Controller
{
       /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
      return view('donatusena');       
    }

    public function Verificar(Request $request)
    {
        
        $arr['data'] = Senas::where('palabra', '=', $request->palabra)->count();
        echo json_encode($arr);
        exit;
    }

    public function guardar(Request $request)
    {
      Donaciones::create([
        'nombre'  => $request->nombre,
        'apellidos' => $request->apellidos,   
        'sena' => $request->sena,
        'donacion' => $request->donacion, 
        'email' => $request->email,   
        'estado' => 0
        
    ]);
       
    $data = array('message'=>'success');
    
    echo json_encode($data);

    $mailData = [
      'nombre' => $request->nombre,
      'sena' =>   $request->sena,
      'donacion' =>   $request->donacion
  ];
    
    $myUsers = $request->email;
    $myMoreUsers ='cursos@handsonlesco.com';
    $evenMyMoreUsers = 'leonel@handsonlesco.com';

    Mail::to($myUsers)
        ->cc($myMoreUsers)
        ->bcc($evenMyMoreUsers)      
        ->send(new DemoMail($mailData));
       
    }


}

