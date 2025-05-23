<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $produtos = $this->service->getAllOrderedByLatest();
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
