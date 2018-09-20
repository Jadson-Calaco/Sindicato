@extends('layouts.Gentelella')
@section('content')

<style type="text/css">
#galeriaFotos img{
  width: 240px;
  height: 160px;
  border: 2px solid black;
  margin-bottom: 10px;
}
#galeriaFotos ul{
  margin: 0;
  padding: 0;
}
#galeriaFotos li{

  margin: 0;
  padding: 0;
  list-style: none;
  float: left;
  padding-right: 10px; 
}


</style>
 
   <form class="dropzone" action="{{url('/admin/galeria/fotos/salvarFotos') }}" id="galeriaDropzone" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                     <input type="hidden" name="idGaleria" value="{{$idGaleria}}"/>   
                     <input type="hidden" name="dataAtual" value="{{$dataAtual}}"/>
<div class="dz-message">
     <h4>Arraste a imagem até aqui</h4>
     <span>ou click aqui</span>
</div>
</form>
<div class="row">
 <div class="col-md-12"></div>
     <h1>Galeria de Fotos</h1>
</div>
<div class="row">
  <div class="col-md-12">
     <div id="galeriaFotos">
         <ul>
         	@foreach ($fotos as $foto)
         		         	
           <li>
                 <img src="{{$foto->foto}}"/> 
                  <br/>
                  <a href="{!! url('admin/galeria/fotos/fotoCapa/'.$idGaleria.'/'.$foto->id) !!}" >Definir como foto de Capa</a>&nbsp&nbsp&nbsp&nbsp
                  <a href="{!! url('admin/galeria/fotos/excluirFoto/'.$foto->id) !!}"  >Excluir</a>
                   
           </li>

           	@endforeach
         </ul>
         
     </div>
  </div>
</div>

        <script src="{{url('painel/vendor/jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
  Dropzone.autoDiscover = false;

  $('#galeriaDropzone').dropzone({
    maxFilesize: 5,
   // addRemoveLinks: true,
   // dictRemoveFile: 'Remover foto',
    dictResponseError: 'Server not Configured',
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    success:function(file,response){
      if(file.status=='success'){
         afterUpload.sucesso(response);
      }else{
        afterUpload.falha(response);
      }
    }

   });
  var afterUpload={
    sucesso:function(response){
      var imagem=$('#galeriaFotos ul ');
      var caminho= document.location.origin+'/'+response.foto;
      console.log(response);
     $(imagem).append('<li><img src="'+caminho+'"></img></li>');
    },
    falha:function(response){
      alert("Falha ao carregar arquivo");
    }
  };
});
</script>
@endsection