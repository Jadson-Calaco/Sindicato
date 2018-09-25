<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\Models\Imposto;
use File;


class ImpostoController extends Controller
{
    public function impostos()
    {
        $imposto = Imposto::all();
        return view('painel.imposto.imposto')->with('imposto', $imposto);
    }
    
    public function detalhar($id)
    {
        $imposto = Imposto::find($id);
        return view('painel.imposto.detalhar_imposto')->with('imposto', $imposto);
    }
    
    public function destroy($id)
    {
        $imposto = Imposto::find($id);
        $imposto->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/imposto');
    }
    
    public function gerarPdf($id){
        
        $imposto = Imposto::find($id);
        $file = public_path() . '/images/imposto/'. $imposto->id.'/'.$imposto->arquivo;
        return response()->download($file);
                
    }
}
