@extends('layouts.Gentelella')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Gerenciando Noticias</h3>
    </div>
</div>

 <form action="{{ url('/admin/criar_noticia')}}" method="post"  enctype="multipart/form-data">
    {!! csrf_field() !!}
    <!-- /.row-->
    <div class="">
        <div class="col-lg-12">
            <!--data e hora da psotagem-->
            <input name="data" type="hidden" class="form-control" id="create_data" value="<?= date('y-m-d H:i:s') ?>">

            <div class="row">
                <center>
                   <img src="{!! url($noticia->foto) !!}" alt="" name="imagem" id="target"  />
                </center>
            </div>

            <div class="actionBar">
                <div class="msgBox">
                    <div class="content"></div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>


    </div>
</form>

@endsection


