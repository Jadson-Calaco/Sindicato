<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <title>Painel ::SEEBFPI | </title>

        <!-- Bootstrap -->
        <link href="{{url('painel/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{url('painel/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{url('painel/vendor/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{url('painel/vendor/iCheck/skins/flat/green.css')}}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{url('painel/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{url('painel/vendor/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{url('painel/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{url('painel/build/css/custom.min.css')}}" rel="stylesheet">
        <link href="{{url('area/css/imgareaselect.css')}}" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{url('/admin') }}" class="site_title"><i class="fa fa-paw"></i> <span>SEEBF/PI</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{url('images/users/1.jpg')}}" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bem vindo,</span>
                                <small>{{ auth()->user()->name }}</small>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i>Inicio [Cadastros] <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a>Paramentros<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu">
                                                        <a href="{{url('/admin/bancos') }}">Bancos</a>
                                                    </li> 
                                                    <li><a href="{{url('/admin/anuncios') }}">Banner e Anúncios</a></li>
                                                    <li class="sub_menu">
                                                        <a href="{{url('/admin/categoria') }}">Categorias</a>
                                                    </li> 
                                                    <li class="sub_menu">
                                                        <a href="{{url('/admin/cargos') }}">Cargos - Diretores</a>
                                                    </li>
                                                    <li class="sub_menu">
                                                        <a href="{{url('/admin/destaque') }}">Destaque</a>
                                                    </li> 
                                                </ul>
                                            </li>  
                                            
                                            <li><a href="{{url('/admin/diretoria') }}">A Diretoria</a></li>
                                            <li><a href="{{url('/admin/associados') }}">Associados</a></li>
                                            <li><a href="{{url('/admin/agendas') }}">Agenda Cultural</a></li>


                                            <li><a href="{{url('/admin/acordos') }}">Acordos e Convocações</a></li>
                                            <li><a href="{{url('/admin/Campanha') }}">Campanha Salarial</a></li>
                                            <li><a>Galerias<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="{{url('/admin/galeria/fotos') }}">Fotos</a>
                                                    </li>
                                                    <li><a href="{{url('/admin/galeria/videos') }}">Videos</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            
                                            <li><a href="{{url('/admin/informativo') }}">Informativos</a></li>
                                            <li><a href="{{url('/admin/estatuto') }}">Estatuto SEEBFPI</a></li>
                                            <li><a href="{{url('/admin/docs') }}">Documentos</a></li>  
                                            <li><a href="{{url('/admin/noticias') }}">Noticias</a></li>                                             
                                            <li><a href="{{url('/admin/sindicato') }}">O Sindicato</a></li>                                            
                                            <li><a>Newsletter<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="{{url('/admin/newsletter/emails') }}">E-mails Cadastrados</a>
                                                    </li>
                                                    <li><a href="{{url('/admin/newsletter/enviar_mensagem') }}">Enviar Newsletter</a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> Serviços <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a>Colonia de Férias<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="{{url('/admin/periodo') }}">Periodo de inscrições</a></li>
                                                    <li><a href="{{url('/admin/colonia') }}">Incrições</a></li>
                                                    <li><a href="{{url('/admin/orteio') }}">Sorteios</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{url('/admin/albergue') }}">Albergue</a></li>
                                            <li><a href="{{url('/admin/juridico') }}">Assessoria Juridica</a></li>
                                            <li><a href="{{url('/admin/auditorios') }}">Auditório</a></li>
                                            <li><a href="{{url('/admin/assedios') }}">Assédios</a></li>
                                            <li><a href="{{url('/admin/convenio') }}">Convênios</a></li>
                                            <li><a href="{{url('/admin/ouvidoria') }}">Ouvidoria</a></li>
                                            <li><a href="{{url('/admin/contato') }}">Contatos</a></li>
                                            <li><a href="{{url('/admin/seguranca-bancaria') }}">Segurança Bancária</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-futbol-o"></i> Esportes <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/equipe') }}">Equipes</a></li>
                                            <li><a href="{{url('/admin/campeonatos') }}">Campeonatos</a></li>
                                            <li><a href="{{url('/admin/eventos') }}">Eventos</a></li>
                                            <li><a href="{{url('/admin/tabelas') }}">Tabelas</a></li>
                                            <li><a href="{{url('/admin/regulamento') }}">Regulamentos</a></li>

                                        </ul>
                                    </li>  
                                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/fixed_sidebar')}}">Fixed Sidebar</a></li>
                                            <li><a href="{{url('/admin/fixed_footer')}}">Fixed Footer</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu_section">
                                <h3>Configuração</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-bug"></i> Acesso Restrito <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/usuarios') }}">Usuarios</a></li>
                                            <li><a href="{{url('/admin/permissao') }}">Permissões</a></li>
                                            <li><a href="{{url('/admin/config') }}">Config. Site</a></li>
                                            <li><a href="{{url('/admin/contatos') }}">Contatos</a></li>
                                            <li><a href="{{url('/admin/perfis') }}">Perfis</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="" alt="">{{ auth()->user()->name}}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;">Perfil</a></li>
                                        <li>
                                            <!--a href="javascript:;">
                                            <!--span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a-->
                                        </li>
                                        <li><a href="javascript:;">Ajuda</a></li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>Sair</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">0</span>
                                    </a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- page content -->
                <div class="right_col" role="main">
                    
                    <!-- MENSAGEM -->
                      <div class="span6">
                   
                    @if(Session::has('message'))
                          <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span>
                            </button>
                            <strong>{!! Session::get('message')!!}</strong>
        										
                          </div>
                     @endif
                     
                     </div>
                          <!-- Fim Mensagem -->
                          
                    <!-- top tiles -->
                    @yield('content')
                    
                </div>

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{url('painel/vendor/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{url('painel/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{url('painel/vendor/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{url('painel/vendor/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{url('painel/vendor/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{url('painel/vendor/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{url('painel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{url('painel/vendor/iCheck/icheck.min.js')}}"></script>
        <!-- Skycons -->
        <script src="{{url('painel/vendor/skycons/skycons.js')}}"></script>
        <!-- Flot -->
        <script src="{{url('painel/vendor/Flot/jquery.flot.js')}}"></script>
        <script src="{{url('painel/vendor/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{url('painel/vendor/Flot/jquery.flot.time.js')}}"></script>
        <script src="{{url('painel/vendor/Flot/jquery.flot.stack.js')}}"></script>
        <script src="{{url('painel/vendor/Flot/jquery.flot.resize.js')}}"></script>
        <!-- Flot plugins -->
        <script src="{{url('painel/vendor/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
        <script src="{{url('painel/vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
        <script src="{{url('painel/vendor/flot.curvedlines/curvedLines.js')}}"></script>
        <!-- DateJS -->
        <script src="{{url('painel/vendor/DateJS/build/date.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{url('painel/vendor/jqvmap/dist/jquery.vmap.js')}}"></script>
        <script src="{{url('painel/vendor/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{url('painel/vendor/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{url('painel/vendor/moment/min/moment.min.js')}}"></script>
        <script src="{{url('painel/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{url('painel/build/js/custom.min.js')}}"></script>

        
        <script src="{{url('painel/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
        <script src="{{url('painel/vendor/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
        <script src="{{url('painel/vendor/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('painel/vendor/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{url('painel/vendor/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{url('area/js/imgareaselect.min.js')}}"></script>
        <script>
                                                   jQuery(function ($) {
                                                       var p = $("#previewimage");
                                                       $("body").on("change", "#imagem", function () {
                                                           var imageReader = new FileReader();
                                                           imageReader.readAsDataURL(document.getElementById("imagem").files[0]);
                                                           imageReader.onload = function (oFREvent) {
                                                               p.attr('src', oFREvent.target.result).fadeIn();
                                                           };
                                                       });
                                                       $('#previewimage').imgAreaSelect({
                                                           onSelectEnd: function (img, selection) {
                                                               $('input[name="x1"]').val(selection.x1);
                                                               $('input[name="y1"]').val(selection.y1);
                                                               $('input[name="w"]').val(selection.width);
                                                               $('input[name="h"]').val(selection.height);
                                                           }
                                                       });
                                                   });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
        <script type="text/javascript">
             $("#telefone").mask("(00) 00000-0000");
             $("#cpf").mask("000.000.000-00");
        </script>
    </body>
</html>