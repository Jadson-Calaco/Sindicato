<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Convenios;
use Illuminate\Support\Facades\Input;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use \Illuminate\Support\Facades\DB;

class ConveniosController extends Controller
{
    
    public function index() {
        $convenios = Convenios::all();
        return view('painel.convenios.create_convenios')->with('convenios', $convenios);
    }
    
    public function store(Request $request)
    {
        
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo nÃ£o Ã© imagem');
            }
        }
        
        $convenios= new Convenios;
        $convenios->tipo_convenio = $request->c_tipo;
        $convenios->validade  = $request->c_validade ;
        $convenios->valor_desconto = $request->c_desconto;
        $convenios->nome_empresa  = $request->c_empresa;
        $convenios->endereco = $request->c_endereco;
        $convenios->cidade  = $request->c_abrangencia;
        $convenios->contato = $request->c_contato;
        $convenios->site  = $request->c_site;
        $convenios->descricao = $request->descricao;
        $convenios->datacreate = Input::get('data');
        
        $status = Input::get('status');
        
        if ($status == ' ')
            $status = 'N';
            else
                $status = 'S';
                
                $convenios->status = $status;
                $convenios->imagem = "";
                $usuario = auth()->user()->id;
                $convenios->user_id = $usuario;
                $convenios->save();
                
                if (Input::file('imagem')) {
                    
                    $diretorio = public_path() . '/images/convenios/'. $convenios->id ;
                    
                    if (!file_exists($diretorio)){
                        mkdir("$diretorio", 0700);
                    }
                    
                    $filepath = public_path() . '/images/convenios/'. $convenios->id.'/O_id_' . $convenios->id . '.' . $extensao;
                    $filepath2 = public_path() . '/images/convenios/'. $convenios->id.'/M_id_' . $convenios->id . '.' . $extensao;
                    File::move($imagem,$filepath);
                    copy($filepath, $filepath2);
                    
                    $img = Image::make($filepath2)->resize(242,242)->save($filepath2);
                    
                    $convenios->imagem = 'M_id_' . $convenios->id . '.' . $extensao;
                    $convenios->save();
                }
                
                \Session::flash('message', 'Cadastrado com sucesso!');
                
                return redirect('admin/convenio');
    }
    
    public function edit($id)
    {
        $convenios = Convenios::find($id);
        return view('painel.convenios.edit_convenios')->with('convenios', $convenios);
    }
    
    public function update(Request $request, $id)
    {
        
        $convenios = Convenios::find($id);
        $convenios->data_update = Input::get('data');;
        
        if (Input::file('imagem')) {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if ($extensao != 'jpg' && $extensao != 'png') {
                return back()->with('erro', 'Erro: Este arquivo nÃ£o Ã© imagem');
            }
        }
        
        if ($convenios->tipo_convenio != Input::get('c_tipo')) {
            $convenios->tipo_convenio = Input::get('c_tipo');
        }
        
        if ($convenios->validade != Input::get('c_validade')) {
            $convenios->validade = Input::get('c_validade');
        }
        
        if ($convenios->valor_desconto != Input::get('c_desconto')) {
            $convenios->valor_desconto = Input::get('c_desconto');
        }
        
        if ($convenios->nome_empresa != Input::get('c_empresa')) {
            $convenios->nome_empresa = Input::get('c_empresa');
        }
        
        if ($convenios->endereco != Input::get('c_endereco')) {
            $convenios->endereco = Input::get('c_endereco');
        }
        
        if ($convenios->cidade != Input::get('c_abrangencia')) {
            $convenios->cidade = Input::get('c_abrangencia');
        }
        
        if ($convenios->contato != Input::get('c_contato')) {
            $convenios->contato = Input::get('c_contato');
        }
        
        if ($convenios->site != Input::get('c_site')) {
            $convenios->site = Input::get('c_site');
        }
        
        if ($convenios->descricao != Input::get('descricao')) {
            $convenios->descricao = Input::get('descricao');
        }
        
        $status = Input::get('status');
        if ($status == '')
            $status = 'N';
            else
                $status = 'S';
                
                if ($convenios->status != $status) {
                    $convenios->status = $status;
                }
                
                $usuario = auth()->user()->id;
                $convenios->user_id = $usuario;
                $convenios->save();
                
                if (Input::file('imagem')) {
                    
                    $diretorio = public_path() . '/images/convenios/'. $convenios->id ;
                    
                    if (!file_exists($diretorio)){
                        mkdir("$diretorio", 0700);
                    }
                    
                    $filepath = public_path() . '/images/convenios/'. $convenios->id.'/O_id_' . $convenios->id . '.' . $extensao;
                    $filepath2 = public_path() . '/images/convenios/'. $convenios->id.'/M_id_' . $convenios->id . '.' . $extensao;
                    File::move($imagem,$filepath);
                    copy($filepath, $filepath2);
                    
                    $img = Image::make($filepath2)->resize(242,242)->save($filepath2);
                    
                    $convenios->imagem = 'M_id_' . $convenios->id . '.' . $extensao;
                    $convenios->save();
                }
                
                \Session::flash('message', 'Atualizado com sucesso!');
                
                return redirect('admin/convenio');
    }
    
    public function destroy($id)
    {
        $convenios = Convenios::find($id);
        File::delete(public_path() . $convenios->imagem);
        $convenios->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/convenio');
    }
    
    public function mudarStatus($id) {
        $convenios = Convenios::find($id);
        
        if ($convenios->status == 'N') {
            $convenios->status = 'S';
        } else {
            $convenios->status = 'N';
        }
        
        $convenios->save();
        
        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/convenio');
    }
}
