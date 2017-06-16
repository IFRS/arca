@extends('layouts.app')

@section('content')
    @if (Session::has('status') && Session::has('message'))
        <div class="row">
            <div class="col-xs-12">
                @component('components.alert', ['status' => Session::get('status')])
                    {{ Session::get('message') }}
                @endcomponent
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <h2>Cursos</h2>
        </div>
        <div class="col-xs-12 col-md-2">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary btn-sm pull-right">Adicionar novo</a>
        </div>
    </div>
    <table class="table table-hover table-cursos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ofertas</th>
                <th>Criado em</th>
                <th>Modificado em</th>
                <th class="text-center no-sort"><span class="glyphicon glyphicon-cog"></span><span class="sr-only">Ações</span></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $key => $curso)
            @push('modals')
                <div class="modal fade" id="modal-curso-{{ $curso->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">{{ $curso->nome }}</h3>
                            </div>
                            <div class="modal-body">
                                <p>{{ $curso->apresentacao }}</p>
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
                            </div>
                            <div class="modal-footer">
                                <p><strong>&Uacute;ltima Modifica&ccedil;&atilde;o:</strong> {{ $curso->updated_at ? $curso->updated_at->format('d/m/Y \à\s h:i') : '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endpush
            <tr>
                <td>{{ $curso->id }}</td>
                <td><a href="#modal-curso-{{ $curso->id }}" data-toggle="modal">{{ $curso->nome }}</a></td>
                <td>{{ count($curso->ofertas) }}</td>
                <td>{{ $curso->created_at ? $curso->created_at->format('d/m/Y h:i'): '-' }}</td>
                <td>{{ $curso->updated_at ? $curso->updated_at->format('d/m/Y h:i') : '-' }}</td>
                <td class="text-center">
                    <form action="{{ route('cursos.delete', $curso->id) }}" method="post" class="delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="btn-group">
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-xs btn-default" title="Editar Curso"><span class="glyphicon glyphicon-edit"></span><span class="sr-only">Editar Curso</span></a>
                            <button type="submit" class="btn btn-xs btn-danger" title="Deletar Curso"><span class="glyphicon glyphicon-remove"></span><span class="sr-only">Deletar Curso</span></button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
