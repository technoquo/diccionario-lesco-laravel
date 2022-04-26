@extends('layouts.app')

@section('content')
    <input name="tipo" value="lista" type="hidden">
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
            <div class="block pt-20 pb-10">
            </div>
            <div class="bg-white content-center rounded-t-md">
                <div class="flex float-left top_left_super">
                    <div class="inline-flex text-cyan-600 pointer text-sky-500"><a href="/diccionario"
                            aria-label="La vista de mosaico"><img class="flecha_derecha"
                                src="{{ asset('images/flecha_izquierda.png') }}" alt="flecha" /></a><span
                            class="mt-1 ml-2"> Ir a la vista de mosaico</span></div>
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

            <div class="flex">
                <div class="flex-initial w-64">
                    <div class="mt-10"><span id="cantidadPalabras">Palabras ({{ $total }})</span></div>
                    <select class="orden_letra scrollable-element altura" id="" aria-label="Lista de palabras" size="10">
                        @foreach ($senas as $sena)
                            <option value="{{ $sena->id }}" class="w-56 count uppercase"> {{ $sena->palabra }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-initial w-full">
                    <div class="videoWrapper">
                        <div class="barra">                          
                        <img class="mostrar_{{ $defecto->id }} ico_heart_left heart-fill cursor-pointer" id="{{ $defecto->id  }}"></div>
                        <iframe width="100%" height="600" src="https://www.youtube.com/embed/{{ $defecto->video }}"
                            frameborder="0" allowfullscreen></iframe>
                        <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">
                            <div class="nombre_palabra">
                                {{ $defecto->palabra }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-20"> </div>          
        </div>
    @endsection
