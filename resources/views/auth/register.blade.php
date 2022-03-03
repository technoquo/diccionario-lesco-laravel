@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto  sm:mt-10 sm:m-auto">

 <div class="flex items-center justify-center">
    <div class="md:flex">
        <div class="md:max-w-lg">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="font-semibold text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Registrarse') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Nombre') }}:
                        </label>

                        <input id="name" type="text" class="w-full form-input border-2 @error('name')  border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Correo electrónico') }}:
                        </label>

                        <input id="email" type="email"
                            class="w-full form-input border-2 @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

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

                        <input id="password" type="password"
                            class="w-full form-input border-2 @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirmar contraseña') }}:
                        </label>

                        <input id="password-confirm" type="password" class="w-full form-input border-2"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 sm:py-4">
                            {{ __('Registrar') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('¿Ya tenés una cuenta? ') }}
                            <a class="text-blue-500  no-underline" href="{{ route('login') }}">
                                {{ __('Iniciar sesión') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
        <div class="md:max-w-lg ml-14">          
              <img class="" src="https://diccionario.handsonlesco.com/images/computadora.png" alt="">            
        </div>
    </div>

</div>
    
</main>
@endsection
