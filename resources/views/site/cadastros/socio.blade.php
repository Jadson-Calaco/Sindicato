@extends('site.templates.template') @section('conteudo')

<!--slider with banners-->
<div class="page_content_offset">
	<!--breadcrumbs-->
	<section class="breadcrumbs">
		<div class="container">
			<ul class="horizontal_list clearfix bc_list f_size_medium">
				<li class="m_right_10 current"><a href="/public"
					class="default_t_color">Inicio<i
						class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
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

								<div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_10">
									<section
										class="bg_light_color_1 breadcrumbs m_bottom_10 m_xs_bottom_5">
										<div class="d_table full_width cta_1 d_xs_block">
											<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_2">
												<p class="">
													<b>Formulário Online</b>
												</p>
											</div>
										</div>
									</section>
									<!-- p class="m_bottom_10">Preencha Todos os Campos com <span class="scheme_color">*</span>.</p-->
									<form action="{{ url('/associe-se')}}" method="post"
										enctype="multipart/form-data">

										{!! csrf_field() !!} <input name="data" type="hidden"
											class="form-control" id="create_data"
											value="<?= date('d/m/Y') ?>">

										<ul>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Cpf
													</label> <input type="text" id="cpf" name="cpf"
														class="full_width r_corners" required="true" onblur="validarCPF(this)">
												</div>
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Matricula
													</label> <input type="text" id="cf_matricula"
														name="matricula" class="full_width r_corners"
														required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">
														Nome</label> <input type="text" id="cf_name" name="nome"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_email"
														class="required d_inline_b m_bottom_5">Data de Nascimento</label>
													<input type="date" id="cf_nascimento" name="data_nasc"
														class="full_width r_corners" required="true"> <span
														class="input-group-addon"> <span
														class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Naturalidade
													</label> <input type="text" id="naturalidade"
														name="naturalidade" class="full_width r_corners"
														required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">RG
													</label> <input type="text" id="rg" name="rg"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<div class="custom_select relative color_dark d_xs_block">
														<label for="cf_banco"
															class="required d_inline_b m_bottom_5">UF - RG </label>
														<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
														<ul id="filter_portfolio" class="select_list d_none"></ul>
														<select id="rguf" name="rguf" class="full_width r_corners"
															required="true">
															<option value="Acre">Acre</option>
															<option value="Alagoas">Alagoas</option>
															<option value="Amapá">Amapá</option>
															<option value="Amazonas">Amazonas</option>
															<option value="Bahia">Bahia</option>
															<option value="Ceará">Ceará</option>
															<option value="Distrito Federal">Distrito Federal</option>
															<option value="Espírito Santo">Espírito Santo</option>
															<option value="Goiás">Goiás</option>
															<option value="Maranhão">Maranhão</option>
															<option value="Mato Grosso">Mato Grosso</option>
															<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
															<option value="Minas Gerais">Minas Gerais</option>
															<option value="Pará">Pará</option>
															<option value="Paraíba">Paraíba</option>
															<option value="Paraná">Paraná</option>
															<option value="Pernambuco">Pernambuco</option>
															<option value="Piauí">Piauí</option>
															<option value="Rio de Janeiro">Rio de Janeiro</option>
															<option value="Rio Grande do Norte">Rio Grande do Norte</option>
															<option value="Rio Grande do Su">Rio Grande do Sul</option>
															<option value="Rondônia">Rondônia</option>
															<option value="Roraima">Roraima</option>
															<option value="Santa Catarina">Santa Catarina</option>
															<option value="São Paulo">São Paulo</option>
															<option value="Sergipe">Sergipe</option>
															<option value="Tocantins">Tocantins</option>
														</select>
													</div>
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<div class="custom_select relative color_dark d_xs_block">
														<label for="cf_sexo"
															class="required d_inline_b m_bottom_5">Sexo </label>
														<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
														<ul id="filter_portfolio" class="select_list d_none"></ul>
														<select id="sexo" name="sexo" class="full_width r_corners"
															required="true">
															<option value="Feminino">Feminino</option>
															<option value="Masculino">Masculino</option>
														</select>
													</div>
												</div>

												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Fone
														Residencial </label> <input type="text" id="telefone"
														name="fone" class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">

												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Celular
													</label> <input type="text" id="celular" name="celular"
														class="full_width r_corners" required="true">
												</div>

												<div class="f_left half_column">
													<div class="custom_select relative color_dark d_xs_block">
														<label for="cf_civil"
															class="required d_inline_b m_bottom_5">Estado Civil</label>
														<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
														<ul id="filter_portfolio" class="select_list d_none"></ul>
														<select id="estadocivil" name="estadocivil"
															class="full_width r_corners" required="true">
															<option value="Solteiro">Solteiro</option>
															<option value="Casado">Casado</option>
															<option value="Separado">Separado</option>
															<option value="Divorciado">Divorciado</option>
															<option value="Viúvo">Viúvo</option>
															<option value="Amasiado">Amasiado</option>
														</select>
													</div>
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">E-mail
													</label> <input type="email" id="cf_email" name="email"
														class="full_width r_corners" required="true">
												</div>
											</li>

											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Banco
													</label> <input type="text" id="banco" name="banco"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<label for="cf_email"
														class="required d_inline_b m_bottom_5">Agência</label> <input
														type="text" id="agencia" name="agencia"
														class="full_width r_corners" required="true">
												</div>
											</li>

											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Cidade(Banco)
													</label> <input type="text" id="cidade_banco"
														name="cidade_banco" class="full_width r_corners">
												</div>
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Série/UF
													</label> <input type="text" id="serieuf" name="serieuf"
														class="full_width r_corners" required="true">
												</div>

											</li>

											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Data
														de Admissão </label> <input type="date" id="dataadmi"
														name="dataadmi" class="full_width r_corners"
														required="true"> <span class="input-group-addon"> <span
														class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
												<div class="f_left half_column">
													<label for="cf_email"
														class="required d_inline_b m_bottom_5">CTPS</label> <input
														type="text" id="ctps" name="ctps"
														class="full_width r_corners" required="true">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Nome
														da Mãe </label> <input type="text" id="nomemae"
														name="nomemae" class="full_width r_corners"
														required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Nome
														do Pai </label> <input type="text" id="nomepai"
														name="nomepai" class="full_width r_corners"
														required="true">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
											    <div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">CEP
													</label> <input type="text" id="cep" name="cep"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Bairro
													</label> <input type="text" id="cf_bairro" name="bairro"
														class="full_width r_corners" required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Endereço
													</label> <input type="text" id="cf_endereco"
														name="endereco" class="full_width r_corners"
														required="true">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Complemento </label> <input
														type="text" id="cf_complemento" name="complemento"
														class="full_width r_corners">
												</div>
											</li>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Cidade
													</label> <input type="text" id="cf_cidade" name="cidade"
														class="full_width r_corners" required="true">
												</div>
												<div class="f_left half_column">
													<div class="custom_select relative color_dark d_xs_block">
														<label for="cf_banco"
															class="required d_inline_b m_bottom_5">UF </label>
														<div class="select_title type_2 r_corners relative mw_10">Selecione</div>
														<ul id="filter_portfolio" class="select_list d_none"></ul>
														<select id="uf" name="uf" class="full_width r_corners"
															required="true">
															<option value="Acre">Acre</option>
															<option value="Alagoas">Alagoas</option>
															<option value="Amapá">Amapá</option>
															<option value="Amazonas">Amazonas</option>
															<option value="Bahia">Bahia</option>
															<option value="Ceará">Ceará</option>
															<option value="Distrito Federal">Distrito Federal</option>
															<option value="Espírito Santo">Espírito Santo</option>
															<option value="Goiás">Goiás</option>
															<option value="Maranhão">Maranhão</option>
															<option value="Mato Grosso">Mato Grosso</option>
															<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
															<option value="Minas Gerais">Minas Gerais</option>
															<option value="Pará">Pará</option>
															<option value="Paraíba">Paraíba</option>
															<option value="Paraná">Paraná</option>
															<option value="Pernambuco">Pernambuco</option>
															<option value="Piauí">Piauí</option>
															<option value="Rio de Janeiro">Rio de Janeiro</option>
															<option value="Rio Grande do Norte">Rio Grande do Norte</option>
															<option value="Rio Grande do Su">Rio Grande do Sul</option>
															<option value="Rondônia">Rondônia</option>
															<option value="Roraima">Roraima</option>
															<option value="Santa Catarina">Santa Catarina</option>
															<option value="São Paulo">São Paulo</option>
															<option value="Sergipe">Sergipe</option>
															<option value="Tocantins">Tocantins</option>
														</select>
													</div>
											
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 1. </label> <input
														type="text" id="dependente1" name="dependente1"
														class="full_width r_corners">
												</div>
											</li>
											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 2. </label> <input
														type="text" id="dependente2" name="dependente2"
														class="full_width r_corners">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 3. </label> <input
														type="text" id="dependente3" name="dependente3"
														class="full_width r_corners">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 4. </label> <input
														type="text" id="dependente4" name="dependente4"
														class="full_width r_corners">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 5. </label> <input
														type="text" id="dependente5" name="dependente5"
														class="full_width r_corners">
												</div>
											</li>

											<li class="m_bottom_15">
												<div class="custom_select relative color_dark d_xs_block">
													<label for="cf_name">Dependentes - 6. </label> <input
														type="text" id="dependente6" name="dependente6"
														class="full_width r_corners">
												</div>
											</li>


											<li>
												<button type="submit"
													class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large">
													Enviar</button>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</section>
						@include('site.partes.menu_lateral')
					</div>
				</div>
			</div>
			<!--markup footer-->
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
               url:"{{ URL::to('buscarSocio') }}",
               dataType: 'JSON',
               data:  {cpf : cpf ,_token : $('meta[name="csrf-token"]').attr('content')}, 
								
                success: function(data){

                	    if(data.id != null ){
                            $('#cf_name').val(data.nome);
                            $('#cf_matricula').val(data.matricula);
                            $('#cf_endereco').val(data.endereco);
                            $('#cf_complemento').val(data.complemento);
                            $('#cep').val(data.cep);
                            $('#cf_bairro').val(data.bairro);
                            $('#cf_cidade').val(data.cidade);
                            $('#uf').val(data.uf);
                            $('#telefone').val(data.fone);
                            $('#celular').val(data.celular);
                            $('#cf_email').val(data.email);
                            $('#naturalidade').val(data.naturalidade);
                            $('#cf_nascimento').val(data.data_nasc);
                            $('#sexo').val(data.sexo);
                            $('#nomemae').val(data.nomemae);
                            $('#nomepai').val(data.nomepai);
                            $('#rg').val(data.rg);
                            $('#rguf').val(data.rguf);
                            $('#estadocivil').val(data.estadocivil);
                            $('#banco').val(data.banco);
                            $('#agencia').val(data.agencia);
                            $('#cidade_banco').val(data.cidade_banco);
                            $('#dataadmi').val(data.dataadmi);
                            $('#ctps').val(data.ctps);
                            $('#serieuf').val(data.serieuf);
                            $('#dependente1').val(data.dependente1);
                            $('#dependente2').val(data.dependente2);
                            $('#dependente3').val(data.dependente3);
                            $('#dependente4').val(data.dependente4);
                            $('#dependente5').val(data.dependente5);
                            $('#dependente6').val(data.dependente6);
                            
    						document.getElementById("cf_name").disabled = true;
    						document.getElementById("cf_matricula").disabled = true;
                            //  $('#telefone').focus();
                	    }else{

                	    	$('#cf_name').val(data.nome);
                            $('#cf_matricula').val(data.matricula);
                            $('#cf_endereco').val(data.endereco);
                            $('#cf_complemento').val(data.complemento);
                            $('#cep').val(data.cep);
                            $('#cf_bairro').val(data.bairro);
                            $('#cf_cidade').val(data.cidade);
                            $('#uf').val(data.uf);
                            $('#telefone').val(data.fone);
                            $('#celular').val(data.celular);
                            $('#cf_email').val(data.email);
                            $('#naturalidade').val(data.naturalidade);
                            $('#cf_nascimento').val(data.data_nasc);
                            $('#sexo').val(data.sexo);
                            $('#nomemae').val(data.nomemae);
                            $('#nomepai').val(data.nomepai);
                            $('#rg').val(data.rg);
                            $('#rguf').val(data.rguf);
                            $('#estadocivil').val(data.estadocivil);
                            $('#banco').val(data.banco);
                            $('#agencia').val(data.agencia);
                            $('#cidade_banco').val(data.cidade_banco);
                            $('#dataadmi').val(data.dataadmi);
                            $('#ctps').val(data.ctps);
                            $('#serieuf').val(data.serieuf);
                            $('#dependente1').val(data.dependente1);
                            $('#dependente2').val(data.dependente2);
                            $('#dependente3').val(data.dependente3);
                            $('#dependente4').val(data.dependente4);
                            $('#dependente5').val(data.dependente5);
                            $('#dependente6').val(data.dependente6);
                	    	document.getElementById("cf_name").disabled = false;
    						document.getElementById("cf_matricula").disabled = false;

                	    }
                    
                }
           });   
   return false;    
   })
});

</script>

<script type="text/javascript" >

    $(document).ready(function() {
        
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#cf_endereco").val("...");
                    $("#cf_bairro").val("...");
                    $("#cf_cidade").val("...");
                    $("#uf").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#cf_endereco").val(dados.logradouro);
                            $("#cf_bairro").val(dados.bairro);
                            $("#cf_cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    alert("Formato de CEP inválido.");
                }
            } //end if.

        });
    });

</script>

@endsection
