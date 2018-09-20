<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function indexContato()
    {
        $contato = Contato::all();
        return view('painel.contato.create_contato')->with('contato', $contato);
    }
    
    public function destroyContato($id)
    {
        $contato = Contato::find($id);
        $contato->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/contato');
    }
}
