@extends('app')

@section('content')
  <div class="container">
    <h1>Editando Pastor: {{ $pastor->user->name }}</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => ["pastores.update", $pastor->id], 'method'=>'put']) !!}
    <div class="form-group">
      {!! Form::label('nome', 'Nome:') !!}
      {!! Form::text('nome', $pastor->user->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', $pastor->user->email, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('anoFormatura', 'Ano da Formatura:') !!}
      {!! Form::number('anoFormatura', $pastor->anoFormatura, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('estadoCivil', 'Estado Civil:') !!}
      {!! Form::text('estadoCivil', $pastor->estadoCivil, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_filhos', 'Quantidade de Filhos:') !!}
      {!! Form::number('qtd_filhos', $pastor->qtd_filhos, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('naturalidade', 'Naturalidade:') !!}
      {!! Form::text('naturalidade', $pastor->naturalidade, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('dt_nascimento', 'Data de Nascimento:') !!}
      {!! Form::date('dt_nascimento', $pastor->dt_nascimento, ['class'=>'form-control']) !!}
    </div>
      <div class="form-group">
        {!! Form::submit('Editar pastor', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
