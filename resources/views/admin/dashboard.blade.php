@extends('admin.layouts.app')

@section('content')
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white">
                    Lista de vocabularios de señas</p>
                <div
                    class="py-3 px-4 flex items-center text-sm font-medium leading-none text-gray-600 dark:text-gray-200  bg-gray-200 dark:bg-gray-800  hover:bg-gray-300   dark:hover:bg-gray-700  cursor-pointer rounded">
                    <p>Ordenar:</p>
                    <select onchange="window.location.href=this.value;" aria-label="select" class="focus:text-indigo-600 focus:outline-none bg-transparent ml-1" name="ordenar">
                        <option class="text-sm text-indigo-800" value="/admin/{{ $seccion  }}/asc"  @if ($select == 'asc') selected @endif>A-Z</option>
                        <option class="text-sm text-indigo-800" value="/admin/{{ $seccion }}/desc" @if ($select == 'desc') selected @endif>Z-A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-900  py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                        href="/admin/dashboard">

                        @if ($defecto == 'todos')
                            <div class="py-2 px-8 bg-blue-500 rounded-full text-white">
                            @else
                                <div
                                    class="py-2 px-8 text-gray-600 dark:text-gray-200  hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                        @endif
                        <p>Todos</p>
                </div>
                </a>
                <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                    href="/admin/activo">
                    @if ($defecto == 'activo')
                        <div class="py-2 px-8 bg-blue-500 rounded-full text-white">
                        @else
                            <div
                                class="py-2 px-8 text-gray-600 dark:text-gray-200  hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                    @endif
                    <p>Activo</p>
            </div>
            </a>
            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                href="/admin/inactivo">
                @if ($defecto == 'inactivo')
                    <div class="py-2 px-8 bg-blue-500 rounded-full text-white">
                    @else
                        <div
                            class="py-2 px-8 text-gray-600 dark:text-gray-200  hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                @endif
                <p>Inactivo</p>
        </div>
        </a>
        <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
            href="/admin/pendiente">
            @if ($defecto == 'pendiente')
                <div class="py-2 px-8 bg-blue-500 rounded-full text-white">
                @else
                    <div
                        class="py-2 px-8 text-gray-600 dark:text-gray-200  hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
            @endif

            <p>Pendiente</p>
    </div>
    </a>
    </div>
    <button
        class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none rounded">
        <p class="text-sm font-medium leading-none text-white">Crear una nueva seña</p>
    </button>
    </div>
    <div class="mt-7 overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <tbody>
                @foreach ($senas as $sena)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600  rounded">

                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">
                                    {{ $sena->palabra }}</p>

                            </div>
                        </td>
                        @if ($sena->estado == 'A')
                            <td class="pl-5">
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded text-center">
                                    Activo</div>
                            </td>
                        @elseif ($sena->estado == 'I')
                            <td class="pl-5">
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded text-center">
                                    Inactivo</div>
                            </td>
                        @elseif ($sena->estado == '')
                            <td class="pl-5">
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-gray-700 bg-gray-100 rounded text-center">
                                    Pendiente</div>
                            </td>
                        @endif
                        <td class="pl-4">
                            <div class="text-center"><a href="dashboard/{{ $sena->id }}"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 dark:text-gray-200  py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-700   dark:bg-gray-800  focus:outline-none">Editar</a>
                            </div>
                        </td>
                        <td class="pl-4">
                            <div class="text-center"><a href=""
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 dark:text-gray-200  py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-700   dark:bg-gray-800  focus:outline-none">Borrar</a>
                            </div>
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
