<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()  // por padrão é false, true pois permite acesso a todos, geralmente utilizado como false quando um usuário nao pode fazer request para esse controle
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
            'nome' => "bail|required|min:3|max:100|unique:cidades,nome,$this->id"
        ];
    }
}
