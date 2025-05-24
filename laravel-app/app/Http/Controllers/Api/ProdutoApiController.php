<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdutoApiController extends Controller
{
    protected ProdutoService $service;

    public function __construct(ProdutoService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['preco_min', 'preco_max', 'quantidade_min']);

        $produtos = $this->service->listarProdutos($filters)->paginate(10);

        return response()->json([
            'data' => $produtos,
            'message' => 'Lista de produtos',
            'errors' => null
        ]);
    }

    public function store(ProdutoRequest $request): JsonResponse
    {
        $produto = $this->service->create($request->validated());

        return response()->json([
            'data' => $produto,
            'message' => 'Produto criado com sucesso',
            'errors' => null
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $produto = $this->service->find($id);

        return response()->json([
            'data' => $produto,
            'message' => 'Produto encontrado',
            'errors' => null
        ]);
    }

    public function update(ProdutoRequest $request, Produto $produto): JsonResponse
    {
        $produto = $this->service->update($produto, $request->validated());

        return response()->json([
            'data' => $produto,
            'message' => 'Produto atualizado com sucesso',
            'errors' => null
        ]);
    }

    public function destroy(Produto $produto): JsonResponse
    {
        $produto->delete();

        return response()->json([
            'data' => null,
            'message' => 'Produto deletado com sucesso',
            'errors' => null
        ]);
    }
}
