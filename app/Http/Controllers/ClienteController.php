<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
           
            $data = Cliente::latest()->get();
            
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtns = '
                        <a href="' . route("cliente.edit", $row->id) . '" class="btn btn-outline-info btn-sm"><i class="fas fa-pen"></i></a>
                        
                        <form action="' . route("cliente.destroy", $row->id) . '" method="POST" style="display:inline" onsubmit="return confirm(\'Deseja realmente excluir este registro?\')">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-outline-danger btn-sm ml-2")><i class="fas fa-trash"></i></button>
                        </form>
                    ';
                    return $actionBtns;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('clientes.index');
    }

    public function create()
    {
        return view('clientes.crud');
    }

    public function store(Request $request)
    {
       $nome = $request->post('nome');
       $cpf_cnpj = $request->post('cpf_cnpj');
       $telefone = $request->post('telefone');
       $endereco = $request->post('endereco');
       $cidade = $request->post('cidade');
       $estado = $request->post('estado');
       $email = $request->post('email');
       
       $cliente = new Cliente;

       $cliente->nome = $nome;
       $cliente->cpf_cnpj = $cpf_cnpj;
       $cliente->telefone = $telefone;
       $cliente->email = $email;
       $cliente->endereco = $endereco;
       $cliente->cidade = $cidade;
       $cliente->estado = $estado;
       $cliente->save();
    }

    public function show(Cliente $cliente)
    {
        
    }

    public function edit(Cliente $cliente)
    {
        
    }

    public function update(Request $request, Cliente $cliente)
    {
        
    }

    public function destroy(Cliente $cliente)
    {
        
    }
}
