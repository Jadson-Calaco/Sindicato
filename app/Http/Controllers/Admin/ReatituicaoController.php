<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Reatituicao;
use File;


class ReatituicaoController extends Controller
{
    public function reatituicao()
    {
        $reatituicao = Reatituicao::all();
        return view('painel.reatituicao.reatituicao')->with('reatituicao', $reatituicao);
    }
    
    public function destroy($id)
    {
        $reatituicao = Reatituicao::find($id);
        $reatituicao->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/reatituicao');
    }
    
    public function gerarPdf($id){
        
        $reatituicao = Reatituicao::find($id);
        $file = public_path() . '/images/reatituicao/'. $reatituicao->id.'/'.$reatituicao->arquivo;
        return response()->download($file);
        
    }
    
    public function detalhar($id) {
        $reatituicao = Reatituicao::find($id);
        return view('painel.reatituicao.detalhar_reatituicao')->with('reatituicao', $reatituicao);
    }  
}
