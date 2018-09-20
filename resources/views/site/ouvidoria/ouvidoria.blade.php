@extends('site.templates.template')

@section('conteudo')

<div class="page_content_offset"><!--breadcrumbs-->
	<div class="container">
		<div class="row clearfix">
			<section class="container">
				<!--add comment-->
				<h3 class="tt_uppercase color_dark m_bottom_30">Ouvidoria Geral</h3>
				<form  action="{{ url('/ouvidoria')}}" method="post" enctype="multipart/form-data" class="bs_inner_offsets full_width bg_light_color_3 r_corners shadow m_xs_bottom_30">
					{!! csrf_field() !!}
					 <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('y-m-d H:i:s') ?>">
					<ul>
						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
								@if(Session::has('message'))
								{{ Session::get('message') }}
								@endif

								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
							</div>
						</li>

						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
								<label for="nome" class="required d_inline_b m_bottom_5">Nome</label><br>
								<input type="text" required="true" id="nome" name="nome" class="r_corners full_width">
							</div>
						</li>

						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
								<label for="email" class="required d_inline_b m_bottom_5">Email</label><br>
								<input type="email" required="true" id="email" name="email" class="r_corners full_width" >
							</div>
						</li>

						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
								<label class="d_inline_b m_bottom_5 required" for="banco">Banco</label>
								<!--product name select-->
								<div class="custom_select relative">
									<div class="select_title type_2 r_corners relative color_dark mw_0">Selecione um banco</div>
									<ul class="select_list d_none"></ul>
									<select name="banco" id="banco" required="true">
										<option value="Banco do Brasil">Banco do Brasil</option>
										<option value="Bradesco">Bradesco</option>
										<option value="BNB">BNB</option>
										<option value="CEF">CEF</option>
									</select>
								</div>
							</div>
						</li>

						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
								<label class="d_inline_b m_bottom_5 required" for="tipo">Tipo Atendimento</label>
								<!--product name select-->
								<div class="custom_select relative">
									<div class="select_title type_2 r_corners relative color_dark mw_0">Selecione seu tipo de atendimento</div>
									<ul class="select_list d_none"></ul>
									<select name="tipo" id="tipo" >
										<option value="Critica">Crítica</option>
										<option value="Duvida">Dúvida</option>
										<option value="Elogio">Elogio</option>Elogio
										<option value="Reclamacao">Reclamação</option>
										<option value="Sugestao">Sugestão</option>
									</select>
								</div>
							</div>
						</li>

						<li class="clearfix m_bottom_15">
							<div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
								<label for="cf_message" class="d_inline_b m_bottom_5 required">Message</label>
								<textarea rows="4" cols="56" id="mensagem" name="mensagem" ></textarea>
							</div>
						</li>
						<br><br>
						<li class="m_bottom_20">
							<button type="submit" class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">Enviar</button>
						</li>
					</ul>
				</form>
			</section>
		</div>
	</div>
</div>
@endsection