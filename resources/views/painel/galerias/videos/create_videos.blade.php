@extends('layouts.Gentelella')
@section('content')
<!-- page content -->
<div class="row">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Você está em <small>{{$titulo}} Galeria de Videos</small></h3>
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
                        <h2>{{$titulo}}<small> de Galeria de Videos</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <form action="{{url('/admin/galeria/video/salvar') }}" method="POST" enctype="multipart/form-data" id="demo-form" data-parsley-validate class="form-horizontal form-label-left">
                        <!--div class="x_content">
                        <!-- iniciando formulario -->
                          {{ csrf_field() }}
                        <div class="form-group"> 
                            <div class='col-sm-9'>
                                <label for="nome">Nome do Video* :</label>
                                <input type="text" id="nome" class="form-control" name="nome" required="true"  value="{{$video->nome or ""}}"/>
                            </div>
                            <div class='col-sm-9'>
                                <label for="link">Link do Video* :</label>
                                <input type="text" id="link" class="form-control" name="html" required="true" value="{{$video->html or ""}}" />
                            </div>
                            <div class='col-sm-9'><br>
                                <label for="f_descricao">Descrição/Local do Video* :</label>
                                <textarea id="g_descricao" required="required" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10">{{$video->descricao or ""}}</textarea> <br/>
                            </div>
                            <input type="hidden" name="data" value="{{$dataAtual}}">

                            <div class='col-sm-9'>
                                <label for="f_data">Data do Evento* :</label>
                                <input type="date" id="g_data" class="form-control" name="data" value="{{$video->data or ""}}" required />
                            </div>
                           <!-- <div class='col-sm-9'>
                                <label for="f_fotografo">Autor :</label>
                                <input type="text" id="f_fotografo" class="form-control" name="f_fotografo" />
                            </div>
                            -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Destacar Galeria? *:</label>
                                    <p style="padding: 5px;">
                                        <input type="checkbox" name="destaque" id="hobby" value="Sim" data-parsley-mincheck="2" class="flat" /> Sim
                                        <br />
                                    </p>
                                    
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

                                  @if ($video!=null) 
                       
                                    <button type="submit" class="btn btn-success" formaction="{{url('/admin/galeria/video/atualizar/'.$video->id) }}">Atualizar</button>
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
                                <th>Nome do video</th>   
                                <th>Descrição do video</th>  
                                <th>Link do video</th>
                                <th>Data</th>
                                 <th>Ações</th>
                            </tr>
                        </thead>
                        @foreach ($videos as $video) 
                            
                        
                        <tbody>
                            <tr>
                                <td>{{$video->id}}</td>
                                <td>{{$video->nome}}
                                   
                                   
                                        <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :
                                             {{$video->visualizacao}} </small> </span>
                                           <span class="count_top"><i class="fa fa-user"></i> <small> Postado por : 
                                           {{$video->usuario->name or ''}} </small> </span>
                                           <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em : 
                                            {{$video->dataAtualizacao}}</small> </span>
                                       </div>    
                                
                                </td>
                                <td>{{$video->descricao}}</td> 
                                <td><a href="{{$video->html}}" target="_blank">{{$video->html}}</a></td>
                                <td>{{$video->data}}</td>
                                <td class="center-margin" align="center"> 
                                        <a href="{{url('/admin/galeria/video/editar/'.$video->id)}} "   title="Editar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                        <a href="{!! url('/admin/galeria/video/excluir/'.$video->id) !!} "  title="Deletar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-trash"></i></a>
                                        <a href="{!! url('admin/galeria/video/'.$video->id) !!}" class="" title="{{$video->status}}" data-toggle="tooltip" data-placement="top">

                                    @if($video->status=='S')
                                    <i class="fa fa-1x fa-fw fa-star"></i>
                                    @else
                                    <i class="fa fa-1x fa-fw fa-star-o"></i>
                                    @endif

                                </a>
                                 </td>
                                 <!-- <p>Link do Videos[os videos estão vindo do youtube</p>-->
                            
                                
                                
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