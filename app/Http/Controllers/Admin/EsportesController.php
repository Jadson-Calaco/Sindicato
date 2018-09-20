<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipes;
use App\Models\Regulamento;
use App\Models\Eventos;
use Illuminate\Support\Facades\Input;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class EsportesController extends Controller
{
    public function equipe()
    {
        $equipes = Equipes::all();
        return view('painel.esportes.equipe')->with('equipes', $equipes);
    }

    public function storeEquipe(Request $request)
    {
                
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }

        $equipes = new Equipes;
        $equipes->nome = Input::get('nome');
        $equipes->banco = Input::get('banco');
        $equipes->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $equipes->user_id = $usuario;
        
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $equipes->status = $status;
        $equipes->imagem = "";
        $equipes->save();

        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/equipes/'. $equipes->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/equipes/'. $equipes->id.'/O_id_' . $equipes->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/equipes/'. $equipes->id.'/M_id_' . $equipes->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);
          
            $img = Image::make($filepath2)->resize(180, 180)->save($filepath2);

            $equipes->imagem = 'M_id_' . $equipes->id . '.' . $extensao;
            $equipes->save();
        }
       

        \Session::flash('message', 'Cadastrada com sucesso!');

        return redirect('admin/equipe');
        
    }
    public function editEquipe($id)
    {
        $equipes = Equipes::find($id);
        return view('painel.esportes.edit_equipe')->with('equipes', $equipes);
    }

    public function updateEquipe(Request $request, $id)
    {
        
        $equipes = Equipes::find($id);

        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }

        if ($equipes->nome != Input::get('nome')) {
            $equipes->nome = Input::get('nome');
        }

        if ($equipes->banco != Input::get('banco')) {
            $equipes->banco = Input::get('banco');
        }
        
        $equipes->dataModificacao = Input::get('data');
        $usuario = auth()->user()->id;
        $equipes->user_id = $usuario;

        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';

        if ($equipes->status != $status) {
            $equipes->status = $status;
        }

        $equipes->save();

        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/equipes/'. $equipes->id ;

            if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/equipes/'. $equipes->id.'/O_id_' . $equipes->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/equipes/'. $equipes->id.'/M_id_' . $equipes->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            $img = Image::make($filepath2)->resize(180, 180)->save($filepath2);

            $equipes->imagem = 'M_id_' . $equipes->id . '.' . $extensao;
            $equipes->save();
        }

        \Session::flash('message', 'Atualizada com sucesso!');

        return redirect('admin/equipe');
    }

    public function destroyEquipe($id)
    {
        $equipes = Equipes::find($id);
        File::delete(public_path() . $equipes->imagem);
        $equipes->delete();

        \Session::flash('message', 'Excluida com sucesso!');
        return redirect('admin/equipe');
    }
    
    public function mudarStatusEquipe($id) {
        $equipes = Equipes::find($id);

        if ($equipes->status == 'N') {
            $equipes->status = 'S';
        } else {
            $equipes->status = 'N';
        }

        $equipes->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/equipe');
    }

    public function regulamento() {
        $regulamento = Regulamento::all();
        return view('painel.esportes.regulamento')->with('regulamento', $regulamento);
    }
    
    public function storeRegulamento(Request $request)
    {
       $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $regulamento = new Regulamento;
        $regulamento->descricao = $request->descricao;
        $regulamento->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $regulamento->user_id = $usuario;
        $regulamento->save();
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/regulamento');
    }

    public function editRegulamento($id)
    {
        $regulamento = Regulamento::find($id);
        return view('painel.esportes.edit_regulamento')->with('regulamento', $regulamento);
    }

    public function updateRegulamento(Request $request, $id)
    {
        $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $regulamento = Regulamento::find($id);
        $regulamento->descricao = $request->descricao;
        $usuario = auth()->user()->id;
        $regulamento->user_id = $usuario;
        $regulamento->dataModificacao = Input::get('data');
        $regulamento->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/regulamento');
    }

    public function destroyRegulamento($id)
    {
         $regulamento = Regulamento::find($id);
         $regulamento->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/regulamento');
    }
    
    public function mudarStatusRegulamento($id) {
        $regulamento = Regulamento::find($id);

        if ($regulamento->status == 'N') {
            $regulamento->status = 'S';
        } else {
            $regulamento->status = 'N';
        }

        $regulamento->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/regulamento');
    }

    public function eventos() {
        $eventos = Eventos::all();
        return view('painel.esportes.eventos')->with('eventos', $eventos);
    }
    
    public function storeEventos(Request $request)
    {
       $this->validate($request, [
            'descricao' => 'required',           
        ]);

        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }
        
        $eventos = new Eventos;
        $eventos->nome = $request->nome;
        $eventos->descricao = $request->descricao;
        $eventos->data_eventos = $request->data_eventos;
        $eventos->hora_eventos = $request->hora_eventos;
        $eventos->local = $request->local;
        $eventos->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $eventos->user_id = $usuario;
        
        $destaque = Input::get('destaque');

        if ($destaque == '')
            $destaque = 'N';
        else
            $destaque = 'S';
        
        $eventos->destaque = $destaque;
        
        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';
        
        $eventos->status = $status;
        $eventos->imagem = "";
        $eventos->save();

        if (Input::file('imagem')) {
            
            $diretorio = public_path() . '/images/eventos/'. $eventos->id ;

            if (!file_exists($diretorio)){
                mkdir("$diretorio", 0700);
            }

            $filepath = public_path() . '/images/eventos/'. $eventos->id.'/O_ID_' . $eventos->id . '.' . $extensao;
            $filepath2 = public_path() . '/images/eventos/'. $eventos->id.'/M_ID_' . $eventos->id . '.' . $extensao;
            File::move($imagem,$filepath);
            copy($filepath, $filepath2);

            $img = Image::make($filepath2)->resize(848, 375)->save($filepath2);

            $eventos->imagem = 'M_ID_' . $eventos->id . '.' . $extensao;
            $eventos->save();
        }
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/eventos');
    }

    public function editEventos($id)
    {
        $eventos = Eventos::find($id);
        return view('painel.esportes.edit_eventos')->with('eventos', $eventos);
    }

    public function updateEventos(Request $request, $id)
    {
                
        $eventos = Eventos::find($id);
        $usuario = auth()->user()->id;
        $eventos->user_id = $usuario;
        $eventos->dataModificacao = Input::get('data');

        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo não é imagem');
            }
        }

        if ($eventos->nome != Input::get('nome')) {
            $eventos->nome = Input::get('nome');
        }

        if ($eventos->descricao != Input::get('descricao')) {
            $eventos->descricao = Input::get('descricao');
        }

        if ($eventos->data_eventos != Input::get('data_eventos')) {
            $eventos->data_eventos = Input::get('data_eventos');
        }

        if ($eventos->hora_eventos != Input::get('hora_eventos')) {
            $eventos->hora_eventos = Input::get('hora_eventos');
        }

         if ($eventos->local != Input::get('local')) {
            $eventos->local = Input::get('local');
        }

        $destaque = Input::get('destaque');

        if ($destaque == '')
            $destaque = 'N';
        else
            $destaque = 'S';

        if ($eventos->destaque != $destaque) {
            $eventos->destaque = $destaque;
        }

        $status = Input::get('status');

        if ($status == '')
            $status = 'N';
        else
            $status = 'S';

        if ($eventos->status != $status) {
            $eventos->status = $status;
        }

         $eventos->save();

        if (Input::file('imagem')) {
            $img = Input::file('imagem');
            if($img != null ){
                File::delete(public_path() . $eventos->imagem);
                $diretorio = public_path() . '/images/eventos/'. $eventos->id ;

                if (!file_exists($diretorio)){
                    mkdir("$diretorio", 0700);
                }

                $filepath = public_path() . '/images/eventos/'. $eventos->id.'/O_ID_' . $eventos->id . '.' . $extensao;
                $filepath2 = public_path() . '/images/eventos/'. $eventos->id.'/M_ID_' . $eventos->id . '.' . $extensao;
                File::move($imagem,$filepath);
                copy($filepath, $filepath2);

                $img = Image::make($filepath2)->resize(848, 375)->save($filepath2);

                $eventos->imagem = 'M_ID_' . $eventos->id . '.' . $extensao;
                $eventos->save();
            }
        }

        $eventos->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/eventos');
    }

    public function destroyEventos($id)
    {
         $eventos = Eventos::find($id);
         $eventos->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/eventos');
    }
    
    public function mudarStatusEventos($id) {
        $eventos = Eventos::find($id);

        if ($eventos->status == 'N') {
            $eventos->status = 'S';
        } else {
            $eventos->status = 'N';
        }

        $eventos->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/eventos');
    }
}
