<?php

namespace App\Http\Controllers;

use App\Models\Senas;
use Illuminate\Http\Request;


class DonacionesController extends Controller
{
    //
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
}

