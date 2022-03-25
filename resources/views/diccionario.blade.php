@extends('layouts.app')

@section('content')
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
          <div class="block pt-20 pb-10">              
            </div>
            <div class="bg-white content-center rounded-t-md">
                <div class="pt-11"></div>   
                <form action="" class="flex flex-wrap justify-center">                   
                        <div class="flex-initial w-96 md:mx-8">
                            <label class="block">
                                <span class="text-gray-700">Buscar</span>
                                <input type="search" class="form-input mt-1 block w-full rounded" />
                              </label>
                        </div>
                        <div class="flex-initial w-96 movil">
                            <label class="block">
                                <span class="text-gray-700">Categoría</span>
                                <select class="form-select block w-full mt-1 rounded">
                                  <option>Option 1</option>
                                  <option>Option 2</option>
                                </select>
                              </label>
                        </div>                       
                </form>
                <div class="pt-10"></div>           
            </div>
            <div class="btn-toolbarx">
              <div class="btn-group" role="group" aria-label="Grupo de Letras"></div>
           </div>
            <div>fdasfsadf</div>

        </div>
    @endsection
