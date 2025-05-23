<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all()->sortByDesc('created_at');
        //dd($produtos);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;

        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;

        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index');
    }
}
