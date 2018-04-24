@if ($oferta->id)
    <form action="{{ route('ofertas.update', $oferta->id) }}" method="post">
        {{ method_field('PUT') }}
@else
    <form action="{{ route('ofertas.store') }}" method="post">
        {{ method_field('POST') }}
@endif
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-12 col-md-6 form-group">
            <label for="selectCurso">Curso</label>
            <select name="curso_id" id="selectCurso" class="form-control{{ count($errors->get('curso_id')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}"{{ (isset($oferta->curso) && $oferta->curso->id == $curso->id) ? ' selected' : '' }}>{{ $curso->nome }}</option>
                @endforeach
            </select>
            @foreach ($errors->get('curso_id') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
        <div class="col-12 col-md-6 form-group">
            <label for="selectCampus">Campus</label>
            <select name="campus_id" id="selectCampus" class="form-control{{ count($errors->get('campus_id')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($campi as $campus)
                    <option value="{{ $campus->id }}"{{ (isset($oferta->campus) && $oferta->campus->id == $campus->id) ? ' selected' : '' }}>{{ $campus->nome }}</option>
                @endforeach
            </select>
            @foreach ($errors->get('campus_id') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 col-md-3">
            <strong>Modalidade</strong>
            @foreach ($modalidades as $modalidade)
                <div class="form-check">
                    <input name="modalidade_id" value="{{ $modalidade->id }}" type="radio" class="form-check-input" id="radioModalidade{{ $modalidade->id }}"{{ (isset($oferta->modalidade) && $oferta->modalidade->id == $modalidade->id) ? ' checked' : '' }}>
                    <label for="radioModalidade{{ $modalidade->id }}" class="form-check-label">{{ $modalidade->nome }}</label>
                </div>
            @endforeach
            @foreach ($errors->get('modalidade_id') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
        <div class="col-12 col-md-3">
            <strong>Turnos</strong>
            @foreach ($turnos as $turno)
                <div class="form-check">
                    <input name="turnos_ids" value="{{ $turno->id }}" type="checkbox" class="form-check-input" id="checkTurno{{ $turno->id }}"{{ (isset($oferta->turnos) && $oferta->turnos->contains($turno->id)) ? ' checked' : '' }}>
                    <label for="checkTurno{{ $turno->id }}" class="form-check-label">{{ $turno->nome }}</label>
                </div>
            @endforeach
        </div>
        <div class="col-12 col-md-6 form-group">
            <label for="selectNivel">N&iacute;vel</label>
            <select name="nivel_id" id="selectNivel" class="form-control{{ count($errors->get('nivel_id')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($niveis as $nivel)
                    <option value="{{ $nivel->id }}"{{ (isset($oferta->nivel) && $oferta->nivel->id == $nivel->id) ? ' selected' : '' }}>{{ $nivel->nome }}</option>
                @endforeach
            </select>
            @foreach ($errors->get('nivel_id') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 col-md-6 form-group">
            <label for="textareaDescricao">Descri&ccedil;&atilde;o</label>
            <textarea name="descricao" rows="10" id="textareaDescricao" class="form-control{{ count($errors->get('descricao')) > 0 ? ' is-invalid' : '' }}">{{ old('descricao', $oferta->descricao) }}</textarea>
            @foreach ($errors->get('descricao') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
        <div class="col-12 col-md-6 form-group">
            <label for="textareaEstruturaFisica">Estrutura F&iacute;sica</label>
            <textarea name="estrutura_fisica" rows="10" id="textareaEstruturaFisica" class="form-control{{ count($errors->get('estrutura_fisica')) > 0 ? ' is-invalid' : '' }}">{{ old('estrutura_fisica', $oferta->estrutura_fisica) }}</textarea>
            @foreach ($errors->get('estrutura_fisica') as $message)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-row">
        <fieldset class="col-12 col-md-6">
            <legend>Informa&ccedil;&otilde;es</legend>
            <div class="form-group">
                <label for="inputCargaHoraria">Carga Hor&aacute;ria</label>
                <input name="carga_horaria" id="inputCargaHoraria" class="form-control{{ count($errors->get('carga_horaria')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('carga_horaria') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="inputCuracao">Dura&ccedil;&atilde;o</label>
                <input name="duracao" id="inputCuracao" class="form-control{{ count($errors->get('duracao')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('duracao') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="inputAutorizacao">Autoriza&ccedil;&atilde;o</label>
                <input name="autorizacao" id="inputAutorizacao" class="form-control{{ count($errors->get('autorizacao')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('autorizacao') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="inputNotaMEC">Nota do MEC</label>
                <input name="nota_mec" id="inputNotaMEC" class="form-control{{ count($errors->get('nota_mec')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('nota_mec') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
        </fieldset>
        <fieldset class="col-12 col-md-6">
            <legend>Coordenador</legend>
            <div class="form-group">
                <label for="inputCoordenadorNome">Nome</label>
                <input name="coordenador_nome" id="inputCoordenadorNome" class="form-control{{ count($errors->get('coordenador_nome')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('coordenador_nome') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="inputCoordenadorTitulacao">Titula&ccedil;&atilde;o</label>
                <input name="coordenador_titulacao" id="inputCoordenadorTitulacao" class="form-control{{ count($errors->get('coordenador_titulacao')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('coordenador_titulacao') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="inputCoordenadorEmail">E-mail</label>
                <input name="coordenador_email" id="inputCoordenadorEmail" class="form-control{{ count($errors->get('coordenador_email')) > 0 ? ' is-invalid' : '' }}">
                @foreach ($errors->get('coordenador_email') as $message)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
        </fieldset>
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
