@extends('site.templates.template') @section('conteudo')
<div class="page_content_offset">
	<div class="container">
		<!--banners-->
		<section class="col-lg-9 col-md-9 col-sm-9">
			<figure class="info_block_type_3">
				<div
					class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover"></div>
				<a href="#">
					<h2 class="fw_medium color_dark m_bottom_15">
						<img
					
					</h2>
				</a>
			</figure>
		</section>
		<section class="container">
			<div class="row clearfix">
				<div
					class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30 photoframe r_corners shadow wrapper">
					<div class="photoframe r_corners shadow wrapper m_bottom_20">
						<div class="simple_slide_show flexslider">
							<!--SLIDE -->
							<ul class="slides">
								@foreach($slide as $principal)
								<li><a href="ver-noticia/{{ $principal->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$principal->titulo)}}"> <img
										src="{{asset('/images/noticias/'.$principal->id .'/'.$principal->foto)}}"
										alt="{{asset('/images/noticias/'.$principal->id .'/'.$principal->foto)}}"
										class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
										<div class="simple_s_caption color_light tr_all_hover"></a> <a href="#">
										<h5 class="fw_medium m_bottom_10">
											<center>
												<a href="ver-noticia/{{ $principal->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$principal->titulo)}}">{{$principal->titulo}}</a>
											</center>
										</h5>
						
						</div>
						</li> @endforeach
						</ul>

					</div>
				</div>
			</div>
			<!--noticias lateral inicio-->
			<figure class="widget shadow r_corners wrapper m_bottom_30">
				<figcaption>
					<h3 class="color_light">DESTAQUES</h3>
				</figcaption>

				<div class="widget_content">
					@foreach($destaques as $destaque)
					<div class="clearfix m_bottom_15">
						<img src="{{asset('/images/noticias/'.$destaque->id .'/'.$destaque->foto)}}"
							alt="{{asset('/images/noticias/'.$destaque->id .'/'.$destaque->foto)}}"
							class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0"
							width="100" heigth="100"> <a
							href="ver-noticia/{{ $destaque->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$destaque->titulo)}}"
							class="color_dark d_block bt_link">{{$destaque->titulo}}</a>
						<p class="scheme_color">{{$destaque->data}}</p>
					</div>
					<hr class="m_bottom_15">

					@endforeach
				</div>
			</figure>

			<!--noticias lateral- fim-->
	
	</div>
	</section>
	<!--          fim slid       -->
	<section class="row clearfix">
		<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_sm_bottom_35">
			<a href="{{url('seguranca-bancaria')}}"
				class="d_block banner animate_ftr wrapper r_corners relative m_xs_bottom_30">
				<img src="images/banner_img_1.png" alt=""> <span
				class="banner_caption d_block vc_child t_align_c w_sm_auto"> <span
					class="d_block color_light tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><br>
						<br> <b>Segurança Bancária</b></span>
			</span>
			</a>
		</div>
		<div class="col-lg-6 col-md-9 col-sm-6 m_bottom_50 m_sm_bottom_35">
			<div class="row clearfix">
						<div class="col-lg-12 col-md-6 col-sm-6">
							<div class="r_corners bg_color_green_2 glyphicon_item vc_child">
								<div class="d_inline_middle d_md_block t_align_c">
									<i class="fa fa-globe d_inline_middle m_right_15 color_light d_md_block m_md_bottom_5 m_md_right_0"></i>
									<dl class="d_inline_middle color_light d_md_block">
										<dt><b>Atualização</b></dt>
										<dd class="fw_medium">Cadastral</dd>
									</dl>
								</div>
							</div>
						</div>
						</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_sm_bottom_35">
			<a href="{{url('assedio')}}"
				class="d_block banner animate_ftr wrapper r_corners type_2 relative">
				<img src="images/assedio.png" alt=""> <span
				class="banner_caption d_block vc_child t_align_c w_sm_auto"> <span
					class="d_inline_middle"> <span
						class="d_block divider_type_2 centered_db m_bottom_5 d_sm_none"></span>
						<span
						class="d_block color_light tt_uppercase m_bottom_15 banner_title_3 m_md_bottom_5 d_mxs_none"><b></b></span>

				</span>
			</span>
			</a>
		</div>
	</section>
	<div class="row clearfix">
		<aside class="col-lg-3 col-md-4 col-sm-3 m_xs_bottom_30">
			<!--tags-->
			<figure class="widget shadow r_corners wrapper m_bottom_30">
				<figcaption>
					<h3 class="color_light">
						<center>Agenda de Evento</center>
					</h3>
				</figcaption>
				<center><br>
				@foreach($agendas as $agenda)
				<hr class="m_bottom_10 divider_type_3">
				<h4 class="color_dark fw_medium m_bottom_10">{{$agenda->nome}}</h4> 
					<hr class="m_bottom_10 divider_type_3">
							<table class="description_table m_bottom_10">
								<tr>
									<td><i class="fa fa-map-marker"> Local :</i></td>
									<td><a href=" " class="color_dark"><strong>{{$agenda->local}}</strong></a></td>
								</tr>
								<tr>
									<td><i class="fa fa-calendar"> Data :</i></td>
									<td><span class="color_green"><strong>{{$agenda->data1}}</strong></span></td>
								</tr>
								<tr>
									<td><i class="fa fa-clock-o">Horário :</i></td>
									<td>{{$agenda->hora}}</td>
								</tr>
							</table>
				@endforeach
				</center>
			</figure>
			<!--widgets-->
			<figure
				class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
				<figcaption>
					<h3 class="color_light">Serviços</h3>
				</figcaption>
				<!--div class="widget_content">
                    <!--Categories list>
                    <ul class="categories_list">

                        <li>
                            <a href="#" class="f_size_large color_dark d_block relative">
                                <b>Assuntos Jurídicos</b>
                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                            </a>
                    <!--second level>
                    <ul class="d_none">
                        <li>
                            <a href="#" class="d_block f_size_large color_dark relative">
                                Ações<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                            </a>
                    <!--third level>
                    <ul class="d_none">
                        <li><a href="#" class="color_dark d_block">BB</a></li>
                        <li><a href="#" class="color_dark d_block">CEF</a></li>
                        <li><a href="#" class="color_dark d_block">BRADESCO</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="d_block f_size_large color_dark relative">
                        Convenções e Acordos<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <!--third level>
                    <ul class="d_none">
                        <li><a href="#" class="color_dark d_block">Acordo Aditivo BB</a></li>
                        <li><a href="#" class="color_dark d_block">Acordo Aditivo CEF</a></li>
                        <li><a href="#" class="color_dark d_block">Acordo BRADESCO</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="f_size_large color_dark d_block relative">
                        <b>Assédio Moral</b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <!--second level>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="f_size_large color_dark d_block relative">
                <b>Colônia de Férias</b>
                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
            </a>
                    <!--second level>
                </li>
                <li>
                    <a href="#" class="f_size_large color_dark d_block relative">
                        <b>Segurança Bancária</b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <!--second level>
                    <a href="#" class="f_size_large color_dark d_block relative">
                        <b>Albergue</b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <a href="#" class="f_size_large color_dark d_block relative">
                        <b>Agenda de Eventos</b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    </div--->
			</figure>
			<!--compare products>
                <!--IMFORMATIVOS-->
			<figure
				class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
				<figcaption>
					<a href="{{url('informativos')}}" title="{{url('informativos')}}">
						<h3 class="color_light">Publicações</h3>
					</a>
				</figcaption>
				<div class="widget_content">
					<p>Dados do informativo</p>
					<!--banner-->
					<a href="#"
						class="widget animate_ftr d_block r_corners m_bottom_30"> <iframe
							src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=ft9y7fqsc&bgcolor=EEEEEE&t=1519146540&p=2"
							seamless="seamless" scrolling="no" frameBorder="0"
							allowTransparency="true" allowFullScreen="true"></iframe>
					</a>
				</div>
			</figure>
			<!--Specials-->
			<figure
				class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
				<figcaption class="clearfix relative">
					<h3
						class="color_light f_left f_sm_none m_sm_bottom_10 m_xs_bottom_0">Nossos
						vídeos</h3>
					<div
						class="f_right nav_buttons_wrap_type_2 tf_sm_none f_sm_none clearfix">
						<button
							class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left tr_delay_hover r_corners sc_prev">
							<i class="fa fa-angle-left"></i>
						</button>
						<button
							class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left m_left_5 tr_delay_hover r_corners sc_next">
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</figcaption>
				<div class="widget_content">
					<div class="specials_carousel">
						<!--carousel item-->
						<div class="specials_item">
							<iframe width="220" height="164"
								src="https://www.youtube.com/embed/dDPxccX453Y?rel=0"
								frameborder="0" allowfullscreen></iframe>
							<h5 class="m_bottom_10">
								<a href="#" class="color_dark"></a>
							</h5>
							<br />
							<p class="f_size_large m_bottom_15">Nome do Video 1</p>
							<div class="clearfix m_bottom_5">
								<ul class="horizontal_list d_inline_b l_width_divider">
									<li class="m_right_15 f_md_none m_md_right_0"><a href="#"
										class="color_dark">Geral</a></li>
									<li class="f_md_none"><a href="#" class="color_dark">29/01/2013
											as 13hrs</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</figure>

		</aside>
		<section class="col-lg-9 col-md-9 col-sm-9">
			<figure class="info_block_type_3">
				<div
					class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover">
					<i class="fa fa-info d_inline_middle"></i>
				</div>
				<h2 class="fw_medium color_dark m_bottom_15">Fique informado</h2>
			</figure>
			<!--products-->
			<section
				class="products_container a_type_2 category_grid clearfix m_bottom_25">
				<!--product item-->
				@foreach($noticias as $segundarias)
				<div class="product_item hit w_xs_full">
					<figure
						class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
						<div class="clearfix m_bottom_5">
							<ul class="horizontal_list d_inline_b l_width_divider">
								<li class="m_right_5 f_md_none m_md_right_0"><a href="#"
									class="color_dark"><strong>|{{ $segundarias->categorias->nome or ' '
											}}</strong></a></li>
								<li class="f_md_none"><a href="#" class="color_dark">|{{$segundarias->data}}</a></li>
							</ul>
						</div>
						<!--product preview-->
						<a href="ver-noticia/{{$segundarias->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$segundarias->titulo)}}"
							class="d_block relative pp_wrap m_bottom_15"> <!--hot product-->
							<span class="hot_stripe"></span> <img
							src="{{asset('/images/noticias/'.$segundarias->id .'/'.$segundarias->foto)}}" class="tr_all_hover" alt=""> <span
							role="button" data-popup="#quick_view_product"
							class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Veja
								mais...</span> <!--description and price of product-->
							<figcaption>
								<h5 class="m_bottom_10">
									<a href="ver-noticia/{{$segundarias->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$segundarias->titulo)}}" class="color_dark">{{ $segundarias->titulo}}</a>
								</h5>
								<!--rating-->
							</figcaption>
						</a>
					</figure>
				</div>

				@endforeach
			</section>

			<!--banners-->
			<div class="clearfix">
				<div class="col-lg-9 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
					<figure class="info_block_type_3">
						<div
							class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover">
							<i class="fa fa-camera d_inline_middle"></i>
						</div>
						<h2 class="fw_medium color_dark m_bottom_15">Galeria de Fotos</h2>

					</figure>
				</div>
				<div
					class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none m_mxs_bottom_5">
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners nc_prev">
						<i class="fa fa-angle-left"></i>
					</button>
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners nc_next">
						<i class="fa fa-angle-right"></i>
					</button>
				</div>
			</div>
			<!--bestsellers carousel-->
			<div class="nc_carousel m_bottom_30 m_sm_bottom_20">
				<figure
					class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
					<!--product preview-->
					<a href="#" class="d_block relative pp_wrap m_bottom_15"> <!--hot product-->
						<span class="hot_stripe type_2"></span> <img
						src="images/product_img_5.jpg" class="tr_all_hover" alt=""> <span
						role="button" data-popup="#quick_view_product"
						class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Veja
							mais...</span>
					</a>
					<!--description and price of product-->
					<figcaption class="p_vr_0">
						<h5 class="m_bottom_10">
							<a href="#" class="color_dark">Aniversariantes do meses de Abril,
								Maio e Junho</a>
						</h5>
					</figcaption>
				</figure>
				<figure
					class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
					<!--product preview-->
					<a href="#" class="d_block relative pp_wrap m_bottom_15"> <img
						src="images/product_img_8.jpg" class="tr_all_hover" alt=""> <span
						role="button" data-popup="#quick_view_product"
						class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Veja
							mais...</span>
					</a>
					<!--description and price of product-->
					<figcaption class="p_vr_0">
						<h5 class="m_bottom_10">
							<a href="#" class="color_dark">Aniversariantes do meses de Abril,
								Maio e Junho</a>
						</h5>

					</figcaption>
				</figure>
				<figure
					class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative tr_all_hover">
					<!--product preview-->
					<a href="#" class="d_block relative pp_wrap m_bottom_15"> <!--sale product-->
						<span class="hot_stripe type_2"></span> <img
						src="images/product_img_4.jpg" class="tr_all_hover" alt=""> <span
						role="button" data-popup="#quick_view_product"
						class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Veja
							mais...</span>
					</a>
					<!--description and price of product-->
					<figcaption class="p_vr_0">
						<h5 class="m_bottom_10">
							<a href="#" class="color_dark">Aniversariantes do meses de Abril,
								Maio e Junho</a>
						</h5>

					</figcaption>
				</figure>
				<figure
					class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
					<!--product preview-->
					<a href="#" class="d_block relative wrapper pp_wrap m_bottom_15"> <img
						src="images/product_img_6.jpg" class="tr_all_hover" alt=""> <span
						role="button" data-popup="#quick_view_product"
						class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Veja
							mais..</span>
					</a>
					<!--description and price of product-->
					<figcaption class="p_vr_0">
						<h5 class="m_bottom_10">
							<a href="#" class="color_dark">Aniversariantes do meses de Abril,
								Maio e Junho</a>
						</h5>

					</figcaption>
				</figure>
			</div>
			<!--product brands-->
			<div class="clearfix m_bottom_25 m_sm_bottom_20">
				<div class="col-lg-9 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
					<figure class="info_block_type_3">
						<div
							class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover">
							<i class="fa fa-group d_inline_middle"></i>
						</div>
						<h2 class="fw_medium color_dark m_bottom_15">Nossos convênios</h2>

					</figure>
				</div>
				<div
					class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev">
						<i class="fa fa-angle-left"></i>
					</button>
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next">
						<i class="fa fa-angle-right"></i>
					</button>
				</div>
			</div>
			<!--product brands carousel-->

			<div class="product_brands with_sidebar m_sm_bottom_35">
				@foreach($convenios as $convenio) <a href="#"
					class="d_block t_align_c animate_fade" title="{{$convenio->nome_empresa}}"><img
					src="{{asset('/images/convenios/'.$convenio->id .'/'.$convenio->imagem)}}"></a> @endforeach
			</div> 

			<br />
			<hr>
			<br>
			<!--redes sociais-->
			<!--div class="clearfix"-->
			<div class="col-lg-9 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
				<figure class="info_block_type_3">
					<div
						class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover">
						<i class="fa fa-cogs d_inline_middle"></i>
					</div>
					<h2 class="fw_medium color_dark m_bottom_15">Redes Sociais</h2>

				</figure>
				<br>
				<div class="tabs">
					<!--tabs navigation-->
					<nav>
						<ul class="tabs_nav horizontal_list clearfix">
							<li class="f_xs_none"><a href="#tab-1"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Instagram</a></li>
							<li class="f_xs_none"><a href="#tab-2"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Facebook</a></li>
							<li class="f_xs_none"><a href="#tab-3"
								class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Twitter</a></li>
						</ul>
					</nav>
					<!--tabs content-->
					<section class="tabs_content shadow r_corners color-black"
						style="width: 540px;">

						<div id="tab-1">
							<script src="http://lightwidget.com/widgets/lightwidget.js"></script>
							<iframe
								src="http://lightwidget.com/widgets/e1ed8478d4d85af2ac6948989eb018a1.html"
								scrolling="no" allowtransparency="true"
								class="lightwidget-widget"
								style="width: 100%; border: 0; overflow: hidden;"></iframe>
						</div>
						<div id="tab-2">
							<div class="fb-page"
								data-href="https://www.facebook.com/bancariospi/"
								data-small-header="false" data-adapt-container-width="true"
								data-hide-cover="false" data-show-facepile="true">
								<blockquote cite="https://www.facebook.com/bancariospi/"
									class="fb-xfbml-parse-ignore">
									<a href="https://www.facebook.com/bancariospi/">Sindicato dos
										Bancários do Piauí</a>
								</blockquote>
							</div>
						</div>
						<div id="tab-3">
							<!--a class="twitter-timeline" data-width="500" data-height="500" data-theme="light" data-link-color="#E81C4F" href="https://twitter.com/bancariospi?ref_src=twsrc%5Etfw">Tweets by bancariospi</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script-->
						</div>

					</section>
				</div>
			</div>
			<!--product brands-->
			<div class="clearfix m_bottom_25 m_sm_bottom_0">
				<div class="col-lg-9 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_0">
					<figure class="info_block_type_3">
						<div
							class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover">
							<i class="fa fa-group d_inline_middle"></i>
						</div>
						<h2 class="fw_medium color_dark m_bottom_5">Parceiros</h2>

					</figure>
				</div>
				<div
					class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev">
						<i class="fa fa-angle-left"></i>
					</button>
					<button
						class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next">
						<i class="fa fa-angle-right"></i>
					</button>
				</div>
			</div>
			<!--product brands carousel-->

			<div class="product_brands with_sidebar m_sm_bottom_0">
				@foreach($convenios as $convenio) <a href="#"
					class="d_block t_align_c animate_fade" title="{{$convenio->nome_empresa}}"><img
					src="{{asset('/images/convenios/'.$convenio->id .'/'.$convenio->imagem)}}"></a> 
					@endforeach
			</div> 
		</div>
		
		</section>

	</div>
</div>
</div>

</div>

@endsection
