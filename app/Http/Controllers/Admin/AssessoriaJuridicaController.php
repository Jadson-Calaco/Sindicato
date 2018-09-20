<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssessoriaJuridica;


class AssessoriaJuridicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $assessoriaJuridica;

    public function __construct(AssessoriaJuridica $assessoriaJuridica){
        $this->assessoriaJuridica=$assessoriaJuridica;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
         $usuario = auth()->user()->id;
        
         $assessoriaJuridica=$this->assessoriaJuridica->getJuridico($usuario);
         //$assessoriajuridica=AssessoriaJuridica::where('user_id',$usuario)->get();
         //$assessoriajuridica=DB::table('assessoriajuridicas')->where('user_id',$usuario)->get();
         $titulo="Cadastro";
         $acordo=null;
         date_default_timezone_set("America/Recife");
         $date=date_create();
         $dataAtual=date_format($date,"d/m/Y");
         return view('painel.juridico.create_assessoria_juridica',compact('assessoriaJuridica','titulo','dataAtual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = auth()->user()->id;
        $assessoriaJuridica=$this->assessoriaJuridica;
        $assessoriaJuridica->texto=$request->input('texto');
        $assessoriaJuridica->dataCriacao=$request->input('dataAtual');
        $assessoriaJuridica->dataAtualizacao=$request->input('dataAtual');
        $assessoriaJuridica->user_id=$usuario;
        $assessoriaJuridica->save();
         
        \Session::flash('message', 'Assessoria Juridica cadastrada com sucesso!');
        return redirect('admin/juridico');      
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
       /* $assessoriaJuridica=$this->assessoriaJuridica->find($id);
        $assessoriaJuridicas=$this->assessoriaJuridica->all();
         $titulo="Edi��o";
         return view('painel.juridico.create_assessoria_juridica',compact('assessoriaJuridica','assessoriaJuridicas','titulo')); */
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
           $usuario = auth()->user()->id;
          $assessoriaJuridicaAtual=$this->assessoriaJuridica->find($id);
          $assessoriaJuridicaAtual->texto=$request->input('texto');
          $assessoriaJuridicaAtual->dataAtualizacao=$request->input('dataAtual');
          $assessoriaJuridicaAtual->user_id=$usuario;
          $assessoriaJuridicaAtual->update();
          
         \Session::flash('message', 'Assessoria Juridica atualizada com sucesso!');
          
         return redirect('admin/juridico');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $assessoriaJuridicaAtual=$this->assessoriaJuridica->find($id);
        $assessoriaJuridicaAtual->delete();
        \Session::flash('message', 'Assessoria Juridica excluida com sucesso!');
        return redirect('admin/juridico');
    }
}

