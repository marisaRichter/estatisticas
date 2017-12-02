@extends('app')

@section('content')
  <div class="container">
    <h1>Comunidade: {{ $comunidade->nome }}</h1>

    @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <div class="app">
        <center>
          {!! $votantes->html() !!}
            {!! $chart->html() !!}
            {!! $comungantes->html() !!}
            {!! $teste->html() !!}

        </center>
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $votantes->script() !!}
    {!! $comungantes->script() !!}
    {!! $teste->script() !!}
  </div>
  @endsection
