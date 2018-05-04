@include('forms.errors')
<form action="{{ route('ofertas.upload', $oferta->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <fieldset class="arquivos">
        <legend><i class="fas fa-plus"></i>&nbsp;Adicionar novo arquivo</legend>
        <div class="form-row" id="collapseNovoArquivo">
            <div class="col-12 col-md-5">
                <label for="inputArquivoTitulo" class="sr-only">T&iacute;tulo do arquivo</label>
                <input id="inputArquivoTitulo" type="text" name="arquivo_titulo" class="form-control{{ count($errors->get('arquivo_titulo')) > 0 ? ' is-invalid' : '' }}" placeholder="Título">
                @foreach ($errors->get('arquivo_titulo') as $message)
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-5">
                <input id="inputArquivo" type="file" name="arquivo" class="form-control-file">
                <label for="inputArquivo" class="btn btn-info btn-block {{ count($errors->get('curso_id')) > 0 ? ' is-invalid' : '' }}">Selecione um arquivo</label>
                @foreach ($errors->get('arquivo') as $message)
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-2">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-upload"></i>&nbsp;Enviar</button>
            </div>
        </div>
    </fieldset>
</form>
