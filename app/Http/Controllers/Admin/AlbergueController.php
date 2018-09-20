<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Albergue;
use Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\DB;

class AlbergueController extends Controller
{
    public function albergue() {
        //$albergue = Albergue::all();
        $albergue = DB::table('albergue')->limit(1)->first();
        return view('painel.albergue.create_albergue')->with('albergue', $albergue);
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        
        $albergue = new Albergue;
        $albergue->descricao = $request->descricao;
        $albergue->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $albergue->user_id = $usuario;
        $albergue->save();
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/albergue');
    }

    public function edit($id)
    {
        $albergue = Albergue::find($id);
        return view('painel.albergue.edit_albergue')->with('albergue', $albergue);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $albergue = Albergue::find($id);
        $albergue->descricao = $request->descricao;
        $albergue->dataModificacao = Input::get('data');
        $usuario = auth()->user()->id;
        $albergue->user_id = $usuario;
        $albergue->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/albergue');
    }

    public function destroy($id)
    {
         $albergue = Albergue::find($id);
         $albergue->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/albergue');
    }
    
    public function mudarStatus($id) {
        $albergue = Albergue::find($id);

        if ($albergue->status == 'N') {
            $albergue->status = 'S';
        } else {
            $albergue->status = 'N';
        }

        $albergue->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/albergue');
    }
}
