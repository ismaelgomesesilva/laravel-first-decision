<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>


<div class="container mx-auto">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-4"> 
        <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>

        <div class="mb-4">
            <a href="{{ route('produtos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar Produto</a>
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
                    <tr>
                        <td class="border px-4 py-2">{{ $produto->id }}</td>
                        <td class="border px-4 py-2">{{ $produto->nome }}</td>
                        <td class="border px-4 py-2">{{ $produto->descricao }}</td>
                        <td class="border px-4 py-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $produto->quantidade }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Excluir</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>