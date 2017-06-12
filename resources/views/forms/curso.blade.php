@if ($curso->id)
    {!! Form::model($curso, ['route' => ['cursos.update', $curso->id], 'method' => 'PUT']) !!}
@else
    {!! Form::model($curso, ['route' => 'cursos.store']) !!}
@endif
    <div class="form-group{{ count($errors->get('nome')) > 0 ? ' has-error' : '' }}">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        @foreach ($errors->get('nome') as $message)
            <span class="help-block">{{ $message }}</span>
        @endforeach
    </div>
    <div class="form-group{{ count($errors->get('apresentacao')) > 0 ? ' has-error' : '' }}">
        {!! Form::label('apresentacao', 'Apresentação') !!}
        {!! Form::textarea('apresentacao', null, ['class' => 'form-control']) !!}
        @foreach ($errors->get('apresentacao') as $message)
            <span class="help-block">{{ $message }}</span>
        @endforeach
    </div>
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
