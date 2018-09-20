@extends('site.templates.template') @section('conteudo')
<!--breadcrumbs-->
<section class="breadcrumbs">
	<div class="container">
		<ul class="horizontal_list clearfix bc_list f_size_medium">
			<li class="m_right_10 current"><a href="{{url('/')}}" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
			<li><a href="" class="default_t_color">{{$pag or "not found"}}</a></li>
		</ul>
	</div>
</section>
<!--slider with banners-->
<!--content-->
<div class="page_content_offset">
	@foreach($sindicato as $historia)
	<div class="container">
		<div class="row clearfix">

			<!--left content column-->
			<section class="col-lg-9 col-md-9 col-sm-9">
				<p class="f_size_big">{!! $historia->descricao !!}</p>
			</section>
			<!--right column-->
	@include('site.partes.menu_lateral')
		</div>
	</div>
	@endforeach
</div>

	
@endsection
