<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bancos;
use Illuminate\Support\Facades\Input;

class BancoController extends Controller
{
    public function index() {
        $bancos = Bancos::all();
        return view('painel.bancos.create_bancos')->with('bancos', $bancos);;
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'nome' => 'required',           
        ]);
        
        $bancos = new Bancos;
        $bancos->nome = $request->nome;
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $bancos->status = $status;
        $usuario = auth()->user()->id;
        $bancos->user_id = $usuario;
        $bancos->save();
     
        \Session::flash('message', 'Banco cadastrado com sucesso!');
         
        return redirect('admin/bancos');
    }

    public function edit($id)
    {
        $bancos = Bancos::find($id);
        return view('painel.bancos.edit_bancos')->with('bancos', $bancos);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',           
        ]);
        
        $bancos = Bancos::find($id);
        $bancos->nome = $request->nome;
        
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $bancos->status = $status;
        $usuario = auth()->user()->id;
        $bancos->user_id = $usuario;
        $bancos->save();
        
        \Session::flash('message', 'Banco atualizado com sucesso!');
        
        return redirect('admin/bancos');
    }

    public function destroy($id)
    {
         $bancos = Bancos::find($id);
         $bancos->delete();
         
         \Session::flash('message', 'Banco excluido com sucesso!');
         
         return redirect('admin/bancos');
    }
    
    public function mudarStatus($id) {
        $bancos = Bancos::find($id);

        if ($bancos->status == 'N') {
            $bancos->status = 'S';
        } else {
            $bancos->status = 'N';
        }

        $bancos->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/bancos');
    }
}
