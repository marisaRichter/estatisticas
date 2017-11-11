@extends ('app')

@section('content')
  <div class='container'>
    <h1>Tipos de Eventos</h1>
    <table class='table table-striped table-bordered table-hover'>
      <thead align='center'>
        <tr>
          <td>Nome</td>
          <td>Descrição</td>
          <td colspan="2">Ações</td>
        </tr>
      </thead>
      <tbody align='center'>
      @foreach ($tiposDeEventos as $tpEv)
        <tr>
          <td>{{ $tpEv->nome}}</td>
          <td>{{ $tpEv->descricao}}</td>
          <td><a href="{{ route('tipos-de-eventos.edit', ['id'=>$tpEv->id]) }}" class="btn-sm btn-success">Editar</a></td>
          <td><a href="{{ route('tipos-de-eventos.destroy', ['id'=>$tpEv->id]) }}" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
