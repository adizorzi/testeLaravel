<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Empresa;
use App\Estado;

class EmpresasController extends Controller
{
    private $rules = [
        'uf' => 'required|max:2',
        'nomefantasia' => 'required',
        'cnpj' => 'required|formato_cnpj',
    ];

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.listar', compact('empresas'));
    }

    public function novo()
    {
        $estados = Estado::all();
        return view('empresas.criar', compact('estados'));
    }
    
    public function criar(Request $requect)
    {
        $values =  $requect->all();
        $validator = Validator::make($values, $this->rules);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $empresa = new Empresa($values);
        $empresa->save();

        return redirect('empresas')->with('success', 'Empresa salva com sucesso!');
    }

    public function editar($id)
    {
        $empresa = Empresa::find($id);
        $estados = Estado::all();
        return view('empresas.editar', compact('empresa', 'estados'));
    }
    public function update(Request $requect, $id)
    {
        $values = $requect->all();
        $validator = Validator::make($values, $this->rules);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $empresa = Empresa::find($id);
        $empresa->fill($values);
        $empresa->save();

        return redirect('empresas')->with('success', 'Empresa salva com sucesso!');
    }

    public function delete(Request $requect, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();

        return redirect()->back()->with("success", 'Empresa deletada!');
    }
}
