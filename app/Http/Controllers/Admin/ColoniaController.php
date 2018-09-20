<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Periodo;



class ColoniaController extends Controller
{
    public function index() {
        $colonia = Colonia::all();
        $periodo = Periodo::all();
        return view('painel.colonias.index_colonia', compact('periodo'))->with('colonia', $colonia);;
    }
    
    /*
    public function store(Request $request)
    {
       $this->validate($request, [
            'nome' => 'required',
            'periodo_id' => 'required',
            'semana' => 'required',
            'regional' => 'required',
            'nome' => 'required',
            'cpf' => 'required',
            'matricula' => 'required',
            'banco' => 'required',
            'agencia' => 'required',
            'telefone' => 'required',           
        ]);
        
       $colonia = new Colonia;
       $colonia->periodo_id = $request->periodo_id;
       $colonia->semana = $request->semana;
       $colonia->regional = $request->regional;
       $colonia->nome = $request->nome;
       $colonia->cpf = $request->cpf;
       $colonia->matricula = $request->matricula;
       $colonia->banco = $request->banco;
       $colonia->agencia = $request->agencia;
       $colonia->telefone = $request->telefone;
       $colonia->save();
     
       \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('/');
    }*/

    public function destroy($id)
    {
         $colonia = Colonia::find($id);
         $colonia->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/colonia');
    }

    /*
    public function edit($id)
    {
        $colonia = Colonia::find($id);
        $periodo = Periodo::all();
        $bancos = Bancos::all();
        return view('painel.colonias.edit_colonia', compact('periodo','bancos'))->with('colonia', $colonia);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',           
        ]);
        
        $colonia = Colonia::find($id);
        $colonia->periodo_id = $request->periodo_id;
        $colonia->semana = $request->semana;
        $colonia->regional = $request->regional;
        $colonia->nome = $request->nome;
        $colonia->cpf = $request->cpf;
        $colonia->matricula = $request->matricula;
        $colonia->banco = $request->banco;
        $colonia->agencia = $request->agencia;
        $colonia->telefone = $request->telefone;
        $colonia->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/colonia');
    }*/

    
}
