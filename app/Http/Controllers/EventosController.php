<?php

namespace App\Http\Controllers;

use App\Evento;
use App\TiposDeEvento;
use App\PastorComunidade;
use App\Comunidade;
use App\Http\Controllers\Controller;
Use App\Http\Requests\EventoRequest;

class EventosController extends Controller{
  public function index(){
    $eventos = Evento::all();
    return view('eventos.index', ['eventos'=>$eventos]);
  }

  public function create(){
    $tiposDeEventos = TiposDeEvento::all();
    return view('eventos.create', ['tiposDeEventos'=>$tiposDeEventos]);
  }

  public function store(EventoRequest $request){
    $totalEventos = count($request->get('tpEv'));
    $input = $request->input();
    $array_of_tipos_ids = $input['tpEv'];
    $array_of_qtd_envolvidos = $request->get('qtd_envolvidos');
    $id_com_past = $request->get('past_com_id');

    $totalQtd = count($array_of_qtd_envolvidos);

    for($j = 0; $j < $totalEventos; $j++){


      for($i = 0; $i < $totalQtd; $i++){
        if($array_of_qtd_envolvidos[$i] == 0){
          $teste = 'if';
        }else{
          $evento = new Evento();
          $evento->dt_evento = $request->get('dt_evento');
          $evento->tp_evento_id = $array_of_tipos_ids[$j];
          $evento->qtd_envolvidos = $array_of_qtd_envolvidos[$i];

          $teste = 0;
          $evento->past_com_id = $id_com_past;
          $evento->save();
          $comunidade_id = PastorComunidade::find($id_com_past);
          $comunidade = Comunidade::find($comunidade_id->comunidade_id);

          if($array_of_tipos_ids[$j] == 7){
            $criancas = $comunidade->qtd_criancas - $array_of_qtd_envolvidos[$i];
            $jovens = $comunidade->qtd_jovens + $array_of_qtd_envolvidos[$i];
            $comungantes = $comunidade->qtd_mem_com + $array_of_qtd_envolvidos[$i];
            $comunidade = Comunidade::find($comunidade_id->comunidade_id)->update(['qtd_jovens' => $jovens, 'qtd_criancas' => $criancas, 'qtd_mem_com' => $comungantes]);
          }
          if($array_of_tipos_ids[$j] == 6){
            $criancas = $comunidade->qtd_criancas + $array_of_qtd_envolvidos[$i];
            $membros = $comunidade->qtd_membros + $array_of_qtd_envolvidos[$i];
            $comunidade = Comunidade::find($comunidade_id->comunidade_id)->update(['qtd_membros' => $membros, 'qtd_criancas' => $criancas]);
          }
          if($array_of_tipos_ids[$j] == 9){
            $jovens = $comunidade->qtd_jovens - $array_of_qtd_envolvidos[$i];
            $leigos = $comunidade->qtd_leigos + $array_of_qtd_envolvidos[$i];
            $servas = $comunidade->qtd_servas + $array_of_qtd_envolvidos[$i];
            $comunidade = Comunidade::find($comunidade_id->comunidade_id)->update(['qtd_jovens' => $jovens, 'qtd_leigos' => $leigos, 'qtd_servas' => $servas]);
          }
          $array_of_qtd_envolvidos[$i] = 0;
          break;
        }
      }

    }
//redirect()->route('eventos');
    return redirect()->route('eventos');
  }

  public function destroy($id){
    Evento::find($id)->delete();
    return redirect()->route('eventos');
  }

  public function edit($id){
    $evento = Evento::find($id);
    return view('eventos.edit', compact('evento'));
  }

  public function update(EventoRequest $request, $id){
    $pastor_id = $request->get('pastor_id');
    $pastor = Pastor::find($pastor_id)->pastorComunidades;
    $com_id = $request->get('comunidade_id');
    for($j = 0; $j < count($pastor); $j++){
      $ids = $pastor[$j]->comunidade_id;
      if($ids == $com_id){
        $id_com_past = $pastor[$j]->id;
        break;
      }
    }
    $evento = Evento::find($id)->update($request->all());
    $evento = Evento::find($id)->update(['past_com_id' => $id_com_past]);
    //
    return redirect()->route('eventos');
  }
}
