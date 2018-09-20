<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ouvidoria;
use Illuminate\Support\Facades\Input;
use Mail;

class OuvidoriaController extends Controller
{
    
    public function ouvidoria()
    {
       $pag = "Ouvidoria Geral-SEEBFPI";
       return view('site.cadastros.ouvidoria',compact('pag',$pag));
    }

    public function store(Request $request){
        
       $ouvidoria = new Ouvidoria;
       $ouvidoria->nome = $request->nome;
       $ouvidoria->email = $request->email;
       $ouvidoria->banco = $request->banco;
       $ouvidoria->tipo = $request->tipo;
       $ouvidoria->mensagem = $request->mensagem;
       $ouvidoria->dataMensagem = Input::get('data');
       $ouvidoria->save();
       
       $data = array(
           'nome' => $request->nome,
           'email' => $request->email,
           'mensagem' => $request->mensagem,
           'banco' => $request->banco,
           'tipo' => $request->tipo,
       );
       
       Mail::send('site.ouvidoria.email', $data, function($message)  use ($data){
           
           $message->from($data['email'],$data['nome']);
           $message->to('desenvolverdor.ideias@gmail.com')->subject('Ouvidoria - '.$data['tipo']);
           
       });
     
       \Session::flash('message', 'Cadastrado com sucesso!');
       
        $pag = "Ouvidoria Geral-SEEBFPI";
        return view('site.cadastros.ouvidoria',compact('pag',$pag));
    }

}
