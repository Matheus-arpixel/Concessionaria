@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vendas</h1>

    <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Registrar Venda</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Funcionário</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Forma Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->veiculo->marca }} {{ $venda->veiculo->modelo }}</td>
                    <td>{{ $venda->funcionario->nome }}</td>
                    <td>{{ $venda->data_venda }}</td>
                    <td>R$ {{ number_format($venda->valor_final, 2, ',', '.') }}</td>
                    <td>{{ $venda->forma_pagamento }}</td>
                    <td>
                        <a href="{{ route('vendas.show', $venda->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
