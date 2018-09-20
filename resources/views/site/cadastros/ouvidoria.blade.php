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
						<!--left content column-->
						<section class="col-lg-9 col-md-9 col-sm-9">
							<div class="row clearfix">
								<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
									<h3 class="tt_uppercase color_dark m_bottom_25">Contato</h3>
									<ul class="c_info_list">
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_15">
												<i class="fa fa-map-marker f_left color_dark"></i>
												<p class="contact_e">
													Rua Gabriel Ferreira, 740-c/n<br> Teresina,(PI)
												</p>
											</div>
										</li>
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_10">
												<i class="fa fa-phone f_left color_dark"></i>
												<p class="contact_e">(86) 3304-5907</p>
												<p class="contact_e">(86) 3085-3335</p>
												<p class="contact_e">(86) 3085-3336</p>
												<p class="contact_e">(86) 9-9482-5261</p>
											</div>
										</li>
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_10">
												<i class="fa fa-envelope f_left color_dark"></i> <a
													class="contact_e default_t_color" href="">contato@bancariospi.org.br</a>
												<a class="contact_e default_t_color" href="">juridico@bancariospi.org.br</a>

											</div>
										</li>
									</ul>

								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
									<h3 class="tt_uppercase color_dark m_bottom_25">Formulário</h3>
									<!-- p class="m_bottom_10">Preencha Todos os Campos com <span class="scheme_color">*</span>.</p-->
									<form action="{{ url('/ouvidoria')}}" method="post"
										enctype="multipart/form-data">

										{!! csrf_field() !!} <input name="data" type="hidden"
											class="form-control" id="create_data"
											value="<?= date('d/m/Y') ?>">

										<ul>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Seu
														nome</label> <input type="text" id="cf_name" name="nome"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<label for="cf_email"
														class="required d_inline_b m_bottom_5">Seu e-mail</label>
													<input type="email" id="cf_email" name="email"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_banco"
														class="required d_inline_b m_bottom_5">Banco </label>
													<div class="select_title type_2 r_corners relative mw_10">Selecione
														um Item da lista</div>
													<ul id="filter_portfolio" class="select_list d_none"></ul>

													<select id="cf_banco" name="banco"
														class="full_width r_corners" required="true">
														<option value="Banco do Brasil">Banco do Brasil</option>
														<option value="Banco Rural">Banco Rural</option>
														<option value="Bic Banco">Bic Banco</option>
														<option value="Bradesco">Bradesco</option>
														<option value="BNB">BNB</option>
														<option value="Caixa Economica">Caixa Economica</option>
														<option value="CEF">CEF</option>
														<option value="HSBC">HSBC</option>
														<option value="Santander">Santander</option>
													</select>
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_assunto"
														class="required d_inline_b m_bottom_5">Assunto </label>
													<div class="select_title type_2 r_corners relative mw_10">Selecione
														um Item da lista</div>
													<ul id="filter_portfolio" class="select_list d_none"></ul>

													<select id="cf_assunto" name="tipo"
														class="full_width r_corners" required="true">
														<option value="Critica">Critica</option>
														<option value="Duvida">Duvida</option>
														<option value="Elogio">Elogio</option>
														<option value="Reclamacao">Reclamação</option>
														<option value="Sugestao">Sugestão</option>
													</select>
												</div>
											</li>
											<li class="m_bottom_15"><label for="cf_message"
												class="d_inline_b m_bottom_5 required">Messagem</label> <textarea
													id="cf_message" name="mensagem" required="true"
													class="full_width r_corners"></textarea></li>
											<li>
												<button type="submit"
													class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">
													Enviar</button>
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
@endsection
