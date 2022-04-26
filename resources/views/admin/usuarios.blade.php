@extends('admin.layouts.app')

@section('content')
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white">
                    Lista de usuarios</p>
                <label class="block">
                    <span class="text-gray-700">Buscar</span>
                    <input type="search" class="form-input-admin mt-1 block w-full rounded" />
                </label>

            </div>
        </div>
        <div class="bg-white dark:bg-gray-900  py-4 md:py-7 px-4 md:px-8 xl:px-10">          
            <div class="mt-7 overflow-x-auto">
                <table class="whitespace-nowrap m-auto w-1/2">
                    <tbody>
                        @foreach ($users as $user)
                            <tr tabindex="0"
                                class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600  rounded">

                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">
                                            {{ $user->name }}</p>

                                    </div>
                                </td>  
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">
                                            {{ $user->lastname }}</p>
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
@endsection
