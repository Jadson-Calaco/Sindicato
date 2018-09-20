@extends('site.templates.template')
@section('conteudo')

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
			<h2 class="tt_uppercase color_dark m_bottom_40">Diretoria e Delegados
				Sindicais - (Gestão : 2016-2019)</h2>
			<div class="col-lg-12 col-sm-9 col-md-9 m_bottom_60">

				<div class="tabs">
					<!--tabs navigation-->
					<nav>
						<ul class="tabs_nav horizontal_list clearfix">
							<li class="f_xs_none"><a href="#tab-1"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Diretoria
									administrativa</a></li>
							<li class="f_xs_none"><a href="#tab-2"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Conselho
									Fiscal</a></li>
							<li class="f_xs_none"><a href="#tab-3"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Diretores
									Regionais</a></li>

						</ul>
					</nav>
					<!--tabs content-->
					<section class="tabs_content shadow r_corners">
						<div id="tab-1">
							<!--h2 class="tt_uppercase color_dark m_bottom_25">Team Members</h2-->
							<div class="row clearfix">
						@foreach($diretoria as $diretores)
								@if($diretores->tipo=='Diretoria Executiva')
								<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
									<figure class="t_align_c">
										<div class="circle wrapper team_photo d_inline_b m_bottom_15">
											<img src="{{asset($diretores->imagem)}}" alt="">

										</div>
										<figcaption>
											<h4 class="fw_medium color_dark">{{ $diretores->nome }}</h4>
											<p class="color_dark m_bottom_10">{{ $diretores->cargo }}</p>
											<p class="m_bottom_1">
											   <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
													<i class="fa fa-phone"></i>{{$diretores->telefone}}
											</a>
											</p>
												<hr class="divider_type_5 d_inline_b m_bottom_5">
												<ul
													class="clearfix horizontal_list social_icons d_inline_b t_md_align_c">
													<li
														class="facebook f_md_none d_md_inline_middle m_bottom_5 relative">
														<a href="#"
														class="r_corners t_align_c tr_delay_hover f_size_ex_large">
															<i class="fa fa-facebook"></i>
													</a>
													</li>

												</ul>
										
										</figcaption>
									</figure>
								</div>
								  @endif
								@endforeach
							</div>
							<!--fim tab-->
						</div>
						<div id="tab-2">
							<div class="row clearfix">
							@foreach($diretoria as $conselho)
							
								@if($conselho->tipo == 'Conselho  Fiscal')
								 
								   <div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
									<figcaption>
											<h4 class="fw_medium color_dark">{{ $conselho->nome }}</h4>
											<p class="color_dark m_bottom_10">{{ $conselho->cargo }}</p>
											<p class="m_bottom_1">
											   <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
													<i class="fa fa-phone"></i>{{$conselho->telefone}}
											</a>
											</p>
												<hr class="divider_type_5 d_inline_b m_bottom_5">
												<ul
													class="clearfix horizontal_list social_icons d_inline_b t_md_align_c">
													<li
														class="facebook f_md_none d_md_inline_middle m_bottom_5 relative">
														<a href="#"
														class="r_corners t_align_c tr_delay_hover f_size_ex_large">
															<i class="fa fa-facebook"></i>
													</a>
													</li>

												</ul>
										
										</figcaption>
								   </div>
								@endif
							@endforeach
							</div>
							<!--fim parte diretor-->
						</div>
						 
						<!---fim tab-2 -->
						<div id="tab-3">
							<div class="row clearfix">
							@foreach($diretoria as $regional)
								@if($regional->tipo=='Diretoria Regional')
								   <div
									class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
									<figcaption>
											<h4 class="fw_medium color_dark">{{ $diretores->nome }}</h4>
											<p class="color_dark m_bottom_10">{{ $diretores->cargo }}</p>
											<p class="m_bottom_1">
											   <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
													<i class="fa fa-phone"></i>{{$diretores->telefone}}
											</a>
											</p>
												<hr class="divider_type_5 d_inline_b m_bottom_5">
												<ul
													class="clearfix horizontal_list social_icons d_inline_b t_md_align_c">
													<li
														class="facebook f_md_none d_md_inline_middle m_bottom_5 relative">
														<a href="#"
														class="r_corners t_align_c tr_delay_hover f_size_ex_large">
															<i class="fa fa-facebook"></i>
													</a>
													</li>

												</ul>
										
										</figcaption>
								   </div>
								@endif
						  @endforeach
							</div>
							<!--fim parte diretor-->
						</div>
						 
						<!--fim tab-3-->

					</section>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection
