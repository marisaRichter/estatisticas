<?php

namespace App\Http\Controllers;

use App\TiposDeEvento;
use App\Http\Controllers\Controller;
Use App\Http\Requests\TiposDeEventoRequest;

class TiposDeEventosController extends Controller{

  public function index(){
    $tiposDeEventos = TiposDeEvento::all();
    return view('tiposDeEventos.index', ['tiposDeEventos'=>$tiposDeEventos]);
  }

  public function create(){
    return view('tiposDeEventos.create');
  }

  public function store(TiposDeEventoRequest $request){
    $novo_tiposDeEvento = $request->all();
    TiposDeEvento::create($novo_tiposDeEvento);

    return redirect()->route('tipos-de-eventos');
  }

  public function destroy($id){
    TiposDeEvento::find($id)->delete();
    return redirect()->route('tipos-de-eventos');
  }

  public function edit($id){
    $tiposDeEvento = TiposDeEvento::find($id);
    return view('tiposDeEventos.edit', compact('tiposDeEvento'));
  }

  public function update(TiposDeEventoRequest $request, $id){
    $tiposDeEvento = TiposDeEvento::find($id)->update($request->all());
    return redirect()->route('tipos-de-eventos');
  }
}
