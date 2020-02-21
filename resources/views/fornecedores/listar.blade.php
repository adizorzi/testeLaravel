@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('empresas/'.$id.'/fornecedores/criar')}}" class="btn btn-primary">Novo</a>
            <a href="{{url('empresas/')}}" class="btn btn-warning">Voltar</a>
            <div class="card">
                <table class="table table-class">
                    <thead>
                        <th>Nome</th>
                        <th>Documento</th>
                        <th>Tipo</th>
                        <th>Nascimento</th>
                        <th>Rg</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor) 
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->documento }}</td>
                                <td>{{ $fornecedor->tipoempresa == "F" ? 'Física' : 'Jurídica' }}</td>
                                <td>{{ $fornecedor->datanascimento ? (new \DateTime($fornecedor->datanascimento))->format('d/m/Y') : '' }}</td>
                                <td>{{ $fornecedor->rg }}</td>
                                <td>
                                    <a href="{{url('empresas/'.$fornecedor->idempresa.'/fornecedores/editar/'.$fornecedor->id)}}" class="btn btn-success">Editar</a>
                                    <a href="{{url('empresas/'.$fornecedor->idempresa.'/fornecedores/delete/'.$fornecedor->id)}}" data-toggle="modal" data-target="#exampleModal" data-action="{{url('empresas/'.$fornecedor->idempresa.'/fornecedores/delete/'.$fornecedor->id)}}" class="btn btn-danger deletar">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection
