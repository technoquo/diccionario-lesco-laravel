@extends('layouts.app')

@section('content')
    <input name="tipo" value="lista" type="hidden">
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
            <div class="block pt-20 pb-10">
            </div>
            <div class="bg-white content-center rounded-t-md">
                <div class="flex float-right top_right_super">
                   <div class="inline-flex text-cyan-600 pointer"><span class="mt-2">Ir a la lista de vocabulario</span><a href="#" aria-label="lista de vocabulario"><img class="flecha" src="{{ asset('images/flecha.png') }}" alt="flecha"/></a></div>                    
                </div> 
                
                <div class="pt-11"></div>
                <form action="" class="flex flex-wrap justify-center">                 
                    <div class="flex-initial w-96 movil">
                        <label class="block">
                            <span class="text-gray-700">Categoría</span>
                            <select class="form-select  w-full mt-1 rounded">
                                <option value="0">Todas</option>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->estado == 'A')
                                        <option value="{{ $categoria->cod_categoria }}"> {{ $categoria->categoria }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </label>
                    </div>
                </form>
                <div class="pt-10"></div>
            </div>
            <div class="btn-toolbarx">
                <div class="btn-group" role="group" aria-label="Grupo de Letras"></div>
            </div>
            <div class="text-sky-500 dark:text-sky-400 text-2xl ml-10 mt-10" id="mostrarLetra">Todas ({{ $total }})
            </div>

            <div class="flex">           
                  <div class="flex-initial w-64">
                    <div class=""><span>Palabras</span></div>
                    <select class="form-select-2 orden_letra uppercase" id="" aria-label="Lista de palabras" size="10" >
                        @foreach ($senas as $sena)
                         <option value="{{ $sena->id }}"> {{ $sena->palabra }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="flex-initial w-64">
                    03
                  </div>

            </div>
           
   
        </div>
        <script>
     
        </script>
    @endsection
