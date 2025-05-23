<?php

namespace Tests\Feature\Http\Controllers;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_pode_ver_lista_de_produtos()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('produtos.index'))
            ->assertStatus(200);
    }

    public function test_produto_pode_ser_criado_via_post()
    {
        $user = User::factory()->create();
        $data = [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição',
            'preco' => 9.99,
            'quantidade' => 10
        ];

        $response = $this->actingAs($user)
            ->post(route('produtos.store'), $data);

        $response->assertRedirect(route('produtos.index'));
        $this->assertDatabaseHas('produtos', ['nome' => 'Produto Teste']);
    }
}
