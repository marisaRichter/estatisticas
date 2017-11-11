<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nome' => 'required|min:5',
          'qtd_membros' => 'required|numeric',
          'qtd_mem_com' => 'required|numeric',
          'qtd_mem_vot' => 'required|numeric',
          'cidade' => 'required',
          'localidade' => 'required',
          'qtd_jovens' => 'required|numeric',
          'qtd_servas' => 'required|numeric',
          'qtd_leigos' => 'required|numeric',
          'qtd_criancas' => 'required|numeric',
          'dt_fundacao' => 'required',
        ];
    }
}
