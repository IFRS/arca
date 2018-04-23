@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Novo Curso</h2>
            <hr>
        </div>
    </div>

    @include('forms.errors')

    <div class="row">
        <div class="col-12">
            @include('forms.curso', ['submit' => 'Cadastrar', 'curso' => $curso])
        </div>
    </div>
@endsection
