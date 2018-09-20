@extends('site.templates.template')

@section('conteudo')

<!--slider with banners-->
<div class="page_content_offset"><!--breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <ul class="horizontal_list clearfix bc_list f_size_medium">
            <li class="m_right_10 current"><a href="{{url('/')}}" class="default_t_color">Inicio<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
            <li><a href="#" class="default_t_color">{{$pag or "not found"}}</a></li>
        </ul>
    </div>
</section>
    <div class="container">
        <div class="row clearfix">
            <div class="page_content_offset">
                <div class="container">
                    <div class="row clearfix">
                        <!--left content column-->
                        <section class="col-lg-9 col-md-9 col-sm-9">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
                                    <h3 class="tt_uppercase color_dark m_bottom_25">Informações de Contato</h3>
                                    <ul class="c_info_list">
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_15">
                                                <i class="fa fa-map-marker f_left color_dark"></i>
                                                <p class="contact_e">Rua Gabriel Ferreira, 740-c/n<br> Teresina,(PI)</p>
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_10">
                                                <i class="fa fa-phone f_left color_dark"></i>
                                                <p class="contact_e">(86) 3304-5907</p>
                                                <p class="contact_e">(86) 3085-3335</p>
                                                <p class="contact_e">(86) 3085-3336</p>
                                                <p class="contact_e">(86) 9-9482-5261</p>
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_10">
                                                <i class="fa fa-envelope f_left color_dark"></i>
                                                <a class="contact_e default_t_color" href="">contato@bancariospi.org.br</a>
                                                <a class="contact_e default_t_color" href="">juridico@bancariospi.org.br</a>

                                            </div>
                                        </li>
                                        <!--li>
                                                <div class="clearfix">
                                                        <i class="fa fa-clock-o f_left color_dark"></i>
                                                        <p class="contact_e">Monday - Friday: 08.00-20.00 <br>Saturday: 09.00-15.00<br> Sunday: closed</p>
                                                </div>
                                        </li-->
                                    </ul>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
                                    <h3 class="tt_uppercase color_dark m_bottom_25">Formulário</h3>
                                    <p class="m_bottom_10">Preencha Todos os Campos com <span class="scheme_color">*</span>.</p>
                                    <form id="contactform">
                                        <ul>
                                            <li class="clearfix m_bottom_15">
                                                <div class="f_left half_column">
                                                    <label for="cf_name" class="required d_inline_b m_bottom_5">Seu nome</label>
                                                    <input type="text" id="cf_name" name="cf_name" class="full_width r_corners" required="true">
                                                </div>
                                                <div class="f_left half_column">
                                                    <label for="cf_email" class="required d_inline_b m_bottom_5">Seu e-mail</label>
                                                    <input type="email" id="cf_email" name="cf_email" class="full_width r_corners" required="true">
                                                </div>
                                            </li>
                                            <li class="m_bottom_15">
                                                <label for="cf_subject" class="required d_inline_b m_bottom_5">Assunto </label>
                                                <input type="text" id="cf_subject" name="cf_subject" class="full_width r_corners" required="true">
                                            </li>
                                            <li class="m_bottom_15">
                                                <label for="cf_message" class="d_inline_b m_bottom_5 required">Messagem</label>
                                                <textarea id="cf_message" name="cf_message" class="full_width r_corners"></textarea>
                                            </li>
                                            <li>
                                                <button class="button_type_4 bg_light_color_2 r_corners mw_0 tr_all_hover color_dark">Enviar</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--right column-->
                        <aside class="col-lg-3 col-md-3 col-sm-3">
                            <!--widgets-->
                            <figure class="widget shadow r_corners wrapper m_bottom_30">
                                <figcaption>
                                    <h3 class="color_light">Serviços</h3>
                                </figcaption>
                                <div class="widget_content">
                                    <!--Categories list-->
                                    <ul class="categories_list">
                                        <li class="active">
                                            <a href="#" class="f_size_large scheme_color d_block relative">
                                                <b>Assuntos Jurídicos</b>
                                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                            </a>
                                            <!--second level-->
                                            <ul>
                                                <li class="active">
                                                    <a href="#" class="d_block f_size_large color_dark relative">
                                                        Ações<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                    </a>
                                                    <!--third level-->
                                                    <ul>
                                                        <li><a href="#" class="color_dark d_block">documento 1</a></li>
                                                        <li><a href="#" class="color_dark d_block">documento 2</a></li>
                                                        <li><a href="#" class="color_dark d_block">documento 3</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="d_block f_size_large color_dark relative">
                                                        B<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="d_block f_size_large color_dark relative">
                                                        C<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="f_size_large color_dark d_block relative">
                                                <b>Assédio Moral</b>
                                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                            </a>
                                            <!--second level-->
                                            <ul class="d_none">
                                                <li>
                                                    <a href="#" class="d_block f_size_large color_dark relative">
                                                        A<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                    </a>
                                                    <!--third level-->
                                                    <ul class="d_none">
                                                        <li><a href="#" class="color_dark d_block">A.1</a></li>
                                                        <li><a href="#" class="color_dark d_block">A.2</a></li>
                                                        <li><a href="#" class="color_dark d_block">A.3</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="f_size_large color_dark d_block relative">
                                                <b>Colônia de Férias</b>
                                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </figure>
                            <!--compare products-->
                            <!--figure class="widget shadow r_corners wrapper m_bottom_30">
                                    <figcaption>
                                            <h3 class="color_light">Compare Products</h3>
                                    </figcaption>
                                    <div class="widget_content">
                                            You have no product to compare.
                                    </div>
                            </figure-->
                            <!--banner-->
                            <a href="#" class="d_block r_corners m_bottom_30">
                                <img src="images/banner_img_6.jpg" alt="">
                            </a>
                        </aside>
                    </div>
                </div>
            </div>
            <!--markup footer-->
        </div>
    </div>
</div>
@endsection