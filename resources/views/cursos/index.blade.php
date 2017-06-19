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
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#tab-todos" aria-controls="tab-todos" role="tab" data-toggle="tab">Todos&nbsp;<span class="badge">{{ count($cursos) }}</span></a></li>
                <li role="presentation"><a href="#tab-lixeira" aria-controls="tab-lixeira" role="tab" data-toggle="tab">Lixeira&nbsp;<span class="badge">{{ count($cursos_trashed) }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="tab-todos">
            @include('cursos._list', ['cursos' => $cursos])
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-lixeira">
            @include('cursos._list', ['cursos' => $cursos_trashed, 'isTrash' => true])
        </div>
    </div>
@endsection
