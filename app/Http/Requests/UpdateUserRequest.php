<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'birth_data' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'image' => 'O arquivo selecionado não é uma imagem.',
            'mimes' => 'Selecione imagens do formato jpeg,png,jpg,gif,svg,webp.',
            'max' => 'A imagem ultrapassou 2045mb, insera uma imagem menor.',
        ];
    }
}
