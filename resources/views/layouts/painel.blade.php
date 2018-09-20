<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sindicato dos Bancários do Piauí</title>
    <!-- Bootstrap Core CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{url('painel/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- MetisMenu CSS -->
    <link  href="{{url('painel/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link  href="{{url('painel/dist/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link  href="{{url('painel/vendor/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link  href="{{url('painel/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// 
    -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/admin')}}">Bancários do PI v.1.0</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
              </a>
            
            <!-- /.dropdown-messages -->
          </li>
          <!-- /.dropdown -->
                    
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"> {{ Auth::user()->name }}</i>
              </a>
              
            <ul class="dropdown-menu dropdown-user">
	               
	              <li>
	                <a href="#"><i class="fa fa-gear fa-fw"></i>Perfil</a>
	              </li>
	              <li class="divider"></li>
	              <li>
	                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
	              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li class="sidebar-search">
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" placeholder="busca...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
                <!-- /input-group -->
              </li>
              <!--li>
                <a href="#"><i class="fa fa-2x fa-fw -triangle -secret s s fa-bookmark-o"></i>Painel de Controle</a>
              </li-->
              <li>
                  <a href="{{url('/admin')}}"><i class="fa fa-2x fa-fw fa-dashboard"></i>Início</a>
               </li>
              <li>
                  
                <a href="#"><i class="fa fa-1x fa-bar-chart-o fa-fw pull-left"></i>Adicionar<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
	                  <li>
	                    <a href="{{url('/admin/nova-noticia')}}">Noticias</a>
	                  </li>
	                  <li>
	                    <a href="{{url('/admin/fotos')}}">Galeria de Fotos</a>
	                  </li>
	                  <li>
	                    <a href="{{url('/admin/videos')}}">Galeria de Videos</a>
	                  </li>
	                  <li>
	                    <a href="{{url('/admin/agenda')}}">Agendas</a>
	                  </li>
	                  <li>
	                    <a href="{{url('/admin/informativo')}}">Informativos</a>
	                  </li>
                    <li>
                      <a href="#">Topicos</a>
                    </li>
	                  <li>
	                    <a href="{{url('/admin/seguran-bancaria')}}">Segurança Bancária</a>
	                  </li>
                    <li>
                      <a href="#">Novas Páginas</a>
                    </li>
	                  <li>
	                    <a href="{{url('/admin/anuncios')}}">Banner e Anúncios</a>
	                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                	<a href="#"><i class="fa fa-1x fa-fw fa-shirtsinbulk"></i>O Sindicato<span class="fa arrow"></span></a>
                	<ul class="nav nav-second-level">
                		<li><a href="#">Diretoria e Delegados</a></li>
                		<li><a href="#">Estatuto do Sindicato</a></li>
                		
                	</ul>
              </li>
              <li>
                <a href="#"><i class="fa fa-1x fa-fw fa-group"></i>Ouvidoria Geral</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-1x fa-fw -triangle fa-legal"></i>Acessoaria Júridica</a>
              </li>
              <!--li>
                <a href=""><i class="fa fa-2x fa-edit fa-fw"></i> </a>
              </li-->
              <li>
     
	                <a href="#"><i class="fa fa-1x fa-wrench fa-fw pull-left"></i>Serviços<span class="fa arrow"></span></a>
		                <ul class="nav nav-second-level">
		                  <li>
		                    <a href="#">Convênios</a>
		                  </li>
		                  <li>
		                     <a href="#"><i class="fa fa-1x fa-fw -triangle -secret s fa-soccer-ball-o"></i>Colônia de Férias<span class="fa arrow"></span></a>
		                	<ul class="nav nav-second-level">
		                  		<li>
		                   		<a href="#">Periodos</a>
		                  		</li>
		                  		<li>
		                   		<a href="#">Inscrições Feitas</a>
		                  		</li>
		                  	</ul>
		                  </li>

		                  <li>
		                    <a href="#">Auditório</a>
				          </li>
		                  <li>
		                    <a href="#">Albergue</a>
				           </li>
		                  <li>
		                    <a href="#">Assédio Moral</a>
		                  </li>
                      <li>
                        <a href="#">Novas Filiações</a>
                      </li>
                      <li>
                        <a href="#">Newslatter</a>
                      </li>
		                  <!--li>
		                    <a href="">Grid</a>
		                  </li-->
               			 </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                    <a href="#"><i class="fa fa-1x fa-fw -triangle -secret s fa-cogs"></i>Configurações<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Adicionar Usuario(a)s</a>
                        </li>
                        <li>
                            <a href="#">Permissões</a>
                        </li>
                        <li>
                            <a href="#">Estatisticas</a>
                        </li>
                        <li>
                            <a href="#">Configuração do Site</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
          </div>
          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>
      <div id="page-wrapper">
                   <!-- /.row -->
        <h1></h1>
           @yield('content')
       </div>
   
   </div>

      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
 
    <script src="{{url('painel/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('painel/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('painel/vendor/metisMenu/metisMenu.min.js')}}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{url('painel/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{url('painel/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{url('painel/data/morris-data.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{url('painel/dist/js/sb-admin-2.js')}}"></script>
  

</body>
</html>