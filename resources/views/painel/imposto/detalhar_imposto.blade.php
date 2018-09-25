@extends('layouts.Gentelella') @section('content')
<div class="row">
	<div class="">

		<div class="row">
			<!--form action -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							Detalhar Imposto
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
						<form action="#" method="post" enctype="multipart/form-data">
							{!! csrf_field() !!}
							<!-- /.row-->
							<div class="">
								<div class="col-lg-12">
									<!--data e hora da psotagem-->
									<div class="row">
										<div class="form-group col-md-6">
											<label for="titulo">Nome</label> <input name="titulo"
												type="text" class="form-control" id="titulo"
												placeholder="Nome" value="{!! $imposto->nome !!}" disabled>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-4">
											<label for="subtitulo">Matricula</label> <input
												name="subtitulo" type="text" class="form-control"
												id="subtitulo" placeholder="Matricula" value="{!! $imposto->matricula !!}" disabled>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="n_fotografo">Cpf</label> <input name="fotografo"
												type="text" class="form-control" id="n_fotografo"
												placeholder="Cpf" value="{!! $imposto->cpf !!}" disabled>
										</div>

										<div class="form-group col-md-4">
											<label for="n_fonte">Telefone</label> <input name="fonte"
												type="text" class="form-control" id="n_fonte"
												placeholder="Telefone" value="{!! $imposto->telefone !!}" disabled>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="tag">Banco</label> <input name="tag" type="text"
												class="form-control" id="n_fonte" placeholder="Banco" 
												value="{!! $imposto->banco !!}" disabled>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="tag">Agência</label> <input name="tag"
												type="text" class="form-control" id="n_fonte"
												placeholder="Agência" value="{!! $imposto->agencia !!}" disabled>
										</div>

										<div class="form-group col-md-4">
											<label for="tag">Conta Corrente</label> <input name="tag"
												type="text" class="form-control" id="n_fonte"
												placeholder="Conta Corrente" value="{!! $imposto->conta !!}" disabled>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for="tag">Email</label> <input name="tag" type="text"
												class="form-control" id="n_fonte" placeholder="Email" value="{!! $imposto->email !!}" disabled>
										</div>
									</div>
									@if( isset($imposto) && $imposto->arquivo != '')
									<br>
                                	<li class="m_bottom_15">
										<a class="btn btn-primary" href="{!! url('admin/gerar_pdf_imposto/'.$imposto->id) !!}" role="button">ContraCheque</a>
									</li>
									@endif
									<br> <br>
									<div class="actionBar">
										<div class="msgBox">
											<div class="content"></div>
											<button class="btn btn-default" type="button"
												onClick="JavaScript: window.history.back();">Voltar</button>
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
@endsection
