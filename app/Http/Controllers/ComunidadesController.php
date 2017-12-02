<?php

namespace App\Http\Controllers;

Use Charts;
use App\Comunidade;
use App\Evento;
use App\PastorComunidade;
use App\Http\Controllers\Controller;
Use App\Http\Requests\ComunidadeRequest;

class ComunidadesController extends Controller{

  public function index(){
    $comunidades = Comunidade::all();
    return view('comunidades.index', ['comunidades'=>$comunidades]);
  }

  public function create(){
    return view('comunidades.create');
  }

  public function store(ComunidadeRequest $request){
    $novo_comunidade = $request->all();
    Comunidade::create($novo_comunidade);

    return redirect()->route('comunidades');
  }

  public function destroy($id){
    Comunidade::find($id)->delete();
    return redirect()->route('comunidades');
  }

  public function edit($id){
    $comunidade = Comunidade::find($id);
    return view('comunidades.edit', compact('comunidade'));
  }

  public function update(ComunidadeRequest $request, $id){
    $comunidade = Comunidade::find($id)->update($request->all());
    return redirect()->route('comunidades');
  }

  public function view($id){
    $comunidade = Comunidade::find($id);

    $servas = $comunidade->qtd_servas;
    $leigos = $comunidade->qtd_leigos;
    $jovens = $comunidade->qtd_jovens;
    $criancas = $comunidade->qtd_criancas;

    $votantes = $comunidade->qtd_mem_vot;
    $nao_votantes = $comunidade->qtd_membros - $votantes;

    $comungantes = $comunidade->qtd_mem_com;
    $nao_comungantes = $comunidade->qtd_membros - $comungantes;

    $membros=Charts::create('pie', 'highcharts')
    ->title('Membros em função de Departamento')
    ->colors(['#5EADFA', '#2E557A', '#AAD3FB', '#53677A'])
    ->labels(['Servas', 'Leigos', 'Jovens', 'Crianças'])
    ->values([$servas,$leigos,$jovens,$criancas]);

    $votantes=Charts::create('pie', 'highcharts')
    ->title('Membros em função de votantes')
    ->colors(['#4B8AC7', '#2E557A'])
    ->labels(['Votantes', 'Não Votantes'])
    ->values([$votantes,$nao_votantes]);

    $comungantes=Charts::create('pie', 'highcharts')
    ->title('Membros em função de comungantes')
    ->colors(['#4B8AC7', '#2E557A'])
    ->labels(['Comungantes', 'Não Comungates'])
    ->values([$comungantes,$nao_comungantes]);

    $pas_com = PastorComunidade::where('comunidade_id', $id)->get();
    $criancas = 0;
    $jovens = 0;
    for($i = 0; $i < count($pas_com); $i++){
      $teste = $pas_com[$i]->id;

      $batizados = Evento::where('past_com_id', $pas_com[$i]->id)
        ->where('tp_evento_id', 6)->get();


      for($j = 0; $j < count($batizados); $j++){
        $bat = $batizados[$j]->qtd_envolvidos;

        $criancas += $bat;
      }
      $confirmacoes = Evento::where('past_com_id', $pas_com[$i]->id)
        ->where('tp_evento_id', 7)->get();

        for($j = 0; $j < count($confirmacoes); $j++){
          $con = $confirmacoes[$j]->qtd_envolvidos;

          $jovens += $con;
        }
    }
    $criancas_certo = ($comunidade->qtd_criancas + $jovens) - $criancas;

    $chartjs = Charts::create('line', 'highcharts')
    ->title('My nice chart')
    ->labels(['2016', '2017'])
    ->values([$comunidade->qtd_criancas - $criancas, $comunidade->qtd_criancas])
    ->dimensions(0,500);

    $chartjs = Charts::multi('line', 'highcharts')
    ->colors(['#5EADFA', '#2E557A', '#AAD3FB', '#53677A'])
    ->labels(['2016', '2017'])
    ->dataset('Crianças', [$criancas_certo, $comunidade->qtd_criancas])
    ->dataset('Jovens', [$comunidade->qtd_jovens - $jovens, $comunidade->qtd_jovens])
    ->dataset('Servas', [5,4])
    ->dataset('Leigos', [2,7]);

    return view('comunidades.view', ['comunidade' => $comunidade, 'chart' => $membros, 'votantes' => $votantes, 'comungantes' => $comungantes, 'teste' => $chartjs]);

  }
}
