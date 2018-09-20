@extends('layouts.Gentelella') @section('content')
<div class="row">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>
					Você está em <small>{{$titulo or 'pags'}}</small>
				</h3>
			</div>

			<div class="title_right">
				<div
					class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control"
							placeholder="Search for..."> <span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="row">
			<!--form action -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							Cadastramento de <small>{{$titulo or 'Cadastrando Diretoria'}}</small>
						</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-expanded="false"><i
									class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
								</ul></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form action="{{ url('/admin/diretoria')}}" method="post"
							enctype="multipart/form-data">
							{!! csrf_field() !!}
							<!-- /.row-->
							<div class="">
								<div class="col-lg-12">
									<!--data e hora da psotagem-->
									<input name="data" type="hidden" class="form-control"
										id="create_data" value="<?= date('d/m/Y') ?>">

									<div class="row">
										<div class="form-group col-md-6">
											<label for="a_local">Tipo de Diretoria*:</label> <select
												id="tipo" class="form-control" required name="tipo">
												<option value="">-- Selecione --</option>
												<option value="Conselho  Fiscal">Conselho Fiscal</option>
												<option value="Diretoria Executiva">Diretoria Executiva</option>
												<option value="Diretoria Regional">Diretoria Regional</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="nome">Nome</label> <input name="nome" type="text"
												class="form-control" id="nome" placeholder="Nome" required>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="Cargo">Cargo</label> <select id="cargo"
												class="form-control" required name="cargo">
												<option value="">-- Selecione --</option>
												<option value="Administração">Administração </option>
												<option value="Coordenador ">Coordenador  </option>
												<option value="Membro">Membro </option>
												<option value="Organização">Organização </option>
												<option value="Presidente">Presidente</option>
												<option value="Primeiro Secretário">Primeiro Secretário </option>
												<option value="Política Sindical">Política Sindical </option>
												<option value="Recursos Humanos">Recursos Humanos </option>
												<option value="Saúde e Segurança no Trabalho">Saúde e Segurança no Trabalho </option>
												<option value="Secretário de Assuntos Econômicos">Secretário de Assuntos Econômicos</option>
												<option value="Sec. de Assuntos Jurídicos">Sec. de Assuntos Jurídicos </option>
												<option value="Secretária de Assuntos da Mulher">Secretária de Assuntos da Mulher </option>
												<option value="Secretário de Aposentados">Secretário de Aposentados </option>
												<option value="Secretário de Cultura">Secretário de Cultura </option>
												<option value="Secretário de Esportes">Secretário de Esportes </option>
												<option value="Secretária de Formação Sindical">Secretária de Formação Sindical</option>
												<option value="Secretario Geral">Secretario Geral </option>
												<option value="Secretária de Imprensa e Comunicação">Secretária de Imprensa e Comunicação</option>
												<option value="Secretário de Relações do Trabalho">Secretário de Relações do Trabalho </option>
												<option value="Suplente">Suplente </option>																		
												<option value="Tesoureiro(a)">Tesoureiro(a)</option>
												<option value="Vice-Presidente">Vice-Presidente </option>
											</select>

										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="email">E-mail</label> <input name="email"
												type="email" class="form-control" id="email" required
												placeholder="email">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="banco">Banco</label> <input name="banco"
												type="text" class="form-control" id="banco" required
												placeholder="banco">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-3">
											<label for="telefone">Telefone</label> <input name="telefone"
												type="text" class="form-control" id="telefone" required
												placeholder="telefone">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-2">
											<label for="a_local">Ordem*:</label> <select id="ordem"
												class="form-control" required name="ordem">
												<option value="">-- Selecione --</option>
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-3">
											<br> <label for="status">Ativar?:</label> <input
												type="checkbox" name="status" id="status"
												data-parsley-mincheck="2" class="flat" />
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="imagem">Imagem de Slide :</label> 
											<input 	type="file" id="imagem" name="imagem" class="btn btn-primary" data-input="thumbnail" data-preview="holder"> 
											<input type="hidden" name="x1"	value="" /> 
											<input type="hidden" name="y1" value="" /> 
											<input type="hidden" name="w" value="" /> 
											<input type="hidden" name="h" value="" />
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group col-md-6">
											<img id="previewimage" style="display: none;"  with="400" height="400"/>
										</div>
									</div>
									<br>
									<div class="actionBar">
										<div class="msgBox">
											<div class="content"></div>
											<button class="btn btn-default" type="button"
												onClick="JavaScript: window.history.back();">Cancelar</button>
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
				<h2>
					Lista de Diretores<small>{{$pags_tatal or '0'}}</small>
				</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="false"><i
							class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a></li>
						</ul></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th width="35%">Nome</th>
							<th width="15%">Cargo</th>
							<th>Email</th>
							<th>Telefone</th>
							<th width="8%">Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach($diretoria as $dados)
						<tr class="odd gradeX">
							<td>{{$dados->id or 'sem nada'}}</td>
							<td>
								<h2>
									<a href="#">{{$dados->nome or 'sem nada'}}</a>
								</h2>

								<div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
									<span class="count_top"><i class="fa fa-user"></i> <small>
											Postado por :{{$dados->usuario->name or 'Nome'}} | </small> </span>
									<span class="count_top"><i class="fa fa-calendar"></i> <small>
											Criado em :{{$dados->data1 or 'data'}} |</small> </span>
								</div>
							</td>
							<td>{{$dados->cargo or 'sem nada'}}</td>
							<td>{{$dados->email or 'sem nada'}}</td>
							<td class="center">{{$dados->telefone or 'sem nada'}}</td>

							<td class="center">
								<!--a href="{!! url('admin/visualizar_diretoria/'.$dados->id) !!}" class="" title="Visualizar" data-toggle="tooltip" data-placement="top"><i class="fa fa-1x fa-eye"></i></a-->
								<a href="{!! url('admin/editar_diretoria/'.$dados->id) !!}"
								class="" title="Editar Cadastro" data-toggle="tooltip"
								data-placement="top"><i class="fa fa-1x fa-pencil-square-o"></i></a>
								<a href="{!! url('admin/status_diretoria/'.$dados->id) !!}"
								class="" title="{{$dados->status}}" data-toggle="tooltip"
								data-placement="top"> @if($dados->status=='S') <i
									class="fa fa-1x fa-fw fa-star"></i> @else <i
									class="fa fa-1x fa-fw fa-star-o"></i> @endif

							</a> <a href="{!! url('admin/deletar_diretoria/'.$dados->id) !!}"
								class="" title="Deletar Cadastro" data-toggle="tooltip"
								data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	@endsection