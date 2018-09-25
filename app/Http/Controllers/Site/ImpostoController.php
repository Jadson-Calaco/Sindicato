<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Imposto;
use File;

class ImpostoController extends Controller
{
    public function imposto()
    {
        $pag = "Imposto Sindical";
        return view('site.cadastros.imposto',compact('pag',$pag));
    }
    
    public function gerarPdfImposto(){
        $pdf = PDF::loadView('site.cadastros.pdfimpresso');
        $pdf->download('imposto_sindical.pdf');
    }
    
    public function store(Request $request)
    {
        if (Input::file('arquivo')) {
            $arquivo = Input::file('arquivo');
            $extensao = $arquivo->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'doc' && $extensao != 'pdf') {
                return back()->with('erro', 'Erro: Tipo de arquivo não permitido');
            }
        }
        
        $imposto = new Imposto;
        $imposto->nome = $request->nome;
        $imposto->matricula = $request->matricula;
        $imposto->conta = $request->conta;
        $imposto->telefone = $request->telefone;
        $imposto->email = $request->email;
        $imposto->cpf = $request->cpf;
        $imposto->banco = $request->banco;
        $imposto->agencia = $request->agencia;
        $imposto->dataCriacao = Input::get('data');
        $imposto->save();
        
        if (Input::file('arquivo')) {
            
            $diretorio = public_path() . '/images/imposto/'. $imposto->id ;
            
            if (!file_exists($diretorio)){
                mkdir("$diretorio", 0700);
            }
            
            $filepath = public_path() . '/images/imposto/'. $imposto->id.'/I_ID_' . $imposto->id . '.' . $extensao;
            File::move($arquivo,$filepath);

            $imposto->arquivo = 'I_ID_' . $imposto->id . '.' . $extensao;
            $imposto->save();
        }
        
        \Session::flash('message', 'Cadastrado com sucesso!');
        
        $pag = "Imposto Sindical";
        return view('site.cadastros.imposto',compact('pag',$pag));   
        
    }
}
