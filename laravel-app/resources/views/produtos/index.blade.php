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

        <div class="tool-bar mb-4 flex justify-between items-center">
            <form method="GET" action="{{ route('produtos.index') }}" class="mb-4 flex gap-2 items-end">                
                <div>
                    <input type="number" step="0.01" name="preco_min" id="preco_min" value="{{ request('preco_min') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"" placeholder="Preço Minimo"/>
                </div>
                <div>
                    <input type="number" step="0.01" name="preco_max" id="preco_max" value="{{ request('preco_max') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"" placeholder="Preço Máximo"/>
                </div>
                <div>
                    <input type="number" name="quantidade_min" id="quantidade_min" value="{{ request('quantidade_min') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"" placeholder="Estoque Mínimo"/>
                </div>
                <div>
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 text-sm px-4 py-2 rounded  hover:border hover:border-gray-200 gap-2 inline-flex items-center sm:rounded-lg">
                        <x-heroicon-o-funnel class="h-4 w-4"/>
                        Filtrar
                    </button>
                </div>
                <div>
                    <a href="{{ route('produtos.index') }}">
                        <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 text-sm px-4 py-2 rounded hover:border-gray-200 gap-2 inline-flex items-center sm:rounded-lg">
                            <x-heroicon-o-squares-2x2 class="h-4 w-4"/>
                            Todos
                        </button>
                    </a>
                </div>                
            </form>

            <div class="mb-4 flex justify-end">
                <a href="{{ route('produtos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded inline-flex items-center gap-2 sm:rounded-lg">
                    <x-heroicon-o-plus class="h-4 w-4"/>
                    Adicionar Produto
                </a>
            </div>
        </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Descrição</th>
                    <th scope="col" class="px-6 py-3">Preço</th>
                    <th scope="col" class="px-6 py-3">Quantidade</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produtos as $produto)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $produto->id }}</td>
                <td class="px-6 py-4">{{ $produto->nome }}</td>
                <td class="px-6 py-4">{{ $produto->descricao }}</td>
                <td class="px-6 py-4">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td class="px-6 py-4">{{ $produto->quantidade }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                    <a href="{{ route('produtos.edit', $produto->id) }}"
                       class="inline-flex items-center gap-1 border border-yellow-400 bg-yellow-50 text-yellow-700 hover:bg-yellow-100 py-1.5 px-4 rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-yellow-300 sm:rounded-lg">
                        <x-heroicon-o-pencil-square class="h-4 w-4"/>
                        <span>Editar</span>
                    </a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="inline-flex items-center gap-1 border border-red-500 bg-red-50 text-red-700 hover:bg-red-100 py-1.5 px-4 rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-red-300 sm:rounded-lg"
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
        <div class="mt-4">
            {{ $produtos->appends(request()->query())->links() }}
        </div>
    </div>
</div>
</x-app-layout>