<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Informativo;
use File;

class InformativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $informativo;

   public function __construct( Informativo $informativo){

    $this->informativo=$informativo;
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
        $informativos=$this->informativo->all();
        $titulo="Cadastro";
        $informativo=null;
        date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
        //dd($dataAtual);
        return view('painel.informativos.create_informativos',compact('informativos','titulo','informativo','dataAtual'));
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
        $file=$request->file('arquivo');
        $fileName=uniqid().$file->getClientOriginalName();
        $file->move(public_path('images/informativos'),$fileName);

           
           $this->informativo->nome=$request->input('nome');
           $this->informativo->data=$request->input('data');
           $this->informativo->dataCriacao=$request->input('data');
           $this->informativo->dataAtualizacao=$request->input('data');
           $this->informativo->descricao=$request->input('descricao');
          
           $this->informativo->arquivo0='/images/informativos/'. $fileName;

           $status=$request->input('status');
            
            if ($status == '')
            $status = 'N';
            else
            $status = 'S';
        
           $this->informativo->status = $status;
           $this->informativo->save(); 
              
       
         \Session::flash('message', 'Informativo cadastrado com sucesso!');
        return redirect('admin/informativos');
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
       $informativo=$this->informativo->find($id);
       $informativos=$this->informativo->all();
       $titulo="Ediçao";
       date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
       return view('painel.informativos.create_informativos',compact('informativo','informativos','titulo','dataAtual'));

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

           $informativoAtual=$this->informativo->find($id);
           $informativoAtual->nome=$request->input('nome');
           $informativoAtual->dataAtualizacao=$request->input('data');
           $informativoAtual->descricao=$request->input('descricao');
          
           
        
         if ($request->file('arquivo')) {
             File::delete(public_path() . $informativoAtual->arquivo0);

              $file=$request->file('arquivo');
              $fileName=uniqid().$file->getClientOriginalName();
              $file->move(public_path('images/informativos'),$fileName);
              $informativoAtual->arquivo0='/images/informativos/'. $fileName;
         }
           $status=$request->input('status');
            if ($status == '')
            $status = 'N';
           else
            $status = 'S';

          if ($informativoAtual->status != $status) {
            $informativoAtual->status = $status;
        }
           $informativoAtual->update(); 
       
       \Session::flash('message', 'Informativo atualizado com sucesso!');
        return redirect('admin/informativos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $informativoAtual=$this->informativo->find($id);
        $informativoAtual->delete();
        \Session::flash('message', 'informativo excluido com sucesso!');
        return redirect('admin/informativos');
    }

      public function mudarStatus($id) {
        $informativo = $this->informativo->find($id);

        if ($informativo->status == 'N') {
            $informativo->status = 'S';
        } else {
            $informativo->status = 'N';
        }

        $informativo->update();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/informativos');
    }
}
