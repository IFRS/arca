<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('partials.favicons')

        <title>aRCA - Repositório de Cursos Acad&ecirc;micos</title>

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>
    </head>
    <body>
        @stack('modals')
        <header>
            <h1 class="sr-only">IFRS aRCA - Repositório de Cursos Acad&ecirc;micos</h1>
            @include('partials.menu')
        </header>

        <section role="main" class="container">
            @yield('content')
        </section>

        <footer>
        </footer>
        @stack('scripts')
    </body>
</html>
