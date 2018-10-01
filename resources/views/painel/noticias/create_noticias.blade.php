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
                        <h2>Cadastramento de <small>{{$titulo or 'Cadastrando Noticias'}}</small></h2>
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
                        <form action="{{ url('/admin/criar_noticia')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <!-- /.row-->
                            <div class="">
                                <div class="col-lg-12">
                                    <!--data e hora da psotagem-->
                                    <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('Y-m-d') ?>">

                                    <div class="row">
                                        <div class="form-group col-md-9">
                                            <label for="titulo">Titulo</label>
                                            <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-9">
                                            <label for="subtitulo">Subtitulo</label>
                                            <input name="subtitulo" type="text" class="form-control" id="subtitulo" placeholder="Subtitulo">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_categoria">Categorias:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="n_categoria" name="categoria" required>
                                                    <option value="" >Selecione a categoria</option>
                                                    @foreach($categorias as $categorias)
                                                    <option value="{{ $categorias->id }}">{{$categorias->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="banco">Banco:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="banco" name="banco" required>
                                                    <option value="">Selecione o banco</option>
                                                    @foreach($bancos as $bancos)
                                                    <option value="{{ $bancos->id }}">{{$bancos->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6"  >
                                            <label for="imagem">Imagem de Slide :</label>
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
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_fotografo">Fotográfo</label>
                                            <input name="fotografo" type="text" class="form-control" id="n_fotografo" placeholder="Fotografo">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_fonte">Fonte</label>
                                            <input name="fonte" type="text" class="form-control" id="n_fonte" placeholder="Fonte da Informação">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="tag">Tag</label>
                                            <input name="tag" type="text" class="form-control" id="n_fonte" placeholder="Tag">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-3"><br>
                                            <label for="destaque">Exibir no Slide?*:</label>
                                            <input type="checkbox" name="destaque" id="destaque" data-parsley-mincheck="2" class="flat" />
                                        </div>
                                        <div class="form-group col-md-3"><br>
                                            <label for="destaque_FS">Exibir como Destaque?*:</label>
                                            <input type="checkbox" name="destaque_FS" id="destaque_FS" data-parsley-mincheck="2" r class="flat" />
                                        </div>
                                        <div class="form-group col-md-3"><br>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2"  class="flat" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea id="summary-ckeditor" name="texto" class="form-control" required="required"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
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
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Noticias <small>{{$pags_tatal or '0'}}</small></h2>
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
              <table id="student_table" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Criada</th>
                            <th >Ações</th>
                        </tr>
                    </thead>
                    
                </table>
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
    

   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
   <script 	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 
    <script>
        $(document).ready(function () {
            $('#student_table').DataTable({
                "processing": true,
                "serverSide": true,
                "aaSorting": [[ 2, "desc" ]],
                "ajax":{
                         "url": "{{ url('/admin/dadosNoticias') }}",
                         "dataType": "json",
                         "type": "POST",
                         "data":{ _token: "{{csrf_token()}}"}
                       },
                "columns": [
                    { "data": "titulo" },
                    { "data": "data" },
                    { "data": "opcoes" }
                ]	 
    
            });
        });
    </script>

    @endsection
