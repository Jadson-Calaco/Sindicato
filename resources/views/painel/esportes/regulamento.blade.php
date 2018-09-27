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
                        <h2>Cadastramento de <small>{{$titulo or 'Regulamento'}}</small></h2>
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
                        <form action="{{ url('/admin/regulamento')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <textarea id="summary-ckeditor" name="descricao" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="actionBar">
                                <div class="msgBox">
                                    <div class="content"></div>
                                    <button class="btn btn-default" type="button" onClick="JavaScript: window.history.back();">Cancelar</button> 
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
                                <th>Descrição</th>
                                <th>Data Cadastro</th>
                                <th width="10%">Ações</th>
                                <th width="3%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regulamento as $dados)
                            <tr>
                                <td>{{$dados->id or 'sem nada'}}</td>
                                <td>
                                    <h2><a href="#">{!!$dados->descricao or 'sem nada'!!}</a></h2>
                                    <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-clock-o"></i> <small> Visualizações :{{$dados->usuario->id or 'quantidade de pessoas '}} | </small> </span>
                                    <span class="count_top"><i class="fa fa-user"></i> <small> Postado por :{{$dados->usuario->name or 'Nome do Jornalista'}} | </small> </span>
                                    <span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em :{{$dados->dataModificacao or 'data'}} |</small> </span>
                                </div>
                                </td>
                                <td>{{$dados->dataCadastro or '00/00/0000'}}</td>
                                <td class="center-margin" align="center">
                                    
                                    <a href="{!! url('admin/editar_regulamento/'.$dados->id) !!}" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                    <a href="{!! url('admin/deletar_regulamento/'.$dados->id) !!}" data-confirm ="Tem certeza ?" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                                <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> 
                                    <br/>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <!-- CKEditor init -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {

            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token=&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token=&_token={{csrf_token()}}'
        };

        CKEDITOR.replace('summary-ckeditor', options);
    </script>
    
    <!--deletando ddados com confirmação-->   <!-- Modal -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
<script>
$(document).ready(function(){
		$('a[data-confirm]').click(function(ev){
			var href = $(this).attr('href');
 
			if(!$('#confirm-delete').length){
	$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">Exclir Item<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que Deseja EXCLUIR esse registro ?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>')
				}  
				  $('#dataConfirmOk').attr('href',href);
	              $('#confirm-delete').modal({show: true});
              
			return false;
		  
		});
});
</script>
@endsection
