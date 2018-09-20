<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    public function index() {
        $periodo = Periodo::all();
        return view('painel.periodo.create_periodo')->with('periodo', $periodo);
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'nome' => 'required',
            'semana_1' => 'required',
            'semana_2' => 'required',
            'semana_3' => 'required',
            'semana_4' => 'required',
   
        ]);
        
        $periodo = new Periodo;
        $periodo->nome = $request->nome;
        $periodo->semana_1 = $request->semana_1;
        $periodo->semana_2 = $request->semana_2;
        $periodo->semana_3 = $request->semana_3;
        $periodo->semana_4 = $request->semana_4;
        $periodo->semana_5 = $request->semana_5;
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $periodo->status = $status;
        $usuario = auth()->user()->id;
        $periodo->user_id = $usuario;
        $periodo->save();
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/periodo');
    }

    public function edit($id)
    {
        $periodo = Periodo::find($id);
        return view('painel.periodo.edit_periodo')->with('periodo', $periodo);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'semana_1' => 'required',
            'semana_2' => 'required',
            'semana_3' => 'required',
            'semana_4' => 'required',
          
        ]);
        
        $periodo = Periodo::find($id);
        $periodo->nome = $request->nome;
        $periodo->semana_1 = $request->semana_1;
        $periodo->semana_2 = $request->semana_2;
        $periodo->semana_3 = $request->semana_3;
        $periodo->semana_4 = $request->semana_4;
        $periodo->semana_5 = $request->semana_5;
        
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $periodo->status = $status;
        $usuario = auth()->user()->id;
        $periodo->user_id = $usuario;
        $periodo->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/periodo');
    }

    public function destroy($id)
    {
        if (DB::table('coloniaferias')->where('periodo_id', $id)->count() == 0) {
             $periodo = Periodo::find($id);
             $periodo->delete();
             
             \Session::flash('message', 'Excluido com sucesso!');
             
             return redirect('admin/periodo');
        }else{

             \Session::flash('message', 'Não é possivel excluir, pois está vinculada a um registro de colonia de férias !');
             
             return redirect('admin/periodo');
        }
    }

    public function mudarStatus($id) {
        $periodo = Periodo::find($id);

        if ($periodo->status == 'N') {
            $periodo->status = 'S';
        } else {
            $periodo->status = 'N';
        }

        $periodo->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/periodo');
    }
}
