<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfertaArquivo extends FormRequest
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
            'arquivo' => 'required|file|mimes:pdf,odt,doc,docx|max:10000',
            'arquivo_titulo' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'arquivo.required' => 'O Arquivo é obrigatório.',
            'arquivo.file' => 'O Arquivo precisa ser válido.',
            'arquivo.mimes' => 'O Arquivo precisa ser do tipo PDF, ODT, DOC ou DOCX.',
            'arquivo.max' => 'O Arquivo precisa ter no máximo 10MB.',

            'arquivo_titulo.required' => 'O Título do Arquivo é obrigatório.',
            'arquivo_titulo.string' => 'O Título do Arquivo precisa ter um valor alfanumérico.',
            'arquivo_titulo.max' => 'O Título do Arquivo precisa ser menor que 255 caracteres.',
        ];
    }
}
