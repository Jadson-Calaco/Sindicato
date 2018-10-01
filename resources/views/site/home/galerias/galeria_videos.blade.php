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
              <h2 class="tt_uppercase color_dark">Galeria de videos</h2>
            </div>
        
          </div>
          <!--portfolio isotope-->
          <section class="portfolio_isotope_container four_columns">
            @foreach ($videos as $video) 
             
            
            <div class="portfolio_item t_xs_align_c portraits">
              <figure class="d_xs_inline_b">
                <div class="relative shadow r_corners wrapper m_bottom_15">
                  <iframe width="220" height="170" src="{{ $video->html }}" Bframeborder="0" allowfullscreen></iframe>
                  
                  
                </div>
                <figcaption class="t_xs_align_l">
                  <h4 class="m_bottom_3"><b>{{ $video->nome }}</b></h4>
             
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