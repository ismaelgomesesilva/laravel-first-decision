<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected ProdutoService $service;

    public function __construct(ProdutoService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['preco_min', 'preco_max', 'quantidade_min']);

        $produtos = $this->service->listarProdutos($filters)->paginate(10);

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }


    public function store(ProdutoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso.');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }


    public function update(ProdutoRequest $request, Produto $produto)
    {
        $this->service->update($produto, $request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $this->service->delete($produto);
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso.');
    }
}
