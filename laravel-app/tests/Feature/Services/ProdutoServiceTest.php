<?php

namespace Tests\Feature\Services;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\ProdutoService;

class ProdutoServiceTest extends TestCase
{
    use RefreshDatabase;
    public function test_cria_novo_produto()
    {
        $service = new ProdutoService();

        $dados = [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição de teste',
            'preco' => 99.99,
            'quantidade' => 5,
        ];

        $produto = $service->create($dados);

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição de teste',
        ]);

        $this->assertEquals('Produto Teste', $produto->nome);
    }

    public function test_atualiza_produto_existente()
    {
        $service = new ProdutoService();

        $produto = Produto::factory()->create([
            'nome' => 'Produto Antigo',
            'descricao' => 'Descrição antiga',
        ]);

        $dadosAtualizados = [
            'nome' => 'Produto Atualizado',
            'descricao' => 'Descrição atualizada',
            'preco' => 89.99,
            'quantidade' => 10,
        ];

        $produtoAtualizado = $service->update($produto, $dadosAtualizados);

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto Atualizado',
            'descricao' => 'Descrição atualizada',
        ]);

        $this->assertEquals('Produto Atualizado', $produtoAtualizado->nome);
    }

    public function test_deleta_produto_existente()
    {
        $service = new ProdutoService();

        $produto = Produto::factory()->create([
            'nome' => 'Produto Para Deletar',
            'descricao' => 'Descrição para deletar',
        ]);

        $result = $service->delete($produto);

        $this->assertDatabaseMissing('produtos', [
            'id' => $produto->id,
        ]);

        $this->assertTrue($result);
    }

    public function test_lista_produtos()
    {
        Produto::factory()->count(3)->create(); // garantir qu e há alguns produtos

        $service = new ProdutoService();

        $produtos = $service->list();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $produtos);
        $this->assertCount(3, $produtos);
    }

    public function test_encontra_produto_por_id()
    {
        $service = new ProdutoService();

        $produto = Produto::factory()->create([
            'nome' => 'Produto Para Encontrar',
            'descricao' => 'Descrição para encontrar',
        ]);

        $produtoEncontrado = $service->find($produto->id);

        $this->assertEquals($produto->id, $produtoEncontrado->id);
    }

    public function test_encontrar_produto_inexistente_retorna_null()
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $service = new ProdutoService();
        $produto = $service->find(99999); // id que não existe
    }
}
