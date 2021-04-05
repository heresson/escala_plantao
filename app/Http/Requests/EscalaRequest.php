<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscalaRequest extends FormRequest
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
            'ES_DT' => 'required',
            'ES_MUNI_NR_SEQ' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Sua descrição deve ter pelo menos :min caracteres'
        ];
    }
}
