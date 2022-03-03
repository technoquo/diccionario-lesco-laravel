@extends('layouts.app')

@section('content')
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
          <div class="block pt-20 pb-10">
               <span class="float-right">
                <a href="#" class="boton_salir text-white rounded-2xl btn-primary pb-10" aria-label="Salir">Salir</a>
               </span>  
            </div>
            <div class="bg-white content-center">
                <form action="" class="md:flex md:justify-center mb-6">
                    <div class="flex pt-10">
                        <div class="flex-initial w-72">
                            <label class="relative block">
                                Buscar
                                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                                        <!-- ... -->
                                    </svg>
                                </span>
                                <input
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Search for anything..." type="text" name="search" />
                            </label>
                        </div>
                        <div class="flex-initial w-72 ml-14">
                            <label class="relative block">
                                Categoria
                                <div class="inline-block relative w-72">
                                    <select
                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option>Really long option that will likely overlap the chevron</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div>fdasfsadf</div>

        </div>
    @endsection
