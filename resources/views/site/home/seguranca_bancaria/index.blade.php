@extends('site.templates.template') @section('conteudo')

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
	<!--slider with banners-->
	<div class="container">
		<div class="row clearfix">
			<br>
			<h2 class="tt_uppercase color_dark m_bottom_40">Segurança Bancária</h2>
			<div class="col-lg-12 col-sm-9 col-md-9 m_bottom_60">

				<div class="tabs">
					<!--tabs navigation-->
					<nav>
						<ul class="tabs_nav horizontal_list clearfix">
							<li class="f_xs_none"><a href="#tab-1"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Ocorr�ncias </a></li>
								
							<li class="f_xs_none"><a href="#tab-2"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Modalidade	de Crime</a></li>
									
							<li class="f_xs_none"><a href="#tab-3"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Bancos</a></li>
									
							<li class="f_xs_none"><a href="#tab-4"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Cidades</a></li>
						</ul>
					</nav>
					<!--tabs content-->
					<section class="tabs_content shadow r_corners">
						<div id="tab-1">
							<!--h2 class="tt_uppercase color_dark m_bottom_25">Team Members</h2-->
							<div class="row clearfix">
							    <table class="table_type_7 responsive_table full_width t_align_l">
											<thead>
												<tr class="f_size_large" style="font-weight: bold; ">
													<th style="width:203px; text-align:center;">BANCO</th>
													<th style="width:203px; text-align:center;">Explosão</th>
													<th style="width:203px; text-align:center;">Assalto</th>
													<th style="width:203px; text-align:center;">Arrombamento</th>
													<th style="width:203px; text-align:center;">Tentativa</th>
													<th style="width:203px; text-align:center;">Saidinha</th>
													<th style="width:203px; text-align:center;">Total</th>
												</tr>
											</thead>
											<tbody>
											  @foreach($ocorrencias as $oco)
												<tr align="center">
												  <td data-title="Banco do Brasil">{{$oco->banco or '0 mes'}}</td>
												  <td data-title="Product Status">{{$oco->Explosao or '0 mes'}}</td>
												  <td data-title="Product Status">{{$oco->Assalto  or '0 mes'}}</td>
												  <td data-title="Product Name">{{$oco->Arrombamento  or '0 mes'}}</td>													
												  <td data-title="Product Status">{{$oco->Tentativa or '0 mes'}}</td>
												  <td data-title="Product Status">{{$oco->Saidinha or '0 mes'}}</td>
												  <td data-title="Product Status">{{$oco->PorBanco or '0 mes'}}</td> 
												</tr>
											 @endforeach
											</tbody>
										</table>
							</div>
							<!--fim tab-->
						</div>
						<div id="tab-2">
							<div class="row clearfix">
								<table class="table_type_7 responsive_table full_width t_align_l">
											<thead>
												<tr class="f_size_large" style="font-weight: bold; ">
													<th style="width:203px; text-align:center;">Ocorrências</th>
													<th style="width:203px; text-align:center;">2014</th>
													<th style="width:203px; text-align:center;">2015</th>
													<th style="width:203px; text-align:center;">2016</th>
													<th style="width:203px; text-align:center;">2017</th>
													<th style="width:203px; text-align:center;">2018</th>
													<th style="width:203px; text-align:center;">Total</th>
												</tr>
											</thead>
											<tbody>
											   @foreach($modalidades as $mod)
												<tr align="center">
												  <td data-title="Banco do Brasil">{{$mod->ocorrencia or 'sem nada'}}</td>
													<td data-title="Product Name">{{$mod->casoOcorrenciasPorAno1 or 'sem nada'}}</td>
													<td data-title="Product Status">{{$mod->casoOcorrenciasPorAno2 or 'sem nada'}}</td>
													<td data-title="Price">{{$mod->casoOcorrenciasPorAno3 or 'sem nada'}}</td>
													<td data-title="Qty">{{$mod->casoOcorrenciasPorAno4 or 'sem nada'}}</td>
													<td data-title="Tax">{{$mod->casoOcorrenciasPorAno5 or 'sem nada'}}</td>
													<td data-title="Discount">{{$mod->PorOcorrencia or 'sem nada'}}</td> 
												</tr>
												@endforeach
												<tr style="font-weight: bold; text-align:center">
													<td data-title="Santander">Total</td>
    													<td data-title="Product Name">{{$mod->casosPorAno1 or '0 mes'}}</td>
    													<td data-title="Product Status">{{$mod->casosPorAno2 or '0 mes'}}</td>
    													<td data-title="Price">{{$mod->casosPorAno3 or '0 mes'}}</td>
    													<td data-title="Qty">{{$mod->casosPorAno4 or '0 mes'}}</td>
    													<td data-title="Tax">{{$mod->casosPorAno5 or '0 mes'}}</td>
    													<td data-title="Discount">{{$mod->total or '0 mes'}}</td>
												</tr>
											</tbody>
										</table>
							</div>
							<!--fim parte diretor-->
						</div>

						<!---fim tab-2 -->
						<div id="tab-3">
							<div class="row clearfix">
								<table class="table_type_7 responsive_table full_width t_align_l">
											<thead>
												<tr class="f_size_large" style="font-weight: bold; ">
													<th style="width:203px; text-align:center;">BANCO</th>
													<th style="width:203px; text-align:center;">2014</th>
													<th style="width:203px; text-align:center;">2015</th>
													<th style="width:203px; text-align:center;">2016</th>
													<th style="width:203px; text-align:center;">2017</th>
													<th style="width:203px; text-align:center;">2018</th>
													<th style="width:203px; text-align:center;">Total</th>
												</tr>
											</thead>
											<tbody>
											  @foreach($bancos as $ban)
												<tr align="center">
												  <td data-title="Banco do Brasil">{{$ban->banco or '0 mes'}}</td>
													<td data-title="Product Name">{{$ban->casosPorAnoDoBanco1 or '0 mes'}}</td>
													<td data-title="Product Status">{{$ban->casosPorAnoDoBanco2 or '0 mes'}}</td>
													<td data-title="Price">{{$ban->casosPorAnoDoBanco3 or '0 mes'}}</td>
													<td data-title="Qty">{{$ban->casosPorAnoDoBanco4 or '0 mes'}}</td>
													<td data-title="Tax">{{$ban->casosPorAnoDoBanco5 or '0 mes'}}</td>
													<td data-title="Discount">{{$ban->PorBanco or '0 mes'}}</td>
													 
												</tr>
											 @endforeach
												<tr style="font-weight: bold; text-align:center">
													<td data-title="Santander">Total</td>
    													<td data-title="Product Name">{{$ban->casosPorAno1 or '0 mes'}}</td>
    													<td data-title="Product Status">{{$ban->casosPorAno2 or '0 mes'}}</td>
    													<td data-title="Price">{{$ban->casosPorAno3 or '0 mes'}}</td>
    													<td data-title="Qty">{{$ban->casosPorAno4 or '0 mes'}}</td>
    													<td data-title="Tax">{{$ban->casosPorAno5 or '0 mes'}}</td>
    													<td data-title="Discount">{{$ban->total or '0 mes'}}</td>
												</tr>
											  	 
											</tbody>
										</table>
							</div>
							<!--fim parte diretor-->
						</div>

						<!--fim tab-3-->
						<div id="tab-4">
							<div class="row clearfix">
								<table class="table_type_7 responsive_table full_width t_align_l">
											<thead>
												<tr class="f_size_large" style="font-weight: bold; ">
													<th style="width:203px; text-align:center;">Nº</th>
													<th style="width:203px; text-align:center;">Cidade</th>
													<th style="width:203px; text-align:center;">Banco</th>
													<th style="width:203px; text-align:center;">Ocorrência</th>
													<th style="width:203px; text-align:center;">Data</th>
													
												</tr>
											</thead>
											<tbody>
											 @php $i = 0 @endphp
											 @foreach($cidades as $cid)
											   @php $i++ @endphp
												<tr style="text-align:center;">
												  <td data-title="Banco do Brasil">{{$i or 'sem nada'}}</td>
													<td data-title="Product Name">{{$cid->cidade or 'sem nada'}}</td>
													<td data-title="Product Status">{{$cid->banco or '0 mes'}}</td>
													<td data-title="Price">{{$cid->ocorrencia or 'sem nada'}}</td>
													<td data-title="Qty">{{$cid->dataOcorrido or 'sem nada'}}</td>
												</tr>
											 @endforeach												 
											</tbody>
										</table>
							</div>
							<!--fim parte diretor-->
						</div>

						<!---fim tab-4 -->

					</section>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection
