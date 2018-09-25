<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Reatituicao;
use File;


class ReatituicaoController extends Controller
{
    public function index()
    {
        $pag = "Contribuição Negocial";
        return view('site.cadastros.reatituicao',compact('pag',$pag));
    }
    
    public function gerarPdfReatituicao(){
        $pdf = PDF::loadView('site.cadastros.pdfimpresso');
        $pdf->download('reatituicao.pdf');
        return response()->$pdf;
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
        
        $reatituicao = new Reatituicao;
        $reatituicao->nome = $request->nome;
        $reatituicao->matricula = $request->matricula;
        $reatituicao->conta = $request->conta;
        $reatituicao->telefone = $request->telefone;
        $reatituicao->email = $request->email;
        $reatituicao->cpf = $request->cpf;
        $reatituicao->banco = $request->banco;
        $reatituicao->agencia = $request->agencia;
        $reatituicao->dataCriacao = Input::get('data');
        $reatituicao->valor_cobrado1 = Input::get('valor_cobrado1');
        $reatituicao->valor_cobrado2 = Input::get('valor_cobrado2');
        
        $reatituicao->save();
        
        if (Input::file('arquivo')) {
            
            $diretorio = public_path() . '/images/reatituicao/'. $reatituicao->id ;
            
            if (!file_exists($diretorio)){
                mkdir("$diretorio", 0700);
            }
            
            $filepath = public_path() . '/images/reatituicao/'. $reatituicao->id.'/R_ID_' . $reatituicao->id . '.' . $extensao;
            File::move($arquivo,$filepath);
            
            $reatituicao->arquivo = 'R_ID_' . $reatituicao->id . '.' . $extensao;
            $reatituicao->save();
        }
        
        \Session::flash('message', 'Cadastrado com sucesso!');
        
        $pag = "Contribuição Negocial";
        return view('site.cadastros.reatituicao',compact('pag',$pag));
        
    }
}
