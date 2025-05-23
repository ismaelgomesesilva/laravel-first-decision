<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>


<div class="container mx-auto">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded max-w-7xl mx-auto mt-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-4"> 
        <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>

        <div class="mb-4 flex justify-end">
            <a href="{{ route('produtos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded inline-flex items-center gap-2">
            <x-heroicon-o-plus class="h-4 w-4"/>
            Adicionar Produto
            </a>
        </div>

        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2">Descrição</th>
                    <th class="border px-4 py-2">Preço</th>
                    <th class="border px-4 py-2">Quantidade</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produtos as $produto)
                <tr class="hover:bg-gray-100 transition-colors">
                <td class="border px-4 py-2">{{ $produto->id }}</td>
                <td class="border px-4 py-2">{{ $produto->nome }}</td>
                <td class="border px-4 py-2">{{ $produto->descricao }}</td>
                <td class="border px-4 py-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $produto->quantidade }}</td>
                <td class="border px-4 py-2">
                    <div class="flex gap-2">
                    <a href="{{ route('produtos.edit', $produto->id) }}"
                       class="inline-flex items-center gap-1 border border-yellow-400 bg-yellow-50 text-yellow-700 hover:bg-yellow-100 py-1.5 px-4 rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-yellow-300">
                        <x-heroicon-o-pencil-square class="h-4 w-4"/>
                        <span>Editar</span>
                    </a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="inline-flex items-center gap-1 border border-red-500 bg-red-50 text-red-700 hover:bg-red-100 py-1.5 px-4 rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-red-300"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                            <x-heroicon-o-x-mark class="h-4 w-4"/>
                            <span>Excluir</span>
                        </button>
                    </form>
                    </div>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>