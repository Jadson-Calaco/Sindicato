@extends('site.templates.template')
@section('conteudo')
<div class="page_content_offset">
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="/public" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="" class="default_t_color">{{$pag or "not found"}}</a></li>
            </ul>
        </div>
    </section>
    <!--slider with banners-->

    <div class="container">
        <div class="page_content_offset">
        @foreach ($noticias as $posts)
                  {!! $noticias->count() !!}
           @if($posts->count()=== 0)
              		<div class="clearfix m_bottom_10">
                      <ul class="horizontal_list d_inline_b l_width_divider">
                          <li class="m_right_15 f_md_none m_md_right_0"><strong>Desculpe !, Nada Encontrado !!</strong></li>
                          <li class="f_md_none"></li>
                      </ul>
                  </div>	
              @else 
            <figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
                  <!--noticias gerais-->
                  <div class="clearfix m_bottom_10">
                      <ul class="horizontal_list d_inline_b l_width_divider">
                          <li class="m_right_15 f_md_none m_md_right_0"><strong>{!! $posts->categorias->nome !!}</strong></li>
                          <li class="f_md_none">{{$posts->data}}</li>
                      </ul>
                  </div>
                  <div class="clearfix m_bottom_25 relative cw_product">
                      <a href="ver-noticia/{{ $posts->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$posts->titulo)}}"><img src="{{asset($posts->foto)}}" alt="{{ $posts->titulo }}" heigth="20%" width="20%" data-title="{!!$posts->titulo!!}" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0"></a>
                      <a href="ver-noticia/{{$posts->id}}/{{preg_replace('/[^a-zA-Z0-9.]+/', '-',$posts->titulo)}}" class="color_dark d_block bt_link">{{$posts->titulo}}</a>
                      <div class="clearfix m_bottom_10">
                      <ul class="horizontal_list d_inline_b l_width_divider">

                          <li class="m_right_15 f_md_none m_md_right_0"><small>Atualizada em {{$posts->data2}}</small></li>
                          <li class="f_md_none">{{$posts->subtitulo}}</li>
                      </ul>
                  </div>
                  </div>
              </figure>
              @endif
        @endforeach
        <div class="row clearfix m_xs_bottom_30">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                            <p class="d_inline_middle f_size_medium">Resultados {{$noticias->currentPage()}} de {{$noticias->count()}} </p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
                        <div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">{!! $noticias->links() !!}</div>
                    </div>
        </div>
        </div>

    </div>
</div>
<!--end content-->
<!--slider with banners-->
</div>
</div>

@endsection
