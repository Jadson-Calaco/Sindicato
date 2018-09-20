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
                        <h2>Editando <small>{{$titulo or 'Categorias'}}</small></h2>
                        <div class="clearfix"></div>
                    </div>           
                    <form action="{{ url('/admin/editar_categoria/'.$categorias->id)}}" method="post"  enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome</label>
                                    <input value="{!! $categorias->nome !!}" name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3"><br>
                                    <label for="status">Ativar? *:</label>
                                    <input type="checkbox" name="status" id="status" data-parsley-mincheck="2" class="flat" value="S" @if( isset($categorias) && $categorias->status == 'S')checked @endif /> 
                                    <br/>
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
@endsection
