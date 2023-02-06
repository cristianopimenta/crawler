<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index(){
        $cadastro = Cadastro::orderby('id', 'desc')->paginate(5);
        return view('cadastro.index', compact('cadastro'));
    }

    public function create(){
        return view('cadastro.create');
    }

    public function store(Request $request){
       
      /*  $request->validade([
            'nome' => 'required|string',
            'perfil' => 'required|string',
        ]);*/

        Cadastro::create($request->post());
        return redirect()->route('cadastro.index')->with('success', 'Cadastro criado com sucesso!');
    }

    public function show(Cadastro $cadastro){
        return view('cadastro.index', compact('cadastro'));
    }

    public function edit(Cadastro $cadastro){
        return view('cadastro.edit', compact('cadastro'));
    }

    public function update(Request $request, Cadastro $cadastro){
       /* $request->validade([
            'nome' => 'required',
            'perfil' => 'required',
        ]);*/

        $cadastro->fill($request->post())->save();
        return redirect()->route('cadastro.index')->with('success', 'Cadastro alterado com sucesso!');
    }

    public function destroy(Cadastro $cadastro){
        $cadastro->delete();
        return redirect()->route('cadastro.index')->with('success', 'Cadastro excluido com sucesso!');
    }    

}


