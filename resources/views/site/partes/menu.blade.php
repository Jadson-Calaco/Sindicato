<!--MENU-->
<div class="col-lg-10 clearfix t_sm_align_c">
    <div class="clearfix t_sm_align_l f_left f_sm_none relative s_form_wrap m_sm_bottom_15 p_xs_hr_0 m_xs_bottom_5">

        <!--button for responsive menu-->
        <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_xs_bottom_5">
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
        </button>
        <!--main menu-->
        <nav role="navigation" class="f_left f_xs_none d_xs_none m_md_right_30 m_sm_right_0">
            <ul class="horizontal_list main_menu type_2 clearfix">
                <li class="{{'current'}}relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="{{url('/')}}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Inicio</b></a>

                </li>
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="#" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>O Sindicato</b></a>
                    <!--sub menu-->
                    <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                        <ul class="sub_menu">
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{ url('diretoria')}}">A Diretoria</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('estatuto')}}">O Estatuto</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('sindicato')}}">Quem Somos</a>
                                </li-->
                        </ul>
                    </div>
                </li>
                <!--noticias--> 
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="{{url('noticias')}}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Noticias</b></a>
                    <!--sub menu-->
                    <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                        <ul class="sub_menu">
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('noticias-nacionais')}}">Nacionais</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('noticias-locais')}}">Locais</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('esportes')}}">Esportivas</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('eventos')}}">Eventos do Mês</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--End notiicias-->
                <!--bancos>
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                <a href="/" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Bancos</b></a>
                <!--sub menu>
                <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                    <ul class="sub_menu">
                        <li>
                            <a class="color_dark tr_delay_hover" href="nacionais.html">Nacionais</a>
                        </li>
                        <li>
                            <a class="color_dark tr_delay_hover" href="locais.html">Locais</a>
                        </li>
                        <li>
                            <a class="color_dark tr_delay_hover" href="esportes.html">Esportivas</a>
                        </li>
                        <li>
                            <a class="color_dark tr_delay_hover" href="eventos.html">Eventos do Mês</a>
                        </li>
                    </ul>
                </div>
            </li-->
                <!--end bancos-->                                                      

                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="#" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Serviços</b></a>
                    <!--sub menu-->
                    <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">

                        <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                            <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b"><a href="{{url('acessoria-juridica')}}"> Acessoria Jurídico</a></b>
                            <ul class="sub_menu">
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('atendimentos')}}">Atendimentos</a>
                                </li>
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('homologacoes')}}">Homologações</a>
                                </li>
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('assedio')}}">Assédio Moral</a>
                                     
                                </li>
                                <!--li>
                                    <a class="color_dark tr_delay_hover" href="#">Orientações</a>
                                </li-->
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('agenda-advogadas')}}">Agenda das Advogadas</a>
                                </li>

                            </ul>
                        </div>
                        <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                            <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Serviços</b>
                            <ul class="sub_menu">
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('convenios')}}">Convênios</a>
                                </li>
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('inscreva-se')}}">Inscrição Colônia de Férias</a>
                                </li>
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('agenda-cultural')}}">Agenda Cultural</a>
                                </li>

                            </ul>
                        </div>
                        <div class="f_left f_xs_none">
                            <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Instalações </b>
                            <ul class="sub_menu first">
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('albergue')}}">Albergue</a>
                                </li>
                                <li>
                                    <a class="color_dark tr_delay_hover" href="{{url('auditorio')}}">Auditório</a>
                                </li>
                                <!--li>
                                    <a class="color_dark tr_delay_hover" href="auditorio">Auditório</a>
                                </li-->

                            </ul>
                        </div>
                    </div>
                </li>
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="{{url('multimidia')}}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Multimidia</b></a>
                    <!--sub menu-->
                    <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                        <ul class="sub_menu">
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('galerias')}}">Galeria de Fotos</a>
                            </li>
                            <li>
                                <a class="color_dark tr_delay_hover" href="{{url('videos')}}">Galeria de Videos</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="{{url('associe-se')}}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Associe-se</b></a>
                </li>
                <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0">
                    <a href="{{url('contato')}}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Contatos</b></a>
                </li>
            </ul>
        </nav>
        <button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
            <i class="fa fa-search"></i>
        </button>
        <!--search form-->
        <div class="searchform_wrap type_2 bg_tr tf_xs_none tr_all_hover w_inherit">
            <div class="container vc_child h_inherit relative w_inherit">
                <form role="search" class="d_inline_middle full_width" method="GET" action="{{url('search')}}">
                    <input type="text" name="search" placeholder="O que Procura ?" class="f_size_large p_hr_0" required="true">
                </form>
                <button class="close_search_form tr_all_hover d_xs_none color_dark">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!--slider-->
