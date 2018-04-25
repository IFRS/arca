<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('partials.favicons')

        <title>aRCA - Reposit&oacute;rio de Cursos Acad&ecirc;micos</title>

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>
    </head>
    <body>
        @stack('modals')
        <header>
            @if (Auth::check())
                <h1 class="sr-only">aRCA - Reposit&oacute;rio de Cursos Acad&ecirc;micos</h1>
                @include('partials.menu')
            @else
                <h1 class="text-center mt-3">aRCA - Reposit&oacute;rio de Cursos Acad&ecirc;micos</h1>
            @endif
        </header>

        <main class="container">
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center">
                            <a href="mailto:comunicacao@ifrs.edu.br">Departamento de Comunicação do IFRS</a>
                            &mdash;
                            <!-- Laravel -->
                            <a href="https://laravel.com/" target="_blank">Desenvolvido com Laravel<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <span class="fas fa-external-link-alt"></span>
                            &mdash;
                            <!-- Código-fonte -->
                            <a href="https://github.com/IFRS/arca" target="_blank">C&oacute;digo-fonte deste sistema sob a licen&ccedil;a GPL 3.0<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <span class="fas fa-external-link-alt"></span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        @stack('scripts')
    </body>
</html>
