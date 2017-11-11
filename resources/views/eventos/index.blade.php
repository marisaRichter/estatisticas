@extends ('app')

@section('content')
  <div class='container'>
    <h1>Eventos</h1>
    <table class='table table-striped table-bordered table-hover'>
      <thead align='center'>
        <tr>
          <td>Data do Evento</td>
          <td>Quantidade de Envolvidos</td>
          <td>Tipo do Evento</td>
          <td>Pastor</td>
          <td>Comunidade</td>
          <td colspan="2">Ações</td>
        </tr>
      </thead>
      <tbody align='center'>
      @foreach ($eventos as $ev)
        <tr>
          <td>{{ $ev->dt_evento }}</td>
          <td>{{ $ev->qtd_envolvidos}}</td>
          <td>{{ $ev->tiposDeEventos->nome }}</td>
          <td>{{ $ev->pastorComunidade->pastor->user->name }}</td>
          <td>{{ $ev->pastorComunidade->comunidade->nome }}</td> 
          <td><a href="{{ route('eventos.edit', ['id'=>$ev->id]) }}" class="btn-sm btn-success">Editar</a></td>
          <td><a href="{{ route('eventos.destroy', ['id'=>$ev->id]) }}" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
