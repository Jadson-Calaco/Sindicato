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
                        <h2>Cadastramento de <small>{{$titulo or 'Categorias'}}</small></h2>
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
                        <form action="{{ url('/admin/categoria')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="titulo">Nome</label>
                                            <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                                        </div>
                                    </div>
                                    <div class='col-sm-12'>
                                        <div class="row"><br/>
                                            <label for="status">Ativar? *:</label>
                                            <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" />
                                        </div>
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

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Bancos <small>{{$pags_tatal or '0'}}</small></h2>
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
                            <th width="80%">Nome</th>
                            <th width="5%">Status</th>
                            <th align="center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categorias as $dados)
                        <tr class="odd gradeX">
                            <td>{{$dados->nome or 'sem nada'}}</td>
                            <td align="center">{{$dados->status or 'sem nada'}}</td>

                            <td align="center">
                                <a href="{!! url('admin/editar_categoria/'.$dados->id) !!}" class="" title="Editar Categoria" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-pencil"></i></a>
                                <a href="{!! url('admin/status_categoria/'.$dados->id) !!}" class="" title="{{$dados->status}}" data-toggle="tooltip" data-placement="top">
                                    @if($dados->status=='S')
                                    <i class="fa fa-1x fa-fw fa-star"></i>
                                    @else
                                    <i class="fa fa-1x fa-fw fa-star-o"></i>
                                    @endif
                                </a>
                                <a href="{!! url('admin/deletar_categoria/'.$dados->id) !!}" class="" title="Deletar Categoria" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>

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
@endsection
