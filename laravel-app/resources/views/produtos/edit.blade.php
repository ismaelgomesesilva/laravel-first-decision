<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded max-w-7xl mx-auto mt-4">
            <ul class="list-disc pl-5">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-4">
        <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome"  value="{{ old('nome', $produto->nome) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                @error('nome')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700">Descrição</label>
                <textarea name="descricao" id="descricao"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('descricao', $produto->descricao) }}</textarea>
                @error('descricao')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-gray-700">Preço</label>
                <input type="number" name="preco" id="preco" step="0.01"  value="{{ old('preco', $produto->preco) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                @error('preco')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantidade" class="block text-gray-700">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade"  value="{{ old('quantidade', $produto->quantidade) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                @error('quantidade')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4 flex justify-end">                
                <a href="{{ route('produtos.index') }}" class="bg-white hover:bg-gray-100  text-gray-800 px-4 py-2 rounded mr-2 inline-flex items-center gap-2 sm:rounded-lg">
                    <x-heroicon-o-arrow-left class="h-4 w-4"/>
                    Voltar para a Lista
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded gap-2 inline-flex items-center sm:rounded-lg">
                    <x-heroicon-o-check class="h-4 w-4"/>
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
