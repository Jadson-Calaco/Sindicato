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
                        <h2> {{$titulo}}<small>Acordos e Convocações</small></h2>
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
                   
                    <form action="{{url('/admin/acordo/salvar') }}" method="POST" enctype="multipart/form-data" id="demo-form" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        <!--div class="x_content">
                        <!-- iniciando formulario -->
                            
                        <div class="form-group"> 
                           <div class='col-sm-9'>
                            <label for="nome">Nome do Documento* :</label>
                            <input type="text" id="nome" class="form-control" name="nome" value="{{$acordo->nome or ' '}}" required />
                           </div>
                            <div class='col-sm-9'>
                            <label for="a_descricao">Descrição * :</label>
                            <textarea id="a_descricao" required="true" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10">{{$acordo->descricao or ' '}}</textarea> <br/>
                            </div> 
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="arquivo">Upload do Arquivo :</label>
                                        <input type="file" id="arquivo" name="arquivo" accept=".pdf" class="form-control-file border">
                                    </div>
                                    <input type="hidden" name="data" value="{{$dataAtual}}">
                                     
                                    <div class="form-group col-md-3"><br>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2"  class="flat" />
                                        </div>               
                                </div>
                </div>
                <div class="actionBar">
                    <div class="msgBox">
                        <div class="content"></div>
                        <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
                        @if ($acordo!=null) 
                       
                        <button type="submit" class="btn btn-success" formaction="{{url('/admin/acordos/atualizar/'.$acordo->id) }}">Atualizar</button>
                        @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif
                    </div>
                </div>
       
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
                            <th> Visualizar Arquivo </th>
                            <th>Nome do Arquivo</th>
                            <th>Descrição</th>
                            <th>Data de Criação</th>
                           <!-- <th>Data de Atualização</th> -->
                            <th width="10%">Ações</th>
                          <!--  <th width="3%">#</th> -->
                        </tr>
                    </thead>
             
                    @foreach($acordos as $acordo)

                    <tbody>
                        <tr>
                            <td>{{$acordo->id}}</td>
                            <td><a href="{{$acordo->arquivo0}}" target="_blank">Arquivo</a></td>
                            <td align="center">{{$acordo->nome}}
                                 <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                           <span class="count_top"><i class="fa fa-user"></i> <small> Criado por :{{$acordo->usuario->name or ''}} </small> </span>
                                           <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizado em :|
                                              {{$acordo->dataAtualizacao}}
                                           </small> </span>
                                       </div>    

                            </td>
                             <td align="center">{{$acordo->descricao}}</td>
                            <td align="center">{{$acordo->dataCriacao}}</td>
                           <!-- <td align="center">{{$acordo->dataAtualizacao}}</td>  -->
                            <td class="center-margin" align="center">
                                <a href="{!! url('admin/acordos/editar/'.$acordo->id) !!}" title="Editar"><i class="fa fa-1x fa-pencil-square-o"></i><span></span></a>
                                <a href="{!! url('admin/acordos/excluir/'.$acordo->id) !!}" title="deletar"><i class="fa fa-1x fa-trash"></i><span></span></a>
                                  <a href="{!! url('admin/acordos/'.$acordo->id) !!}" class="" title="{{$acordo->status}}" data-toggle="tooltip" data-placement="top">

                                    @if($acordo->status=='S')
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