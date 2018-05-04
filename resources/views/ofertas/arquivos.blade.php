@extends('layouts.app')

@section('content')
    @if (Session::has('status') && Session::has('message'))
    <div class="row">
        <div class="col-12">
            @component('components.alert', ['status' => Session::get('status')])
                {{ Session::get('message') }}
            @endcomponent
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h2>{{ $oferta->nome }} - Arquivos</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            @include('forms.oferta_arquivo')
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-arquivos">
                <thead>
                    <tr>
                        <th>T&iacute;tulo</th>
                        <th class="no-sort">Caminho</th>
                        <th>Tipo</th>
                        <th>Tamanho</th>
                        <th>Enviado em</th>
                        <th class="text-center no-sort"><span class="fas fa-cogs"></span><span class="sr-only">A&ccedil;&otilde;es</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($oferta->arquivos as $arquivo)
                        <tr>
                            <td class="align-middle"><a href="{{ Storage::url($arquivo->arquivo) }}">{{ $arquivo->nome }}</a></td>
                            <td class="align-middle">{{ Storage::url($arquivo->arquivo) }}</td>
                            <td class="align-middle">{{ Storage::mimeType($arquivo->arquivo) }}</td>
                            <td class="align-middle">{{ round(Storage::size($arquivo->arquivo) / 1000) }}&nbsp;Kb</td>
                            <td class="align-middle">{{ $arquivo->created_at ? $arquivo->created_at->format('d/m/Y h:i') : '-' }}</td>
                            <td class="align-middle">
                                <form action="{{ route('ofertas.arquivo_destroy', [$oferta->id, $arquivo->id]) }}" method="POST" class="action destroy">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger" title="Excluir PERMANENTEMENTE &quot;{{ $arquivo->nome }}&quot;"><i class="fas fa-times"></i><span class="sr-only">Excluir PERMANENTEMENTE &quot;{{ $arquivo->nome }}&quot;</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
