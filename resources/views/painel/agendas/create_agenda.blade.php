@extends('layouts.Gentelella')
@section('content')

<!-- page content -->
<div class="row">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Você está em <small>{{$titulo or 'pags'}}</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row"> <!--form action -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$titulo}}<small>Agenda Cultural</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!--div class="x_content"-->
                    <p>{{$msg or ' '}}</p>

                    <form action="{{url('/admin/agenda/salvar')}}" method="POST" enctype="multipart/form-data" id="demo-form" data-parsley-validate class="form-horizontal form-label-left">
                        <!--div class="x_content">
                        <!-- iniciando formulario -->
                        {{ csrf_field() }}
                       
                        <div class="form-group"> 
                           <div class='col-sm-9'>
                            <label for="a_nome">Nome do Evento* :</label>
                            <input type="text" id="a_nome" class="form-control" name="nome" value="{{$agenda->nome or ' '}}" required="true" />
                           </div>
                            <div class='col-sm-9'>
                            <label for="a_descricao">Descrição * :</label>
                            <textarea id="a_descricao" required="true" class="form-control" name="descricao" 
                               data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10">{{$agenda->descricao or ' '}}</textarea> <br/>
                            </div>
                            <div class="form-group">
                              <div class='col-sm-4'>  Data *:
                                <div class='input-group date' id='myDatepicker2'>
                                    <input type="date"  class="form-control" name="data1" value="{{$agenda->data1 or ' '}}"/>
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                    </span>


                                </div>
                                 <input type="hidden" name="data" value="{{$dataAtual}}">

                              </div>
                               <div class='col-sm-4'> Hora *:
                                <div class="input-group">
                                    <input type="time" name="hora" class="form-control" value="{{$agenda->hora or ' '}}">
                                         <span class="input-group-addon" id="sizing-addon2">
                                           <span class="glyphicon glyphicon-time "></span>
                                        </span>
                                 </div>   
                                </div>
                             <div class='col-sm-5'>
                            <label for="local">Local* :</label>
                            <input type="text" id="local" class="form-control" name="local" value="{{$agenda->local or ' '}}"  required />
                             </div>
                            <!-- end form for validations -->
                            <div class='col-sm-12'>
                          
                             <div class="form-group col-md-3"><br>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2"  class="flat" />
                                        </div>
                                <label>Exibir como Destaque? *:</label>
                            <p style="padding: 5px;">
                                <input type="checkbox" name="destaque" value="S" id="hobby1" data-parsley-mincheck="2"  class="flat" />SIM
                                <br />
                            </p>
                            </div>
                        </div>
                </div>
                <div class="actionBar">
                    <div class="msgBox">
                        <div class="content"></div>
                     <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
                        @if($agenda!=null)
                           <button type="submit" class="btn btn-success" formaction="{!! url('admin/agendas/atualizar/'.$agenda->id) !!}">Atualizar</button> 
                        @else   
                           <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif   
                    </div>
                </div>
                <!--div class="form-group"-->
                <!--div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                     <div class="checkbox">
                        <label>
                          <input type="radio" class="flat" checked="checked"> Ativar
                        </label>
                        <label>
                          <input type="radio" class="flat" checked="checked"> Ativar
                        </label>
                      </div>
        
                </div-->
                </form>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Paginas <small>{{$pags_tatal or '0'}}</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                        </ul>
                    </li>
                    <!--li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li-->
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">id</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Local</th>
                            <th width="10%">Ações</th>
                           <!-- <th width="3%">#</th> -->
                        </tr>
                    </thead>

                     @foreach ($agendas as $agenda) 
                        
                     
                    <tbody>
                        <tr>
                            <td>{{$agenda->id}}</td>
                            <td>{{$agenda->nome}}
                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                           <span class="count_top"><i class="fa fa-user"></i> <small> Criado por :{{$agenda->usuario->name or ''}} </small> </span>
                                           <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizado em :|
                                              {{$agenda->dataAtualizacao}}
                                           </small> </span>
                                       </div>   
                            </td>
                            <td align="center">{{$agenda->descricao}}</td>
                            <td align="center">{{$agenda->data1}}</td>
                            <td align="center">{{$agenda->local}}</td>
                            <td class="center-margin" align="center">
                                <a href="{!! url('admin/agendas/editar/'.$agenda->id) !!}" 
                                    title="Editar"><i class="fa fa-1x fa-pencil-square-o"></i><span></span>
                                </a>
                                <a href="{!! url('admin/agendas/excluir/'.$agenda->id) !!}" 
                                    title="deletar"><i class="fa fa-1x fa-trash"></i><span></span>
                                </a>
                                  <a href="{!! url('admin/agendas/'.$agenda->id) !!}" class="" title="{{$agenda->status}}" data-toggle="tooltip" data-placement="top">

                                    @if($agenda->status=='S')
                                    <i class="fa fa-1x fa-fw fa-star"></i>
                                    @else
                                    <i class="fa fa-1x fa-fw fa-star-o"></i>
                                    @endif

                                </a>
                            </td>
                          <!--  <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> 
                                <br /></td> -->
                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


</div>
</div>

</div><!--fim rows-->

@endsection