@extends('app')

@section('content')
  <div class="container">
    <h1>Novo Evento</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route' => 'eventos.store']) !!}
      <div class="form-group">
        {!! Form::label('dt_evento', 'Data do Evento:') !!}
        {!! Form::date('dt_evento', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('past_com_id', 'Comunidade:') !!}
        {!! Form::select('past_com_id',
        DB::table('pastor_comunidades')->select('pastor_comunidades.id', DB::raw('concat(users.name, "-", comunidades.nome) AS nomes'))

                ->join('pastores', 'pastor_comunidades.pastor_id', '=', 'pastores.id')

                ->join('users', 'pastores.user_id', '=', 'users.id')
                ->join('comunidades', 'pastor_comunidades.comunidade_id', '=', 'comunidades.id')

                ->groupby('pastor_comunidades.id')
                ->pluck('nomes', 'pastor_comunidades.id')->toArray(), null,
        ['class'=>'form-control']) !!}
      </div>

      @foreach ($tiposDeEventos as $tpEv)
        <div class="form-group" >
          {{ Form::checkbox('tpEv[]', $tpEv->id, null, ['onClick' => "showForm($tpEv->id)"]) }}
          {{ Form::label('tpEv', $tpEv->nome) }}<br>
        </div>
        <div class="form-group none" id="{{ $tpEv->id }}">
          {!! Form::label('qtd_envolvidos', "Total de envolvidos no/na $tpEv->nome:") !!}
          {!! Form::number('qtd_envolvidos[]', 0, ['class'=>'form-control']) !!}
        </div>
      @endforeach

      <div class="form-group">
        {!! Form::submit('Criar Evento', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @endsection
