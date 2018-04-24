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
        <div class="col-12 col-md-10">
            <h2>Cursos</h2>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary float-right">Adicionar novo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#tab-todos" aria-controls="tab-todos" role="tab" data-toggle="tab" class="nav-link active">Todos&nbsp;<span class="badge">{{ count($cursos) }}</span></a></li>
                <li role="presentation" class="nav-item"><a href="#tab-lixeira" aria-controls="tab-lixeira" role="tab" data-toggle="tab" class="nav-link">Lixeira&nbsp;<span class="badge">{{ count($cursos_trashed) }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="tab-todos">
            @include('cursos._list', ['cursos' => $cursos])
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-lixeira">
            @include('cursos._list', ['cursos' => $cursos_trashed, 'isTrash' => true])
        </div>
    </div>
@endsection
