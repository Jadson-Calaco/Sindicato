@extends('site.templates.template')

@section('conteudo')
<!--slider with banners-->
<div class="page_content_offset"><!--breadcrumbs-->
    <div class="container">
        <div class="row clearfix">
            <section class="container"><br><br>
                <!--add comment-->
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
                <h3 class="tt_uppercase color_dark m_bottom_30">Inscrição da Colonia de Férias</h3>
                <form  action="{{ url('/inscreva-se')}}" method="post" enctype="multipart/form-data" class="bs_inner_offsets full_width bg_light_color_3 r_corners shadow m_xs_bottom_30">
                    {!! csrf_field() !!}
                    <input name="data" type="hidden" class="form-control" id="create_data" 	value="<?= date('d/m/Y') ?>">
                    <ul>
                        
                        <li class="clearfix m_bottom_15">
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
                                <label for="periodo" class="d_inline_b m_bottom_5">Período</label><br>
                                <!--product name select-->
                                <div class="custom_select relative">
                                    <div class="custom_select relative">
                                        @foreach($periodo2 as $p)
                                        <input type="text" id="periodo" name="" class="r_corners full_width" disabled="true" value="{{ $p->nome }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                                <label class="d_inline_b m_bottom_5 required" for="semana">Semana</label>
                                <!--product name select-->
                                <div class="custom_select relative">
                                    <div class="select_title type_2 r_corners relative color_dark mw_0">Selecione uma Semana</div>
                                    <ul class="select_list d_none"></ul>
                                    <select name="semana" id="semana" required="true">
                                        @foreach($periodo as $periodo)
                                        <option value="{{ $periodo->semana_1 }}">{{$periodo->semana_1}}</option>
                                        <option value="{{ $periodo->semana_2 }}">{{$periodo->semana_2}}</option>
                                        <option value="{{ $periodo->semana_3 }}">{{$periodo->semana_3}}</option>
                                        <option value="{{ $periodo->semana_4 }}">{{$periodo->semana_4}}</option>
                                        <option value="{{ $periodo->semana_5 }}">{{$periodo->semana_5}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix m_bottom_15">
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
                                <label for="cpf" class="required d_inline_b m_bottom_5">CPF</label><br>
                                <input type="text" required="true" id="cpf" name="cpf" class="r_corners full_width" onblur="validarCPF(this)" >
                            </div>
                            
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                                <label for="cpf" class="required d_inline_b m_bottom_5">Nome Completo</label><br>
                                <input type="text" required="true" id="nome" name="nome" class="r_corners full_width" >
                            </div>   
                        </li>

                        <li class="clearfix m_bottom_15">
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                                <label for="agencia" class="required d_inline_b m_bottom_5">Matricula</label><br>
                                <input type="text" required="true" id="matricula" name="matricula" class="r_corners full_width" >
                            </div>
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
                                <label class="d_inline_b m_bottom_5 required" for="banco">Banco</label>
                                <!--product name select-->
                                <div class="custom_select relative">
                                    <div class="select_title type_2 r_corners relative color_dark mw_0">Selecione um banco</div>
                                    <ul class="select_list d_none"></ul>
                                    <select name="banco" id="banco" required="true">
                                        <option value="Banco do Brasil">Banco do Brasil</option>
                                        <option value="Bradesco">Bradesco</option>
                                        <option value="BNB">BNB</option>
                                        <option value="CEF">CEF</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix m_bottom_15">
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                                <label for="agencia" class="required d_inline_b m_bottom_5">Agência</label><br>
                                <input type="text" required="true" id="agencia" name="agencia" class="r_corners full_width" >
                            </div>
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                                <label for="regional" class="required d_inline_b m_bottom_5">Regional</label><br>
                                <input type="text" required="true" id="regional" name="regional" class="r_corners full_width" >
                            </div>
                        </li>
                        <li class="clearfix m_bottom_15">
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
                                <label for="telefone" class="required d_inline_b m_bottom_5">Telefone</label><br>
                                <input type="text" required="true" id="telefone" name="telefone" class="r_corners full_width" >
                            </div>
                            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">

                            </div>
                        </li>
                        <li class="m_bottom_15">
                            <input required="true" type="checkbox" class="d_none" id="checkbox_1" ><label for="checkbox_1">Aceito os Termos do REGULAMENTO DA COLÔNIA DE FÉRIAS</label>
                        </li>
                        <li class="m_bottom_20">
                           
                           {!! NoCaptcha::renderJs() !!}
                           <div class="g-recaptcha" data-sitekey="6LdCz2YUAAAAAHhEhjWQw_mW7boL8N4287dqljrq"></div>
                        </li>
                        <li class="m_bottom_20">
                            <button type="submit" class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">Salvar dados</button>
                        </li>
                         <p id="search" title="Clique aqui para Acompanha sua inscrição" /><strong>&#10004; Acompanhe sua inscri&ccedil;&atilde;o<strong></p>
                         <p><input type="button" id="search2" value="x" class="wpcf7-form-control  wpcf7-submit" name="search" /></p>
                    </ul>
                </form>
                <div id="p1"> 
                	<table id="tabela" class="display" cellspacing="0" width="90%">
                		<thead>
                			<tr>
                				<th align="center">Periodo</th>
                				<th align="center">Semana</th>
                				<th align="left">Nome</th>
                				<th align="center">Matricula</th>
                				<th align="center">Banco</th>
                			</tr>
                		</thead>
                		<tbody>
                
                			@foreach($colonia as $dados)
                			<tr class="odd gradeX">
                				<td align="center">{{$dados->periodo or 'sem nada'}}</td>
                				<td align="center">{{$dados->semana or 'sem nada'}}</td>
                				<td>{{$dados->nome or '0 mes'}}</td>
                				<td align="center">{{$dados->matricula or 'sem nada'}}</td>
                				<td align="center">{{$dados->banco or 'sem nada'}}</td>
                			</tr>
                			@endforeach
                		</tbody>
                	</table>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="js/jquery-2.1.0.min.js"></script>

<script>
function validarCPF(strCPF) {

	var cpf = strCPF.value;

	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "12345678909" ||
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999"){
		alert("CPF INVALIDO !");	
		document.getElementById('cpf').value=" ";
	}	

	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9))){		
			alert("CPF INVALIDO !");
			document.getElementById('cpf').value=" ";
		}		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10))){
		alert("CPF INVALIDO !");
		document.getElementById('cpf').value=" ";
	}		
	return true;  

}

