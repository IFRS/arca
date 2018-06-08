<div class="table-responsive">
    <table class="table table-striped table-users">
        <thead class="thead-light">
            <tr>
                <th>Uid (Nome de Usu&aacute;rio)</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Modificado em</th>
                <th class="text-center no-sort"><span class="fas fa-cogs"></span><span class="sr-only">A&ccedil;&otilde;es</span></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at ? $user->created_at->format('d/m/Y \à\s h:i'): '-' }}</td>
                <td>{{ $user->updated_at ? $user->updated_at->format('d/m/Y \à\s h:i') : '-' }}</td>
                <td class="text-center">
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline action destroy">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-danger" title="Remover PERMANENTEMENTE &quot;{{ $user->name }}&quot;"><i class="fas fa-times"></i><span class="sr-only">Remover PERMANENTEMENTE &quot;{{ $user->name }}&quot;</span></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
