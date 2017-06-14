@if ($curso->id)
    <form action="{{ route('cursos.update', $curso->id) }}" method="post">
        {{ method_field('PUT') }}
@else
    <form action="{{ route('cursos.store') }}" method="post">
        {{ method_field('POST') }}
@endif
    {{ csrf_field() }}
    <div class="form-group{{ count($errors->get('nome')) > 0 ? ' has-error' : '' }}">
        <label for="inputNome">Nome</label>
        <input type="text" name="nome" value="{{ old('nome', $curso->nome) }}" id="inputNome" class="form-control">
        @foreach ($errors->get('nome') as $message)
            <span class="help-block">{{ $message }}</span>
        @endforeach
    </div>
    <div class="form-group{{ count($errors->get('apresentacao')) > 0 ? ' has-error' : '' }}">
        <label for="textareaApresentacao">Apresenta&ccedil;&atilde;o</label>
        <textarea name="apresentacao" rows="5" id="textareaApresentacao" class="form-control">{{ old('apresentacao', $curso->apresentacao) }}</textarea>
        @foreach ($errors->get('apresentacao') as $message)
            <span class="help-block">{{ $message }}</span>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
</form>
