@extends('app')

@section('content')
  <div class="container">
    <h1>Editando Comunidade: {{ $comunidade->nome }}</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => ["comunidades.update", $comunidade->id], 'method'=>'put']) !!}
    <div class="form-group">
      {!! Form::label('nome', 'Nome:') !!}
      {!! Form::text('nome', $comunidade->nome, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('cidade', 'Cidade:') !!}
      {!! Form::text('cidade', $comunidade->cidade, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('localidade', 'Localidade:') !!}
      {!! Form::text('localidade', $comunidade->localidade, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_membros', 'Total de membros:') !!}
      {!! Form::number('qtd_membros', $comunidade->qtd_membros, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_mem_com', 'Total de membros Comungantes:') !!}
      {!! Form::number('qtd_mem_com', $comunidade->qtd_mem_com, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_mem_vot', 'Total de membros Votantes:') !!}
      {!! Form::number('qtd_mem_vot', $comunidade->qtd_mem_vot, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_jovens', 'Total de jovens:') !!}
      {!! Form::number('qtd_jovens', $comunidade->qtd_jovens, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_servas', 'Total de servas:') !!}
      {!! Form::number('qtd_servas', $comunidade->qtd_servas, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_leigos', 'Total de leigos:') !!}
      {!! Form::number('qtd_leigos', $comunidade->qtd_leigos, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('qtd_criancas', 'Total de crianças:') !!}
      {!! Form::number('qtd_criancas', $comunidade->qtd_criancas, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('dt_fundacao', 'Data da Fundação:') !!}
      {!! Form::date('dt_fundacao', $comunidade->dt_fundacao, ['class'=>'form-control']) !!}
    </div>
      <div class="form-group">
        {!! Form::submit('Editar comunidade', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
