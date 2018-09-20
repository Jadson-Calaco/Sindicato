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
                        <h2>Cadastramento de <small>{{$titulo or 'Equipes'}}</small></h2>
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
                        <form action="{{ url('/admin/editar_equipe/'.$equipes->id)}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">
                            <!--div class="x_content">
                                <!-- iniciando formulario -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="f_nome">Nome da Equipe* :</label>
                                        <input type="text" id="g_nome" class="form-control" name="nome" value="{!! $equipes->nome !!}" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="banco">Banco Referente* :</label>
                                        <input type="text" name="banco" class="form-control" id="banco" value="{!! $equipes->banco !!}" required/><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6"  >
                                        <label for="imagem">Brazão/Logo* :</label>
                                        <input type="file" id="imagem" name="imagem" class="btn btn-primary" data-input="thumbnail" data-preview="holder"> 
                                        <input type="hidden" name="x1" value="" />
                                        <input type="hidden" name="y1" value="" />
                                        <input type="hidden" name="w" value="" />
                                        <input type="hidden" name="h" value="" /> 
                                    </div>  
                                </div>
                                <br>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <img id="myImg" src="{{asset('/images/equipes/'.$equipes->id .'/'.$equipes->imagem)}}"  width="100%" height="100%" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img id="previewimage" style="display:none;"  width="100%" height="100%"/>
                                        </div>
                                    </div>
                                    <br>
                                   <div class="row">
                                        <div class="form-group col-md-3"><br>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" value="S" @if( isset($equipes) && $equipes->status == 'S')checked @endif/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="actionBar">
                                        <div class="msgBox">
                                            <div class="content"></div>
                                            <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
                                            <button type="submit" class="btn btn-success">Atualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!--fim rows-->

    @endsection