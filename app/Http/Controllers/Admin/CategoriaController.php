<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Support\Facades\Input;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categorias::all();
        return view('painel.categorias.create_categorias')->with('categorias', $categorias);;
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'nome' => 'required',           
        ]);
        
        $categorias = new Categorias;
        $categorias->nome = $request->nome;
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $categorias->status = $status;
        $usuario = auth()->user()->id;
        $categorias->user_id = $usuario;
        $categorias->save();
     
        \Session::flash('message', 'Categoria cadastrada com sucesso!');
         
        return redirect('admin/categoria');
    }

    public function edit($id)
    {
        $categorias = Categorias::find($id);
        return view('painel.categorias.edit_categorias')->with('categorias', $categorias);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',           
        ]);
        
        $categorias = Categorias::find($id);
        $categorias->nome = $request->nome;
        $usuario = auth()->user()->id;
        $categorias->user_id = $usuario;

        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $categorias->status = $status;
        
        $categorias->save();
        
        \Session::flash('message', 'Categoria atualizada com sucesso!');
        
        return redirect('admin/categoria');
    }

    public function destroy($id)
    {
         $categorias = Categorias::find($id);
         $categorias->delete();
         
         \Session::flash('message', 'Categoria excluida com sucesso!');
         
         return redirect('admin/categoria');
    }
    
    public function mudarStatus($id) {
        $categorias = Categorias::find($id);

        if ($categorias->status == 'N') {
            $categorias->status = 'S';
        } else {
            $categorias->status = 'N';
        }

        $categorias->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/categoria');
    }
}
