<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeria;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $galeria;

   public function __construct(Galeria $galeria){

    $this->galeria=$galeria;
   }

    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galerias=$this->galeria->all();
        $titulo="Cadastro";
        $galeria=null;
          date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
       
        return view('painel.galerias.create_galeria',compact('galerias','titulo','galeria','dataAtual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        //$galerias=$this->galeria->all();    
        //$dadosForm=$request->all();
        //$this->galeria->create($dadosForm);
        $usuario = auth()->user()->id;
        $galeria=$this->galeria;
        //$imagem=$request->file('file');
        //$imagemName=uniquid().$imagem->getClientOriginalName();
      
        

         $destaque=$request->input("destaque");
        if ($destaque == '')
            $destaque = 'N';
        else
            $destaque = 'S';

         $status=$request->input('status');
            
            if ($status == '')
            $status = 'N';
            else
            $status = 'S';
        
        $galeria->user_id= $usuario;
        $galeria->destaque=$destaque;
        $galeria->status = $status;
        $galeria->nome=$request->input("nome");
        $galeria->descricao=$request->input("descricao");
        $galeria->fotografo=$request->input("fotografo");
        $galeria->local=$request->input("local");
        $galeria->dataCriacao=$request->input("dataAtual");
        $galeria->dataAtualizacao=$request->input("dataAtual");
        //$galeria->dataCriaca=$request->input("dataAtual");
        //$galeria->dataAtualizacao=$request->input("dataAtual");
        $galeria->nome=$request->input("nome");
       

          //$imagem->move('images/galeria/'.$galeria->nome.'/',$imagemName);
          //$galeria->foto='images/galeria/'.$galeria->nome.'/'.$imagemName;
           $galeria->save();
        \Session::flash('message', 'Galeria cadastrada com sucesso!');


         return redirect('painel/galerias');

        //return view('painel.galerias.create_galerias',compact('galerias','galeria','dataAtual'));
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
       $galeria=$this->galeria->find($id);
       $galerias=$this->galeria->all();
       $titulo="Ediçao";
      
       return view('painel.galerias.fotos.create_galeria',compact('galeria','galerias','titulo','dataAtual'));

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
        $galeriaAtual=$this->galeria->find($id);
        //$novosDados=$request->all();
        //galeriaAtual->update($novosDados);
         $usuario = auth()->user()->id;
        //$imagem=$request->file('file');
        //$imagemName=uniquid().$imagem->getClientOriginalName();
      
        

        $destaque=$request->input("destaque");
        if ($destaque == '')
            $destaque = 'N';
        else
            $destaque = 'S';

        if ($galeriaAtual->destaque != $destaque) {
            $galeriaAtual->destaque = $destaque;
        }
        $galeria->user_id= $usuario;
        $galeria->destaque=$destaque;
        $galeria->nome=$request->input("nome");
        $galeria->descricao=$request->input("descricao");
        $galeria->fotografo=$request->input("fotografo");
        $galeria->local=$request->input("local");
        //$galeria->data1=$request->input("dataAtual");
        //$galeria->dataCriacao=$request->input("dataAtual");
        //$galeria->dataCriaca=$request->input("dataAtual");
        $galeria->dataAtualizacao=$request->input("dataAtual");
        //$galeria->nome=$request->input("nome");
        /* if ($request->file('file')) {
             File::delete(public_path() . $galeriaAtual->foto);

              $file=$request->file('file');
              $fileName=uniqid().$file->getClientOriginalName();
              $file->move(public_path('images/galeria/'.$galeriaAtual->nome.'/'),$fileName);
              $galeriaAtual->foto='/images/galeria/'.$galeriaAtual->nome.'/'.$fileName;
         }
        */
       \Session::flash('message', 'Galeria atualizada com sucesso!');
          //return view('painel.galeria.foto.create_galeria',compact('galeriaAtual','galerias','titulo','dataAtual'));

        return redirect('admin/galeria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $galeriaAtual=$this->galeria->find($id);
        $galeriaAtual->delete();
        \Session::flash('message', 'Acordo excluido com sucesso!');
        return redirect('admin/galeria');
    }


    public function mudarStatus($id) {
        $galeria=$this->galeria->find($id);
        if ($galeria->status == 'N') {
            $galeria->status = 'S';
        } else {
            $galeria->status = 'N';
        }

        $galeria->update();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/galeria');
    }
    
}
