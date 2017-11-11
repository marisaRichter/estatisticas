<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastorRequest extends FormRequest
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
        'anoFormatura' => 'required|numeric',
        'estadoCivil' => 'required|min:5',
        'dt_nascimento' => 'required',
        'qtd_filhos' => 'required|numeric',
        'naturalidade' => 'required|min:5',
      ];
    }
}
