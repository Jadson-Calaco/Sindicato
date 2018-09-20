@extends('site.templates.template')

@section('conteudo')

<div class="page_content_offset">
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="{{url('/')}}" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
            </ul>
        </div>
    </section>
    <!--slider with banners-->
    <div class="page_content_offset">
        <div class="container">

            <div class="d_table full_width d_xs_block">

                <div class="d_table_cell v_align_m t_align_r d_xs_block">
                    <div class="custom_select relative color_dark portfolio_filter d_inline_b t_align_l d_xs_block">
                        <div class="select_title type_2 r_corners relative mw_0">Filtre</div>
                        <ul id="filter_portfolio" class="select_list d_none"></ul>
                        <select name="pol">
                       		 <option data-filter="*" value="All">Todas</option>
							@foreach ($categorias as $cat) 	
                               <option data-filter=".{{$cat->nome}}" value="{{$cat->nome}}">{!!$cat->nome !!}</option>
							@endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--portfolio isotope-->

            <section class="portfolio_isotope_container three_columns">
                @foreach ($noticias as $noticia) 
                <div class="portfolio_item t_xs_align_c {!!$noticia->categorias->nome!!}">
                
                    <figure class="d_xs_inline_b">
                        <div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
                            <img src="{{asset('/images/noticias/'.$noticia->id .'/'.$noticia->foto)}}" alt="{!!$noticia->titulo!!}" class="tr_all_long_hover" width="310" height="150">
                            <div class="open_buttons clearfix">
                                <div class="f_left f_size_large tr_all_hover">
                                    <a href="{{ asset($noticia->foto) }}" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="Galeria" data-title="{!!$noticia->titulo!!}"><i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="f_left m_left_10 f_size_large tr_all_hover"><a href="#" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
                            </div>
                        </div>
                        <figcaption class="t_xs_align_l">
                            <h4 class="m_bottom_3"><a href="ver-noticia/{{ $noticia->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-', $noticia->titulo)}}" class="color_dark"><b>{!!$noticia->titulo!!}</b></a></h4>
                            <hr><br>
                            <a href="#" class="color_dark"><b>{!!$noticia->categorias->nome!!}</b></a>
                            <br><br>
                        </figcaption>
                    </figure>
                </div>
                @endforeach

            </section>
            <div class="row clearfix m_xs_bottom_30">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                    <p class="d_inline_middle f_size_medium">Resultados {{$noticias->currentPage()}} de {{$noticias->count()}}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
                    <div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">{!! $noticias->links() !!}</div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection

