@extends('layouts.Gentelella')

@section('content')
<div class="row">
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
                    <h2>Cadastramento de <small>{{$titulo or 'Adicionando Periodos'}}</small></h2>
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
                    <form action="{{ url('/admin/periodo')}}" method="post"  enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group"> 
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Mês/Ano</label>
                                    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 1</label>
                                    <input name="semana_1" type="text" class="form-control" id="semana_1" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 2</label>
                                    <input name="semana_2" type="text" class="form-control" id="semana_2" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 3</label>
                                    <input name="semana_3" type="text" class="form-control" id="semana_3" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 4</label>
                                    <input name="semana_4" type="text" class="form-control" id="semana_4" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 5</label>
                                    <input name="semana_5" type="text" class="form-control" id="semana_5" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class='col-sm-9'>
                                <div class="row"> 
                                    <label for="ativar">Ativar? *:</label>
                                    <p style="padding: 5px;">
                                        <input type="checkbox" name="inputStatus" id="ativar" value="S" data-parsley-mincheck="2" class="flat" /> Sim
                                    </p>
                                </div>
                            </div>
                        </div><br/><br/><br/>
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
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th align="center">Mês/Ano</th>
                            <th align="center">Semana 1</th>
                            <th align="center">Semana 2</th>
                            <th align="center">Semana 3</th>
                            <th align="center">Semana 4</th>
                            <th align="center">Semana 5</th>
                            <th width="8%" align="center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($periodo as $dados)
                        <tr class="odd gradeX">
                            <td align="center">{{$dados->nome or 'sem nada'}}</td>
                            <td align="center">{{$dados->semana_1 or 'sem nada'}}</td>
                            <td align="center">{{$dados->semana_2 or 'sem nada'}}</td>
                            <td align="center">{{$dados->semana_3 or 'sem nada'}}</td>
                            <td align="center">{{$dados->semana_4 or 'sem nada'}}</td>
                            <td align="center">{{$dados->semana_5 or 'sem nada'}}</td>
                            <td class="center">
                                <a href="{!! url('admin/editar_periodo/'.$dados->id) !!}" class="" title="Editar Periodo" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                
                                <a href="{!! url('admin/deletar_periodo/'.$dados->id) !!}" class="" title="Deletar Periodo" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>

                                <a href="{!! url('admin/status_periodo/'.$dados->id) !!}" class="" title="{{$dados->status}}" data-toggle="tooltip" data-placement="top">

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
</div>
@endsection
