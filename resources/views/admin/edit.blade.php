@extends('admin.layouts.app')


@section('content')

<div class="flex float-left top_left_super">
    <div class="inline-flex text-cyan-600 pointer text-sky-500"><a href="/admin/dashboard" aria-label="Volver"><img class="flecha_derecha" src="/images/flecha_izquierda.png" alt="flecha"></a><span class="mt-1 ml-2"> Volver al inicio</span></div>
</div>

    <div class="flex justify-center pt-20">

        <form action="/admin/actualizar/{{ $sena->id }}" style="box-shadow:-50px -4px 50px #f0f0f0;" method="POST">
            @csrf
            <div class="py-12 px-8">
                <h2 class="text-2xl font-bold">Actualizar palabra para la seña</h2>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                             <label class="block">
                            <span class="text-gray-700">Video</span>
                            <iframe  width="98%" src="https://www.youtube.com/embed/{{ $sena->video }}"></iframe>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Nombre de la palabra</span>
                            <input type="text"
                                class="
                      mt-1
                      block
                      w-full
                      rounded-md
                      bg-gray-100
                      border-transparent
                      focus:border-gray-500 focus:bg-white focus:ring-0
                      h-10"
                      name="palabra" autocomplete="off"
                                oninput="this.value=this.value.toLowerCase()"
                                value="{{ $sena->palabra }}">
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Codigo de Youtube</span>
                            <input type="text"
                                class="
                        mt-1
                        block
                        w-full
                        rounded-md
                        bg-gray-100
                        border-transparent
                        focus:border-gray-500 focus:bg-white focus:ring-0
                        h-10"
                        name="video" autocomplete="off"
                        value="{{ $sena->video }}">
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Categoria</span>
                            <select
                                class="
                      block
                      w-full
                      mt-1
                      rounded-md
                      bg-gray-100
                      border-transparent
                      focus:border-gray-500 focus:bg-white focus:ring-0
                      h-10"
                                name="cod_categoria">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->cod_categoria }}" @if ($sena->cod_categoria == $categoria->cod_categoria) selected @endif> {{ $categoria->categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </label>        
                        <label class="block">
                            <span class="text-gray-700">Letra Inicial</span>
                            <input type="text"
                                class="
                        mt-1
                        block
                        w-full
                        rounded-md
                        bg-gray-100
                        border-transparent
                        focus:border-gray-500 focus:bg-white focus:ring-0
                        h-10
                        uppercase"
                        name="letra" autocomplete="off" maxlength="1"4
                        value="{{ $sena->letra }}">
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                            class="
                            rounded
                            bg-gray-200
                            border-transparent
                            focus:border-transparent focus:bg-gray-200
                            text-gray-700
                            focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                                            name="estado" @if ($sena->estado == 'A') checked @endif>
                                        <span class="ml-2">Activo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="block m-auto">
                            <div class="mt-2">
                                <button type="submit"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none text-white rounded">Actualizar</button>
                            </div>
                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                @if(Session::has('message'))
                                {{ Session::get('message') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
           
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </form>

    </div>
@endsection
