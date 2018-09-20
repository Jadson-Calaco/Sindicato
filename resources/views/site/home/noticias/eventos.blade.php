@extends('site.templates.template')

@section('conteudo')

<div class="page_content_offset">
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="/" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
            </ul>
        </div>
    </section>
    <!--slider with banners-->
    <div class="page_content_offset">
        <div class="container">

            <section class="portfolio_isotope_container three_columns">
                @foreach ($eventos as $evento) 

                <div class="portfolio_item t_xs_align_c portraits">
                    <figure class="d_xs_inline_b">
                        <div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
                            
                            <img src="{{asset('/images/eventos/'.$evento->id .'/'.$evento->imagem)}}" alt="{!!$evento->nome!!}" class="tr_all_long_hover" width="310" height="150">

                            <div class="open_buttons clearfix">
                                <div class="f_left f_size_large tr_all_hover">
                                    <a href="{{$evento->imagem}}" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="Galeria" data-title="{!!$evento->nome!!}"><i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="f_left m_left_10 f_size_large tr_all_hover"><a href="ver-noticia/{{ $evento->id}}" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
                            </div>
                        </div>
                        <figcaption class="t_xs_align_l">
                            <h4 class="m_bottom_3"><a href="#" class="color_dark"><b>{!!$evento->nome!!}</b></a></h4>
                            <p><i class="fa fa-calendar"></i><a href="#" class="color_dark"> {!!$evento->data_eventos !!}</a></p>
                            <p><i class="fa fa-clock-o"></i><a href="#" class="color_dark"> {!!$evento->hora_eventos  !!}</a></p>
                            <p> Local: <a href="#" class="color_dark">{!!$evento->local !!}</a></p>
                        </figcaption>
                    </figure>
                </div>
                @endforeach

            </section>
            <div class="row clearfix m_xs_bottom_30">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                    <p class="d_inline_middle f_size_medium">Resultados {{$eventos->currentPage()}} de {{$eventos->count()}}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
                    <div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">{!! $eventos->links() !!}</div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection

