<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sindicato;
use App\Models\Ouvidoria;
use App\Models\Assedio;
use App\Models\Socio;
use App\Models\Seguranca;
use Illuminate\Support\Facades\Input;
use PDF;
use View;
use Illuminate\Support\Facades\DB;

class SindicatoController extends Controller {


    public function estatuto() {
        return view('painel.estatuto.estatuto');
    }

    public function acordos() {
        return view('painel.acordos.index');
    }

    public function juridico() {
        return view('painel.juridico.juridico');
    }
    public function assedio() {
       // return view('painel.sindicato.juridico');
    }    

    public function index() {
        $sindicato = Sindicato::all();
        return view('painel.sindicato.sindicato')->with('sindicato', $sindicato);
    }
    
    public function store(Request $request)
    {
       $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $sindicato = new Sindicato;
        $sindicato->descricao = $request->descricao;
        $sindicato->dataCadastro = Input::get('data');
        $usuario = auth()->user()->id;
        $sindicato->user_id = $usuario;
        $sindicato->save();
     
        \Session::flash('message', 'Cadastrado com sucesso!');
         
        return redirect('admin/sindicato');
    }

    public function edit($id)
    {
        $sindicato = Sindicato::find($id);
        return view('painel.sindicato.edit_sindicato')->with('sindicato', $sindicato);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descricao' => 'required',           
        ]);
        
        $sindicato = Sindicato::find($id);
        $sindicato->descricao = $request->descricao;
        $usuario = auth()->user()->id;
        $sindicato->user_id = $usuario;
        $sindicato->dataModificacao = Input::get('data');
        $sindicato->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/sindicato');
    }

    public function destroy($id)
    {
         $sindicato = Sindicato::find($id);
         $sindicato->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/sindicato');
    }
    
    public function mudarStatus($id) {
        $sindicato = Sindicato::find($id);

        if ($sindicato->status == 'N') {
            $sindicato->status = 'S';
        } else {
            $sindicato->status = 'N';
        }

        $sindicato->save();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/sindicato');
    }

    public function indexOuvidoria()
    {
        $ouvidoria = Ouvidoria::all();
        return view('painel.ouvidoria.create_ouvidoria')->with('ouvidoria', $ouvidoria);
    }

    public function destroyOuvidoria($id)
    {
         $ouvidoria = Ouvidoria::find($id);
         $ouvidoria->delete();
         
         \Session::flash('message', 'Excluido com sucesso!');
         
         return redirect('admin/ouvidoria');
    }
    
    public function assedios()
    {
        $assedio = Assedio::all();
        return view('painel.assedio.assedios')->with('assedio', $assedio);
    }
    
    public function destroyAssedio($id)
    {
        $assedio = Assedio::find($id);
        $assedio->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/assedios');
    }
    
    public function socios()
    {
        $socio = Socio::all();
        return view('painel.socio.socios')->with('socio', $socio);
    }
    
    public function destroySocio($id)
    {
        $socio = Socio::find($id);
        $socio->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/associados');
    }
    
    public function gerarPdfSocio($id){
        
        $socio = Socio::find($id);
        $pdf = PDF::loadView('painel.socio.pdfimpresso', compact('socio',$socio));
        return $pdf->download('FichaAssocia.pdf');
       
    }
    
    public function segurancaBancaria() {
        $seguranca = DB::table('seguranca as s')
        ->selectRaw("s.id as id, s.banco as banco,s.cidade as cidade,s.ocorrencia as ocorrencia,DATE_FORMAT(s.dataOcorrido, '%d-%m-%Y') as dataOcorrido")
        ->orderBy('s.dataOcorrido','DESC')
        ->get();
        return view('painel.seguranca.create_seguranca')->with('seguranca', $seguranca);
    }
        
    public function storeSegurancaBancaria(Request $request)
    {
		$dataPartes = Input::get('dataOcorrido');
        $partes = explode("-", $dataPartes);
		$dia = $partes[0];
		$mes = $partes[1];
		$ano = $partes[2];        
		
        $seguranca = new Seguranca;
        $seguranca->descricao = $request->descricao;
        $seguranca->dataCadastro = Input::get('data');
        $seguranca->ocorrencia = $request->ocorrencia;
        $seguranca->banco = $request->banco;
        $seguranca->cidade = $request->cidade;
        $seguranca->dataOcorrido = $request->dataOcorrido;
		$seguranca->dia = $dia;
		$seguranca->mes = $mes;
		$seguranca->ano = $ano;
        $seguranca->save();
        
        \Session::flash('message', 'Cadastrado com sucesso!');
        
        return redirect('admin/seguranca-bancaria');
    }
    
    public function editSegurancaBancaria($id)
    {
        $seguranca = Seguranca::find($id);
		if( $seguranca->dataOcorrido == null){
			$dia = $seguranca->dia;
			if(strlen($dia) == 1){
				$dia = "0".$dia;
			}
			$mes = $seguranca->mes;
			if(strlen($mes) == 1){
				$mes = "0".$mes;
			}
			$ano = $seguranca->ano;
			$seguranca->dataOcorrido = $ano."-".$mes."-".$dia ;
			$seguranca->save();
		}
        return view('painel.seguranca.edit_seguranca')->with('seguranca', $seguranca);
    }
    
    public function updateSegurancaBancaria(Request $request, $id)
    {      
        $seguranca = Seguranca::find($id);
        $seguranca->descricao = $request->descricao;
        $seguranca->ocorrencia = $request->ocorrencia;
        $seguranca->banco = $request->banco;
        $seguranca->cidade = $request->cidade;
        $seguranca->dataOcorrido = $request->dataOcorrido;
        $seguranca->dataAtualizacao = Input::get('data');
		$dataPartes = Input::get('dataOcorrido');
        $partes = explode("-", $dataPartes);
		$dia = $partes[0];
		$mes = $partes[1];
		$ano = $partes[2];
		$seguranca->dia = $dia;
		$seguranca->mes = $mes;
		$seguranca->ano = $ano;
        $seguranca->save();
        
        \Session::flash('message', 'Atualizado com sucesso!');
        
        return redirect('admin/seguranca-bancaria');
    }
    
    public function destroySegurancaBancaria($id)
    {
        $seguranca = Seguranca::find($id);
        $seguranca->delete();
        
        \Session::flash('message', 'Excluido com sucesso!');
        
        return redirect('admin/seguranca-bancaria');
    }
    
    
    

}
