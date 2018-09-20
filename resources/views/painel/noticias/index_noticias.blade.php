@extends('layouts.Gentelella')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Noticias Cadastradas</h3>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Subtitulo</th>
                                <th>Categoria</th>
                                <th>Criada</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($noticias as $dados)
                            <tr class="odd gradeX">
                                <td>{{$dados->titulo or 'sem nada'}}</td>
                                <td>{{$dados->subtitulo or 'sem nada'}}</td>
                                <td>{{$dados->categorias->nome or 'sem nada'}}</td>
                                <td class="center">{{$dados->data or '00/00/0000'}}</td>
                                <td>{{$dados->status or 'sem nada'}}</td>
                                <td class="center">
                                   <!--a href="{!! url('admin/visualizar_noticia/'.$dados->id) !!}" class="" title="Visualizar" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-pencil"></i></a-->
                                   <a href="{!! url('admin/editar_noticia/'.$dados->id) !!}" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-pencil"></i></a>
                                   <a href="{!! url('admin/deletar_noticia/'.$dados->id) !!}" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                   <a href="{!! url('admin/status_noticia/'.$dados->id) !!}" class="" title="{{$dados->status}}" data-toggle="tooltip" data-placement="top">

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
            <!-- /.panel-body -->
        </div>

        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection
