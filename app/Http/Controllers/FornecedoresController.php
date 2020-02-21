<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fornecedor;
use App\Empresa;
use Validator;

class FornecedoresController extends Controller
{
    private $rules = [
        'nome' => 'required',
        'tipoempresa' => 'required',
    ];

    public function index($id)
    {
        $fornecedores = Fornecedor::where('idempresa', $id)->get();
        return view ('fornecedores.listar', compact('fornecedores', 'id'));
    }
    public function novo($id)
    {
        return view('fornecedores.criar', compact('id'));
    }

    public function criar(Request $request)
    {
        $tipo = $request->tipoempresa;
        $values = $request->all();
        if($tipo == 'F'){
            $pessoaFisica = [
                'rg' => 'required',
                'datanascimento' => 'required',
                'documento' => 'required|formato_cpf',
            ];
            $rules = array_merge($this->rules, $pessoaFisica);
        }else{
            $pessoaJuridica = [
                'documento' => 'required|formato_cnpj'
            ];
            $rules = array_merge($this->rules, $pessoaJuridica); 
        }

        $validator = Validator::make($values, $rules);
        $request->session()->put('idempresa', $values['idempresa']);
        $this->maior18($validator, $values);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $fornecedor = new Fornecedor($values);
        $fornecedor->save();

        return redirect('empresas/'.$values['idempresa'].'/fornecedores')->with('success', 'Fornecedor salva com sucesso!');
    }

    public function maior18($validator, $values)
    {
        $ano = date('Y-m-d',strtotime("-18 year"));
        if(date_create($ano) < date_create($values['datanascimento'])) {
            $validator->after(function ($validator) {
                if ($this->validaPR()) {
                    $validator->errors()->add('datanascimento', 'O fornecedor deve ser maior de idade!');
                }
            });
        }
    }

    public function validaPR(){
        $empresa = Empresa::find(session('idempresa'));
        return $empresa->uf == 16;
    }

    public function editar($idEmpresa, $id)
    {
        $fornecedor = Fornecedor::find($id);

        return view('fornecedores.editar', compact('fornecedor'));
    }

    public function update(Request $request, $idEmpresa)
    {
        $tipo = $request->tipoempresa;
        $values = $request->all();
        if($tipo == 'F'){
            $pessoaFisica = [
                'rg' => 'required',
                'datanascimento' => 'required',
                'documento' => 'required|formato_cpf',
            ];
            $rules = array_merge($this->rules, $pessoaFisica);
        }else{
            $pessoaJuridica = [
                'documento' => 'required|formato_cnpj'
            ];
            $rules = array_merge($this->rules, $pessoaJuridica); 
        }
        $validator = Validator::make($values, $rules);
        $request->session()->put('idempresa', $values['idempresa']);
        $this->maior18($validator, $values);
        
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $fornecedor = Fornecedor::find($values['idempresa']);
        $fornecedor->fill($values);

        $fornecedor->save();

        return redirect('empresas/'.$idEmpresa.'/fornecedores')->with('success', 'Fornecedor salva com sucesso!');
    }
    public function delete(Request $requect, $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();

        return redirect()->back()->with("success", 'Fornecedor deletado!');
    }
}
