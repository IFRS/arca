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
    <div class="jumbotron">
        <h1 class="display-4">aRCA&nbsp;<small>Reposit&oacute;rio de Cursos Acad&ecirc;micos</small></h1>
        <p class="lead">Bem-vindo ao reposit&oacute;rio de cursos acad&ecirc;micos do Instituto Federal do Rio Grande do Sul, use o menu acima para navegar pelo sistema.</p>
    </div>
@endsection
