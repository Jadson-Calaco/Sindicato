<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     private $video;

   public function __construct(video $video){

    $this->video=$video;
   }
    public function index()
    {
        return view('painel.galerias.videos.create_videos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos=$this->video->all();
        $titulo="Cadastro";
        $video=null;
        date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
        return view('painel.galerias.videos.create_videos',compact('videos','titulo','video','dataAtual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $video =$this->video;
       $usuario = auth()->user()->id;
    
       $destaque=$request->input('destaque');
         if ($destaque == 'SIM')
            $destaque = 'SIM';
        else
            $destaque = 'NAO';
        
        $video->destaque = $destaque;
        $video->visitas = 0;
        $video->status = null;
        $video->nome = $request->input('nome');
        $video->html = $request->input('html');
        $video->descricao =$request->input('descricao');
        $video->data= $request->input('data'); 
        $video->dataCriacao= $request->input('dataAtual');   
        $video->dataAtualizacao= $request->input('dataAtual');   
        $video->user_id=$usuario;
          $status=$request->input('status');
            
            if ($status == '')
            $status = 'N';
            else
            $status = 'S';
        
           $video->status = $status;

        $video->save();
          $videos=$this->video->all();  
        $titulo="Edição";
         \Session::flash('message', 'videos cadastrado com sucesso!');
return redirect('admin/galeria/videos');    }

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
         $video=$this->video->find($id);
       $videos=$this->video->all();
       $titulo="Ediçao";
       date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
       return view('painel.galerias.videos.create_videos',compact('video','videos','titulo','dataAtual'));

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
       $videoAtual=$this->video->find($id);
       $destaque=$request->input('destaque');
         if ($destaque == 'SIM')
            $destaque = 'SIM';
        else
            $destaque = 'NAO';
        
        $videoAtual->destaque = $destaque;
        $videoAtual->nome = $request->input('nome');
        $videoAtual->html = $request->input('html');
        $videoAtual->descricao =$request->input('descricao');
        $videoAtual->data= $request->input('data'); 
        $videoAtual->dataAtualizacao= $request->input('dataAtual'); 
        $status=$request->input('status');
            if ($status == '')
            $status = 'N';
           else
            $status = 'S';

          if ($videoAtual->status != $status) {
            $videoAtual->status = $status;
          }

            $videoAtual->update();
       \Session::flash('message', 'video atualizado com sucesso!');
return redirect('admin/galeria/videos');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
          $videoAtual=$this->video->find($id);
        $videoAtual->delete();
        \Session::flash('message', 'video excluido com sucesso!');
        return redirect('admin/galeria/video');
    }


      public function mudarStatus($id) {
        $video= $this->video->find($id);

        if ($video->status == 'N') {
            $video->status = 'S';
        } else {
            $video->status = 'N';
        }

        $video->update();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/galeria/videos');
    }
}
