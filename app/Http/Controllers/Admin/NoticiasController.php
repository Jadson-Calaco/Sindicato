<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use File;
use App\Models\Noticias;
use App\Models\Categorias;
use App\Models\Bancos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use \Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{
    
    public function noticias()
    {
        $noticias = DB::table('noticias')->orderBy('data','DESC')->get();
        $categorias = Categorias::all();
        $bancos = Bancos::all();
        return view('painel.noticias.create_noticias', compact('categorias','bancos'))->with('noticias', $noticias);
    }
    
    public function index()
    {
        $noticias = Noticias::all();
        return view('painel.noticias.index_noticias')->with('noticias', $noticias);
    }
    
    public function criar_noticia(Request $request)
    {
        
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }
        
        $usuario = auth()->user()->id;
        
        $noticia = new Noticias;
        $noticia->titulo = Input::get('titulo');
        $noticia->subtitulo = Input::get('subtitulo');
        $noticia->categoria_id = Input::get('categoria');
        $noticia->banco_id = Input::get('banco');
        $noticia->user_id = $usuario;
        $noticia->creditos_fotos = Input::get('fotografo');
        $noticia->fonte = Input::get('fonte');
        $noticia->data = Input::get('data');
        $noticia->tags = Input::get('tag');
        $noticia->texto = Input::get('texto');
        
        $destaque = Input::get('destaque');
        
        if ($destaque == '')
            $destaque = 'N';
            else
                $destaque = 'S';
                
                $noticia->destaque = $destaque;
                
                $destaque_FS = Input::get('destaque_FS');
                
                if ($destaque_FS == '')
                    $destaque_FS = 'N';
                    else
                        $destaque_FS = 'S';
                        
                        $noticia->destaque_FS = $destaque_FS;
                        
                        $status = Input::get('status');
                        
                        if ($status == '')
                            $status = 'N';
                            else
                                $status = 'S';
                                
                                $noticia->status = $status;
                                $noticia->foto = "";
                                $noticia->save();
                                
                                if (Input::file('imagem')) {
                                    
                                    $diretorio = public_path() . '/images/noticias/'. $noticia->id ;
                                    
                                    if (!file_exists($diretorio)){
                                        mkdir("$diretorio", 0700);
                                    }
                                    
                                    $filepath = public_path() . '/images/noticias/'. $noticia->id.'/O_ID_' . $noticia->id . '.' . $extensao;
                                    $filepath2 = public_path() . '/images/noticias/'. $noticia->id.'/M_ID_' . $noticia->id . '.' . $extensao;
                                    File::move($imagem,$filepath);
                                    copy($filepath, $filepath2);
                                    
                                    $img = Image::make($filepath2)->resize(640, 427)->save($filepath2);
                                    
                                    $noticia->foto = 'M_ID_' . $noticia->id . '.' . $extensao;
                                    $noticia->save();
                                }
                                
                                
                                \Session::flash('message', 'Noticia cadastrada com sucesso!');
                                
                                return redirect('admin/noticias');
                                
    }
    public function edit($id)
    {
        $noticia = Noticias::find($id);
        $categorias = Categorias::all();
        $bancos = Bancos::all();
        return view('painel.noticias.edit_noticias', compact('categorias','bancos'))->with('noticia', $noticia);
    }
    
    public function update(Request $request, $id)
    {
        
        
        $noticia = Noticias::find($id);
        $noticia->data2 = Input::get('data2');
        
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }
        
        if ($noticia->titulo != Input::get('titulo')) {
            $noticia->titulo = Input::get('titulo');
        }
        
        if ($noticia->subtitulo != Input::get('subtitulo')) {
            $noticia->subtitulo = Input::get('subtitulo');
        }
        
        if ($noticia->texto != Input::get('texto')) {
            $noticia->texto = Input::get('texto');
        }
        
        if ($noticia->banco_id != Input::get('banco')) {
            $noticia->banco_id = Input::get('banco');
        }
        
        if ($noticia->tags != Input::get('tag')) {
            $noticia->tags = Input::get('tag');
        }
        
        if ($noticia->categoria_id != Input::get('categoria')) {
            $noticia->categoria_id = Input::get('categoria');
        }
        
        $destaque = Input::get('destaque');
        
        if ($destaque == '')
            $destaque = 'N';
            else
                $destaque = 'S';
                
                if ($noticia->destaque != $destaque) {
                    $noticia->destaque = $destaque;
                }
                
                $destaque_FS = Input::get('destaque_FS');
                
                if ($destaque_FS == '')
                    $destaque_FS = 'N';
                    else
                        $destaque_FS = 'S';
                        
                        if ($noticia->destaque_FS != $destaque_FS) {
                            $noticia->destaque_FS = $destaque_FS;
                        }
                        
                        $status = Input::get('status');
                        
                        if ($status == '')
                            $status = 'N';
                            else
                                $status = 'S';
                                
                                if ($noticia->status != $status) {
                                    $noticia->status = $status;
                                }
                                
                                $noticia->data2 = Input::get('data');
                                $noticia->save();
                                
                                if (Input::file('imagem')) {
                                    $img = Input::file('imagem');
                                    if($img != null ){
                                        File::delete(public_path() . $noticia->imagem);
                                        $diretorio = public_path() . '/images/noticias/'. $noticia->id ;
                                        
                                        if (!file_exists($diretorio)){
                                            mkdir("$diretorio", 0700);
                                        }
                                        
                                        $filepath = public_path() . '/images/noticias/'. $noticia->id.'/O_ID_' . $noticia->id . '.' . $extensao;
                                        $filepath2 = public_path() . '/images/noticias/'. $noticia->id.'/M_ID_' . $noticia->id . '.' . $extensao;
                                        File::move($imagem,$filepath);
                                        copy($filepath, $filepath2);
                                        
                                        $img = Image::make($filepath2)->resize(640, 427)->save($filepath2);
                                        
                                        $noticia->foto = 'M_ID_' . $noticia->id . '.' . $extensao;
                                        $noticia->save();
                                    }
                                }
                                
                                
                                \Session::flash('message', 'Noticia atualizada com sucesso!');
                                
                                return redirect('admin/noticias');
    }
    
    public function destroy($id)
    {
        $noticia = Noticias::find($id);
        File::delete(public_path() . $noticia->foto);
        $noticia->delete();
        
        \Session::flash('message', 'Noticia excluida com sucesso!');
        return redirect('admin/noticias');
    }
    
    public function mudarStatus($id) {
        $noticia = Noticias::find($id);
        
        if ($noticia->status == 'N') {
            $noticia->status = 'S';
        } else {
            $noticia->status = 'N';
        }
        
        $noticia->save();
        
        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/noticias');
    }
    
    public function show($id){
        
        $noticia = Noticias::find($id);
        return view('painel.noticias.show_noticias')->with('noticia', $noticia);
    }
}
