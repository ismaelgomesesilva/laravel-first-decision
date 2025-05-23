<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());

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

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());

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
