<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diccionario Hands On</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/lesco.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>

                    <img class="inicio" src="{{ asset('images/hands.png') }}" alt="Hands On">

                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <div class="hidden md:flex items-center space-x-1">
                        <ul class="flex">
                            <li><a class="no-underline text-black mr-4 hover:text-red-500" target="_blank"
                                    href="https://www.handsonlesco.com/">¿Quienés somos?</a></li>
                            <li><a class="no-underline  text-black mr-4 hover:text-red-500" target="_blank"
                                    href="https://www.handsonlesco.com/blog/">Blog</a></li>
                            <li><a class="no-underline  text-black mr-4 hover:text-red-500" target="_blank"
                                    href="https://www.handsonlesco.com/contactanos/">Contacto</a> </li>
                            <li> <a class="py-13 pt-15  mr-4 text-black hover:text-red-500" target="_blank"
                                    href="https://www.handsonlesco.com/cursos/">Cursos</a></li>
                            @if (Auth::user())
                                <li>
                                    <a class="py-13 pt-15  mr-4 text-black hover:text-red-500"  title="Tus señas favoritas"
                                    href="/senasfavoritas">                                  
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 fill-cyan-500 hover:fill-red-700 cursor-pointer"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>                                   
                                </li>
                                <li> <a href="{{ route('logout') }}" class="py-13 pt-15  mr-4 text-black hover:text-red-500" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
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
                            <li class="active"><a href="https://www.handsonlesco.com/"
                                    class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">¿Quienés
                                    somos?</a>
                            </li>
                            <li><a href="https://www.handsonlesco.com/blog/"
                                    class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300">Blog</a>
                            </li>
                            <li><a href="https://www.handsonlesco.com/contactanos/"
                                    class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">Contacto</a>
                            </li>
                            <li><a href="https://www.handsonlesco.com/cursos/"
                                    class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">Cursos
                                </a></li>
                            @if (Auth::user())
                            <li>
                                <a class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300"  title="Tus señas favoritas"
                                href="/senasfavoritas">                                  
                                   Tus señas favoritas
                                </a>                                   
                            </li>
                                <li> <a href="{{ route('logout') }}"
                                        class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300"
                                        onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
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
