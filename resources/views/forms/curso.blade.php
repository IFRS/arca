@if ($curso->id)
    <form action="{{ route('cursos.update', $curso->id) }}" method="post">
        {{ method_field('PUT') }}
@else
    <form action="{{ route('cursos.store') }}" method="post">
        {{ method_field('POST') }}
@endif
    {{ csrf_field() }}

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group{{ count($errors->get('nome')) > 0 ? ' has-error' : '' }}">
                <label for="inputNome">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $curso->nome) }}" id="inputNome" class="form-control">
                @foreach ($errors->get('nome') as $message)
                    <span class="help-block">{{ $message }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group{{ count($errors->get('apresentacao')) > 0 ? ' has-error' : '' }}">
                <label for="textareaApresentacao">Apresenta&ccedil;&atilde;o</label>
                <textarea name="apresentacao" rows="10" id="textareaApresentacao" class="form-control">{{ old('apresentacao', $curso->apresentacao) }}</textarea>
                @foreach ($errors->get('apresentacao') as $message)
                    <span class="help-block">{{ $message }}</span>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group{{ count($errors->get('atuacao')) > 0 ? ' has-error' : '' }}">
                <label for="textareaAtuacao">Atua&ccedil;&atilde;o</label>
                <textarea name="atuacao" rows="10" id="textareaAtuacao" class="form-control">{{ old('atuacao', $curso->atuacao) }}</textarea>
                @foreach ($errors->get('atuacao') as $message)
                    <span class="help-block">{{ $message }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </div>
        <div class="col-xs-12 col-md-6 text-right">
            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
        </div>
    </div>
</form>
