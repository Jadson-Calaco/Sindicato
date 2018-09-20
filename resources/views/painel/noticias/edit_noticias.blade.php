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
                        <h2>editando <small>{{$titulo or 'Cadastrando Noticias'}}</small></h2>
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
                    </div>                 <div class="x_content">

                        <form action="{{ url('admin/editar_noticia/'.$noticia->id)}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <!-- /.row-->
                            <div class="">
                                <div class="col-lg-12">
                                    <!--data e hora da psotagem-->
                                    <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_titulo">Titulo</label>
                                            <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo" value="{!! $noticia->titulo !!}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_subtitulo">Subtitulo</label>
                                            <input name="subtitulo" type="text" class="form-control" id="subtitulo" placeholder="Subtitulo" value="{!! $noticia->subtitulo !!}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="n_categoria">Categorias:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="n_categoria" name="categoria" required>
                                                    <option>Selecione a categoria</option>
                                                    @foreach($categorias as $categorias)
                                                    <option value="{{ $categorias->id }}"
                                                            @if( isset($noticia) && $noticia->categoria_id == $categorias->id)
                                                            selected
                                                            @endif
                                                            > {{$categorias->nome}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="n_banco">Banco:</label>
                                        <div class="controls">
                                            <select class="form-control"  id="banco" name="banco" required>
                                                <option>Selecione o banco</option>
                                                @foreach($bancos as $bancos)
                                                <option value="{{ $bancos->id }}"
                                                        @if( isset($noticia) && $noticia->banco_id == $bancos->id)
                                                        selected
                                                        @endif
                                                        > {{$bancos->nome}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                        <div class="form-group col-md-6"  >
                                            <label for="imagem">Imagem de Slide :</label>
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
                                            <img id="myImg" src="{{asset('/images/noticias/'.$noticia->id .'/'.$noticia->foto)}}" width="100%" height="100%" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img id="previewimage" style="display:none;" width="100%" height="100%"/>
                                        </div>
                                    </div>
                                  <br>
                                    
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="n_fotografo">Fotográfo</label>
                                    <input name="fotografo" type="text" class="form-control" id="n_fotografo" placeholder="Fotografo" value="{!! $noticia->creditos_fotos !!}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="n_fonte">Fonte</label>
                                    <input name="fonte" type="text" class="form-control" id="n_fonte" placeholder="Fonte da Informação" value="{!! $noticia->fonte !!}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Exibir no Slide? *:</label>
                                    <input type="checkbox" name="destaque" id="destaque" data-parsley-mincheck="2" class="flat" value="S" @if( isset($noticia) && $noticia->destaque == 'S')checked @endif /> 
                                    
                                    <label>Exibir como Destaque? *:</label>
                                    <input type="checkbox" name="destaque_FS" id="destaque_FS" data-parsley-mincheck="2" class="flat" value="S" @if( isset($noticia) && $noticia->destaque_FS == 'S')checked @endif /> 
                                    
                                    <label>Ativar? *:</label>
                                    <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" value="S" @if( isset($noticia) && $noticia->status == 'S')checked @endif /> 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tag">Tag</label>
                                    <input name="tag" type="text" class="form-control" id="n_fonte" placeholder="Tag" value="{!! $noticia->tags !!}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control"  required name="texto" id="summary-ckeditor">{!! old('content',$noticia->texto) !!}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="actionBar">
                                <div class="msgBox">
                                    <div class="content"></div>
                                    <button class="btn btn-primary" type="button" onClick="JavaScript: window.history.back();">Voltar</button> 
                                    <button type="submit" class="btn btn-success">Atualizar</button>
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
<!--tela de inserção de noticias-->
<hr>
<div class="row">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>

        $('a[data-target="#delete-modal"]').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('span.nome').text(id);
            $('#myModal').modal('show');
            return false;
        });

    </script>

    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    var options = {

            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token=&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token=&_token={{csrf_token()}}'
        };
    
      CKEDITOR.replace('summary-ckeditor',options);
    </script>
    @endsection
