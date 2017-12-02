@extends ('app')

@section('content')
  <div class='container'>
    <h1 class='left'>Comunidades</h1>
    <div class="right btn_new"><a href="{{ route('comunidades.create') }}" class="btn-sm btn-info">Nova</a></div>
    <table class='table table-striped table-bordered table-hover'>
      <thead align='center'>
        <tr>
          <td rowspan="2">Nome</td>
          <td rowspan="2">Localidade</td>
          <td rowspan="2">Cidade</td>
          <td colspan="3" >Membros</td>
          <td colspan="4">Departamentos</td>
          <td rowspan="2">Data da Fundação</td>
          <td rowspan="2" colspan="2">Ações</td>
        </tr>
        <td>Total</td>
        <td>Comungantes</td>
        <td>Votantes</td>
        <td>Juventude</td>
        <td>Servas</td>
        <td>Leigos</td>
        <td>Escola Dominical</td>
      </thead>
      <tbody align='center'>
      @foreach ($comunidades as $com)
        <tr>
          <td><a href="{{ route('comunidades.view', ['id'=>$com->id]) }}" >{{ $com->nome}}</a></td>
          <td>{{ $com->localidade}}</td>
          <td>{{ $com->cidade}}</td>
          <td>{{ $com->qtd_membros}}</td>
          <td>{{ $com->qtd_mem_com}}</td>
          <td>{{ $com->qtd_mem_vot}}</td>
          <td>{{ $com->qtd_jovens}}</td>
          <td>{{ $com->qtd_servas}}</td>
          <td>{{ $com->qtd_leigos}}</td>
          <td>{{ $com->qtd_criancas}}</td>
          <td>{{ $com->dt_fundacao}}</td>
          <td><a href="{{ route('comunidades.edit', ['id'=>$com->id]) }}" class="btn-sm btn-success">Editar</a></td>
          <td><a href="{{ route('comunidades.destroy', ['id'=>$com->id]) }}" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
