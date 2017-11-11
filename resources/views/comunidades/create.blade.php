@extends('app')

@section('content')
  <div class="container">
    <h1>Nova Comunidade</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => 'comunidades.store']) !!}
      <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('cidade', 'Cidade:') !!}
        {!! Form::text('cidade', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('localidade', 'Localidade:') !!}
        {!! Form::text('localidade', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_membros', 'Total de membros:') !!}
        {!! Form::number('qtd_membros', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_mem_com', 'Total de membros Comungantes:') !!}
        {!! Form::number('qtd_mem_com', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_mem_vot', 'Total de membros Votantes:') !!}
        {!! Form::number('qtd_mem_vot', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_jovens', 'Total de jovens:') !!}
        {!! Form::number('qtd_jovens', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_servas', 'Total de servas:') !!}
        {!! Form::number('qtd_servas', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_leigos', 'Total de leigos:') !!}
        {!! Form::number('qtd_leigos', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('qtd_criancas', 'Total de crianças:') !!}
        {!! Form::number('qtd_criancas', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('dt_fundacao', 'Data da Fundação:') !!}
        {!! Form::date('dt_fundacao', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Criar Comunidade', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
