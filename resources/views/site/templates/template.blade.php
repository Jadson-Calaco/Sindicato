<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="pt-BR"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="pt-br"><!--<![endif]-->
<head>
        <title>{{ config('app.name', 'SEEBFPI') }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--meta info>
        <meta name="author" content=""> 
        <meta name="keywords" content="">
        <meta name="description" content=""-->
        <link rel="icon" type="image/ico" href="{{url('images/favicon.ico')}}">
        <!--stylesheet include-->
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/flexslider.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/bootstrap.min.css')}}">
        <!--link rel="stylesheet" type="text/css" media="all" href="{{url('css/settings.css')}}"-->
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/owl.transitions.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/jquery.custom-scrollbar.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{url('css/style.css')}}">
        <!--font include-->
        <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>  
        <!--boxed layout--!>                
    <div class="wide_layout relative w_xs_auto">
        <!--[if (lt IE 9) | IE 9]>
            <div style="background:#fff;padding:8px 0 10px;">
            <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
        <![endif]-->
        <!--markup header type 2-->
        <header role="banner" class="type_5">
            <!--header top part-->
            <section class="h_top_part">
                <div class="container">
                    @include('site.partes.menu_nivel_um')
                </div>
            </section>
            <!--header bottom part-->
            <section class="h_bot_part">
                <div class="menu_wrap">
                    <div class="container">
                        <div class="clearfix row">
                            <div class="col-lg-2 t_md_align_c m_md_bottom_15">
                                <a href="{{url('/')}}" class="logo d_md_inline_b">
                                    <img src="{{url('images/logoBancarios.png')}}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-10 clearfix t_sm_align_c">
                                <div class="clearfix t_sm_align_l f_left f_sm_none relative s_form_wrap m_sm_bottom_15 p_xs_hr_0 m_xs_bottom_5">
                                     @include('site.partes.menu')
                                </div>

                            </div>
                        </div>
                    </div>            
                </div>
            </section>
            @yield('conteudo')
              <!--RODAPE-->
            @include('site.partes.rodape')
            <!--rodape end-->
        </header>
 
        <button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top">
            <i class="fa fa-angle-up"></i>
        </button>
        </div>
    </body>
    <!--scripts include-->
        <script src="{{url('js/jquery-2.1.0.min.js')}}"></script>
        <script src="{{url('js/retina.js')}}"></script>
        <script src="{{url('js/jquery.themepunch.plugins.min.js')}}"></script>
        <script src="{{url('js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{url('js/waypoints.min.js')}}"></script>
        <script src="{{url('js/owl.carousel.min.js')}}"></script>
        <script src="{{url('js/jquery.tweet.min.js')}}"></script>
        <script src="{{url('js/jquery.custom-scrollbar.js')}}"></script>
        <script src="{{url('js/scripts.js')}}"></script>
        <script src="{{url('js/jquery.flexslider-min.js')}}"></script>
        <script src="{{url('js/jquery.isotope.min.js')}}"></script>            
        <script src="{{url('js/jquery-ui.min.js')}}"></script>
        <script src="{{url('js/jackbox-packed.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

        <script type="text/javascript">
            $("#telefone").mask("(00) 00000-0000");
            $("#cpf").mask("000.000.000-00");
            $("#nascimento").mask("00/00/0000");
            $("#tempoTrabalho").mask("00/0000");
            $("#rg").mask("9.999.999");
            $("#cep").mask("99999-999");
            $("#celular").mask("(00) 00000-0000");
            $("#data").mask("00/00/0000");
        </script>
        
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
    $('#tabela').DataTable();
    
    });
	  
</script>
</html>