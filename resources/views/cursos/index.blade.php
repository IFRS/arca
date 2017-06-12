@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <h2>Cursos</h2>
        </div>
        <div class="col-xs-12 col-md-2">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary btn-sm pull-right">Adicionar novo</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ofertas</th>
                <th>Criado em</th>
                <th>Modificado em</th>
                <th class="text-center"><span class="glyphicon glyphicon-cog"></span><span class="sr-only">Ações</span></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $key => $curso)
            <tr v-for="curso in cursos">
                <td>{{ $curso->id }}</td>
                <td><a href="#curso-{{ $curso->id }}" data-toggle="modal">{{ $curso->nome }}</a></td>
                <div class="modal fade" id="curso-{{ $curso->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">{{ $curso->nome }}</h3>
                            </div>
                            <div class="modal-body">
                                <p>{{ $curso->apresentacao }}</p>
                                <h4>Ofertas <span class="badge">{{ count($curso->ofertas) }}</span></h4>
                                @foreach ($curso->ofertas as $oferta)
                                    <p>{{ $oferta->campus->nome }} - {{ $oferta->modalidade->nome }} - {{ $oferta->nivel->nome }} -
                                    @foreach ($oferta->turnos as $turno)
                                        {{ $turno->nome }}
                                        @if (!$loop->last)
                                            {{ ', ' }}
                                        @endif
                                    @endforeach</p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <p><strong>&Uacute;ltima Modifica&ccedil;&atilde;o:</strong> {{ $curso->updated_at ? $curso->updated_at->format('d/m/Y \à\s h:i') : '-' }}</p>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <td>{{ count($curso->ofertas) }}</td>
                <td>{{ $curso->created_at ? $curso->created_at->format('d/m/Y h:i'): '-' }}</td>
                <td>{{ $curso->updated_at ? $curso->updated_at->format('d/m/Y h:i') : '-' }}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-xs btn-default" title="Editar"><span class="glyphicon glyphicon-edit"></span><span class="sr-only">Editar</span></a>
                        <a href="{{ route('cursos.destroy', $curso->id) }}" class="btn btn-xs btn-danger" title="Deletar"><span class="glyphicon glyphicon-remove"></span><span class="sr-only">Deletar</span></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
