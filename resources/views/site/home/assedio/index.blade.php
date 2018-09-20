@extends('site.templates.template') @section('conteudo')

<!--slider with banners-->
<div class="page_content_offset">
	<!--breadcrumbs-->
	<section class="breadcrumbs">
		<div class="container">
			<ul class="horizontal_list clearfix bc_list f_size_medium">
				<li class="m_right_10 current"><a href="/public"
					class="default_t_color">Inicio<i
						class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
				<li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
			</ul>
		</div>
	</section>
	<div class="container">
		<div class="row clearfix">
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						<div
							class="col-lg-12 col-md-12 col-sm-12 m_bottom_40 m_xs_bottom_10">
							<!--alert boxex-->
							<div class="alert_box r_corners info m_bottom_10">
								<i class="fa fa-info-circle"></i>
								<p>
									"Para formalizar sua denuncia todos os campos são de
									preenchimento Obrigatório para uso do Sindicato.<br>

									Salientamos também que esses dados serão mantidos em absoluto <b>SIGILO</b>,
									e será encaminhado apenas para o Banco o teor da denuncia, o
									nome do denunciado e o local da ocorrência."
								</p>
							</div>
						</div>
						<!--left content column-->
						<section class="col-lg-9 col-md-9 col-sm-9">
							<div class="row clearfix">

								<div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_10">
									<section class="bg_light_color_1 breadcrumbs m_bottom_10 m_xs_bottom_5">
											<div class="d_table full_width cta_1 d_xs_block">
												<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_2">
													<p class=""><b>Dados do Denunciante</b></p>
												</div>
											</div>
									</section>
									<!-- p class="m_bottom_10">Preencha Todos os Campos com <span class="scheme_color">*</span>.</p-->
									<form action="{{ url('/ouvidoria')}}" method="post"
										enctype="multipart/form-data">

										{!! csrf_field() !!} <input name="data" type="hidden"
											class="form-control" id="create_data"
											value="<?= date('y-m-d H:i:s') ?>">

										<ul>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">
														Nome</label> <input type="text" id="cf_name" name="nome"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Cpf
													</label> <input type="text" id="cf_cpf" name="cpf"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<label for="cf_nasc"
														class="required d_inline_b m_bottom_5">Data de Nascimento</label>
													<input type="email" id="cf_nasc" name="dataNascimento"
														class="full_width r_corners" required="true" title="Data de Nascimento">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<div class="custom_select relative color_dark d_xs_block">
														<label for="cf_sexo"
															class="required d_inline_b m_bottom_5">Sexo </label>
														<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
														<ul id="filter_portfolio" class="select_list d_none"></ul>
														<select id="cf_sexo" name="sexo"
															class="full_width r_corners" required="true">
															<option value="F">Feminino</option>
															<option value="M">Masculino</option>
															<option value="NI">Não Informar</option>
														</select>
													</div>
												</div>
												<div class="f_left half_column">
													<label for="cf_fone"
														class="required d_inline_b m_bottom_5">Telefone</label> <input
														type="text" id="cf_fone" name="telefone"
														class="full_width r_corners" required="true" title="Telefone para contato">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_banco" class="required d_inline_b m_bottom_5">Empresa
													</label> <input type="text" id="cf_banco" name="empresa"
														class="full_width r_corners" required="true" title="Nome do Banco">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_agencia" class="required d_inline_b m_bottom_5">Agência/Dep.
													</label> <input type="text" id="cf_agencia" name="agencia"
														class="full_width r_corners" required="true" title="Agencia de trabalho">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_end" class="required d_inline_b m_bottom_5">Endereço
													</label> <input type="text" id="cf_end" name="endereco"
														class="full_width r_corners" required="true" title="Endereco de Trabalho">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_comple" class="required d_inline_b m_bottom_5">Complemento
													</label> <input type="text" id="cf_comple" name="complemento"
														class="full_width r_corners" title="Dados extras">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_cargo" class="required d_inline_b m_bottom_5">Cargo/Função
													</label> <input type="text" id="cf_cargo" name="cargo"
														class="full_width r_corners" required="true" title="Cargo que Ocupa">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_tempo" class="required d_inline_b m_bottom_5">Tempo
														de Banco <br><small>(Mese/Ano)</small> </label> 
														<input type="text" id="cf_tempo" name="nome" class="full_width r_corners" required="true" title="Tempo de Trabalho">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_email" class="required d_inline_b m_bottom_5">E-mail
													</label> <input type="email" id="cf_email" name="email"
														class="full_width r_corners" required="true" title="Email para Contato">
												</div>
											</li>
											
										<section class="bg_light_color_1 breadcrumbs m_bottom_10 m_xs_bottom_5">
											<div class="d_table full_width cta_1 d_xs_block">
												<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_2">
													<p class=""><b>Dados do Denunciado</b></p>
												</div>
											</div>
									</section>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="nome_Denunciado" class="required d_inline_b m_bottom_5">
														Nome</label> <input type="text" id="nome_Denunciado"
														name="nome_Denunciado" class="full_width r_corners"
														required="true" title="Nome do Denunciado">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="sexo_Denunciado"
														class="required d_inline_b m_bottom_5">Sexo </label>
													<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
													<ul id="filter_portfolio2" class="select_list d_none"></ul>
													<select id="sexo_Denunciado" name="sexo_Denunciado"
														class="full_width r_corners" required="true">
														<option value="F">Feminino</option>
														<option value="M">Masculino</option>
													</select>
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cargo_Denunciado" class="required d_inline_b m_bottom_5">Cargo/Função
													</label> <input type="text" id="cargo_Denunciado"
														name="cargo_Denunciado" class="full_width r_corners"
														required="true" title="Ocupação do denunciado">
												</div>
											</li>

											<li class="m_bottom_15"><label for="cf_message"
												class="d_inline_b m_bottom_5 required">Historico</label> <textarea
													id="cf_message" name="cf_message"
													class="full_width r_corners" title="Descreva todo os ocorridos"></textarea></li>
											<li>
											<div class="v_align_m t_align_r t_xs_align_l d_xs_block">
												<button type="submit" class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">Enviar</button>
											</div>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</section>
						@include('site.partes.menu_lateral')
					</div>
				</div>
			</div>
			<!--markup footer-->
		</div>
	</div>
</div>
</div>
@endsection
