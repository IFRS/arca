@if ($curso->id)
    <form action="{{ route('cursos.update', $curso->id) }}" method="post">
        {{ method_field('PUT') }}
@else
    <form action="{{ route('cursos.store') }}" method="post">
        {{ method_field('POST') }}
@endif
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-12 form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $curso->nome) }}" id="inputNome" class="form-control{{ count($errors->get('nome')) > 0 ? ' is-invalid' : '' }}">
            @foreach ($errors->get('nome') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 col-md-6 form-group">
            <label for="textareaApresentacao">Apresenta&ccedil;&atilde;o</label>
            <textarea name="apresentacao" rows="10" id="textareaApresentacao" class="form-control{{ count($errors->get('nome')) > 0 ? ' is-invalid' : '' }}">{{ old('apresentacao', $curso->apresentacao) }}</textarea>
            @foreach ($errors->get('apresentacao') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
        <div class="col-12 col-md-6 form-group">
            <label for="textareaAtuacao">Atua&ccedil;&atilde;o</label>
            <textarea name="atuacao" rows="10" id="textareaAtuacao" class="form-control{{ count($errors->get('nome')) > 0 ? ' is-invalid' : '' }}">{{ old('atuacao', $curso->atuacao) }}</textarea>
            @foreach ($errors->get('atuacao') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 col-md-6">
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </div>
        <div class="col-12 col-md-6 text-right">
            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
        </div>
    </div>
</form>
