<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Diretoria;
use Illuminate\Support\Facades\Input;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class DiretoriaController extends Controller
{
    
    public function index() {
        $diretoria = Diretoria::all();
        return view('painel.diretoria.create_diretoria')->with('diretoria', $diretoria);
    }

    public function store(Request $request)
    {   
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }
        
        $diretoria= new Diretoria;
        $diretoria->nome = $request->nome;
        $diretoria->cargo  = $request->cargo ;
        $diretoria->email = $request->email;
        $diretoria->banco = $request->banco;
        $diretoria->telefone = $request->telefone;
        $diretoria->data1 = Input::get('data');
        $diretoria->visitas = $request->visitas;
        $diretoria->tipo = $request->tipo;
        $diretoria->ordem = $request->ordem;
        
        $status = Input::get('status');
        
        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $diretoria->status = $status;
        $diretoria->imagem = "";
        $usuario = auth()->user()->id;
        $diretoria->user_id = $usuario;
        $diretoria->save();
        
        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/diretoria/'. $diretoria->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/diretoria/'. $diretoria->id.'/O_id_' . $diretoria->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/diretoria/'. $diretoria->id.'/M_id_' . $diretoria->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            $img = Image::make($filepath2)->resize(180, 180)->save($filepath2);

            $diretoria->imagem = 'M_id_' . $diretoria->id . '.' . $extensao;
            $diretoria->save();
        }
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/diretoria');
    }

    public function edit($id)
    {
        $diretoria = Diretoria::find($id);
        return view('painel.diretoria.edit_diretoria')->with('diretoria', $diretoria);
    }

    public function update(Request $request, $id)
    {
                
        $diretoria = Diretoria::find($id);
        
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }
        
        $diretoria->nome = $request->nome;
        $diretoria->cargo  = $request->cargo ;
        $diretoria->email = $request->email;
        $diretoria->banco = $request->banco;
        $diretoria->telefone = $request->telefone;
        $diretoria->visitas = $request->visitas;
        $diretoria->tipo = $request->tipo;
        $diretoria->ordem = $request->ordem;
        
        $status = Input::get('status');
        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        if ($diretoria->status != $status) {
            $diretoria->status = $status;
        }
        $usuario = auth()->user()->id;
        $diretoria->user_id = $usuario;
        $diretoria->save();
        
        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/diretoria/'. $diretoria->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/diretoria/'. $diretoria->id.'/O_id_' . $diretoria->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/diretoria/'. $diretoria->id.'/M_id_' . $diretoria->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            $img = Image::make($filepath2)->resize(180, 180)->save($filepath2);

            $diretoria->imagem = 'M_id_' . $diretoria->id . '.' . $extensao;
            $diretoria->save();
        }
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/diretoria');
    }

    public function destroy($id)
    {
         $diretoria = Diretoria::find($id);
         File::delete(public_path() . $diretoria->imagem);
         $diretoria->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/diretoria');
    }
    
    public function mudarStatus($id) {
        $diretoria = Diretoria::find($id);

        if ($diretoria->status == 'N') {
            $diretoria->status = 'S';
        } else {
            $diretoria->status = 'N';
        }

        $diretoria->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/diretoria');
    }
}
