@extends('layouts.Gentelella')
@section('content')
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
                        <h2>Cadastramento de <small>{{$titulo or 'Guia de Cadastramento de Convênios'}}</small></h2>
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
                        <form action="{{ url('/admin/convenio')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <!-- /.row-->
                            <div class="">
                                <div class="col-lg-12">
                                    <!--data e hora da psotagem-->
                                    <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="n_titulo">Tipo Convênio*:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="c_tipo" name="c_tipo" required>
                                                    <option>Selecione a categoria</option>
                                                    <option>Saude</option>
                                                    <option>Educação</option>
                                                    <option>Lazer</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">    
                                            <div class='col-sm-4'>
                                                <label for="c_validade">Validade*:</label>
                                                <input name="c_validade" type="text" class="form-control" id="c_validade" placeholder="Validade em Meses" required>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="c_desconto">Valor Desconto(%)*:</label>
                                            <div class="controls">
                                                <input type="text" name="c_desconto" class="form-control" id="c_desconto" placeholder="Desconto de %" required>
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class='col-sm-4'>
                                                <label for="c_empresa">Nome da Empresa*:</label>
                                                <input name="c_empresa" type="text" class="form-control" id="c_empresa" placeholder="Razão Social" required>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">  
                                            <label for="c_endereco">Endereço Completo*:</label>
                                            <input name="c_endereco" type="text" class="form-control" id="c_endereco"  placeholder="Endereço....." required>
                                        </div>
                                        <div class="form-group col-md-4"> 
                                            <label for="c_abrangencia">Abrangência*:</label>
                                            <div class="controls">
                                                <input name="c_abrangencia" type="text" class="form-control" id="c_abrangencia" placeholder="Abrangência" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">  
                                            <label for="c_contato">Contato*:</label>
                                            <input name="c_contato" type="text" class="form-control" id="telefone" placeholder="Contatos....." required>
                                        </div>
                                        <div class="form-group col-md-4"> 
                                            <label for="c_site">Site/Rede Social*:</label>
                                            <div class="controls">
                                                <input name="c_site" type="text" class="form-control" id="c_site" placeholder="Site" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6"><br>
                                        <label for="c_logo">Logo/Imagem :</label>
                                        <input type="file" id="imagem" name="imagem" id="c_logo" required>
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
                                <div class="row">                              
                                    <div class="form-group col-md-2"><br>
                                        <label>Ativar? *:</label>
                                        <input type="checkbox" name="status" id="status" data-parsley-mincheck="2"  class="flat" />
                                    </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Informações Adicionais? *:</label>
                                        <textarea name="descricao" class="form-control" id="summary-ckeditor" ></textarea
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-md-12"><br>
                                    <div class="actionBar">
                                        <div class="msgBox">
                                            <div class="content"></div>
                                            <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
                                            <button type="submit" class="btn btn-success">Cadastrar</button>
                                        </div>
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
                            <th>Nome da Empresa</th>
                            <th>Validade</th>
                            <th width="10%">Valor de Desconto(%)</th>
                            <th>Abrangencia</th>
                            <th>Site/Rede Social</th>
                            <th width="10%">Ações</th>
                            <th width="3%">#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($convenios as $dados)
                        <tr>
                            <td>{{$dados->id}}</td>
                            <td>
                                <h2><a href="#">{{$dados->nome_empresa or 'sem nada'}}</a></h2>

                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                    <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :{{$dados->usuario->id or 'quantidade de pessoas '}} | </small> </span>
                                    <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :{{$dados->usuario->name or 'Nome do Jornalista'}} | </small> </span>
                                    <span class="count_top"><i class="fa fa-calendar"></i> <small> Criada em :{{$dados->datacreate or 'data'}} |</small> </span>
                                </div>
                                </div>
                            </td>
                            <td>{{$dados->validade or 'sem nada'}}</td>
                            <td>{{$dados->valor_desconto or 'sem nada'}}</td>
                            <td>{{$dados->cidade or 'sem nada'}}</td>
                            <td>{{$dados->site or 'sem nada'}}</td>
                            <td class="center-margin" align="center">
                                <a href="" class="" title="Visualizar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-eye"></i></a>
                                <a href="{!! url('admin/editar_convenio/'.$dados->id) !!}" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                <a href="{!! url('admin/deletar_convenio/'.$dados->id) !!}" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                <a href="{!! url('admin/status_convenio/'.$dados->id) !!}" class="" title="{{$dados->status}}" data-toggle="tooltip" data-placement="top">

                                    @if($dados->status=='S')
                                    <i class="fa fa-1x fa-fw fa-star"></i>
                                    @else
                                    <i class="fa fa-1x fa-fw fa-star-o"></i>
                                    @endif

                                </a>
                            </td>
                            <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> 
                                <br /></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!--tela de inserção de noticias-->
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>

<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};
</script>
@endsection
