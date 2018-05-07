@if (!isset($isTrash)) {{ $isTrash = false }} @endif
<div class="table-responsive">
    <table class="table table-striped table-ofertas">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Oferta</th>
                <th>Modalidade</th>
                <th>N&iacute;vel</th>
                <th>Turnos</th>
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

                    <p>
                        {{ $oferta->modalidade->nome }} &mdash; {{ $oferta->nivel->pai->nome }} <i class="fas fa-arrow-right"></i> {{ $oferta->nivel->nome }} &mdash;
                        @foreach ($oferta->turnos as $turno)
                            {{ $turno->nome }}@if (!$loop->last){{ ', ' }}@endif
                        @endforeach
                    </p>
                    <p>{!! $oferta->descricao !!}</p>
                    <h4>Informa&ccedil;&otilde;es</h4>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p>Carga Hor&aacute;ria: {{ $oferta->carga_horaria }} horas</p>
                            <p>Dura&ccedil;&atilde;o: {{ $oferta->duracao }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p>Autoriza&ccedil;&atilde;o: {{ $oferta->autorizacao }}</p>
                            <p>Nota do MEC: {{ $oferta->nota_mec }}</p>
                        </div>
                    </div>
                    <h4>Coordenador</h4>
                    <p>{{ $oferta->coordenador_nome }} &lt;<a href="mailto:{{ $oferta->coordenador_email }}">{{ $oferta->coordenador_email }}</a>&gt; ({{ $oferta->coordenador_titulacao }})</p>

                    <h4>Estrutura F&iacute;sica</h4>
                    <p>{!! $oferta->estrutura_fisica !!}</p>

                    <div class="text-center">
                        <a href="{{ route('ofertas.arquivos', $oferta->id) }}" class="btn btn-info" title="Gerenciar Arquivos de &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-file-alt"></i>&nbsp;Gerenciar Arquivos</a>
                    </div>

                    @slot('footer')
                        <p>
                            <strong>Cria&ccedil;&atilde;o:</strong> {{ $oferta->created_at ? $oferta->created_at->format('d/m/Y \à\s h:i') : '-' }}
                            &mdash;
                            <strong>&Uacute;ltima Modifica&ccedil;&atilde;o:</strong> {{ $oferta->updated_at ? $oferta->updated_at->format('d/m/Y \à\s h:i') : '-' }}
                        </p>
                    @endslot
                @endcomponent
            @endpush
            <tr>
                <td>{{ $oferta->id }}</td>
                <td><a href="#modal-oferta-{{ $oferta->id }}" data-toggle="modal">{{ $oferta->nome }}</a></td>
                <td>{{ $oferta->modalidade->nome }}</td>
                <td>{{ $oferta->nivel->pai->nome }} <i class="fas fa-arrow-right"></i> {{ $oferta->nivel->nome }}</td>
                <td>
                    @foreach ($oferta->turnos as $turno)
                        {{ $turno->nome }}@if (!$loop->last){{ ', ' }}@endif
                    @endforeach
                </td>
                @if ($isTrash)
                    <td>{{ $oferta->deleted_at ? $oferta->deleted_at->format('d/m/Y \à\s h:i') : '-' }}</td>
                @else
                    <td>{{ $oferta->updated_at ? $oferta->updated_at->format('d/m/Y \à\s h:i') : '-' }}</td>
                @endif
                <td class="text-center">
                    @if ($isTrash)
                        <form action="{{ route('ofertas.restore', $oferta->id) }}" method="post" class="action restore">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-info" title="Restaurar &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-undo"></i><span class="sr-only">Restaurar &quot;{{ $oferta->nome }}&quot;</span></button>
                        </form>
                    @else
                        <a href="{{ route('ofertas.edit', $oferta->id) }}" class="btn btn-sm btn-secondary" title="Editar &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('ofertas.arquivos', $oferta->id) }}" class="btn btn-sm btn-info" title="Gerenciar Arquivos de &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-file-alt"></i></a>
                    @endif
                    <form class="d-inline" action="{{ ($isTrash) ? route('ofertas.destroy', $oferta->id) : route('ofertas.delete', $oferta->id) }}" method="post" class="action {{ ($isTrash) ? 'destroy' : 'delete' }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        @if ($isTrash)
                            <button type="submit" class="btn btn-sm btn-danger" title="Remover PERMANENTEMENTE &quot;{{ $oferta->nome }}&quot;"><i class="fas fa-times"></i><span class="sr-only">Remover PERMANENTEMENTE &quot;{{ $oferta->nome }}&quot;</span></button>
                        @else
                            <button type="submit" class="btn btn-sm btn-danger" title="Enviar &quot;{{ $oferta->nome }}&quot; para a lixeira"><i class="fas fa-trash-alt"></i><span class="sr-only">Enviar &quot;{{ $oferta->nome }}&quot; para a lixeira</span></button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
