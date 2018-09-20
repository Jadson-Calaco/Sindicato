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
                        <form action="{{ url('/admin/editar_anuncios/'.$anuncios->id)}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">
                            <!--div class="x_content">
                            <!-- iniciando formulario -->
                                
                                 <div class="row"> 
                                    <div class='col-sm-4'>
                                        <label for="a_local">Local/Tamanho*:</label>
                                        <select id="heard" class="form-control" required name="local">
                                            <option>{!! $anuncios->local!!}</option>
                                            <option value="Rodape(130x50)">Rodape(130x50)</option>
                                            <option value="Cabeçalho(200x50)">Cabeçalho(200x50)</option>
                                        </select>
                                    </div>
                                 </div>
  
                                <div class="row">
                                    <div class="form-group col-md-6"><br/>
                                        <label for="a_imagem">Imagem* :</label>
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
                                        <img id="myImg" src="{{asset('/images/anuncios/'.$anuncios->id .'/'.$anuncios->imagem)}}" width="100%" height="100%" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <img id="previewimage" style="display:none;" width="100%" height="100%"/>
                                    </div>
                                </div>
                                <br>
                                <div class='col-sm-9'><br/>
                                    <label for="a_nome">Nome do Anúncio* :</label>
                                    <input type="text" id="a_nome" class="form-control" name="nome" required  value="{!! $anuncios->nome !!}"/>
                                </div>
                                <div class='col-sm-9'><br/>
                                    <label for="f_fotografo">Link* :</label>
                                    <input type="text" id="f_fotografo" class="form-control" name="link" required value="{!! $anuncios->link !!}"/>
                                </div>
                                <div class='col-sm-12'>
                                    <div class="row"><br/>
                                        <label for="status">Ativar? *:</label>
                                        <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" value="S" @if( isset($anuncios) && $anuncios->status == 'S')checked @endif /> 
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
    @endsection