</script>

<script>

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
$(document).ready( function() {
  
   $('#cpf').blur(function(){ 
        
		var cpf = $('#cpf').val();
   
           $.ajax({

        	   type:'POST',
               url:"{{ URL::to('/buscarDados') }}",
               dataType: 'JSON',
               data:  {cpf : cpf ,_token : $('meta[name="csrf-token"]').attr('content')}, 
								
                success: function(data){

                	    if(data.id != null ){
                            $('#nome').val(data.nome);
                            $('#matricula').val(data.matricula);
                            $('#banco').val(data.banco);
    						$('#agencia').val(data.agencia);
    						$('#regional').val(data.regional);
    						$('#telefone').val(data.telefone);
    						document.getElementById("nome").disabled = true;
    						document.getElementById("matricula").disabled = true;
                            //  $('#telefone').focus();
                	    }else{

                	    	$('#nome').val(data.nome);
                            $('#matricula').val(data.matricula);
                            $('#banco').val(data.banco);
     						$('#agencia').val(data.agencia);
     						$('#regional').val(data.regional);
     						$('#telefone').val(data.telefone);
                	    	document.getElementById("nome").disabled = false;
    						document.getElementById("matricula").disabled = false;

                	    }
                    
                }
           });   
   return false;    
   })
});

</script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$("#search").click(function(){
			$("#p1").show();
			$("#search").hide();
			$("#search2").show();
		});
			
      	$("#search2").click(function(){
			$("#p1").hide();
			$("#search").show();
			$("#search2").hide();

		});

		$("#p1").hide();
		$("#search2").hide();
	});

</script>

@endsection
