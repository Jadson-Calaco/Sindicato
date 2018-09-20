@extends('layouts.Gentelella')
@section('content')
<!-- page content -->
<div class="row">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Você está em <small>{{$titulo or 'pags'}}</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row"> <!--form action -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$titulo }}<small> de Assessoria Juridica</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{url('/admin/juridico') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                             {!! csrf_field() !!}

                            
                            <div class="form-group">
                               <textarea id="summary-ckeditor" name="texto" class="form-control">
                                       {{$assessoriaJuridica->texto or ''}}
                               </textarea>
                            </div>
                               <input name="dataAtual" type="hidden" class="form-control" id="create_data" value="<?= date('d/m/Y') ?>">
                            
                            <div class="actionBar">
                                <div class="msgBox">
                                    <div class="content"></div>
                                <!--    <button class="btn btn-default" type="button">Cancelar</button> -->
                                      @if ($assessoriaJuridica!=null) 
                        
                                        <button type="submit" class="btn btn-success" formaction="{{url('/admin/juridico/atualizar/'.$assessoriaJuridica->id) }}">Atualizar</button>
                                        @else
                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                     @endif
                                </div>
                        </div>
                            <div class="ln_solid"></div>
                      </form>      
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
   
</div>
</div>
<script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <!-- CKEditor init -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {

            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        };

        CKEDITOR.replace('summary-ckeditor', options);
    </script>
@endsection
