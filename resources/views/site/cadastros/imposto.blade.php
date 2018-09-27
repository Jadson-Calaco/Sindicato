@extends('site.templates.template') 
@section('conteudo')

<!--slider with banners-->
<div class="page_content_offset">
	<!--breadcrumbs-->
	<section class="breadcrumbs">
		<div class="container">
			<ul class="horizontal_list clearfix bc_list f_size_medium">
				<li class="m_right_10 current"><a href="{{url('/')}}"
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
							<section
								class="bg_light_color_1 breadcrumbs m_bottom_10 m_xs_bottom_5">
								<div class="d_table full_width cta_1 d_xs_block">
									<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_2">
										<p class="">
											<b><center>Solicitação de Devolução do IMPOSTO SINDICAL/2018</center></b>
										</p>
									</div>
								</div>
							</section>
							<div class="alert_box r_corners info m_bottom_10">
							    <p>
    							    <ul class="vertical_list_type_2 d_inline_b">
    							       <li>Anexar o Contracheque comprovando Débito</li>
    							       <li>Preencha <b>*TODOS</b> os campos do formulário
    										abaixo;
    									</li>
    									<li><a href="{{ asset('/images/imposto/imposto.pdf') }}">Ou baixe a ficha, preencha e nos envie todos os arquivos necessarios(A ficha preenchida e o Contra cheque)</a></li>
    							    </ul>
							    </p><br><br>
							    
								<p>
									<p style="text-align: justify;">Ao Sindicato dos Bancários do Piauí</p>
									<p style="text-align: justify;">Sr. Presidente,</p>
									<p style="text-align:justify">&nbsp; &nbsp; &nbsp; Venho por meio deste, <strong>REQUERER</strong> a devolução integral do valor correspondente ao&nbsp;<strong>IMPOSTO SINDICAL</strong>
									cuja débito foi realizado no mês de março/2018,&nbsp;tendo em vista a nova contribuição prevista na cláusula 5ª da
									CCT FENABAN 2018/2020 em favor das entidades sindicais. Anexo ao presente requerimento o meu contracheque do mês de março/2018 comprovando o débito.</p>
								</p>
							</div>
						</div>
						<!--left content column-->
						<section class="col-lg-9 col-md-9 col-sm-9">
							<div class="row clearfix">

								<div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_10">
									<section
										class="bg_light_color_1 breadcrumbs m_bottom_10 m_xs_bottom_5">
										<div class="d_table full_width cta_1 d_xs_block">
											<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_2">
												<p class="">
													<b>Dados Bancários para o Crédito</b>
												</p>
											</div>
										</div>
									</section>
									<!-- p class="m_bottom_10">Preencha Todos os Campos com <span class="scheme_color">*</span>.</p-->
									<form action="{{ url('/imposto')}}" method="post"
										enctype="multipart/form-data">

										{!! csrf_field() !!} <input name="data" type="hidden"
											class="form-control" id="create_data"
											value="<?= date('d/m/Y') ?>">

										<ul>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">
														Nome</label> <input type="text" id="cf_name" name="nome"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">
														Matricula</label> <input type="text" id="cf_name" name="matricula"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_cpf" class="required d_inline_b m_bottom_5">Cpf
													</label> <input type="text" id="cpf" name="cpf"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<label for="cf_fone" class="required d_inline_b m_bottom_5">Telefone</label>
													<input type="text" id="telefone" name="telefone"
														class="full_width r_corners" required="true"
														title="Telefone para contato">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_banco"
														class="required d_inline_b m_bottom_5">Banco </label> <input
														type="text" id="cf_banco" name="banco"
														class="full_width r_corners" required="true"
														title="Nome do Banco">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_agencia"
														class="required d_inline_b m_bottom_5">Agência</label> <input
														type="text" id="cf_agencia" name="agencia"
														class="full_width r_corners" required="true"
														title="Agencia de trabalho">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_conta"
														class="required d_inline_b m_bottom_5">Conta Corrente </label>
													<input type="text" id="cf_conta" name="conta"
														class="full_width r_corners" title="Conta Corrente">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_email"
														class="required d_inline_b m_bottom_5">E-mail </label> <input
														type="email" id="cf_email" name="email"
														class="full_width r_corners" required="true"
														title="Email para Contato">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label class="d_inline_b m_bottom_10">Contra Cheque</label> <input
														type="file" id="arquivo" name="arquivo"
														class="full_width r_corners">

												</div>
											</li>
											<li>
												<div class="v_align_m t_align_r t_xs_align_l d_xs_block">
													<button type="submit"
														class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">Solicitar</button>
												</div>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</section>
						<!-- include -->
					</div>
				</div>
			</div>
			<!--markup footer-->
		</div>
	</div>
</div>
</div>
</div>
@endsection
