<?php

namespace App\Http\Controllers;

use App\Comunidade;
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
}
