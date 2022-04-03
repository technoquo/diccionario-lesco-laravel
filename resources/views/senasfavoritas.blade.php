@extends('layouts.app')

@section('content')
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
            <div class="block pt-20 pb-10">
            </div>
            <div class="text-left"><a href="{{ route('diccionario') }}"><img class="flecha cursor-pointer"
                        src="{{ asset('images/flecha_roja.png') }}" alt="Volver al incio" title="Volver al incio"></a>
            </div>
            <div class="text-sky-500 dark:text-sky-400 text-2xl ml-10 mt-10" id="mostrarLetra">Tus señas favoritos
                ({{ $total_favoritos }})
            </div>

            <div class="flex flex-wrap orden_letra justify-center">
                @foreach ($favoritos as $sena)
                    @if ($sena->estado == 'A')
                        <div class="p-8 favorito_{{ $sena->id }} card  estado_{{ $sena->estado }}" id="{{ $sena->id }}">
                            <div class="hidden" id="video_{{ $sena->id }}">{{ $sena->video }}</div>
                            <img class="mostrar_{{ $sena->id }}  card-img-left ico_heart_favorito heart-fill quitarsenafavorita"
                                id="{{ $sena->id }}">
                            <div class="modal  estado_{{ $sena->estado }}" id="{{ $sena->id }}">
                                <img src="http://img.youtube.com/vi/{{ $sena->video }}/mqdefault.jpg"
                                    alt="{{ $sena->palabra }} ">
                                <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">
                                    <div class="nombre_palabra" id="nombre_palabra_{{ $sena->id }}">
                                        {{ $sena->palabra }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="open-modal-{{ $sena->id }} overflow-y-auto overflow-x-hidden fixed top-40  z-50"
                            tabindex="-1">
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="flex justify-center">
                <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-5 px-6 rounded-full"
                    id="loadMore">Mostrar más</a>
            </div>
            <div class="pt-20"> </div>
        </div>
        <script>

        </script>
    @endsection
