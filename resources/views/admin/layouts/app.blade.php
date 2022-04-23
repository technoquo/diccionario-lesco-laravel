<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Administración de Diccionario de LESCO por Hands On" />
    <meta name="keywords" content="Diccionario de LESCO, Hands On LESCO" />
    <meta name="keywords_news" content="Diccionario de LESCO, Hands On LESCO" />
    <meta property="og:title" content="Diccionario de LESCO">
    <meta property="og:description" content="Administración de Diccionario de LESCO por Hands On">
    <meta property="og:image" content="http://handsonlesco.com/wp-content/uploads/2021/09/hero-section-img.png" />
    <meta property="og:image:width" content="1500" />
    <meta property="og:image:height" content="843" />
    <meta property="twitter:card" content="Diccionario de LESCO">
    <meta property="twitter:title" content=" Diccionario de LESCO">
    <meta property="twitter:description" content="Administración de Diccionario de LESCO por Hands On">
    <meta name="google-signin-client_id"
        content="1040391328006-gge4dmhms1l2kpjvuu8oto20jgoutr8o.apps.googleusercontent.com">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://desarrollo.handsonlesco.com/images/favicon_handson.png" />
        
    <title>Panel de Control</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/lesco.js') }}"></script>


</head>

<body class="h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>

                    <a href="/admin"><img src="{{ asset('images/hands.png') }}" alt="Hands On"></a>

                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <div class="hidden md:flex items-center space-x-1">
                        <ul class="flex text-sky-500">
                            @if (Auth::user())
                            <li><a class="no-underline text-black mr-4 hover:text-red-500" target="_blank"
                                    href="#">Categoria</a></li>
                            <li><a class="no-underline  text-black mr-4 hover:text-red-500" target="_blank"
                                    href="#">Senas</a></li>
                            <li><a class="no-underline  text-black mr-4 hover:text-red-500" target="_blank"
                                    href="#">Usuarios</a></li>                           
                                <li> <a href="{{ route('log_out') }}"
                                        class="py-13 pt-15  mr-4 text-black hover:text-red-500" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                                </li>
                                <form id="logout-form" action="{{ route('log_out') }}" method="POST"
                                    class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </ul>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button class="outline-none mobile-menu-button">
                            <svg class=" w-6 h-6 text-gray-500 hover:text-blue-500 " x-show="!showMenu" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- mobile menu -->
                    <div class="hidden mobile-menu">
                        <ul class="">
                            @if (Auth::user())
                                <li class="active"><a href="#"
                                        class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">Categoria</a>
                                </li>
                                <li><a href="#"
                                        class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300">Senas</a>
                                </li>
                                <li><a href="#"
                                        class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300">usuarios</a>
                                </li>
                                <li> <a href="{{ route('log_out') }}"
                                        class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300"
                                        onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                                </li>
                                <form id="logout-form" action="{{ route('log_out') }}" method="POST"
                                    class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </ul>
                    </div>

                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

</html>
