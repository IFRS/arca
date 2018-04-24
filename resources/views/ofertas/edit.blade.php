@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Editar Oferta</h2>
            <hr>
        </div>
    </div>

    @include('forms.errors')

    <div class="row">
        <div class="col-12">
            @include('forms.oferta', ['submit' => 'Atualizar', 'oferta' => $oferta])
        </div>
    </div>
@endsection
