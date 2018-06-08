@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>N&iacute;veis</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($niveis as $nivel)
                    <li class="list-group-item">
                        <strong>{{ $nivel->id }}: {{ $nivel->nome }}</strong>
                        @if ($nivel->filhos)
                            <ul class="mt-1">
                                @foreach ($nivel->filhos as $filho)
                                    <li class="mb-1">{{ $filho->id }}: {{ $filho->nome }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
