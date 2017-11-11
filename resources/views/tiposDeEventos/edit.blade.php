@extends('app')

@section('content')
  <div class="container">
    <h1>Editando tipo de Evento: {{ $tiposDeEvento->nome }}</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => ["tipos-de-eventos.update", $tiposDeEvento->id], 'method'=>'put']) !!}
    <div class="form-group">
      {!! Form::label('nome', 'Nome:') !!}
      {!! Form::text('nome', $tiposDeEvento->nome, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('descricao', 'Descrição:') !!}
      {!! Form::textarea('descricao', $tiposDeEvento->descricao, ['class'=>'form-control']) !!}
    </div>
      <div class="form-group">
        {!! Form::submit('Editar tipo de Evento', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
