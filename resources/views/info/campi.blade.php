@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Campi</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($campi as $campus)
                    <li class="list-group-item">{{ $campus->id }} &dash; {{ $campus->nome }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
