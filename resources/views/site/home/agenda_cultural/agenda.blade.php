@extends('site.templates.template')

@section('conteudo')

<div class="page_content_offset">
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="{{ url('/')}}" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
            </ul>
        </div>
    </section>
    <!--slider with banners-->
    <div class="page_content_offset">
        <div class="container">

            <section class="portfolio_isotope_container three_columns">
                @foreach ($agendas as $agenda) 

                <div class="portfolio_item t_xs_align_c portraits">
                    <figure class="d_xs_inline_b">
                        <figcaption class="t_xs_align_l">
                            <h4 class="m_bottom_3"><a href="#" class="color_dark"><b>{!!$agenda->nome!!}</b></a></h4>
                            <p><i class="fa fa-calendar"></i><a href="#" class="color_dark"> {!!$agenda->data1!!}</a></p>
                            <p><i class="fa fa-clock-o"></i><a href="#" class="color_dark"> {!!$agenda->hora!!}</a></p>
                            <p> Local: <a href="#" class="color_dark">{!!$agenda->local !!}</a></p>
                        </figcaption>
                    </figure>
                </div>
                @endforeach

            </section>
            <div class="row clearfix m_xs_bottom_30">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                    <p class="d_inline_middle f_size_medium">Resultados {{$agendas->currentPage()}} de {{$agendas->count()}}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
                    <div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">{!! $agendas->links() !!}</div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection