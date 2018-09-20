@extends('site.templates.template')

@section('conteudo')

<div class="page_content_offset">
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="/public" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
            </ul>
        </div>
    </section>
    <!--slider with banners-->
    <div class="container">
        <div class="row clearfix"><br>
            <h2>Estatuto do Sindicato</h2>
        </div>
    </div>
</div>
@endsection