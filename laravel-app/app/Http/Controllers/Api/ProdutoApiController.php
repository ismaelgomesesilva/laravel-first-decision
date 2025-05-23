<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Produto::all(),
            'message' => 'Lista de produtos',
            'errors' => null
        ]);
    }

    public function store(ProdutoRequest $request)
    {
        $produto = Produto::create($request->validated());

        return response()->json([
            'data' => $produto,
            'message' => 'Produto criado com sucesso',
            'errors' => null
        ], 201);
    }

    public function show(Produto $produto)
    {
        return response()->json([
            'data' => $produto,
            'message' => 'Produto encontrado',
            'errors' => null
        ]);
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());

        return response()->json([
            'data' => $produto,
            'message' => 'Produto atualizado com sucesso',
            'errors' => null
        ]);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return response()->json([
            'data' => null,
            'message' => 'Produto deletado com sucesso',
            'errors' => null
        ]);
    }
}
