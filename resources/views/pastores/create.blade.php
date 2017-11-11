@extends('app')

@section('content')
  <div class="container">
    <h1>Novo Pastor</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => 'pastores.store']) !!}
      <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('password', 'Senha:') !!}
        {!! Form::password('password', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('anoFormatura', 'Ano da Formatura:') !!}
        {!! Form::number('anoFormatura', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('estadoCivil', 'Estado Civil:') !!}
        {!! Form::text('estadoCivil', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_filhos', 'Quantidade de Filhos:') !!}
        {!! Form::number('qtd_filhos', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('naturalidade', 'Naturalidade:') !!}
        {!! Form::text('naturalidade', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('dt_nascimento', 'Data de Nascimento:') !!}
        {!! Form::date('dt_nascimento', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Criar Pastor', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
