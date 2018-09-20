<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Acordo;
use File;

class AcordoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $acordo;

   public function __construct(Acordo $acordo){

    $this->acordo=$acordo;
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
        $acordos=$this->acordo->all();
        $titulo="Cadastro";
        $acordo=null;
        date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"d/m/Y");
        return view('painel.acordos.create_acordo',compact('acordos','titulo','acordo','dataAtual'));
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
        $file->move(public_path('images/acordos'),$fileName);

           $this->acordo->nome=$request->input('nome');
           $this->acordo->dataCriacao=$request->input('data');
           $this->acordo->dataAtualizacao=$request->input('data');
           $this->acordo->descricao=$request->input('descricao');
           $this->acordo->user_id=$usuario;
           $this->acordo->arquivo0='/images/acordos/'. $fileName;
           $status=$request->input('status');
            
            if ($status == '')
            $status = 'N';
            else
            $status = 'S';
        
           $this->acordo->status = $status;
           $this->acordo->save(); 
           
       
         \Session::flash('message', 'Acordo cadastrado com sucesso!');
       return redirect('admin/acordos');
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
       $acordo=$this->acordo->find($id);
       $acordos=$this->acordo->all();
       $titulo="Ediçao";
       date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
       return view('painel.acordos.create_acordo',compact('acordo','acordos','titulo','dataAtual'));

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
           $acordoAtual=$this->acordo->find($id);
           $acordoAtual->nome=$request->input('nome');
           $acordoAtual->dataAtualizacao=$request->input('data');
           $acordoAtual->descricao=$request->input('descricao');
           $acordoAtual->user_id=$usuario;
           $status=$request->input('status');
            if ($status == '')
            $status = 'N';
        else
            $status = 'S';

        if ($acordoAtual->status != $status) {
            $acordoAtual->status = $status;
        }
        
         if ($request->file('arquivo')) {
             File::delete(public_path() . $acordoAtual->arquivo0);

              $file=$request->file('arquivo');
              $fileName=uniqid().$file->getClientOriginalName();
              $file->move(public_path('images/acordos'),$fileName);
              $acordoAtual->arquivo0='/images/acordos/'. $fileName;
         }
           $acordoAtual->save(); 
      
       \Session::flash('message', 'Acordo atualizado com sucesso!');
                return redirect('admin/acordos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $acordoAtual=$this->acordo->find($id);
        $acordoAtual->delete();
        \Session::flash('message', 'Acordo excluido com sucesso!');
        return redirect('admin/acordos');
    }


    public function mudarStatus($id) {
        $acordo=$this->acordo->find($id);
        if ($acordo->status == 'N') {
            $acordo->status = 'S';
        } else {
            $acordo->status = 'N';
        }

        $acordo->update();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/acordos');
    }
}
