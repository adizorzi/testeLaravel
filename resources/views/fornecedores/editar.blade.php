@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('empresas/'.$fornecedor->idempresa.'/fornecedores/update/'.$fornecedor->id) }}">
                        @csrf
                        <input type="hidden" name="idempresa" value="{{$fornecedor->idempresa}}">
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="nome">{{ __('Nome') }}</label>
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ? : $fornecedor->nome }}" autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="tipoempresa">{{ __('Tipo') }}</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="tipoempresa" class="tipo" value="F" id="option1" {{$fornecedor->tipoempresa == 'F' ? 'checked' : ''}}> Física
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="tipoempresa" class="tipo" value="J" id="option3" {{$fornecedor->tipoempresa == 'J' ? 'checked' : ''}}> Jurídica
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="documento">{{ __('Documento') }}</label>
                                <input id="documento" type="text" class="form-control @error('documento') is-invalid @enderror" value="{{ old('documento') ? : $fornecedor->documento }}" name="documento" autocomplete="current-documento">

                                @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 tipo-fisica">
                                <label for="rg">{{ __('RG') }}</label>
                                <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" value="{{ old('rg') ? : $fornecedor->rg }}" name="rg" autocomplete="current-rg">

                                @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group col-md-4 tipo-fisica">
                                <label for="datanascimento">{{ __('Data nascimento') }}</label>
                                <input id="datanascimento" type="date" class="form-control @error('datanascimento') is-invalid @enderror" value="{{ old('datanascimento') ? : $fornecedor->datanascimento }}" name="datanascimento" autocomplete="current-datanascimento">

                                @error('datanascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                                <a href="{{url('empresas/'.$fornecedor->idempresa.'/fornecedores/')}}" class="btn btn-warning">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
