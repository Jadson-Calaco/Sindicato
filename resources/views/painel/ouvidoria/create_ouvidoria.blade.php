@extends('layouts.Gentelella')
@section('content')

<div class="row">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Paginas <small>{{$pags_tatal or '0'}}</small></h2>
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
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th align="center">Tipo</th>
                                <th align="center">Nome</th>
                                <th align="center">Email</th>
                                <th align="center">Banco</th>
                                <th align="center">Mensagem</th>
                                <th align="center">Ações</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($ouvidoria as $dados)
                            <tr class="odd gradeX">
                                <td align="center">{{$dados->tipo or 'sem nada'}}</td>
                                <td align="center">{{$dados->nome or 'sem nada'}}</td>
                                <td align="center">{{$dados->nome or '0 mes'}}</td>
                                <td align="center">{{$dados->banco or '0 mes'}}</td>
                                <td align="center">{{$dados->mensagem or 'sem nada'}}</td>
                                <td class="center">
                                    <a href="{!! url('admin/deletar_ouvidoria/'.$dados->id) !!}" data-confirm ="Tem certeza ?"  title="Deletar " data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--deletando ddados com confirmação-->   <!-- Modal -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
<script>
$(document).ready(function(){
		$('a[data-confirm]').click(function(ev){
			var href = $(this).attr('href');
 
			if(!$('#confirm-delete').length){
	$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">Exclir Item<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que Deseja EXCLUIR esse registro ?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>')
				}  
				  $('#dataConfirmOk').attr('href',href);
	              $('#confirm-delete').modal({show: true});
              
			return false;
		  
		});
});
</script>
@endsection
