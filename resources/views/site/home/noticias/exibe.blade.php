@extends('site.templates.template') @section('conteudo')
<div class="page_content_offset">
	<!--breadcrumbs-->
	<section class="breadcrumbs">
		<div class="container">
			<ul class="horizontal_list clearfix bc_list f_size_medium">
				<li class="m_right_10 current"><a href="{{url('/')}}"
					class="default_t_color">Inicio<i
						class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
				<li><a href="" class="default_t_color">{{$pag or "not found"}}</a></li>
			</ul>
		</div>
	</section>
	<div class="container">
		<div class="page_content_offset">
			<div class="row clearfix">
				<!--left content column-->
				<section class="col-lg-9 col-md-12 col-sm-9">
					@foreach($noticias as $noticia)
					<!--blog post-->
					<article class="m_bottom_15">
						<div class="row clearfix m_bottom_15">
							<div class="col-lg-12 col-md-9 col-sm-8">
								<h3 class="m_bottom_5 color_dark fw_medium m_xs_bottom_10">{!!$noticia->titulo !!}</h3>
								<p class="f_size_medium">{{$noticia->sutitulo or ''}}</p>
							</div>
						</div>
						<div class="m_bottom_30">
								<p class="d_inline_middle">Compartilhe :</p>
								<div class="d_inline_middle m_left_5 addthis_widget_container">
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
									<a class="addthis_button_facebook" addthis:userid="https://www.facebook.com/bancariospi/"></a>
									<a class="addthis addthis_button_twitter"></a>
									<a class="addthis addthis_button_google_plusone_share"></a>
									<a class="addthis_button_youtube_follow" addthis:userid="justicaeleitoral"></a>
									<a class="addthis addthis_button_print"></a>
									<a class="addthis_counter addthis_bubble_style"></a>
									</div>
									<!-- AddThis Button END -->
								</div>
							</div>
							<hr class="divider_type_2 m_bottom_10">
								<p class="m_bottom_10">Em {{$noticia->data or ''}} <a href="#" class="color_dark"> :» {{$noticia->categorias->nome or ''}} </a></p>
							
							<hr class="divider_type_3 m_bottom_45">
							<!--comments-->
						<a href=" "
							class="d_block photoframe r_corners wrapper shadow m_bottom_15">
							<img src="{{asset('/images/noticias/'.$noticia->id .'/'.$noticia->foto)}}" class="tr_all_long_hover"
							alt="{{$noticia->titulo}}">
						</a>
						<!--post content-->
						<p class="m_bottom_10">{!! $noticia->texto !!}</p>
						<hr class="divider_type_3 m_bottom_10">
								<p class="m_bottom_10">Fonte {{$noticia->fonte or ''}} <a href="#" class="color_dark"> tags:» {{$noticia->tags or ''}} </a></p>
							
							<hr class="divider_type_3 m_bottom_45">
					</article>

					@endforeach
					<div class="fb-comments"
						data-href="https://www.facebook.com/bancariospi/"
						data-numposts="5" width="100%"></div>
				</section>

                <aside class="col-lg-3 col-md-3 col-sm-3">
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
                					href="{{url('ver-noticia', [$destaque->id,preg_replace('/[^a-zA-Z0-9.]+/', '-', $destaque->titulo)]) }}"
                					class="color_dark d_block bt_link">{{$destaque->titulo}}</a>
                				<p class="scheme_color">{{$destaque->data}}</p>
                			</div>
                			<hr class="m_bottom_15">
                
                			@endforeach 
                		</div>
                	</figure>
                </aside>
                
                	<!--noticias lateral- fim-->
				<!--right column-->
				@include('site.partes.menu_lateral')
			</div>

			<!--end content-->
			<!--slider with banners-->
		</div>
	</div>
</div>

</div>
</div>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
@endsection
