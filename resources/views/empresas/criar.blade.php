@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('empresas') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="offset-md-2 col-md-8">
                                <label for="nomefantasia">{{ __('Nome fantasia') }}</label>
                                <input id="nomefantasia" type="text" class="form-control @error('nomefantasia') is-invalid @enderror" name="nomefantasia" value="{{ old('nomefantasia') }}" autocomplete="nomefantasia" autofocus>

                                @error('nomefantasia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 form-group col-md-5">
                                <label for="cnpj">{{ __('CNPJ') }}</label>
                                <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" value="{{ old('cnpj') }}" name="cnpj" autocomplete="current-cnpj">

                                @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="uf">{{ __('Estado') }}</label>
                                <select name="uf" id=""  class="form-control @error('uf') is-invalid @enderror">
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->prefixo}}</option>
                                    @endforeach
                                </select>
                                @error('uf')
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
                                <a href="{{url('empresas')}}" class="btn btn-warning">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
