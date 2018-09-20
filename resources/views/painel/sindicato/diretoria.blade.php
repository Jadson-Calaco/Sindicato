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
                        <h2>Cadastramento de <small>{{$titulo or 'Diretoria'}}</small></h2>
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
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="sindicato" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="nome">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cargo">Cargo : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="cargo" required="required" class="form-control col-md-7 col-xs-12" name="cargo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail : <span class="required">*</span></label>
                               
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" required="required" class="form-control col-md-7 col-xs-12" name="email"> 
                                    <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="banco">Banco : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="banco" required="required" class="form-control col-md-7 col-xs-12" name="banco">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone">Telefone : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="telefone" required="required" data-inputmask="'mask' : '(999) 999-9999'" class="form-control col-md-7 col-xs-12" name="telefone">
                                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagem">Imagem : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="imagem" required="required" class="form-control col-md-7 col-xs-12" name="imagem">
                                </div>
                            </div>
                            <div class="actionBar">
                                <div class="msgBox">
                                    <div class="content"></div>
                                    <button class="btn btn-default" type="button">Cancelar</button> 
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
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
                                <th>Nome</th>
                                <th>Data</th>
                                <th width="10%">Ações</th>
                                <th width="3%">#</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                <h2><a href="#">Nome</a></h2>
                                                    
                                        <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :0 | </small> </span>
                                           <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :Silvan | </small> </span>
                                           <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em :12/01/2018 |</small> </span>
                                       </div>
                                </td>
                                <td align="center">21/03/2018</td>
                                <td class="center-margin" align="center">
                                    <a href="" class="" title="Visualizar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-eye"></i></a>
                                    <a href="" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                    <a href="" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="" class="" title=" " data-toggle="tooltip" data-placement="top">

                                    </a>
                                </td>
                                <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> 
                                    <br /></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
            
    </div>
    </div>

</div><!--fim rows-->

@endsection