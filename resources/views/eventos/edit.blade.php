@extends('app')

@section('content')
  <div class="container">
    <h1>Editando Evento</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => ["eventos.update", $evento->id], 'method'=>'put']) !!}
      <div class="form-group">
        {!! Form::label('dt_evento', 'Data do Evento:') !!}
        {!! Form::date('dt_evento', $evento->dt_evento, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('comunidade_id', 'Comunidade:') !!}
        {!! Form::select('comunidade_id',
        \App\Comunidade::orderBy('nome')->pluck('nome', 'id')->toArray(), $evento->pastorComunidade->comunidade->id,
        ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('pastor_id', 'Pastor:') !!}
        {!! Form::select('pastor_id',
        \App\User::orderBy('name')->pluck('name', 'id')->toArray(), $evento->pastorComunidade->pastor->id,
        ['class'=>'form-control']) !!}
      </div>
        <div class="form-group" >
          {{ Form::label('tp_evento_id', 'Tipo do Evento') }}
          {{ Form::select('tp_evento_id',
          \App\TiposDeEvento::orderBy('nome')->pluck('nome', 'id')->toArray(), $evento->tiposDeEventos->id,
          ['class'=>'form-control']) }}
        </div>
      <div class="form-group">
        {!! Form::label('qtd_envolvidos', "Total de envolvidos:") !!}
        {!! Form::number('qtd_envolvidos', $evento->qtd_envolvidos, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Editar evento', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
