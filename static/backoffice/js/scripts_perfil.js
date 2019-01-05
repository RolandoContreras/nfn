
////////////////////////////////////////////////////////////////// -- Efeitos da roda de categorias
		
	function AtivarEfeito(cod_categoria){
		$("#Categoria"+ cod_categoria +" .BordaBranca").css({"display":"inline"});
		$("#Categoria"+ cod_categoria +" .ImagemBlur").css({"display":"inline"});
	}

	function DesativarEfeito(cod_categoria){
		$("#Categoria"+ cod_categoria +" .ImagemBlur").css({"display":"none"});
		$("#Categoria"+ cod_categoria +" .BordaBranca").css({"display":"none"});
	}

////////////////////////////////////////////////////////////////// -- Mostrar perguntas
		
	function MostrarPerguntas(cod_categoria){
			
		if(($(window).width() + 17) < 1250) {
			$("#LimpaCookie").load("perfil_limpa_cookie.asp",function(){
				$(".DivPrincipalCategorias").animate({width: '100%', height: '400px', opacity: '0.9'}, 1000, function(){
					$("#CorpoOutraPagina").load("perfil_cliente.asp?categoria_selecionada="+ cod_categoria +"", function(){
						$(".DivPrincipalPerguntas").css({"display":"table"});
					});
				});
			});
		}else{
			$("#LimpaCookie").load("perfil_limpa_cookie.asp",function(){
				$(".DivPrincipalCategorias").animate({width: '45%', opacity: '0.9'}, 1000, function(){
					$("#CorpoOutraPagina").load("perfil_cliente.asp?categoria_selecionada="+ cod_categoria +"", function(){
						$(".DivPrincipalPerguntas").css({"display":"table"});
					});
				});				
			});
		}

	}

////////////////////////////////////////////////////////////////// -- Mostrar perguntas trocando a categoria
		
	function TrocarCategoriaPerguntas(cod_categoria){
		$("#LimpaCookie").load("perfil_limpa_cookie.asp",function(){
			$("#CorpoOutraPagina").load("perfil_cliente.asp?categoria_selecionada="+ cod_categoria +"", function(){
				$(".DivPrincipalPerguntas").css({"display":"table"});
			});		
		});
	}

////////////////////////////////////////////////////////////////// -- Proxima pergunta (não é obrigatório responder)
		
	function ProximaPergunta(cod_categoria, cod_pergunta, perguntas_puladas){
		$("#LimpaCookie").load("perfil_grava_cookie.asp?cod_pergunta="+ cod_pergunta +"&perguntas_puladas="+ perguntas_puladas +"",function(){
			$("#CorpoOutraPagina").load("perfil_cliente.asp?categoria_selecionada="+ cod_categoria +"", function(){
				$(".DivPrincipalPerguntas").css({"display":"table"});
			});	
		});
	}

////////////////////////////////////////////////////////////////// -- salva a resposta dissertativa da opcao da pergunta
		
	function SalvaRespostaDissertativa(CodCategoria, CodCliente, CodPergunta, CodResposta){

		if (CodResposta != ""){
			var RespostaDissertativa = $("#RespostaDissertativa"+ CodResposta +"").val();
			var RespostaDissertativa2 = (RespostaDissertativa).replace(/\n/g, "<br>");
		}else{
			var RespostaDissertativa = $("#RespostaDissertativa"+ CodPergunta +"").val();
			var RespostaDissertativa2 = (RespostaDissertativa).replace(/\n/g, "<br>");
		}

		$.ajax({
		type: "get",
		url: "perfil_salvar_respostas_dissertativas.asp?CodCategoria="+ CodCategoria +"&CodCliente="+ CodCliente +"&CodPergunta="+ CodPergunta +"&CodResposta="+ CodResposta +"&RespostaDissertativa="+ RespostaDissertativa2 +"",
		success: function(retorno){
		}
		})

	}

////////////////////////////////////////////////////////////////// -- salva as opcoes de resposta
		
	function SalvarResposta(CodCategoria, CodCliente, CodPergunta, CodResposta, Status){
		var RespostaEscolhida = $("#Resposta"+ CodResposta +"").val();

		if (Status == "Unico"){
			$(".RespostaUnica"+ CodPergunta +"").prop('checked', false);
			$("#Resposta"+ CodResposta +"").prop('checked', true);
		}


		if ($("#Resposta"+ CodResposta +"").is(':checked')){

			$.ajax({
			type: "get",
			url: "perfil_salvar_respostas.asp?CodCategoria="+ CodCategoria +"&CodCliente="+ CodCliente +"&CodPergunta="+ CodPergunta +"&CodResposta="+ CodResposta +"&Acao=Adicionar&Status="+ Status +"",
			success: function(retorno){
			}
			})

		}else{

			$.ajax({
			type: "get",
			url: "perfil_salvar_respostas.asp?CodCategoria="+ CodCategoria +"&CodCliente="+ CodCliente +"&CodPergunta="+ CodPergunta +"&CodResposta="+ CodResposta +"&Acao=Deletar&Status="+ Status +"",
			success: function(retorno){
			}
			})

		}

	}

