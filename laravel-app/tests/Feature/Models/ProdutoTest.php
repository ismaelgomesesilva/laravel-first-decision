<?php

namespace Tests\Feature\Models;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_produto_can_be_created()
    {
        $produtoData = [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição do produto teste',
            'preco' => 99.99,
            'quantidade' => 10,
        ];

        $produto = Produto::factory()->create($produtoData);

        $this->assertDatabaseHas('produtos', $produtoData);
    }
}
