@extends('site.templates.template') 
@section('conteudo')
<!--slider with banners-->
<div class="page_content_offset">
  <!--breadcrumbs-->
  <section class="breadcrumbs">
    <div class="container">
      <ul class="horizontal_list clearfix bc_list f_size_medium">
        <li class="m_right_10 current"><a href="/public"
          class="default_t_color">Inicio<i
            class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
        <li><a href="#" class="default_t_color">{{$pag or "Fotos"}}</a></li>
      </ul>
    </div>
  </section>
  
  <div class="page_content_offset">
        <div class="container">
          <div class="d_table full_width d_xs_block">
            <div class="d_table_cell v_align_m d_xs_block m_xs_bottom_15">
              <h2 class="tt_uppercase color_dark">Galeria de Fotos</h2>
            </div>
        
          </div>
          <!--portfolio isotope-->
          <section class="portfolio_isotope_container four_columns">
            @foreach ($galerias as $galeria) 
             
            
            <div class="portfolio_item t_xs_align_c portraits">
              <figure class="d_xs_inline_b">
                <div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
                  <img src="{{$galeria->foto}}" alt="" class="tr_all_long_hover">
                  <div class="open_buttons clearfix">
                    <div class="f_left f_size_large tr_all_hover"><a href="images/img_01.jpg" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="portfolio" data-title="title 1"><i class="fa fa-camera"></i></a></div>
                    <div class="f_left m_left_10 f_size_large tr_all_hover"><a href="portfolio_single_1.html" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
                  </div>
                </div>
                <figcaption class="t_xs_align_l">
                  <h4 class="m_bottom_3"><a href="{{url('fotos/'.$galeria->id)}}" class="color_dark"><b>{{$galeria->nome}}</b></a></h4>
             
                </figcaption>
              </figure>
            </div>

           @endforeach
            
            
            
          </section>
        </div>
      </div>
  
</div>
</div>
  @endsection