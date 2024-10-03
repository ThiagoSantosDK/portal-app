<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePontoTuristicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nome' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
            'latitude_longitude' => 'required|string|max:255',
            'descricao' => 'required|text|max:255',
            'como_chegar' => 'required|string|max:255',
            'imagem' => 'required|string|max:255',
            'id_endereco' => 'required|exists:enderecos,id',
            'id_tipo_ponto_turistico' => 'required|exists:tipos_ponto_turisticos,id',
        ];
    }
}
