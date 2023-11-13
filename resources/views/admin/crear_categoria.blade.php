@extends('admin.layouts.app')


@section('content')
<div class="flex float-left top_left_super">
    <div class="inline-flex text-cyan-600 pointer text-sky-500"><a href="/admin/categorias" aria-label="Volver"><img class="flecha_derecha" src="/images/flecha_izquierda.png" alt="flecha"></a><span class="mt-1 ml-2"> Volver a la lista de categorias</span></div>
</div>
    <div class="flex justify-center pt-20">

        <form action="/admin/categorias" style="box-shadow:-50px -4px 50px #f0f0f0;" method="POST">
            @csrf
            <div class="py-12 px-8">
                <h2 class="text-2xl font-bold">Crear una nueva categoría</h2>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Nombre de categoría</span>
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
                      name="categoria" autocomplete="off"
                        >
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
                                            name="estado">
                                        <span class="ml-2">Activo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="block m-auto">
                            <div class="mt-2">
                                <button type="submit"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none text-white rounded">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                    @if(Session::has('message'))
                    {{ Session::get('message') }}
                    @endif
                </p>
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
