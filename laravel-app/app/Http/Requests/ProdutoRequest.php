<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
        ];
    }
}
