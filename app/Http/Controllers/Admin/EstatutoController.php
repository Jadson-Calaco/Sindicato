<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Estatuto;
use \Illuminate\Support\Facades\DB;

class EstatutoController extends Controller
{
    public function index() {
      //  $estatuto = Estatuto::all();
        $estatuto = DB::table('estatuto')->limit(1)->first();
        return view('painel.estatuto.estatuto')->with('estatuto', $estatuto);
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $estatuto = new Estatuto;
        $estatuto->descricao = $request->descricao;
        $estatuto->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $estatuto->user_id = $usuario;
        $estatuto->save();
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/estatuto');
    }

    public function edit($id)
    {
        $estatuto = Estatuto::find($id);
        return view('painel.estatuto.edit_estatuto')->with('estatuto', $estatuto);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $estatuto = Estatuto::find($id);
        $estatuto->descricao = $request->descricao;
        $usuario = auth()->user()->id;
        $estatuto->user_id = $usuario;
        $estatuto->dataModificacao = Input::get('data');
        $estatuto->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/estatuto');
    }

    public function destroy($id)
    {
         $estatuto = Estatuto::find($id);
         $estatuto->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/estatuto');
    }
    
    public function mudarStatus($id) {
        $estatuto = Estatuto::find($id);

        if ($estatuto->status == 'N') {
            $estatuto->status = 'S';
        } else {
            $estatuto->status = 'N';
        }

        $estatuto->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/estatuto');
    }


}
