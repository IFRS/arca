<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOferta extends FormRequest
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
            'descricao' => 'required|string|max:65500',
            'coordenador_nome' => 'required|string|max:255',
            'coordenador_email' => 'required|string|max:255',
            'coordenador_titulacao' => 'required|string|max:255',
            'carga_horaria' => 'required|integer|max:32700',
            'duracao' => 'required|string|max:255',
            'autorizacao' => 'required|string|max:255',
            'nota_mec' => 'required|integer|max:125',
            'estrutura_fisica' => 'required|string|max:65500',
            'curso_id' => 'required',
            'campus_id' => 'required',
            'modalidade_id' => 'required',
            'nivel_id' => 'required',
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
            'descricao.required' => 'A Descrição é obrigatória.',
            'descricao.string' => 'A Descrição precisa ter um valor alfanumérico.',
            'descricao.max' => 'A Descrição precisa ser menor que 65500 caracteres.',

            'coordenador_nome.required' => 'O Nome do Coordenador é obrigatório.',
            'coordenador_nome.string' => 'O Nome do Coordenador precisa ter um valor alfanumérico.',
            'coordenador_nome.max' => 'O Nome do Coordenador precisa ser menor que 255 caracteres.',

            'coordenador_email.required' => 'O E-mail do Coordenador é obrigatório.',
            'coordenador_email.string' => 'O E-mail do Coordenador precisa ter um valor alfanumérico.',
            'coordenador_email.max' => 'O E-mail do Coordenador precisa ser menor que 255 caracteres.',

            'coordenador_titulacao.required' => 'A Titulação do Coordenador é obrigatória.',
            'coordenador_titulacao.string' => 'A Titulação do Coordenador precisa ter um valor alfanumérico.',
            'coordenador_titulacao.max' => 'A Titulação do Coordenador precisa ser menor que 255 caracteres.',

            'carga_horaria.required' => 'A Carga Horária é obrigatória.',
            'carga_horaria.integer' => 'A Carga Horária precisa ser um número.',
            'carga_horaria.max' => 'A Carga Horária precisa ser menor que 32700 horas.',

            'duracao.required' => 'A Duração é obrigatória.',
            'duracao.string' => 'A Duração precisa ter um valor alfanumérico.',
            'duracao.max' => 'A Duração precisa ser menor que 255 caracteres.',

            'autorizacao.required' => 'A Autorização é obrigatória.',
            'autorizacao.string' => 'A Autorização precisa ter um valor alfanumérico.',
            'autorizacao.max' => 'A Autorização precisa ser menor que 255 caracteres.',

            'nota_mec.required' => 'A Nota do MEC é obrigatória.',
            'nota_mec.integer' => 'A Nota do MEC precisa ser um número.',
            'nota_mec.max' => 'A Nota do MEC precisa ser menor que 125.',

            'estrutura_fisica.required' => 'A Estrutura Física é obrigatória.',
            'estrutura_fisica.string' => 'A Estrutura Física precisa ter um valor alfanumérico.',
            'estrutura_fisica.max' => 'A Estrutura Física precisa ser menor que 65500 caracteres.',

            'curso_id.required' => 'O Curso é obrigatório',
            'campus_id.required' => 'O Campus é obrigatório',
            'modalidade_id.required' => 'A Modalidade é obrigatória',
            'nivel_id.required' => 'O Nível é obrigatório',
        ];
    }
}
