<form action="{{ route('users.store') }}" method="post">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-12 form-group">
            <label for="inputUsername">Uid (Nome de Usu&aacute;rio)</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" id="inputUsername" class="form-control{{ count($errors->get('username')) > 0 ? ' is-invalid' : '' }}">
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
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
</form>
