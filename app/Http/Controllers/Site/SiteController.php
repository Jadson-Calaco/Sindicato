<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Noticias;
use App\Models\Contato;
use Mail;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function teste() {
        return view('vendor.laravel-filemanager.demo');
    }
    
    public function index()
    {
        
        $title = "Sindicato dos Bancários do Piauí ::SEEBF-PI";
        //slide de noticias
        $slide = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(6);
        //destaques laterais
        $destaques = DB::table('noticias')->where('status','S')
        ->where('destaque_FS','S')
        ->orderBy('data','DESC')->paginate(4);
        //noticias para parte de baixo
        $noticias = Noticias::where('status','S')
        ->where( 'destaque','N')
        ->where( 'destaque_FS','N')
        ->orderBy('data','DESC')->paginate(6);
        
        //SERVIÇOS
        $servicos = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(2);
        
        
        //INFORMATICOS/REVISTAS
        $informativos = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(2);
        
        //VIDEOS
        $videos = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(2);
        //FOTOS
        $fotos = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(2);
        
        //CONVENIOS
        $convenios = DB::table('convenios')->where('status','S')
        ->orderBy('datacreate','DESC')->paginate(10);
        //MENUS PRINCIPAIS
        $menus = DB::table('noticias')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data','DESC')->paginate(2);
        
        //AGENDA DE EVENTOS
        $agendas = DB::table('agendas')->where('status','S')
        ->where('destaque','S')
        ->orderBy('data1','DESC')->get();
        
        return view('site.home.home')
        ->with('slide',$slide)
        ->with('servicos',$servicos)
        ->with('informativos',$informativos)
        ->with('videos',$videos)
        ->with('fotos',$fotos)
        ->with('convenios',$convenios)
        ->with('noticias',$noticias)
        ->with('destaques',$destaques)
        ->with('agendas',$agendas);
        
    }
    
    //PAGINA DA DIRETORIA
    public function diretoria(){
        $pag = "A Diretoria";
        //PAGINA DE DIRETORIA
        $diretoria = DB::table('diretoria')->where('status','S')
        ->orderBy('ordem','ASC')->get();
        //dd($diretoria);
        return view('site.home.diretoria',['diretoria'=>$diretoria]);
    }
    //PAGINA DO SINDICAOT-QUEM SOMOS
    public function sindicato(){
        $pag = "O Sindicato";
        $sindicato =DB::table('sindicato')->get();
        // dd($sindicato);
        return view('site.home.sindicato',compact('sindicato','pag',$sindicato,$pag));
    }
    
    //PAGINA DO ESTATUTO
    public function estatuto(){
        $pag = "O Estatuto";
        $estatuto = DB::table('estatuto')->get();
        return view('site.home.estatuto',compact('estatuto','pag',$estatuto,$pag));
    }
    //PAGINA DE ASSOCIE-SE
    public function associe(){
        $pag = "Associe-se";
        return view('site.home.associe',compact('pag',$pag));
    }
    //PAGINA DE CONTATO
    public function contato(){
        $pag = "Contato";
        return view('site.home.contato',compact('pag',$pag));
    }
    
    public function storeContato(Request $request){
        
        $contato = new Contato;
        $contato->nome = $request->cf_name;
        $contato->email = $request->cf_email;
        $contato->assunto = $request->cf_subject;
        $contato->mensagem = $request->cf_message;
        $contato->dataMensagem = Input::get('data');
        $contato->save();
        
        $data = array(
            'nome' => $request->cf_name,
            'email' => $request->cf_email,
            'mensagem' => $request->cf_message,
            'assunto' => $request->cf_subject,
        );
        
        Mail::send('site.contato.email', $data, function($message)  use ($data){
            
            $message->from($data['email'],$data['nome']);
            $message->to('desenvolverdor.ideias@gmail.com')->subject('Contato - '.$data['assunto']);
            
        });
            
            \Session::flash('message', 'Cadastrado com sucesso!');
            
            $pag = "Contato";
            return view('site.home.contato',compact('pag',$pag));
    }
    
    //PAGINA DO NOSSO ALBERGUE
    public function albergue() {
        $pag="Nosso Albergue";
        $albergue = DB::table('albergue')->get();
        return view('site.home.albergue',compact('albergue','pag',$albergue,$pag));
    }
    public function auditorio(){
        $pag = "Nosso Auditorio";
        return view('site.home.auditorio',compact('pag',$pag));
    }
    //ATENDIMENTOS SETOR JURIDICO
    public function atendimentos(){
        $pag = "Atendimentos Juridico";
        //$atendimentos = ;
        return view('site.home.atendimentos_juridico',compact('pag',$pag));
    }
    
    //AGENDA CULTURAL
    public function agenda(){
        $pag = "Agenda Cultural";
        
        $agendas = DB::table('agendas')
        ->where('status','S')
        ->orderBy('data1','DESC')->paginate(12);
        
        return view('site.home.agenda_cultural.agenda',compact('agendas','pag',$agendas,$pag));
    }
    
    public function convenios(){
        
        $pag = "Convênios";
        
        $convenios = DB::table('convenios')->where('status','S')
        ->orderBy('datacreate','DESC')->paginate(10);
        
        $tipos = DB::table('convenios')->select('tipo_convenio')->distinct()->get();
        
        return view('site.home.convenios',compact('convenios','pag','tipos',$convenios,$pag,$tipos));
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
