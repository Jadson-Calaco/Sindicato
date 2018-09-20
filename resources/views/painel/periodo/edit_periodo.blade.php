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
                    <h2>Cadastramento de <small>{{$titulo or 'Editando Periodos'}}</small></h2>
                   
                    <div class="clearfix"></div>
                </div>
                <form action="{{ url('/admin/editar_periodo/'.$periodo->id)}}" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Mês/Ano</label>
                                    <input value="{!! $periodo->nome !!}" name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 1</label>
                                    <input value="{!! $periodo->semana_1 !!}" name="semana_1" type="text" class="form-control" id="semana_1" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 2</label>
                                    <input value="{!! $periodo->semana_2 !!}" name="semana_2" type="text" class="form-control" id="semana_2" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 3</label>
                                    <input value="{!! $periodo->semana_3 !!}" name="semana_3" type="text" class="form-control" id="semana_3" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 4</label>
                                    <input value="{!! $periodo->semana_4 !!}" name="semana_4" type="text" class="form-control" id="semana_4" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Semana 5</label>
                                    <input value="{!! $periodo->semana_5 !!}" name="semana_5" type="text" class="form-control" id="semana_5" placeholder="De 00 a 00 de mês">
                                </div>
                            </div>
                            <div class='col-sm-9'>
                                <div class="row"> 
                                    <label for="ativar">Ativar? *:</label>
                                    <p style="padding: 5px;">
                                        <input type="checkbox" name="inputStatus" id="ativar" value="S" data-parsley-mincheck="2" required class="flat" /> Sim
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="actionBar">
                        <div class="msgBox">
                            <div class="content"></div>
                            <button class="btn btn-primary" type="button" onClick="JavaScript: window.history.back();">Voltar</button> 
                            <button type="submit" class="btn btn-success">Atualizar</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


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



    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
CKEDITOR.replace('summary-ckeditor');
    </script>
    @endsection
