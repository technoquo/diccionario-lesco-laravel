@extends('layouts.app')

@section('content')
    <input name="tipo" value="mosaico" type="hidden">
    <div class="fondo-diccionario">
        <div class="container mx-auto w-full">
            <div class="block pt-20 pb-10">
            </div>



            <div class="flex flex-wrap orden_letra justify-center">
                <div class="box-content p-4">
                    <div class="donasena">
                        <div class="text-center">¿Querés proponernos una seña que le gusta saber e incluyamos nuestro
                            proyecto?</div>
                        <div class="text-center mt-10">
                            <input type="text" name="sena" id="sena" class="rounded" autocomplete="off" />
                            <p class="text-red-500 text-xs italic error hidden">Por favor escriba una seña.</p>
                        </div>

                        <div class="text-center mt-10"><button class="bg-sky-500 text-white p-5 rounded donar">Dona tu
                                seña</button></div>
                        <div><img src="https://handsonlesco.com/wp-content/uploads/2021/09/hero-section-img-600x408.png"
                                alt="donacion"></div>
                    </div>
                    <form class="w-full hidden form_donacion">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full">
                                <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                                   Buena noticia! tu seña disponible <span class="text-sky-500" id="sign"></span> vamos a incluir nuestro proyecto.
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full p-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="nombre">
                                    Nombre
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="nombre" type="text" placeholder="Nombre">

                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full p-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="apellidos">
                                    Apellidos
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white border  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="apellidos" type="text" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full p-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="email">
                                    Email
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white border  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="email" type="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full  p-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="donacion">
                                    Donación
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full  bg-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="donacion">
                                        <option value="1">5.000 colones</option>
                                        <option value="2">10.000 colones</option>
                                    </select>

                                </div>
                                <p class="text-black text-lg italic mt-10">** Despues de llenar su solicitud, le enviaremos la cuenta  bancaria de Hands On a su correo indicado para realizar el deposito.</p>
                            </div>
                        </div>
                        <div class="text-center mt-10"><button
                                class="bg-sky-500 text-white p-5 rounded send">Enviar</button></div>
                    </form>
                </div>
            </div>



            <div class="pt-20"> </div>
        </div>
        <script>

        </script>
    @endsection
