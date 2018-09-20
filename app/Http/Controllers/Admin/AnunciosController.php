<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anuncios;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use \Illuminate\Support\Facades\DB;

class AnunciosController extends Controller
{
    public function index()
    {
        $anuncios = Anuncios::all();
        return view('painel.anuncios.anuncios')->with('anuncios', $anuncios);
    }

    public function store(Request $request)
    {
                
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'gif' ) {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }

        $anuncios = new Anuncios;
        $anuncios->tipo = $extensao;
        $anuncios->local = Input::get('local');
        $anuncios->nome = Input::get('nome');
        $anuncios->link = Input::get('link');
        $anuncios->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $anuncios->user_id = $usuario;
        
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $anuncios->status = $status;
        $anuncios->imagem = "";
        $anuncios->save();

        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/anuncios/'. $anuncios->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/anuncios/'. $anuncios->id.'/O_id_' . $anuncios->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/anuncios/'. $anuncios->id.'/M_id_' . $anuncios->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            $anuncios->local = Input::get('local');
            
             if ($anuncios == 'Rodape(130x50)')
              $img = Image::make($filepath2)->resize(130, 50)->save($filepath2);
             else
              $img = Image::make($filepath2)->resize(200, 50)->save($filepath2);

            $anuncios->imagem = 'M_id_' . $anuncios->id . '.' . $extensao;
            $anuncios->save();
        }
       

        \Session::flash('message', 'anuncios cadastrada com sucesso!');

        return redirect('admin/anuncios');
        
    }
    public function edit($id)
    {
        $anuncios = Anuncios::find($id);
        return view('painel.anuncios.edit_anuncios')->with('anuncios', $anuncios);
    }

    public function update(Request $request, $id)
    {
        
        $anuncios = Anuncios::find($id);

        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'gif') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }else {
                
                if ($anuncios->tipo != $extensao) {
                    $anuncios->tipo = $extensao;
                }
            }
        }
        

        if ($anuncios->local != Input::get('local')) {
            $anuncios->local = Input::get('local');
        }

        if ($anuncios->nome != Input::get('nome')) {
            $anuncios->nome = Input::get('nome');
        }

        if ($anuncios->link != Input::get('link')) {
            $anuncios->link = Input::get('link');
        }
        
        $anuncios->dataModificacao = Input::get('data');
        $usuario = auth()->user()->id;
        $anuncios->user_id = $usuario;

        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';

        if ($anuncios->status != $status) {
            $anuncios->status = $status;
        }

        $anuncios->save();

        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/anuncios/'. $anuncios->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/anuncios/'. $anuncios->id.'/O_id_' . $anuncios->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/anuncios/'. $anuncios->id.'/M_id_' . $anuncios->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            if ($anuncios == 'Rodape(130x50)')
              $img = Image::make($filepath2)->resize(130, 50)->save($filepath2);
             else
              $img = Image::make($filepath2)->resize(200, 50)->save($filepath2);

            $anuncios->imagem = 'M_id_' . $anuncios->id . '.' . $extensao;
            $anuncios->save();
        }

        \Session::flash('message', 'anuncios atualizada com sucesso!');

        return redirect('admin/anuncios');
    }

    public function destroy($id)
    {
        $anuncios = Anuncios::find($id);
        File::delete(public_path() . $anuncios->imagem);
        $anuncios->delete();

        \Session::flash('message', 'anuncios excluida com sucesso!');
        return redirect('admin/anuncios');
    }
    
    public function mudarStatus($id) {
        $anuncios = Anuncios::find($id);

        if ($anuncios->status == 'N') {
            $anuncios->status = 'S';
        } else {
            $anuncios->status = 'N';
        }

        $anuncios->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/anuncios');
    }
}
