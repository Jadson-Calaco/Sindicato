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
            <div  class="col-md-12 col-sm-12 col-xs-12">
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
                        <form action="{{ url('/admin/anuncios')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">

                                 <div class="row"> 
                                    <div class='col-sm-4'>
                                        <label for="a_local">Local/Tamanho*:</label>
                                        <select id="heard" class="form-control" required name="local">
                                            <option value="">-- Selecione --</option>
                                            <option value="Rodape(130x50)">Rodape(130x50)</option>
                                            <option value="Cabeçalho(200x50)">Cabeçalho(200x50)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6"><br/>
                                        <label for="imagem">Imagem* :</label>
                                        <input type="file" id="imagem" name="imagem" class="btn btn-primary" data-input="thumbnail" data-preview="holder" required> 
                                        <input type="hidden" name="x1" value="" />
                                        <input type="hidden" name="y1" value="" />
                                        <input type="hidden" name="w" value="" />
                                        <input type="hidden" name="h" value="" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                         <img id="previewimage" style="display:none;" with="400" height="400"/>
                                    </div>
                                </div>
                                <br>
                                <div class='col-sm-9'><br/>
                                    <label for="a_nome">Nome do Anúncio* :</label>
                                    <input type="text" id="a_nome" class="form-control" name="nome" required />
                                </div>
                                <div class='col-sm-9'><br/>
                                    <label for="f_fotografo">Link* :</label>
                                    <input type="text" id="f_fotografo" class="form-control" name="link" required />
                                </div>
                                <div class='col-sm-12'>
                                    <div class="row"><br/>
                                        <label for="status">Ativar? *:</label>
                                        <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" />
                                    </div>
                                    <br/>
                                    <div class="actionBar">
                                        <div class="msgBox">
                                            <div class="content"></div>
                                            <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
                                            <button type="submit" class="btn btn-success">Cadastrar</button>
                                        </div>
                                    </div>
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
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">id</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Local</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th width="10%">Ações</th>
                                    <th width="3%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($anuncios as $dados)
                               <tr>
                                
                                <td>{{$dados->id or 'sem nada'}}</td>
                                <td>
                                    <h2><a href="#">{{$dados->nome or 'sem nada'}}</a></h2>
                                    <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                         <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :{{$dados->usuario->id or 'quantidade de pessoas '}} | </small> </span>
                                         <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :{{$dados->usuario->name or 'Nome do Jornalista'}} | </small> </span>
                                         <span class="count_top"><i class="fa fa-calendar"></i> <small> Criada em :{{$dados->dataCadastro or 'data'}} |</small> </span>
                                    </div>
                                </td>
                                <td align="center">{{$dados->tipo or 'sem nada'}}</td>
                                <td align="center">{{$dados->local or 'sem nada'}}</td>
                                <td align="center">{{$dados->link or 'sem nada'}}</td>
                                <td align="center">{{$dados->status or 'sem nada'}}</td>
                                <td class="center-margin" align="center"> 
                                        <a href="{!! url('admin/editar_anuncios/'.$dados->id) !!}" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                        <a href="{!! url('admin/deletar_anuncios/'.$dados->id) !!}" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                        <a href="{!! url('admin/status_anuncios/'.$dados->id) !!}" class="" title="{{$dados->status}}" data-toggle="tooltip" data-placement="top">

                                            @if($dados->status=='S')
                                            <i class="fa fa-1x fa-fw fa-star"></i>
                                            @else
                                            <i class="fa fa-1x fa-fw fa-star-o"></i>
                                            @endif

                                        </a>
                                 </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--fim rows-->

@endsection