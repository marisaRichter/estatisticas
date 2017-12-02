<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Use App\Http\Requests\PastorRequest;
Use App\Http\Requests\PastorComunidadeRequest;
use App\User;
use App\Pastor;
use App\PastorComunidade;

class PastoresController extends Controller{

  public function index(){
    $pastores = Pastor::all();
    return view('pastores.index', ['pastores'=>$pastores]);
  }

  public function create(){
    return view('pastores.create');
  }

  public function store(PastorRequest $request){

    $dados = $request->all();
    $user = User::create($dados);

    $pastor = new Pastor($dados);
    $pastor->user_id = $user->id;
    $pastor->save();

    $count_comunidades = count($request->get('com_id'));
    $array_comunidades = $request->get('com_id');

    for($i = 0; $i < $count_comunidades; $i++){
      $pastor_com = new PastorComunidade();
      $pastor_com->pastor_id = $pastor->id;
      $pastor_com->comunidade_id = $array_comunidades[$i];
      $pastor_com->dt_instalacao = $request->get('dt_instalacao');
      $pastor_com->save();
    }

    return redirect()->route('pastores');
  }

  public function destroy($id){
    Pastor::find($id)->delete();
    return redirect()->route('pastores');
  }

  public function edit($id){
    $pastor = Pastor::find($id);
    return view('pastores.edit', compact('pastor'));
  }

  public function update(PastorRequest $request, $id){
    $pastor = Pastor::find($id)->update($request->all());
    return redirect()->route('pastores');
  }
}
