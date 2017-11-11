<?php

namespace App\Http\Controllers;

use App\Pastor;
use App\Http\Controllers\Controller;
Use App\Http\Requests\PastorRequest;
use App\User;

class PastoresController extends Controller{

  public function index(){
    $pastores = Pastor::all();
    return view('pastores.index', ['pastores'=>$pastores]);
  }

  public function create(){
    return view('pastores.create');
  }

  public function store(PastorRequest $request){
    $user = new User();
    $pastor = new Pastor();

    $user->name = $request->get('nome');
    $user->email = $request->get('email');
    $user->password = $request->get('password');
    $user->save();

    $pastor->anoFormatura = $request->get('anoFormatura');
    $pastor->estadoCivil = $request->get('estadoCivil');
    $pastor->dt_nascimento = $request->get('dt_nascimento');
    $pastor->qtd_filhos = $request->get('qtd_filhos');
    $pastor->naturalidade = $request->get('naturalidade');
    $pastor->user_id = $user->id;
    $pastor->save();    

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
