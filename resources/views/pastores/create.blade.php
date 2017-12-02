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
        {!! Form::label('name', 'Nome:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('password', 'Senha:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
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
        {!! Form::label('com_id', 'Comunidades:') !!}
        {!! Form::select('com_id[]',
        \App\Comunidade::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
        ['class'=>'form-control', 'multiple']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('dt_instalacao', 'Data da Instalação:') !!}
        {!! Form::date('dt_instalacao', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Criar Pastor', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
