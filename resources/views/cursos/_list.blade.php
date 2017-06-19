@if (!isset($isTrash)) {{ $isTrash = false }} @endif
<table class="table table-hover table-cursos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ofertas</th>
            <th>Criado em</th>
            @if ($isTrash)
                <th>Deletado em</th>
            @else
                <th>Modificado em</th>
            @endif
            <th class="text-center no-sort"><span class="glyphicon glyphicon-cog"></span><span class="sr-only">A&ccedil;&otilde;es</span></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cursos as $curso)
        @push('modals')
            @component('components.modal', ['id' => 'modal-curso-'.$curso->id])
                @slot('title')
                    {{ $curso->nome }}
                @endslot

                <p>{{ $curso->apresentacao }}</p>
                <h4>&Aacute;rea de Atua&ccedil;&atilde;o</h4>
                <p>{{ $curso->atuacao }}</p>
                @if (count($curso->ofertas) > 0)
                    <h4>Ofertas <span class="badge">{{ count($curso->ofertas) }}</span></h4>
                    <ol>
                    @foreach ($curso->ofertas as $oferta)
                        <li>
                            <strong>{{ $oferta->campus->nome }}:</strong> {{ $oferta->modalidade->nome }} - {{ $oferta->nivel->pai->nome }} > {{ $oferta->nivel->nome }} -
                        @foreach ($oferta->turnos as $turno)
                            {{ $turno->nome }}
                            @if (!$loop->last)
                                {{ ', ' }}
                            @endif
                        @endforeach
                        </li>
                    @endforeach
                    </ol>
                @else
                    <div class="alert alert-info">
                        <p>Esse Curso ainda n&atilde;o possui ofertas cadastradas.</p>
                    </div>
                @endif

                @slot('footer')
                    <p><strong>&Uacute;ltima Modifica&ccedil;&atilde;o:</strong> {{ $curso->updated_at ? $curso->updated_at->format('d/m/Y \à\s h:i') : '-' }}</p>
                @endslot
            @endcomponent
        @endpush
        <tr>
            <td>{{ $curso->id }}</td>
            <td><a href="#modal-curso-{{ $curso->id }}" data-toggle="modal">{{ $curso->nome }}</a></td>
            <td>{{ count($curso->ofertas) }}</td>
            <td>{{ $curso->created_at ? $curso->created_at->format('d/m/Y h:i'): '-' }}</td>
            @if ($isTrash)
                <td>{{ $curso->deleted_at ? $curso->deleted_at->format('d/m/Y h:i') : '-' }}</td>
            @else
                <td>{{ $curso->updated_at ? $curso->updated_at->format('d/m/Y h:i') : '-' }}</td>
            @endif
            <td class="text-center">
                @if ($isTrash)
                    <form action="{{ route('cursos.restore', $curso->id) }}" method="post" class="action restore">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-xs btn-info" title="Restaurar &quot;{{ $curso->nome }}&quot;"><span class="glyphicon glyphicon-retweet"></span><span class="sr-only">Restaurar &quot;{{ $curso->nome }}&quot;</span></button>
                    </form>
                @else
                    <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-xs btn-default" title="Editar &quot;{{ $curso->nome }}&quot;"><span class="glyphicon glyphicon-edit"></span><span class="sr-only">Editar &quot;{{ $curso->nome }}&quot;</span></a>
                @endif
                <form action="{{ ($isTrash) ? route('cursos.destroy', $curso->id) : route('cursos.delete', $curso->id) }}" method="post" class="action {{ ($isTrash) ? 'destroy' : 'delete' }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    @if ($isTrash)
                        <button type="submit" class="btn btn-xs btn-danger" title="Remover PERMANENTEMENTE &quot;{{ $curso->nome }}&quot;"><span class="glyphicon glyphicon-remove"></span><span class="sr-only">Remover PERMANENTEMENTE &quot;{{ $curso->nome }}&quot;</span></button>
                    @else
                        <button type="submit" class="btn btn-xs btn-danger" title="Enviar &quot;{{ $curso->nome }}&quot; para a lixeira"><span class="glyphicon glyphicon-trash"></span><span class="sr-only">Enviar &quot;{{ $curso->nome }}&quot; para a lixeira</span></button>
                    @endif
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
