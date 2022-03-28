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
            
            <div class="flex flex-wrap justify-center">
                @foreach ($senas as $sena)
                @if ($sena->estado == 'A')
                   <div class="modal hidden estado_{{ $sena->estado }}" id="{{ $sena->id }}">
                        <div class="p-8">
                            <div class="hidden" id="video_{{ $sena->id }}">{{ $sena->video }}</div>
                            <img src="http://img.youtube.com/vi/{{ $sena->video }}/mqdefault.jpg"
                                alt="{{ $sena->palabra }} ">
                            <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">
                                <div class="nombre_palabra" id="nombre_palabra_{{ $sena->id }}">
                                    {{ $sena->palabra }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="open-modal-{{ $sena->id }} overflow-y-auto overflow-x-hidden fixed top-40  z-50" tabindex="-1"></div>
                @endif
            @endforeach    
            </div>
            <div class="flex justify-center">
              <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-5 px-6 rounded-full" id="loadMore">Mostrar más</a>
            </div>
            <div class="pt-20"> </div>
        </div>
    @endsection
