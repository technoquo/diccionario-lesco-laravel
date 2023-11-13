@extends('admin.layouts.app')

@section('content')
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white">
                    Lista de Categorías</p>
                <label class="block">
                    <span class="text-gray-700">Buscar</span>
                    <input type="search" class="form-input-admin mt-1 block w-full rounded" />
                </label>

            </div>
        </div>
        <div class="bg-white dark:bg-gray-900  py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-center">

                <a href="/admin/categorias/crear_categoria"
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Crear una nueva categoria</p>
                </a>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="whitespace-nowrap m-auto w-1/2">
                    <tbody>
                        @foreach ($categorias as $cate)
                            <tr tabindex="0"
                                class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600  rounded">

                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">
                                            {{ $cate->categoria }}</p>

                                    </div>
                                </td>
                                @if ($cate->estado == 'A')
                                    <td class="pl-5">
                                        <div
                                            class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded text-center">
                                            Activo</div>
                                    </td>
                                @else 
                                    <td class="pl-5">
                                        <div
                                            class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded text-center">
                                            Inactivo</div>
                                    </td>                                
                                @endif
                                <td class="pl-4">
                                    <div class="text-center"><a href="/admin/categorias/{{ $cate->cod_categoria }}/edit"
                                            class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 dark:text-gray-200  py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-700   dark:bg-gray-800  focus:outline-none">Editar</a>
                                    </div>
                                </td>
                                <td class="pl-4">
                                
                                </td>
                            </tr>
                            <tr class="h-3"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }

    </style>
@endsection
