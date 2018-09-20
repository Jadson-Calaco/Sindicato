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
                        <h2>Cadastramento de <small>{{$titulo or 'Anuncios'}}</small></h2>
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
                    <div class="x_content">
                        <form action="" method="POST" enctype="multipart/form-data" id="demo-form" data-parsley-validate class="form-horizontal form-label-left">
                            <!--div class="x_content">
                            <!-- iniciando formulario -->
                            <div class="form-group"> 
                                <div class='col-sm-4'>
                                    <label for="f_tipo">Tipo da Imagem* :</label>
                                    <select id="heard" class="form-control" required name="a_local">
                                        <option value=""></option>
                                        <option value="">Imagem JPG..</option>
                                        <option value="">Imagem PNG</option>
                                        <option value="">Imagem GIF</option>

                                    </select>
                                </div>
                                <div class='col-sm-4'>
                                    <label for="a_local">Local/Tamanho*:</label>
                                    <select id="heard" class="form-control" required name="a_local">
                                        <option value=""></option>
                                        <option value="">Logos Rodape(130x50)</option>
                                        <option value="">Cabeçalho(200x50)</option>
                                    </select>
                                </div><br/>
                                <div class="row">
                                    <div class="form-group col-md-6"><br/>
                                        <label for="a_imagem">Imagem* :</label>
                                        <input type="file" id="g_imagem" name="f_capa" class="">
                                    </div>
                                    <input type="hidden" name="a_create_date">
                                    <input type="hidden" name="a_create_hora">
                                </div><br/>
                                <div class='col-sm-9'><br/>
                                    <label for="a_nome">Nome do Anúncio* :</label>
                                    <input type="text" id="a_nome" class="form-control" name="a_nome" required />
                                </div>
                                <div class='col-sm-9'><br/>
                                    <label for="f_fotografo">Link* :</label>
                                    <input type="text" id="f_fotografo" class="form-control" name="f_fotografo" required />
                                </div>
                                <div class='col-sm-9'>
                                    <div class="row"><br/>
                                        <label>Ativar? *:</label>
                                        <p style="padding: 5px;">
                                            <input type="radio" name="a_ativar" id="hobby1" value="Sim" data-parsley-mincheck="2" required class="flat" /> Sim
                                            <br />

                                            <input type="radio" name="a_ativar" id="hobby2" value="Nao" class="flat" /> Não
                                            <br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="actionBar">
                                <div class="msgBox">
                                    <div class="content"></div>
                                    <button class="btn btn-default" type="button">Cancelar</button> 
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
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
                                <th>Cliente</th>
                                <th>Arquivo</th>
                                <th>Visualizar</th>
                                <th width="10%">Ações</th>
                                <th width="3%">#</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <h2><a href="#">Nome do Arquivo</a></h2>

                                    <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :0 | </small> </span>
                                        <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :Silvan | </small> </span>
                                        <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em :12/01/2018 |</small> </span>
                                    </div>
                                </td>
                                <td align="center">Descrição do Arquivo</td>
                                <td align="center">Data da criacao</td>
                                <td class="center-margin" align="center">
                                    <a href="" class="" title="Visualizar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-eye"></i></a>
                                    <a href="" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                    <a href="" class="" title=" " data-toggle="tooltip" data-placement="top">
                                        <i class="fa fa-1x fa-fw fa-star"></i>
                                    </a>
                                    <a href="" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                                <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" c /> 
                                    <br /></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--fim rows-->

@endsection