<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ URL::asset('images/logo-if.png') }}" alt="Logo dos Institutos Federais" width="40" height="40" class="img-fluid">
        aRCA
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item{{ Request::is('cursos*') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
            </li>
            <li class="nav-item{{ Request::is('ofertas*') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('ofertas.index') }}">Ofertas</a>
            </li>
            @can('manage-users')
            <li class="nav-item{{ Request::is('users*') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">Usu&aacute;rios</a>
            </li>
            @endcan
            @can('view-dados')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle{{ (Request::is('campi') || Request::is('modalidades') || Request::is('niveis') || Request::is('turnos')) ? ' active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dados
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item{{ Request::is('campi') ? ' active' : '' }}" href="{{ route('campi.index') }}">Campi</a>
                    <a class="dropdown-item{{ Request::is('modalidades') ? ' active' : '' }}" href="{{ route('modalidades.index') }}">Modalidades</a>
                    <a class="dropdown-item{{ Request::is('niveis') ? ' active' : '' }}" href="{{ route('niveis.index') }}">Níveis</a>
                    <a class="dropdown-item{{ Request::is('turnos') ? ' active' : '' }}" href="{{ route('turnos.index') }}">Turnos</a>
                </div>
            </li>
            @endcan
            <li class="nav-item{{ Request::is('sobre') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('sobre.index') }}">Sobre</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <span class="navbar-text">
                Olá, {{ Auth::user()->name }}
            </span>
            <button type="submit" class="btn btn-light" title="Sair"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>
</nav>
