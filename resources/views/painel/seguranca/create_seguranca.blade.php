@extends('layouts.Gentelella')
@section('content')
<div class="row">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>VocÃª estÃ¡ em <small>{{$titulo or 'pags'}}</small></h3>
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
                        <h2>Cadastramento de <small>{{$titulo or 'Dados referente a Segurança Bancaria'}}</small></h2>
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
                        <form action="{{ url('/admin/seguranca-bancaria')}}" method="post"  enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <!-- /.row-->
                            <div class="">
                                <div class="col-lg-12">
                                    <!--data e hora da psotagem-->
                                    <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="n_titulo">Tipo Ocorrência*:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="c_tipo" name="ocorrencia" required>
                                                     <option value="">Selecione a Ocorrência</option>
                                                     <option value="Arrombamento">Arrombamento</option>
                                                     <option value="Assalto">Assalto</option>
                                                     <option value="Explosão">Explosão</option>
                                                     <option value="Saidinha">Saidinha</option>
                                                     <option value="Tentativa">Tentativa</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="cidade">Cidade/Localidade*:</label>
                                            <div class="controls">
                                                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade/localidade">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">    
                                        <div class='col-sm-6'>
                                            <label for="banco">Banco envolvido*:</label>
                                            <div class="controls">
                                                <select class="form-control"  id="c_banco" name="banco" required>
                                                     <option value="">Selecione o Banco</</option>
                                                     <option value="Banco do Brasil">Banco do Brasil</option>
                                                     <option value="Banco Rural">Banco Rural</option>
                                                     <option value="Banco 24 Horas">Banco 24 Horas</option>
                                                     <option value="Bic Banco">Bic Banco</option>
                                                     <option value="Bradesco">Bradesco</option>
                                                     <option value="Caixa Economica">Caixa Economica</option>
                                                     <option value="HSBC">HSBC</option>
                                                     <option value="Itaú">Itaú</option>
                                                     <option value="Outros">Outros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-6">  
                                            <label for="data">Data do Ocorrido*:</label>
                                               <div class='input-group date' id='myDatepicker2'>
                                                    <input type='date' class="form-control" id="data7" name="dataOcorrido" required/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">    
                                        <div class='col-sm-6'>
                                            <label for="descricao">Descrição*:</label>
                                            <textarea name="descricao" class="form-control" id="descricao" placeholder="Descreva aqui o ocorrido..."></textarea>
                                        </div>
                                        <br/>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12"><br>
                                        <div class="actionBar">
                                            <div class="msgBox">
                                                <div class="content"></div>
                                                <button class="btn btn-default" type="button">Cancelar</button> 
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
							<th>Ocorrência</th>
							<th>Cidade</th>
							<th>Banco</th>
							<th>Data</th>
							<th width="10%">AÃ§Ãµes</th>
                            <th width="3%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seguranca as $dados)
                        <tr class="odd gradeX">
                            <td>{{$dados->id or 'sem nada'}}</td>
                            <td>
								<h2><a href="#">{{$dados->ocorrencia or 'sem nada'}}</a></h2>

								<div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
									<span class="count_top"><i class="fa fa-home"></i> <small> Banco :{{$dados->banco or ' '}} | </small> </span>
									<span class="count_top"><i class="fa fa-city"></i> <small> Cidade :{{$dados->cidade or ' '}} | </small> </span>
									<span class="count_top"><i class="fa fa-calendar"></i> <small> Atualizada em :{{$dados->dataAtualizacao or ' '}} |</small> </span>
								</div>
							</td>
							<td>{{$dados->cidade or 'sem nada'}}</td>
							<td>{{$dados->banco or 'sem nada'}}</td>
							<td>{{$dados->dataOcorrido or 'sem nada'}}</td>

                            <td class="center">
                                <a href="{!! url('admin/editar_seguranca/'.$dados->id) !!}" class="" title="Editar Cadastro" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
                                <a href="{!! url('admin/deletar_seguranca/'.$dados->id) !!}" class="" title="Deletar Cadastro" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                            <td><input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> 
                        </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
