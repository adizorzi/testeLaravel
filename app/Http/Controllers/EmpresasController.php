<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
    }

    public function create()
    {
        return view('empresas.criar');
    }
    
    public function store(Request $requect)
    {
        dd($requect->all());
    }

    public function edit(Request $requect)
    {
        dd('store');
    }
    public function update(Request $requect)
    {
        dd('store');
    }

    public function delete(Request $requect)
    {
        dd('store');
    }
}
