@if (!isset($isTrash)) {{ $isTrash = false }} @endif
<table class="table table-striped table-cursos">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Oferta</th>
            <th>Criado em</th>
            @if ($isTrash)
                <th>Deletado em</th>
            @else
                <th>Modificado em</th>
            @endif
            <th class="text-center no-sort"><span class="fas fa-cogs"></span><span class="sr-only">A&ccedil;&otilde;es</span></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($ofertas as $oferta)
        @push('modals')
            @component('components.modal', ['id' => 'modal-oferta-'.$oferta->id])
                @slot('title')
                    {{ $oferta->nome }}
                @endslot

                {{ $oferta->modalidade->nome }} - {{ $oferta->nivel->pai->nome }} > {{ $oferta->nivel->nome }} -
                @foreach ($oferta->turnos as $turno)
                    {{ $turno->nome }}
                    @if (!$loop->last)
                        {{ ', ' }}
                    @endif
                @endforeach
                <p>{{ $oferta->descricao }}</p>
                <h4>Informa&ccedil;&otilde;es</h4>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>Carga Hor&aacute;ria: {{ $oferta->carga_horaria }}</p>
                        <p>Dura&ccedil;&atilde;o: {{ $oferta->duracao }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p>Autoriza&ccedil;&atilde;o: {{ $oferta->autorizacao }}</p>
                        <p>Nota do MEC: {{ $oferta->nota_mec }}</p>
                    </div>
                </div>
                <h4>Coordenador</h4>
                <p>{{ $oferta->coodenador_nome }}</p>
                <p>{{ $oferta->coordenador_titulacao }}</p>
                <a href="mailto:{{ $oferta->coodenador_email }}">{{ $oferta->coodenador_email }}</a>
                <h4>Estrutura F&iacute;sica</h4>
                <p>{{ $oferta->estrutura_fisica }}</p>

                @slot('footer')
                    <p><strong>&Uacute;ltima Modifica&ccedil;&atilde;o:</strong> {{ $oferta->updated_at ? $oferta->updated_at->format('d/m/Y \à\s h:i') : '-' }}</p>
                @endslot
            @endcomponent
        @endpush
        <tr>
            <td>{{ $oferta->id }}</td>
            <td><a href="#modal-oferta-{{ $oferta->id }}" data-toggle="modal">{{ $oferta->nome }}</a></td>
            <td>{{ $oferta->created_at ? $oferta->created_at->format('d/m/Y h:i'): '-' }}</td>
            @if ($isTrash)
                <td>{{ $oferta->deleted_at ? $oferta->deleted_at->format('d/m/Y h:i') : '-' }}</td>
            @else
                <td>{{ $oferta->updated_at ? $oferta->updated_at->format('d/m/Y h:i') : '-' }}</td>
            @endif
            <td class="text-center">
                <div class="btn-group" role="group" aria-label="Ações">
                    @if ($isTrash)
                        <form action="{{ route('ofertas.restore', $oferta->id) }}" method="post" class="action restore">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-info" title="Restaurar &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-undo"></i><span class="sr-only">Restaurar &quot;{{ $oferta->nome }}&quot;</span></button>
                        </form>
                    @else
                        <a href="{{ route('ofertas.edit', $oferta->id) }}" class="btn btn-sm btn-secondary" title="Editar &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-edit"></i></a>
                    @endif
                    <form action="{{ ($isTrash) ? route('ofertas.destroy', $oferta->id) : route('ofertas.delete', $oferta->id) }}" method="post" class="action {{ ($isTrash) ? 'destroy' : 'delete' }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        @if ($isTrash)
                            <button type="submit" class="btn btn-sm btn-danger" title="Remover PERMANENTEMENTE &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-times"></i><span class="sr-only">Remover PERMANENTEMENTE &quot;{{ $oferta->nome }}&quot;</span></button>
                        @else
                            <button type="submit" class="btn btn-sm btn-danger" title="Enviar &quot;{{ $oferta->nome }}&quot; para a lixeira"><i class="fas fa-trash-alt"></i><span class="sr-only">Enviar &quot;{{ $oferta->nome }}&quot; para a lixeira</span></button>
                        @endif
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
