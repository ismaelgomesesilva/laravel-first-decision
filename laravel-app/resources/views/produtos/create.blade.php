<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>


<div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-4">
    <h1 class="text-2xl font-bold mb-4">Criar Produto</h1>
    
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nome" class="block text-gray-700">Nome</label>
            <input type="text" name="nome" id="nome" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-gray-700">Descrição</label>
            <textarea name="descricao" id="descricao" class="border rounded w-full py-2 px-3" required></textarea>
        </div>

        <div class="mb-4">
            <label for="preco" class="block text-gray-700">Preço</label>
            <input type="number" name="preco" id="preco" step="0.01" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="quantidade" class="block text-gray-700">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="border rounded w-full py-2 px-3" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Criar Produto</button>
</div>
</x-app-layout>