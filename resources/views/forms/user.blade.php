<form action="{{ route('users.store') }}" method="post">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    <div class="form-row">
        <fieldset class="col-12">
            <div class="form-check form-check-inline">
                <input name="role" value="administrator" type="radio" class="form-check-input" id="checkTurnoAdministrator">
                <label for="checkTurnoAdministrator" class="form-check-label">Administrador</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="role" value="manager" type="radio" class="form-check-input" id="checkTurnoManager">
                <label for="checkTurnoManager" class="form-check-label">Gerente</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="role" value="editor" type="radio" class="form-check-input" id="checkTurnoEditor" checked>
                <label for="checkTurnoEditor" class="form-check-label">Cadastrador</label>
            </div>
        </fieldset>
    </div>

    <div class="form-row">
        <div class="col-12 form-group">
            <label for="inputUsername" class="sr-only">Uid (Nome de Usu&aacute;rio)</label>
            <input type="text" name="username" placeholder="Uid (nome de usuário)" value="{{ old('username', $user->username) }}" id="inputUsername" class="form-control{{ count($errors->get('username')) > 0 ? ' is-invalid' : '' }}">
            @foreach ($errors->get('username') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 col-md-6">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
        </div>
        <div class="col-12 col-md-6 text-right">
            <button type="submit" class="btn btn-success">Adicionar</button>
        </div>
    </div>
</form>
