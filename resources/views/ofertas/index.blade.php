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
            <h2>Ofertas</h2>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{ route('ofertas.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>&nbsp;Adicionar nova</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#tab-todas" aria-controls="tab-todas" role="tab" data-toggle="tab" class="nav-link active">Todas&nbsp;<span class="badge">{{ count($ofertas) }}</span></a></li>
                <li role="presentation" class="nav-item"><a href="#tab-lixeira" aria-controls="tab-lixeira" role="tab" data-toggle="tab" class="nav-link">Lixeira&nbsp;<span class="badge">{{ count($ofertas_trashed) }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="tab-todas">
            @include('ofertas._list', ['ofertas' => $ofertas])
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-lixeira">
            @include('ofertas._list', ['ofertas' => $ofertas_trashed, 'isTrash' => true])
        </div>
    </div>
@endsection
