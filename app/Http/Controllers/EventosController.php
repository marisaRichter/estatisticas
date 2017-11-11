<?php

namespace App\Http\Controllers;

use App\Evento;
use App\TiposDeEvento;
use App\Pastor;
use App\PastorComunidade;
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
    $array_of_qtd_envolvidos = $input['qtd_envolvidos'];

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

    for($i = 0; $i < $totalEventos; $i++){
      $evento = new Evento();
      $pastor = new PastorComunidade();
      $evento->dt_evento = $request->get('dt_evento');
      $evento->tp_evento_id = $array_of_tipos_ids[$i];
      $evento->qtd_envolvidos = $array_of_qtd_envolvidos[$i];
      $evento->past_com_id = $id_com_past;
      $evento->save();
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
