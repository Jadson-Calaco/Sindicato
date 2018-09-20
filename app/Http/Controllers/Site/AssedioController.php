<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Assedio;

class AssedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pag = "Assedio Moral";
        return view('site.cadastros.assedio',compact('pag',$pag));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assedio = new Assedio;
        $assedio->nome = $request->nome;
        $assedio->cpf = $request->cpf;
        $assedio->datanasc = $request->dataNascimento;
        $assedio->sexo = $request->sexo;
        $assedio->fone = $request->telefone;
        $assedio->empresa = $request->empresa;
        $assedio->agencia = $request->agencia;
        $assedio->endereco = $request->endereco;
        $assedio->complemento = $request->complemento;
        $assedio->cargo = $request->cargo;
        $assedio->tembanco  = $request->tempo;
        $assedio->email = $request->email;
                
        $assedio->nomedenun = $request->nome_Denunciado;
        $assedio->sexodenun = $request->sexo_Denunciado;
        $assedio->cargodenun = $request->cargo_Denunciado;
        $assedio->historico = $request->historico;
        
        $assedio->dataCadastro = Input::get('data');
        $assedio->save();
        
        \Session::flash('message', 'Cadastrado com sucesso!');
                
        $pag = "Assedio Moral";
        return view('site.cadastros.assedio',compact('pag',$pag));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
