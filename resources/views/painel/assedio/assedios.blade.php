@extends('layouts.Gentelella')
@section('content')

<div class="row">

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
                                <th align="center">Cpf</th>
                                <th align="center">Nome Denunciante</th>
                                <th align="center">Email</th>
                                <th align="center">Nome Denunciado</th>
                                <th align="center">Cargo Denunciado</th>
                                <th align="center">Historico</th>
                                <th align="center">Ações</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($assedio as $dados)
                            <tr class="odd gradeX">
                                <td align="center">{{$dados->cpf  or 'sem nada'}}</td>
                                <td align="center">{{$dados->nome or 'sem nada'}}</td>
                                <td align="center">{{$dados->email  or '0 mes'}}</td>
                                <td align="center">{{$dados->nomedenun or '0 mes'}}</td>
                                <td align="center">{{$dados->cargodenun   or '0 mes'}}</td>
                                <td align="center">{{$dados->historico  or 'sem nada'}}</td>
                                <td class="center">
                                    <a href="{!! url('admin/deletar_assedio/'.$dados->id) !!}" class="" title="Deletar " data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
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
