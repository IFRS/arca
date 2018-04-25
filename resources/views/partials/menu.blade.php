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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ofertas.index') }}">Ofertas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Informa&ccedil;&otilde;es
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Campi</a>
                    <a class="dropdown-item" href="#">Modalidades</a>
                    <a class="dropdown-item" href="#">Níveis</a>
                    <a class="dropdown-item" href="#">Turnos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
        </ul>
    </div>
</nav>
