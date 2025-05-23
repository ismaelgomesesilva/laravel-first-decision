<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function create(array $data): Produto
    {
        return Produto::create($data);
    }

    public function update(Produto $produto, array $data): Produto
    {
        $produto->update($data);
        return $produto;
    }

    public function delete(Produto $produto): bool
    {
        return $produto->delete();
    }

    public function list()
    {
        return Produto::all();
    }

    public function find(int $id): ?Produto
    {
        return Produto::findOrFail($id);
    }

    public function listPaginated(int $perPage = 10)
    {
        return Produto::paginate($perPage);
    }

    public function retorneProdutosOrdenadosPelosMaisRecentes()
    {
        return Produto::orderBy('id', 'desc');
    }
}
