<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;


class CategoriaController extends Controller
{
    public function index()
    {
        
        
        $categoria = Categorias::orderBy('categoria', 'ASC')->get();      
        return view('admin.categoria', ['categorias' => $categoria]);
       
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.crear_categoria');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('estado') == 'on'){
            $estado = 'A';
         } else {
            $estado = 'I';
         }

         $request->validate([
            'categoria' => 'required',                
        ]);

        Categorias::create([
            'categoria' => $request->input('categoria'),
            'estado' => $estado, 
          
            
        ]);

       // return redirect('/admin/editar/'.$id)->with('message', 'Actualizado');
       return redirect('/admin/categorias');
    }


    public function show()
    {
       
        
    }


       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cod_categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $categorias = Categorias::where('cod_categoria','=', $id)->first();

        
        return view('admin.edit_categoria',['cat' => $categorias]);
    }




          /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        if ($request->input('estado') == 'on'){
            $estado = 'A';
         } else {
            $estado = 'I';
         }

         $request->validate([
            'categoria' => 'required',                
        ]);

        Categorias::where('cod_categoria',$request->input('cod_categoria'))
        ->update([
            'categoria' => $request->input('categoria'),
            'estado' => $estado, 
   
            ]);
       // return redirect('/admin/editar/'.$id)->with('message', 'Actualizado');
       return redirect('/admin/categorias');
    }





  

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $categoria = Categorias::find($id);

        $categoria->delete();
        return redirect('/admin/categorias');
    }
}
