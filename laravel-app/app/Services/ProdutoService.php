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

    public function listarProdutos(array $filters)
    {
        return Produto::query()
            ->when(isset($filters['preco_min']), fn($query) => $query->where('preco', '>=', $filters['preco_min']))
            ->when(isset($filters['preco_max']), fn($query) => $query->where('preco', '<=', $filters['preco_max']))
            ->when(isset($filters['quantidade_min']), fn($query) => $query->where('quantidade', '>=', $filters['quantidade_min']))
            ->orderByDesc('created_at');
    }
}
