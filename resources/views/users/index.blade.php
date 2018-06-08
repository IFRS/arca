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
            <h2>Usu&aacute;rios</h2>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>&nbsp;Adicionar novo</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#tab-todos" aria-controls="tab-todos" role="tab" data-toggle="tab" class="nav-link active">Todos&nbsp;<span class="badge">{{ count($users) }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="tab-todos">
            @include('users._list', ['users' => $users])
        </div>
    </div>
@endsection
