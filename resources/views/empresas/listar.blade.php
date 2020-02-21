@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('empresas/criar')}}" class="btn btn-primary">Novo</a>
            <div class="card">
                <table class="table table-class">
                    <thead>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach($empresas as $empresa) 
                            <tr>
                                <td>{{ $empresa->nomefantasia }}</td>
                                <td>{{ $empresa->cnpj }}</td>
                                <td>{{ $empresa->estado->prefixo }}</td>
                                <td>
                                    <a href="{{url('empresas/editar/'.$empresa->id)}}" class="btn btn-success">Editar</a>
                                    <a href="{{url('empresas/'.$empresa->id.'/fornecedores/')}}" class="btn btn-secondary">Fornecedores</a>
                                    <a href="{{url('empresas/delete/'.$empresa->id)}}"  data-toggle="modal" data-target="#exampleModal" data-action="{{url('empresas/delete/'.$empresa->id)}}" class="btn btn-danger deletar">Excluir</a>
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
