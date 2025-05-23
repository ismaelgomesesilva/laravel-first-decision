<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>


<div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-4">
    <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>
    
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700">Nome</label>
            <input type="text" name="nome" id="nome" class="border rounded w-full py-2 px-3" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-gray-700">Descrição</label>
            <textarea name="descricao" id="descricao" class="border rounded w-full py-2 px-3" required>{{ $produto->descricao }}</textarea>
        </div>

        <div class="mb-4">
            <label for="preco" class="block text-gray-700">Preço</label>
            <input type="number" name="preco" id="preco" step="0.01" class="border rounded w-full py-2 px-3" value="{{ $produto->preco }}" required>
        </div>

        <div class="mb-4">
            <label for="quantidade" class="block text-gray-700">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="border rounded w-full py-2 px-3" value="{{ $produto->quantidade }}" required>
        </div>

        <div class="mb-4 flex justify-end">
            <a href="{{ route('produtos.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2 inline-block">Voltar para a Lista</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Editar Produto</button>
        </div>
</div>
</x-app-layout>