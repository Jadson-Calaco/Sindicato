<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Video;
use App\Models\Foto;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $galeria;
    private $foto;
    private $video;
    
    
    public function __construct(Galeria $galeria,Foto $foto,Video $video){
        
        $this->galeria=$galeria;
        $this->foto=$foto;
        $this->video=$video;
        
    }
    public function getGalerias()
    {
        $galerias=$this->galeria->all();
        return view('site.home.galerias.galerias',compact('galerias'));
    }
    
    public function getVideos()
    {
        $videos=$this->video->all();
        return view('site.home.galerias.galeria_videos',compact('videos'));
    }
    
    public function getFotos($idGaleria)
    {
        $fotos=$this->foto->getFotos($idGaleria);
        $galeria=$this->galeria->find($idGaleria);
        $titulo=$galeria->nome;
        return view('site.home.galerias.galeria_fotos',compact('fotos','titulo'));
    }
    
}
