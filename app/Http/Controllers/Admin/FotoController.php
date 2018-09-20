<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Foto;



class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    private $galeria;
    private $foto;
    
    public function __construct(Galeria $galeria,Foto $foto){
        
        $this->galeria=$galeria;
        $this->foto=$foto;
        
    }
    
    
    public function index($id)
    {
        $galeria=$this->galeria->find($id);
        $idGaleria=$galeria->id;
        date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"Y/m/d");
        $fotos=$this->foto->getFotos($idGaleria);
        return view('painel.galerias.fotos.create_fotos',compact('idGaleria','dataAtual','fotos'));
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
        $usuario = auth()->user()->id;
        $file=$request->file('file');
        $idGaleria=$request->input('idGaleria');
        $galeria=$this->galeria->find($idGaleria);
        $fileName=uniqid().$file->getClientOriginalName();
        
        $galeriaNome=chop( $galeria->nome," ");
        $file->move(public_path('images/galerias/'.$galeriaNome),$fileName);
        
        $foto=$this->foto;
        $foto->galeria_id=$idGaleria;
        $foto->user_id=$usuario;
        $foto->descricao=$file->getClientOriginalName();
        $foto->dataCriacao=$request->input('dataAtual');
        $foto->dataAtualizacao=$request->input('dataAtual');
        $foto->foto='images/galerias/'.$galeria->nome.'/'.$fileName;
        
        $foto->save();
        
        return $foto;
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
        
        $fotoAtual=$this->foto->find($id);
        File::delete(public_path() . $fotoAtual->arquivo0);
        $fotoAtual->delete();
    }
    
    public function fotoCapa($idFoto){
        $idGaleria=$request->input('idGaleria');
        $galeria=$this->galeria->find($idGaleria);
        $fotoAtual=$this->foto->find($idFoto);
        
        $galeria->foto=$fotoAtual->foto;
        $galeria->update();
        
    }
}
