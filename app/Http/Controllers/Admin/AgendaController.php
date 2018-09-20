<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $agenda;
    
    public function __construct(Agenda $agenda) {
       $this->agenda=$agenda;
    }
    
    public function index()
    {
        return view('painel.agendas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agendas=$this->agenda->all();
        $titulo="Cadastro";
        $agenda=null;
         date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"d/m/Y");
        return view('painel.agendas.create_agenda',compact('agendas','titulo','agenda','dataAtual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
         $usuario = auth()->user()->id;
         $this->agenda->nome=$request->input("nome");
         $this->agenda->descricao=$request->input("descricao");
         $this->agenda->data1=$request->input("data1");
         $this->agenda->local=$request->input("local");
         $this->agenda->hora=$request->input("hora");
         $this->agenda->dataCriacao=$request->input('dataAtual');
         $this->agenda->dataAtualizacao=$request->input('dataAtual');
         $this->agenda->user_id=$usuario;
         $status=$request->input('status');
            
            if ($status == '')
            $status = 'N';
            else
            $status = 'S';
        
           $this->agenda->status = $status;
         $this->agenda->save();
        
         \Session::flash('message', 'Agenda cadastrada com sucesso!');
        return redirect('admin/agendas');
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
        date_default_timezone_set("America/Recife");
        $date=date_create();
        $dataAtual=date_format($date,"d/m/Y");
        $agenda=$this->agenda->find($id);
        $agendas=$this->agenda->all();
        $titulo="Edicao";
      return view('painel.agendas.create_agenda',compact('agenda','agendas','titulo','dataAtual'));
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
         $agendaAtual=$this->agenda->find($id);
         $usuario = auth()->user()->id;
         $agendaAtual->nome=$request->input("nome");
         $agendaAtual->descricao=$request->input("descricao");
         $agendaAtual->data1=$request->input("data1");
         $agendaAtual->local=$request->input("local");
         $agendaAtual->hora=$request->input("hora");
         $agendaAtual->user_id=$usuario;
         $agendaAtual->dataAtualizacao=$request->input('dataAtual');
         $status=$request->input('status');
            if ($status == '')
            $status = 'N';
        else
            $status = 'S';

        if ($agendaAtual->status != $status) {
            $agendaAtual->status = $status;
        }
         $agendaAtual->update();
          \Session::flash('message', 'Agenda atualizada com sucesso!');

         return redirect('admin/agendas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $agendaAtual=$this->agenda->find($id);
         $agendaAtual->delete();
        \Session::flash('message', 'Agenda excluida com sucesso!');
        return redirect('admin/agendas');
    }

     public function mudarStatus($id) {
        $agenda = $this->agenda->find($id);

        if ($agenda->status == 'N') {
            $agenda->status = 'S';
        } else {
            $agenda->status = 'N';
        }

        $agenda->update();

        \Session::flash('message', 'Status atualizado com sucesso!');
        return redirect('admin/agendas');
    }
}
