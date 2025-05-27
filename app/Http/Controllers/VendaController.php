<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with(['cliente', 'veiculo', 'funcionario'])->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $veiculos = Veiculo::where('status', 'Disponível')->get();
        $funcionarios = Funcionario::all();
        return view('vendas.create', compact('clientes', 'veiculos', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'veiculo_id' => 'required',
            'funcionario_id' => 'required',
            'data_venda' => 'required|date',
            'valor_final' => 'required|numeric',
        ]);

        Venda::create($request->all());

        // Atualiza status do veículo para "Vendido"
        $veiculo = Veiculo::find($request->veiculo_id);
        $veiculo->status = 'Vendido';
        $veiculo->save();

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda registrada com sucesso.');
    }

    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $funcionarios = Funcionario::all();
        return view('vendas.edit', compact('venda', 'clientes', 'veiculos', 'funcionarios'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente_id' => 'required',
            'veiculo_id' => 'required',
            'funcionario_id' => 'required',
            'data_venda' => 'required|date',
            'valor_final' => 'required|numeric',
        ]);

        $venda->update($request->all());

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda atualizada com sucesso.');
    }

    public function destroy(Venda $venda)
    {
        $venda->delete();

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda excluída com sucesso.');
    }
}
