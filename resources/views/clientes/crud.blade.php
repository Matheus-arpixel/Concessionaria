@extends('adminlte::page')

@section('title', 'Cadastro de Clientes')

@section('content_header')

@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Clientes</h3>
        </div>
        <div class="card-body"s>
            <div class="form-group">

                @if (isset($edit->id))
                    <form method="post" action="{{ route('clientes.update', ['clientes' => $edit->id]) }}">
                        @csrf
                        @method('PUT')
                    @else
                        <form method="post" action="{{ route('clientes.store') }}">
                            @csrf
                @endif

                <div class="row">
                    <div class="col-sm-10">
                        <label for="nome">Cliente</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder=""
                            value="{{ $edit->nome ?? old('nome') }}">
                        @if ($errors->has('nome'))
                            <span style="color: red;">
                                {{ $errors->first('nome') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label for="cpf_cnpj">CPF CNPJ</label>
                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder=""
                            value="{{ $edit->cpf_cnpj ?? old('cpf_cnpj') }}">
                        @if ($errors->has('cpf_cnpj'))
                            <span style="color: red;">
                                {{ $errors->first('cpf_cnpj') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder=""
                            value="{{ $edit->endereco ?? old('endereco') }}">
                        @if ($errors->has('endereco'))
                            <span style="color: red;">
                                {{ $errors->first('endereco') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder=""
                            value="{{ $edit->cidade ?? old('cidade') }}">
                        @if ($errors->has('cidade'))
                            <span style="color: red;">
                                {{ $errors->first('cidade') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder=""
                            value="{{ $edit->telefone ?? old('telefone') }}">
                        @if ($errors->has('telefone'))
                            <span style="color: red;">
                                {{ $errors->first('telefone') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder=""
                            value="{{ $edit->email ?? old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red;">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder=""
                            value="{{ $edit->estado ?? old('estado') }}">
                        @if ($errors->has('estado'))
                            <span style="color: red;">
                                {{ $errors->first('estado') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    {{-- <div class="col-sm-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder=""
                            value="{{ $edit->email ?? old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red;">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div> --}}

                {{-- <div class="row">
                    <div class="col-sm-4">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" placeholder=""
                            value="{{ $edit->uf ?? old('uf') }}">
                        @if ($errors->has('uf'))
                            <span style="color: red;">
                                {{ $errors->first('uf') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder=""
                            value="{{ $edit->celular ?? old('celular') }}">
                        @if ($errors->has('celular'))
                            <span style="color: red;">
                                {{ $errors->first('celular') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder=""
                            value="{{ $edit->email ?? old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red;">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>
            </div>

        </div> --}}

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('clientes.index') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
        </form>

    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.maskMoney.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // $(document).ready(function() {

            // $('#cep').on('blur', function() {
                
            //     let cep = $('#cep').val();

            //     $.ajax({
            //         url: 'https://viacep.com.br/ws/' + cep + '/json/',
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(data) {
            //             if (!data.erro) {
            //                 $('#logradouro').val(data.logradouro);
            //                 $('#bairro').val(data.bairro);
            //                 $('#cidade').val(data.localidade);
            //                 $('#uf').val(data.uf);
            //             } else {
            //                 alert('CEP não encontrado.');
            //             }
            //         },
            //         error: function() {
            //             alert('Erro ao buscar o CEP.');
            //         }
            //     });
            // });

        //     $('#cep').on('blur', function() {
                
        //         let cep = $('#cep').val();

        //         let data_get = {
        //             cep: cep
        //         };

        //         $.ajax({
        //             url: '/consulta-cep',
        //             type: 'GET',
        //             dataType: 'json',
        //             data: data_get,
        //             success: function(data) {

        //                 console.log(data);

        //                 if (!data.erro) {
        //                     $('#logradouro').val(data.logradouro);
        //                     $('#bairro').val(data.bairro);
        //                     $('#cidade').val(data.localidade);
        //                     $('#uf').val(data.uf);
        //                 } else {
        //                     alert('CEP não encontrado.');
        //                 }
        //             },
        //             error: function() {
        //                 //alert('Erro ao buscar o CEP.');
        //             }
        //         });
        //     });


        // });
    </script>
@stop
