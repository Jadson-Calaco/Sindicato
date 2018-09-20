<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Noticias;
use App\Models\Categorias;
use Cache;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*02/02/2018 - listagem de todas as noticias  em geral*/
    public function index()/*noticias em geral*/
    {
        //return view('site.home.home',compact('pag',$pag));
    }
    
    /*VER NOTIICAS*/
    public function ver_noticia($id,$titulo){
        $noticias = DB::table('noticias')->where('id',$id)->get();
        
        $noticia = Noticias::find($id);
        
        if(Cache::has($id)==false)
        {
            Cache::add($id,'contador',0.30);
            $noticia->visitas+=1;
            $noticia->save();
        }
        
        $destaques = DB::table('noticias')
        ->where('status','S')
        ->where('tags','like', '%' . $noticia->tags . '%')
        ->where('id', '<>', $noticia->id)
        ->orderBy('data','DESC')->paginate(4);
                
        return view('site.home.noticias.exibe',['noticias'=>$noticias,'pag'=>$titulo,'destaques'=>$destaques]);
    }
    
    /*07/02/2018 pagina de busca do site*/
    public function search(Request $request){
        $pag = Input::get('search');
        if(!empty($pag)){
            
        }
        
        $noticias = Noticias::where('titulo','like',"%{$pag}%")
        ->orderBy('data','desc')->simplePaginate(10);
        $categorias = Categorias::all();
        
        return view('site.home.search',['noticias'=>$noticias],compact('categorias','pag',$pag));
    }
    
    /*07/02/2018 busca no site geral*/
    /*07/02/2018 LISTAGEM GERAL DAS NOTICIAS*/
    public function geral() /*noticias em geral*/
    {
        
        $noticias = Noticias::orderBy('data','desc')->paginate(21);
        $categorias = Categorias::all();
        $pag = "Noticias Gerais";
        //dd($noticias);
        return view('site.home.noticias.noticias_geral',['noticias'=>$noticias],compact('categorias','pag',$pag));
    }
    
    /*02/02/2018 - listagem de noticias somente nacionais*/
    public function nacionais()/*noticias*/
    {
        $pag = "Noticias Nacionais";
        $noticias = DB::table('noticias')
        ->where('status','S')
        ->where('categoria_id','2')
        ->orderBy('data','desc')->paginate(12);
        
        return view('site.home.noticias.noticias_nacionais',compact('pag',$pag))->with('noticias',$noticias);
    }
    /*02/02/2018 - listagem de noticias somente as locais*/
    public function local()/*noticias em geral*/
    {
        $pag = "Noticias Locais";
        $noticias = DB::table('noticias')
        ->where('status','S')
        ->where('categoria_id','1')
        ->orderBy('data','desc')->paginate(12);
        
        return view('site.home.noticias.noticias_locais',compact('pag',$pag))->with('noticias',$noticias);
    }
    /*02/02/2018 - listagem de noticias somente as de esportes*/
    public function esporte()/*noticias em geral*/
    {
        $pag = "Noticias Esporte";
        $noticias = DB::table('noticias')
        ->where('status','S')
        ->where('categoria_id','4')
        ->orderBy('data','desc')->paginate(12);
        
        return view('site.home.noticias.noticias_esportiva',compact('pag',$pag))->with('noticias',$noticias);
    }
    /*02/02/2018 - listagem de noticias somente os eventos em geral*/
    public function eventos()/*noticias em geral*/
    {
        $pag = "Eventos";
        $eventos = DB::table('eventos')
        ->where('status','S')
        ->orderBy('dataCadastro','desc')->paginate(9);
        
        return view('site.home.noticias.eventos',compact('pag',$pag))->with('eventos',$eventos);
        
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
        //
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
