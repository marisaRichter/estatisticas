@extends ('app')

@section('content')
  <div class='container'>
    <h1>Estatísticas</h1>
    <div class="app">
      {!! $array !!}
        <!--    <center>
                {!! $chart->html() !!}
            </center>
        </div>
        {!! Charts::scripts() !!}
        {!! $chart->script() !!} -->
  </div>
@endsection
