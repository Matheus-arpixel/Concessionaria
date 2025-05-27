@extends('adminlte::page')

@section('title', 'Cadastro de Editoras')

@section('content_header')
<h1>Editoras</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Editoras</h3>
    </div>

    <div class="card-body">
        <div>
            <a href="{{ route('clientes.create') }}" type="button" class="btn btn-primary" style="width:80px;">Novo</a>
        </div>
        <br>
        <table class="table table-bordered table-striped dataTable dtr-inline" id="editora-table" style="font-size: 15px;">
            <thead>
                <tr>
                    <th style="width: 5%">Id</th>
                    <th style="width: 50%">Cliente</th>
                    <th style="width: 10%">Tipo</th>
                    <th style="width: 10%">Ações</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {

        $('#clientes-table').DataTable({
            language: {
                "url": "{{ asset('js/pt-br.json') }}"
            },
            processing: true,
            serverSide: true,
            ajax: "{{ route('clientes.index') }}",
            columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'nome',
                name: 'nome'
            },
            {
                data: 'cpf_cnpj',
                name: 'cpf_cnpj'
            },
            {
                data: 'telefone',
                name: 'telefone'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'endereco',
                name: 'endereco'
        
            },
            {
                data: 'cidade',
                name: 'cidade'
            },
            {
                data: 'estado',
                name: 'estado'
            }
            },
            
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
    
        });
    });
</script>
@stop