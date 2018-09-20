<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Socio;
use Illuminate\Support\Facades\DB;
use PDF;
use View;

class AssociadoController extends Controller
{
    
    public function associe()
    {
        $pag = "Associa-se";
        return view('site.cadastros.socio',compact('pag',$pag));
    }
    
    
    public function buscarDados(Request $request)
    {
        $cpf= $request->input('cpf');
        $dados = DB::table('associado')->where('cpf', $cpf)->first();
        return response()->json($dados);
    }
    
    
    public function store(Request $request)
    {
        $dadosSocio = DB::table('associado')->where('cpf', $request->cpf)->first();

        if (DB::table('associado')->where('cpf', $request->cpf)->count() == 0) {
            
            $socio = new Socio();
            $socio->nome = $request->nome;
            $socio->matricula = $request->matricula;
            $socio->endereco = $request->endereco;
            $socio->complemento = $request->complemento;
            $socio->bairro = $request->bairro;
            $socio->cep = $request->cep;
            $socio->cidade = $request->cidade;
            $socio->uf = $request->uf;
            $socio->fone = $request->fone;
            $socio->celular = $request->celular;
            $socio->email = $request->email;
            $socio->data_nasc = $request->data_nasc;
            $socio->naturalidade = $request->naturalidade;
            $socio->sexo = $request->sexo;
            $socio->nomemae = $request->nomemae;
            $socio->nomepai = $request->nomepai;
            $socio->rg = $request->rg;
            $socio->rguf = $request->rguf;
            $socio->cpf = $request->cpf;
            $socio->estadocivil = $request->estadocivil;
            $socio->banco = $request->banco;
            $socio->agencia = $request->agencia;
            $socio->cidade_banco = $request->cidade_banco;
            $socio->dataadmi = $request->dataadmi;
            $socio->ctps = $request->ctps;
            $socio->serieuf = $request->serieuf;

            $socio->dependente1 = $request->dependente1;
            $socio->dependente2 = $request->dependente2;
            $socio->dependente3 = $request->dependente3;
            $socio->dependente4 = $request->dependente4;
            $socio->dependente5 = $request->dependente5;
            $socio->dependente6 = $request->dependente6;

            $socio->save();

        } else {
            
            $socio = Socio::find($dadosSocio->id);
            
            if ($socio->endereco != Input::get('endereco')) {
                $socio->endereco = Input::get('endereco');
            }
            
            if ($socio->complemento != Input::get('complemento')) {
                $socio->complemento = Input::get('complemento');
            }
            
            if ($socio->bairro != Input::get('bairro')) {
                $socio->bairro = Input::get('bairro');
            }
            
            if ($socio->cep != Input::get('cep')) {
                $socio->cep = Input::get('cep');
            }
            
            if ($socio->cidade != Input::get('cidade')) {
                $socio->cidade = Input::get('cidade');
            }
            
            if ($socio->uf != Input::get('uf')) {
                $socio->uf = Input::get('uf');
            }
            
            if ($socio->fone != Input::get('fone')) {
                $socio->fone = Input::get('fone');
            }
            
            if ($socio->celular != Input::get('celular')) {
                $socio->celular = Input::get('celular');
            }
            
            if ($socio->email != Input::get('email')) {
                $socio->email = Input::get('email');
            }
            
            if ($socio->naturalidade != Input::get('naturalidade')) {
                $socio->naturalidade = Input::get('naturalidade');
            }
            
            if ($socio->sexo != Input::get('sexo')) {
                $socio->sexo = Input::get('sexo');
            }
            
            if ($socio->nomemae != Input::get('nomemae')) {
                $socio->nomemae = Input::get('nomemae');
            }
            
            if ($socio->nomepai != Input::get('nomepai')) {
                $socio->nomepai = Input::get('nomepai');
            }
            
            if ($socio->rg != Input::get('rg')) {
                $socio->rg = Input::get('rg');
            }
            
            if ($socio->rguf != Input::get('rguf')) {
                $socio->rguf = Input::get('rguf');
            }
            
            if ($socio->estadocivil != Input::get('estadocivil')) {
                $socio->estadocivil = Input::get('estadocivil');
            }
            
            if ($socio->banco != Input::get('banco')) {
                $socio->banco = Input::get('banco');
            }
            
            if ($socio->agencia != Input::get('agencia')) {
                $socio->agencia = Input::get('agencia');
            }
            
            if ($socio->cidade_banco != Input::get('cidade_banco')) {
                $socio->cidade_banco = Input::get('cidade_banco');
            }
            
            if ($socio->dataadmi != Input::get('dataadmi')) {
                $socio->dataadmi = Input::get('dataadmi');
            }
            
            if ($socio->ctps != Input::get('ctps')) {
                $socio->ctps = Input::get('ctps');
            }
            
            if ($socio->serieuf != Input::get('serieuf')) {
                $socio->serieuf = Input::get('serieuf');
            }
            
            if ($socio->semana != Input::get('semana')) {
                $socio->semana = Input::get('semana');
            }
            
            if ($socio->dependente1 != Input::get('dependente1')) {
                $socio->dependente1 = Input::get('dependente1');
            }
            
            if ($socio->dependente2 != Input::get('dependente2')) {
                $socio->dependente2 = Input::get('dependente2');
            }
            
            if ($socio->dependente3 != Input::get('dependente3')) {
                $socio->dependente3 = Input::get('dependente3');
            }
            
            if ($socio->dependente4 != Input::get('dependente4')) {
                $socio->dependente4 = Input::get('dependente4');
            }
            
            if ($socio->dependente5 != Input::get('dependente5')) {
                $socio->dependente5 = Input::get('dependente5');
            }
            
            if ($socio->dependente6 != Input::get('dependente6')) {
                $socio->dependente6 = Input::get('dependente6');
            }
            
            $socio->save();
            
        }
        
        \Session::flash('message', 'Cadastrado com sucesso!');
        
         $socio = Socio::find($socio->id);
         $pdf = PDF::loadView('site.cadastros.pdfimpresso', compact('socio',$socio));
         $pdf->download('FichaAssocia.pdf');
        
        $pag = "Associa-se";
        return view('site.cadastros.socio', compact('pag', $pag,$pdf));
    }
    

}
