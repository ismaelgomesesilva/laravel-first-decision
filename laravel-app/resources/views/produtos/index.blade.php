<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>


<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>

    <table class="table-auto w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Descrição</th>
                <th class="border px-4 py-2">Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td class="border px-4 py-2">{{ $produto->id }}</td>
                    <td class="border px-4 py-2">{{ $produto->nome }}</td>
                    <td class="border px-4 py-2">{{ $produto->descricao }}</td>
                    <td class="border px-4 py-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