////////////////////////////////////////////////////////////////// -- abre e fecha  a resposta dissertativa da opcao da pergunta
		
	function RespostaDissertativa(num){
		$("#Dissertativa"+ num +"").show("blind",300);
		$("#TrocaOnclick"+ num +"").attr("onClick","RespostaDissertativa2("+ num +")");
	}

	function RespostaDissertativa2(num){
		$("#Dissertativa"+ num +"").hide("blind",300);
		$("#TrocaOnclick"+ num +"").attr("onclick","RespostaDissertativa("+ num +")");
	}

////////////////////////////////////////////////////////////////// -- fecha a resposta dissertativa da opcao de resposta unica
		
	function RespostaDissertativaUnico(num, num2){
		$(".RespostaDissertativa"+ num2 +"").hide();
		$("#Dissertativa"+ num +"").show("blind",300);
	}

////////////////////////////////////////////////////////////////// -- salva a resposta dissertativa da opcao da pergunta 
		
	function SalvaRespostaDissertativa(CodCategoria, CodCliente, CodPergunta, CodResposta){

		if (CodResposta != ""){
			var RespostaDissertativa = $("#RespostaDissertativa"+ CodResposta +"").val();
			Status = "Unico";
		}else{
			var RespostaDissertativa = $("#RespostaDissertativa"+ CodPergunta +"").val();
			Status = "Dissertativa";
		}

		RespostaDissertativa2 = RespostaDissertativa.replace(/\n/g, "<br>");

		if (RespostaDissertativa == ""){
				
			$.ajax({
			type: "get",
			url: "perfil_salvar_respostas_dissertativas.asp?CodCategoria="+ CodCategoria +"&CodCliente="+ CodCliente +"&CodPergunta="+ CodPergunta +"&CodResposta="+ CodResposta +"&RespostaDissertativa="+ RespostaDissertativa2 +"&Acao=Vazio&Status="+ Status +"",
			success: function(retorno){
			}
			})

		}else{
				
			$.ajax({
			type: "get",
			url: "perfil_salvar_respostas_dissertativas.asp?CodCategoria="+ CodCategoria +"&CodCliente="+ CodCliente +"&CodPergunta="+ CodPergunta +"&CodResposta="+ CodResposta +"&RespostaDissertativa="+ RespostaDissertativa2 +"&Acao=Atualizar&Status="+ Status +"",
			success: function(retorno){
			}
			})

		}



	}

////////////////////////////////////////////////////////////////// -- Verificar a privacidade 
		
	function VerificaPrivacidadePerguntas(cod_pergunta,cod_categoria,cod_usuario){
			
		if ($('#status').is(":checked")){
			status = "Publico";
			$.ajax({
			type: "get",
			url: "perfil_privacidade.asp?cod_pergunta="+ cod_pergunta +"&cod_categoria="+ cod_categoria +"&cod_usuario="+ cod_usuario +"&status="+ status +"",
			success: function(retorno){
			}
			})
		}else{
			status = "Privado";
			$.ajax({
			type: "get",
			url: "perfil_privacidade.asp?cod_pergunta="+ cod_pergunta +"&cod_categoria="+ cod_categoria +"&cod_usuario="+ cod_usuario +"&status="+ status +"",
			success: function(retorno){
			}
			})
		}

	}

////////////////////////////////////////////////////////////////// -- Ir para o "meu perfil"
		
	function MeuPerfil(cod_usuario){
		$("#CorpoOutraPagina").load("perfil_cliente_respostas.asp?CodUsuario="+ cod_usuario +"");
	}

	function VoltarCategorias(){
		$("#CorpoOutraPagina").load("perfil_cliente.asp");
	}

////////////////////////////////////////////////////////////////// -- Voltar ao escritorio no mobile

	function VoltarEscritorioMobile(){
		$("#CorpoMobile").css({"display":"inline"});
		$("#CorpoMobilePerfil").css({"display":"none"});
		$("#CorpoOutraPagina").css({"display":"none"});
	}

//////////////////////////////////////////////////////////////////