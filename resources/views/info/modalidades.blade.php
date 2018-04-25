@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Modalidades</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($modalidades as $modalidade)
                    <li class="list-group-item">{{ $modalidade->nome }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
