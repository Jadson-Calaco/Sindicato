<?php
namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Periodo;
use Illuminate\Support\Facades\Input;
use Validator;

class ColoniaController extends Controller
{
    
    public function index()
    {
        $periodo = DB::table('coloniadeferias_pre')->where('status', 'S')
        ->limit(1)
        ->get();
        $periodo2 = DB::table('coloniadeferias_pre')->where('status', 'S')
        ->limit(1)
        ->get();
        $colonia = DB::table('coloniaferias')
        ->join('coloniadeferias_pre', 'periodo_id', '=', 'coloniadeferias_pre.id')
        ->select('coloniadeferias_pre.nome as periodo', 'coloniaferias.semana', 'coloniaferias.nome', 'coloniaferias.matricula', 'coloniaferias.banco')
        ->orderBy('coloniadeferias_pre.nome','ASC')
        ->orderBy('coloniaferias.semana','ASC')
        ->orderBy('coloniaferias.nome','ASC')
        ->get();
        
        return view('colonia_ferias.create_colonia', compact('periodo', 'periodo2'))->with('colonia', $colonia);
    }
    
    public function store(Request $request)
    {
        //|captcha
        $request->validate([
            'g-recaptcha-response' => 'required'
        ]);
        
        $dadosColonia = DB::table('coloniaferias')->where('cpf', $request->cpf)->first();
        
        if (DB::table('coloniaferias')->where('cpf', $request->cpf)->count() == 0) {
            
            $periodo2 = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->first();
            
            $colonia = new Colonia();
            $colonia->periodo_id = $periodo2->id;
            $colonia->semana = $request->semana;
            $colonia->regional = $request->regional;
            $colonia->nome = $request->nome;
            $colonia->cpf = $request->cpf;
            $colonia->matricula = $request->matricula;
            $colonia->banco = $request->banco;
            $colonia->agencia = $request->agencia;
            $colonia->telefone = $request->telefone;
            $colonia->dataCadastro = Input::get('data');
            $colonia->save();
            
            \Session::flash('message', 'Cadastrado com sucesso!');
            
            $periodo = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->get();
            
            $periodo2 = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->get();
            
            $colonia = DB::table('coloniaferias')
            ->join('coloniadeferias_pre', 'periodo_id', '=', 'coloniadeferias_pre.id')
            ->select('coloniadeferias_pre.nome as periodo', 'coloniaferias.semana', 'coloniaferias.nome', 'coloniaferias.matricula', 'coloniaferias.banco')
            ->orderBy('coloniadeferias_pre.nome','ASC')
            ->orderBy('coloniaferias.semana','ASC')
            ->orderBy('coloniaferias.nome','ASC')
            ->get();
            
            return view('colonia_ferias.create_colonia', compact('periodo', 'periodo2'))->with('colonia', $colonia);
            
        } else {
            
            $periodo2 = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->first();
            
            $colonia = Colonia::find($dadosColonia->id);
            
            $colonia->periodo_id = $periodo2->id;
            
            if ($colonia->semana != Input::get('semana')) {
                $colonia->semana = Input::get('semana');
            }
            
            if ($colonia->banco != Input::get('banco')) {
                $colonia->banco = Input::get('banco');
            }
            
            if ($colonia->agencia != Input::get('agencia')) {
                $colonia->agencia = Input::get('agencia');
            }
            
            if ($colonia->telefone != Input::get('telefone')) {
                $colonia->telefone = Input::get('telefone');
            }
            
            if ($colonia->regional != Input::get('regional')) {
                $colonia->regional = Input::get('regional');
            }
            
            /*
             if ($colonia->nome != Input::get('nome')) {
             $colonia->nome = Input::get('nome');
             }
             
             if ($colonia->matricula != Input::get('matricula')) {
             $colonia->matricula = Input::get('matricula');
             }
             */
            
            $colonia->dataCadastro = Input::get('data');
            
            $colonia->save();
            
            \Session::flash('message', 'Cadastrado com sucesso!');
            
            $periodo = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->get();
            
            $periodo2 = DB::table('coloniadeferias_pre')->where('status', 'S')
            ->limit(1)
            ->get();
            
            $colonia = DB::table('coloniaferias')
            ->join('coloniadeferias_pre', 'periodo_id', '=', 'coloniadeferias_pre.id')
            ->select('coloniadeferias_pre.nome as periodo', 'coloniaferias.semana', 'coloniaferias.nome', 'coloniaferias.matricula', 'coloniaferias.banco')
            ->orderBy('coloniadeferias_pre.nome','ASC')
            ->orderBy('coloniaferias.semana','ASC')
            ->orderBy('coloniaferias.nome','ASC')
            ->get();
            
            return view('colonia_ferias.create_colonia', compact('periodo', 'periodo2'))->with('colonia', $colonia);
        }
    }
    
    public function buscarDados(Request $request)
    {
        $cpf= $request->input('cpf');;
        $dados = DB::table('coloniaferias')->where('cpf', $cpf)->first();
        return response()->json($dados);
    }
}
