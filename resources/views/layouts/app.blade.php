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
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        <img src="{{ asset('images/hands.png') }}" alt="Hands On">
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <div class="hidden md:flex items-center space-x-1">
                        <ul class="flex">
                          <li><a class="no-underline text-black mr-4" target="_blank"
                            href="https://www.handsonlesco.com/">¿Quienés somos?</a></li>
                          <li><a class="no-underline  text-black mr-4" target="_blank"
                            href="https://www.handsonlesco.com/blog/">Blog</a></li>
                       <li><a class="no-underline  text-black mr-4" target="_blank"
                            href="https://www.handsonlesco.com/contactanos/">Contacto</a> </li>                     
                        <li> <a class="py-13 pt-15  mr-4 text-black" target="_blank"
                            href="https://www.handsonlesco.com/cursos/">Cursos</a></li>
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
                                        class="block text-sm px-2 py-4 text-black hover:bg-blue-500 font-semibold">¿Quienés somos?</a>
                                </li>
                                <li><a href="https://www.handsonlesco.com/blog/"
                                        class="block text-sm px-2 py-4 text-black  hover:bg-blue-500 transition duration-300">Blog</a>
                                </li>
                                <li><a href="https://www.handsonlesco.com/contactanos/"
                                        class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">Contacto</a>
                                </li>
                                <li><a href="https://www.handsonlesco.com/cursos/"
                                        class="block text-sm px-2 py-4 text-black hover:bg-blue-500 transition duration-300">Cursos
                                        Us</a></li>
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
