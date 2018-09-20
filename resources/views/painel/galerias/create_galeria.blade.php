@extends('layouts.Gentelella')
@section('content')
<!-- page content -->
<div class="row">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Você está em <small>{{$titulo}} Galeria</small></h3>
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
                        <h2>{{$titulo}}<small> de Galeria de Fotos</small></h2>
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
                    <form action="{{url('/admin/galeria/fotos/salvar') }}" method="POST" enctype="multipart/form-data" id="demo-form" data-parsley-validate class="form-horizontal form-label-left" class="dropzone" id="my-awesome-dropzone">
                        <!--div class="x_content">
                        <!-- iniciando formulario -->
                          {{ csrf_field() }}
                        <div class="form-group"> 
                            <div class='col-sm-9'>
                                <label for="nome">Nome do Galeria :</label>
                                <input type="text" id="nome" class="form-control" name="nome" value="{{$galeria->nome or ' '}}"required="true"/>
                            </div>
                            <div class='col-sm-9'>
                                <label for="fotografo">Fotografo :</label>
                                <input type="text" id="fotografo" class="form-control" name="fotografo" value="{{$galeria->fotografo or ''}}" required="true" />
                            </div>
                            <div class='col-sm-9'><br>
                                <label for="descricao">Descrição :</label>
                                <textarea id="descricao" required="true" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10">{{$galeria->descricao or ''}}</textarea> <br/>
                            </div>
                             <div class='col-sm-9'><br>
                                <label for="local">Local :</label>
                                 <input type="text" id="local" class="form-control" name="local" value="{{$galeria->local or ''}}" required="true" />
                            </div>

                            <div class="form-group col-md-9"><br>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2"  class="flat" />
                            <br/>
                                <label>Exibir como Destaque? *:</label>
                            <p style="padding: 5px;">
                                <input type="checkbox" name="destaque" value="S" id="hobby1" data-parsley-mincheck="2"  class="flat" />SIM
                                <br />
                            </p>
                            </div>        

                           
                            <input type="hidden" name="dataAtual" value="{{$dataAtual}}"/>

                           <!-- <div class='col-sm-9'>
                                <label for="f_fotografo">Autor :</label>
                                <input type="text" id="f_fotografo" class="form-control" name="f_fotografo" />
                            </div>
                            -->
                              
                              
                            <div class="actionBar col-sm-9 ">
                                <div class="msgBox">
                                    <div class="content"></div>
                                  <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 

                                  @if ($galeria!=null) 
                       
                                    <button type="submit" class="btn btn-success" formaction="{{url('/admin/galeria/fotos/atualizar/'.$galeria->id) }}">Atualizar</button>
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
                                <th>Nome da galeria</th>   
                                <th>Descrição da galeria</th>  
                                <th>Fotografo</th>
                                
                                 <th>Ações</th>
                            </tr>
                        </thead>
                        @foreach ($galerias as $galeria) 
                            
                        
                        <tbody>
                            <tr>
                                <td>{{$galeria->id}}</td>
                                <td>{{$galeria->nome}}</td>
                                <td>{{$galeria->descricao}}</td>
                                <td>{{$galeria->fotografo}}</td>
                                
                                <td class="center-margin" align="center"> 
                                        <a href="{{url('/admin/galeria/foto/editar/'.$galeria->id)}} "   title="Editar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                        <a href="{!! url('/admin/galeria/fotos/excluir/'.$galeria->id) !!} "  title="Deletar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-trash"></i></a>
                                        <a href="{!! url('/admin/galeria/fotos/adicionarFotos/'.$galeria->id) !!} "  title="Adicionar fotos" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-file-image-o  "></i></a>
                                        
                                  <a href="{!! url('admin/galeria/fotos/status'.$galeria->id) !!}" class="" title="{{$galeria->status}}" data-toggle="tooltip" data-placement="top">

                                    @if($galeria->status=='S')
                                    <i class="fa fa-1x fa-fw fa-star"></i>
                                    @else
                                    <i class="fa fa-1x fa-fw fa-star-o"></i>
                                    @endif

                                </a>
                                 </td>
                                <td>
                                   <!-- <p>Link do Videos[os videos estão vindo do youtube</p>-->
                                    <!--    <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :0 | </small> </span>
                                           <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :Silvan | </small> </span>
                                           <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em :12/01/2018 |</small> </span>
                                       </div>    
                                </td>  -->
                                
                                
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
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
</script>



@endsection