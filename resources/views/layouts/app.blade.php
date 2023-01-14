 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Koretagram - @yield('titulo')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    @vite('resources/css/app.css')
 </head>
 <body class="bg-gray-100"> 

    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black"> 
                Koretagram
            </h1>

            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600" href="">Login</a>
                <a class="font-bold uppercase text-gray-600" href="{{ route('register') }}">
                    Crear Cuenta
                </a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')

    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Koretagram - Todo los derechos Reservado
        {{now()->year}}
    </footer>


 </body>
 </html>