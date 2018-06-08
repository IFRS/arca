@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Turnos</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($turnos as $turno)
                    <li class="list-group-item">{{ $turno->id }}: {{ $turno->nome }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
