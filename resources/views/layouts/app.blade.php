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
                    <ul class="flex">
                        <li><a class="no-underline text-black mr-4" target="_blank"
                                href="https://www.handsonlesco.com/">¿Quienés somos?</a></li>
                        <li><a class="no-underline  text-black mr-4"" target=" _blank"
                                href="https://www.handsonlesco.com/blog/">Blog</a></li>
                        <li><a class="no-underline  text-black mr-4" target="_blank"
                                href="https://www.handsonlesco.com/contactanos/">Contacto</a></li>
                        <li><a class="py-13 pt-15  mr-4 text-black" target="_blank"
                                href="https://www.handsonlesco.com/cursos/">Cursos</a></li>

                    </ul>
                    <!-- mobile menu -->
                    <div class="hidden mobile-menu">
                        <ul class="">
                            <li class="active"><a href="index.html"
                                    class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
                            <li><a href="#services"
                                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a>
                            </li>
                            <li><a href="#about"
                                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a>
                            </li>
                            <li><a href="#contact"
                                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact
                                    Us</a></li>
                        </ul>
                    </div>
                    <script>
                        const btn = document.querySelector("button.mobile-menu-button");
                        const menu = document.querySelector(".mobile-menu");

                        btn.addEventListener("click", () => {
                            menu.classList.toggle("hidden");
                        });
                    </script>
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>

</html>
