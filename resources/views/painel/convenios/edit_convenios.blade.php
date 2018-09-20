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
                        <form action="{{ url('/admin/editar_convenio/'.$convenios->id)}}" method="post"  enctype="multipart/form-data">
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
                                                    <option>{!! $convenios->tipo_convenio!!}</option>
                                                    <option>Saude</option>
                                                    <option>Educação</option>
                                                    <option>Lazer</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">    
                                            <div class='col-sm-4'>
                                                <label for="c_validade">Validade*:</label>
                                                <input name="c_validade"  required type="text" class="form-control" id="c_validade" placeholder="Validade em Meses" value="{!! $convenios->validade  !!}">
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="c_desconto">Valor Desconto(%)*:</label>
                                            <div class="controls">
                                                <input type="text" required name="c_desconto" class="form-control" id="c_desconto" placeholder="Desconto de %" value="{!! $convenios->valor_desconto  !!}">
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class='col-sm-4'>
                                                <label for="c_empresa">Nome da Empresa*:</label>
                                                <input name="c_empresa" type="text" class="form-control" id="c_empresa" placeholder="Razão Social" value="{!! $convenios->nome_empresa !!}" required>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">  
                                            <label for="c_endereco">Endereço Completo*:</label>
                                            <input name="c_endereco" type="text" class="form-control" id="c_endereco" placeholder="Endereço....." value="{!! $convenios->endereco !!}" required>
                                        </div>
                                        <div class="form-group col-md-4"> 
                                            <label for="c_abrangencia">Abrangência*:</label>
                                            <div class="controls">
                                                <input name="c_abrangencia" type="text" class="form-control" id="c_abrangencia" placeholder="Abrangência" value="{!! $convenios->cidade !!}" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">  
                                            <label for="c_contato">Contato*:</label>
                                            <input name="c_contato" type="text" class="form-control" id="telefone" placeholder="Contatos....." value="{!! $convenios->contato !!}" required>
                                        </div>
                                        <div class="form-group col-md-4"> 
                                            <label for="c_site">Site/Rede Social*:</label>
                                            <div class="controls">
                                                <input name="c_site" type="text" class="form-control" id="c_site" placeholder="Site" value="{!! $convenios->site !!}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6"><br>
                                        <label for="c_logo">Logo/Imagem :</label>
                                        <input type="file" id="imagem" name="imagem" id="c_logo">
                                        <input type="hidden" name="x1" value="" />
                                        <input type="hidden" name="y1" value="" />
                                        <input type="hidden" name="w" value="" />
                                        <input type="hidden" name="h" value="" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <img id="myImg" src="{{asset('/images/convenios/'.$convenios->id .'/'.$convenios->imagem)}}"  width="100%" height="100%" />
                                    </div>
                                    <div class="form-group col-md-6">
                                          <img id="previewimage" style="display:none;" width="100%" height="100%"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">                              
                                    <div class="form-group col-md-2"><br>
                                        <label for="status">Ativar? *:</label>
                                        <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" value="S" @if( isset($convenios) && $convenios->status == 'S')checked @endif /> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Informações Adicionais? *:</label>
                                        <textarea name="descricao" class="form-control" id="summary-ckeditor">{!! old('content',$convenios->descricao) !!}</textarea
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-md-12"><br>
                                    <div class="actionBar">
                                        <div class="msgBox">
                                            <div class="content"></div>
                                            <button class="btn btn-primary" type="button" onClick="JavaScript: window.history.back();">Voltar</button> 
                                            <button type="submit" class="btn btn-success">Atualizar</button>
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
</div>


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

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>
@endsection
