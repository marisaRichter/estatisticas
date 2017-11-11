@extends('app')

@section('content')
  <div class="container">
    <h1>Novo Tipo de Evento</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => 'tipos-de-eventos.store']) !!}
      <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Criar Tipo de Evento', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
