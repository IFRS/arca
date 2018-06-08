@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Novo Usu&aacute;rio LDAP</h2>
            <hr>
        </div>
    </div>

    @include('forms.errors')

    <div class="row">
        <div class="col-12">
            @include('forms.user', ['user' => $user])
        </div>
    </div>
@endsection
