@extends('admin.layouts.app')

@section('content')
    @if (Auth::user())
        <script>
            window.location = "/admin/dashboard";
        </script>
    @endif
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-2xl">

                    <header class="font-semibold  text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        Panel del Control (Diccionario de LESCO)
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                        action="{{ route('check_login') }}">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Correo electrónico') }}:
                            </label>

                            <input id="email" type="email" class="w-full form-input border-2 rounded" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Contraseña') }}:
                            </label>

                            <input id="password" type="password" class="w-full form-input border-2 rounded" name="password"
                                required>

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500  sm:py-4">
                                {{ __('Ingresar') }}
                            </button>


                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                @if(Session::has('message'))
                                {{ Session::get('message') }}
                                @endif
                            </p>

                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
