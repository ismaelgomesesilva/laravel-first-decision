<?php

namespace Tests\Feature\Http\Requests;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ProdutoRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_valida_dados_validos()
    {
        $data = [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição de exemplo',
            'preco' => 19.90,
            'quantidade' => 10,
        ];

        $request = new ProdutoRequest();

        $validator = Validator::make($data, $request->rules(), $request->messages());

        $this->assertFalse($validator->fails(), 'Esperava que os dados válidos passassem na validação');
    }

    public function test_valida_dados_invalidos()
    {
        $data = [
            'nome' => '',
            'descricao' => 123,
            'preco' => 'não-numérico',
            'quantidade' => -1,
        ];

        $request = new ProdutoRequest();

        $validator = Validator::make($data, $request->rules(), $request->messages());

        $this->assertTrue($validator->fails(), 'Esperava que os dados inválidos falhassem na validação');

        $errors = $validator->errors();

        $this->assertTrue($errors->has('nome'));
        $this->assertTrue($errors->has('preco'));
        $this->assertTrue($errors->has('quantidade'));
    }
}
