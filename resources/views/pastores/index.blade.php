@extends ('app')

@section('content')
  <div class='container'>
    <h1 class='left'>Pastores</h1>
    <div class="right btn_new"><a href="{{ route('pastores.create') }}" class="btn-sm btn-info">Novo</a></div>
    <table class='table table-striped table-bordered table-hover'>
      <thead align='center'>
        <tr>
          <td>Nome</td>
          <td>Email</td>
          <td>Ano da Formatura</td>
          <td>Estado Civil</td>
          <td>Quantidade de Filhos</td>
          <td>Naturalidade</td>
          <td>Data de Nascimento</td>
          <td colspan="2">Ações</td>
        </tr>
      </thead>
      <tbody align='center'>
      @foreach ($pastores as $past)
        <tr>
          <td>{{ $past->user->name }}</td>
          <td>{{ $past->user->email}}</td>
          <td>{{ $past->anoFormatura}}</td>
          <td>{{ $past->estadoCivil}}</td>
          <td>{{ $past->qtd_filhos}}</td>
          <td>{{ $past->naturalidade}}</td>
          <td>{{ $past->dt_nascimento}}</td>
          <td><a href="{{ route('pastores.edit', ['id'=>$past->id]) }}" class="btn-sm btn-success">Editar</a></td>
          <td><a href="{{ route('pastores.destroy', ['id'=>$past->id]) }}" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
