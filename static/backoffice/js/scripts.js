var UrlAreaRestrita="https://www.scipiracicaba.com.br/escritorio-virtual/";

var DivAguarde ="<div class='DivLeft100pc_P20 Background4 ArredondarBordas4 Padding20 AlignCenter'><div class='DivInlineBlock'><div class='DivLeft'><img src='imagens/carregando.gif' width='40' height='40'></div><div class='DivLeft MarginL10 MarginT8 FontSize17 Weight600'>Aguarde...</div></div></div>";

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    } else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+Shift+U
        return false;
    }
});

$(document).on("contextmenu", function (e) {        
    e.preventDefault();
});

//////////////////////////////////////////////////////////

function AbreBloqueio(){
	document.getElementById("DivTamanhoTela").innerHTML = $(window).width() + 17;
	
	if(($(window).width() + 17) < 955) {
		$("#CorpoMobile").fadeOut(100, function() {
			$("#Corpo").remove();
			$("#CorpoMobile").remove();
			/*$("#CorpoBloqueio").fadeIn(1000);
			$("#CorpoBloqueio").load(""+ UrlAreaRestrita +"bloqueio-treinamento");
			$('[data-toggle="tooltip"]').tooltip();*/
		});

		$.ajax({
		type: "get",
		url: UrlAreaRestrita +"bloqueio-treinamento",
		success: function(retorno){
			$("#CorpoBloqueio").html(retorno);
			$("#CorpoBloqueio").fadeIn(1000);
			$('[data-toggle="tooltip"]').tooltip();
		}
		})

	}else{
		$("#Corpo").fadeOut(100, function() {
			$("#Corpo").remove();
			$("#CorpoMobile").remove();
			//$("#CorpoBloqueio").fadeIn(100);
			/*$("#CorpoBloqueio").fadeIn(1000,function(){
				$("#CorpoBloqueio").niceScroll();
				$("#Bloqueio").niceScroll();
				$('[data-toggle="tooltip"]').tooltip();
			});*/
		});
		/*$("#CorpoBloqueio").load(""+ UrlAreaRestrita +"bloqueio-treinamento");*/

		$.ajax({
		type: "get",
		url: UrlAreaRestrita +"bloqueio-treinamento",
		success: function(retorno){
			$("#CorpoBloqueio").html(retorno);
			$("#CorpoBloqueio").fadeIn(1000);
			$("#CorpoBloqueio").niceScroll();
			$("#Bloqueio").niceScroll();
			$('[data-toggle="tooltip"]').tooltip();
		}
		})

	}
}

function PerguntaCupons(Acao, Codigo, Resposta){

	if (Acao == "Pergunta" && Codigo != ""){

		if (Resposta == "SCI"){
			$("#BotaoResposta1").attr("class","btn btn-success BotaoResposta1");
			$("#BotaoResposta2").attr("class","btn BotaoResposta1");
		}else if (Resposta == "Outros"){
			$("#BotaoResposta1").attr("class","btn BotaoResposta1");
			$("#BotaoResposta2").attr("class","btn btn-success BotaoResposta2");
		}

		$("#PerguntaCodigo").val(Codigo);
		$("#DivListagemCupons").hide();
		$("#DivPerguntaCupons").show();

	}else if (Acao == "Responde" && Codigo == "" && Resposta != ""){

		var PerguntaCodigo = $("#PerguntaCodigo").val();

		if (PerguntaCodigo != "" && (Resposta == "SCI" || Resposta == "Outros")){

			$("#DivPerguntaCupons").hide();

			$.ajax({
			type: "post",
			url: UrlAreaRestrita + "cupons-pergunta-salvar/"+ PerguntaCodigo + "/"+ Resposta +"",
			cache: false,
			success: function(retorno){

				$("#PerguntaResposta-" + PerguntaCodigo).html("<span onclick=\"PerguntaCupons('Pergunta', '"+ PerguntaCodigo +"', '"+ retorno +"');\" class=\"DivInlineBlock Div110px Padding5 ArredondarBordas4 Background12 Pointer\">Alterar Resposta</span>");
				$("#PerguntaCodigo").val("");
				$("#DivListagemCupons").show();

			}
			});

		}

	}

}

//////////////////////////////////////////////////////////

function FiltroCupons() {
	var MesFiltro = $("#MesFiltro").val();
	var AnoFiltro = $("#AnoFiltro").val();

	$("#Cupons").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "cupons/"+ MesFiltro +"/"+AnoFiltro  +"",
	cache: false,
	success: function(retorno){
		$("#Cupons").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});
}

//////////////////////////////////////////////////////////

function FiltroAcompanharKit() {
	var MesFiltro = $("#MesFiltro").val();
	var AnoFiltro = $("#AnoFiltro").val();

	$("#AcompanharKit").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "acompanhar-kit/"+ MesFiltro +"/"+AnoFiltro  +"",
	cache: false,
	success: function(retorno){
		$("#AcompanharKit").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});
}

//////////////////////////////////////////////////////////

function FiltroPrazoDeEntrega(tipo, busca, transportadora) {

	var paginacao = $("#paginacao").val();

	if (tipo == "nome"){
		var busca = $("#busca").val();
	}

	$("#PrazoDeEntrega .Resultados").html(DivAguarde);

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "prazo-de-entrega2",
	data: {tipo: tipo, busca: busca, transportadora: transportadora, paginacao: paginacao},
	cache: false,
	success: function(retorno){
		$("#PrazoDeEntrega .Resultados").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});
}

//////////////////////////////////////////////////////////

function Solicitar2Via(codigo,ano,acao) {

	if (acao == "P"){
		$("#Adesao2Via").toggle();
	}else if (acao == "S"){

		$("#Adesao2Via").hide();
		$("#Botao2Via").hide();

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "solicitar-2-via-adesao",
		data: {Codigo: codigo},
		cache: false,
		success: function(retorno){
			BoletosFiltrar(ano);
		}
		});

	}

}

//////////////////////////////////////////////////////////

function AlterarDadosEntregaBoleto() {

	var erro = "";
	var form_dados_entrega = $("#form_dados_entrega");
	var tipo_envio = $("#tipo_envio");
	var cep = $("#cep");
	var cep_mensagem = $("#cep-mensagem");
	var endereco = $("#endereco");
	var numero = $("#numero");
	var bairro= $("#bairro");
	var estado = $("#estado");
	var cidade = $("#cidade");
	var enderecox = $("#enderecox");
	var bairrox= $("#bairrox");
	var estadox = $("#estadox");
	var cidadex = $("#cidadex");
	var ponto_apoio = $('#ponto_apoio');
	var ponto_apoiox = $('#ponto_apoiox');
	var botao_submit = $('#DivBotaoSubmit');

	$(botao_submit).hide();

	if (cep.val() == ""){
		cep.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		cep.css({"border":"1px solid #CCCCCC"});
	}

	// CONDIÇÃO PARA OS ESTADOS AM E RR - estado.val() == "AM" || estado.val() == "RR"

	if (tipo_envio.val() == "N" || estado.val() == "AM" || estado.val() == "RR"){

		if (ponto_apoio.val() == "" && $.isNumeric(ponto_apoio.val()) == false){
			erro = "S";
			ponto_apoiox.css({"border":"1px solid #D00000"});
		}else {
			ponto_apoiox.css({"border":"1px solid #CCCCCC"});
		}

	}

	if (endereco.val() == ""){
		enderecox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		enderecox.css({"border":"1px solid #CCCCCC"});
	}

	if (numero.val() == ""){
		numero.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		numero.css({"border":"1px solid #CCCCCC"});
	}

	if (bairro.val() == ""){
		bairrox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		bairrox.css({"border":"1px solid #CCCCCC"});
	}

	if (estado.val() == ""){
		estadox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		estadox.css({"border":"1px solid #CCCCCC"});
	}

	if (cidade.val() == ""){
		cidadex.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		cidadex.css({"border":"1px solid #CCCCCC"});
	}

	if (erro == ""){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "boletos-confirmar-dados-entrega-salvar",
		data: form_dados_entrega.serialize(),
		cache: false,
		success: function(retorno){
			abre(UrlAreaRestrita + 'boletos-confirmar-dados/'+ retorno +'','ModalPadrao2');
		}
		});

	}else {
		$(botao_submit).show();
	}

}

//////////////////////////////////////////////////////////

function AlterarKitPreCadastro(){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "convencao-comprar-convites-consumo-2018",
		cache: false,
		success: function(retorno){
			$("#AlterarKit").html(retorno);
		}
		});

}

function AlterarKitBoleto(CodKitNovo, KitConvencao) {

	$("#AlterarKit").html(DivAguarde);

	if (KitConvencao == "S"){

		$("#CodKitNovo").val(CodKitNovo);

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "convencao-comprar-convites-consumo-2018",
		cache: false,
		success: function(retorno){
			$("#AlterarKit").html(retorno);
		}
		});

	}else{

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "boletos-confirmar-kit-salvar",
		data: {Codigo: $("#Codigo").val(), CodKitNovo: CodKitNovo, CodKitAntigo: $("#CodKitAntigo").val(), UrlPagina: $("#UrlPagina").val()},
		cache: false,
		success: function(retorno){
			abre(UrlAreaRestrita + 'boletos-confirmar-dados/'+ retorno +'','ModalPadrao2');
		}
		});

	}

}

function AlterarKit(CodKitNovo, App, PagarKitBonus, KitConvencao) {

	$("#AlterarKit").html(DivAguarde);

	if (KitConvencao == "S"){

		$("#CodKitNovo").val(CodKitNovo);

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "convencao-comprar-convites-consumo-2018",
		data: {CodKitNovo: CodKitNovo, PagarKitBonus: PagarKitBonus},
		cache: false,
		success: function(retorno){
			$("#AlterarKit").html(retorno);
			$("#ConvencaoKit").show();
		}
		});

	}else{

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "alterar-kit-salvar",
		data: {CodKitNovo: CodKitNovo, CodKitAntigo: $("#CodKitAntigo").val(), UrlPagina: $("#UrlPagina").val()},
		cache: false,
		success: function(retorno){
			if (App == "S"){
				window.open(''+ UrlAreaRestrita +'app/alterar-kit', '_self');
			}else {

				if (PagarKitBonus == "S"){
					abre(''+ UrlAreaRestrita +'pagar-kit-com-bonus','ModalPadrao2');
				}else if (PagarKitBonus == "PY"){
					abre(''+ UrlAreaRestrita +'pagar-kit-com-bonus-py','ModalPadrao2');	
				}else {
					window.open(''+ UrlAreaRestrita +'inicio', '_self');
				}

			}
		}
		});

	}

}

//////////////////////////////////////////////////////////

function SolicitarCesta(botao,tipo,ano) {

	$(botao).prop('disabled', true);
	$(botao).val('Aguarde...');

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "solicitar-cesta",
	data: {tipo: tipo},
	cache: false,
	success: function(retorno){
		BoletosFiltrar(ano);
	}
	});

}

//////////////////////////////////////////////////////////

function VerificarAppPlanoCarreira(AppConquistas) {

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "app/plano-de-carreira",
	data: {AppConquistas: AppConquistas},
	cache: false,
	success: function(retorno){
		if (retorno == "OK"){
			VerificarApp();
		}
	}
	});

}

//////////////////////////////////////////////////////////

function PlanoCarreiraPL3Imagem (usuario){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "plano-de-carreira-imagem",
		data: {CodCadastro: usuario},
		cache: false,
		success: function(retorno){
			$("#IMGPL3").html(retorno);
		}
		});
}

//////////////////////////////////////////////////////////

function VerificarApp() {

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "app/verificar",
	cache: false,
	success: function(retorno){
		//sucesso
		//console.log(retorno);
	}, error: function() {
		//erro
	}
	});

}

//////////////////////////////////////////////////////////

function PaLogisticaFiltro(FiltroMes) {

	var Buscar = $("#Buscar").val();
	Buscar = Buscar.trim();

	$("#Filtro").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "cestas-a-retirar",
	data: {FiltroMes: FiltroMes, Buscar: Buscar},
	cache: false,
	success: function(retorno){
		$("#Filtro").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});

}

//////////////////////////////////////////////////////////

function PaLogisticaRetirar(num) {

	var Codigo = $("#Codigo" + num).val();

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "cestas-a-retirar-salvar",
	data: {Codigo: Codigo},
	cache: false,
	success: function(retorno){
		$(".BlocoPaRetirada" + num).hide();
	}
	});

}

//////////////////////////////////////////////////////////

function FiltroExtrato() {
	var MesFiltro = $("#MesFiltro").val();
	var AnoFiltro = $("#AnoFiltro").val();
	var TipoFiltro = $("#TipoFiltro").val();
	var NivelFiltro = $("#NivelFiltro").val();

	$("#Extrato").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "extrato/"+ MesFiltro +"/"+AnoFiltro +'/'+ NivelFiltro +'/'+ TipoFiltro,
	cache: false,
	success: function(retorno){
		$("#Extrato").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});
}

//////////////////////////////////////////////////////////

function FiltroExtratoPy() {
	var MesFiltro = $("#MesFiltro").val();
	var AnoFiltro = $("#AnoFiltro").val();
	var TipoFiltro = $("#TipoFiltro").val();
	var NivelFiltro = $("#NivelFiltro").val();

	$("#Extrato").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "extrato-py/"+ MesFiltro +"/"+AnoFiltro +'/'+ NivelFiltro +'/'+ TipoFiltro,
	cache: false,
	success: function(retorno){
		$("#Extrato").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});
}

//////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////

function SacAtualizarAtendimento(){

	$("#DivBotaoSubmit").prop('disabled', true).hide();

	var erro = "";
	var form_sac_atendimento = $("#form_sac_atendimento");
	var Codigo = $("#Codigo");
	var descricao = $("#descricao");

	if (Codigo.val() == ""){
		Codigo.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		Codigo.css({"border":"1px solid #CCCCCC"});
	}

	if (descricao.val() == ""){
		descricao.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		descricao.css({"border":"1px solid #CCCCCC"});
	}

	if (erro == ""){
		form_sac_atendimento.submit();
	}else {
		$("#DivBotaoSubmit").prop('disabled', false).show();
	}

}

//////////////////////////////////////////////////////////

function SacNovoAtendimento(){

	$("#DivBotaoSubmit").prop('disabled', true).hide();

	var erro = "";
	var categoria = $("#categoria");
	var assunto = $("#assunto");
	var descricao = $("#descricao");

	if (categoria.val() == ""){
		categoria.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		categoria.css({"border":"1px solid #CCCCCC"});
	}

	if (parseInt(categoria.val()) != 33 ){
	
		if (assunto.val() == ""){
			assunto.css({"border":"1px solid #D00000"});
			erro = "s";
		}else {
			assunto.css({"border":"1px solid #CCCCCC"});
		}

		if (descricao.val() == ""){
			descricao.css({"border":"1px solid #D00000"});
			erro = "s";
		}else {
			descricao.css({"border":"1px solid #CCCCCC"});
		}
	
	}else{

		$("#resposta_aviso").hide();

		var qtde_perguntas = $("#qtde_perguntas").val();

		for(i=1;i<=parseInt(qtde_perguntas);i++) {

			if ($(".pergunta_resposta_" + i).is(":checked") == false){
				erro = "s";
				$("#resposta_aviso").show();
			}

		}
		
		if ($("#validar_motivo").val() == "S"){
		
			var resposta_descritiva = $("#resposta_descritiva");
			var resposta_descritiva = resposta_descritiva.val().replace(/\s/g, "");

			if (resposta_descritiva == "" || parseInt(resposta_descritiva.length) < 6){
				$("#resposta_descritiva_aviso").show();
				erro = "s";
				$("#DivBotaoSubmit").prop('disabled', false).show();
			}else{
				$("#resposta_descritiva_aviso").hide();
			}	
		
		}
	
	}

	if (erro == ""){

		if (parseInt(categoria.val()) == 33){
		
			$.ajax({
			type: "post",
			url: UrlAreaRestrita + "sac-adicionar-exclusao-cadastro-sms",
			cache: false,
			success: function(retorno){
				
				$("#DivCategoria").hide();
				$("#DivExclusaoCadastro1").hide();
				$("#DivExclusaoCadastro2").html(retorno);

			}
			});		
		
		}else{
			$("#form_sac_atendimento").submit();		
		}

	}else {
		$("#DivBotaoSubmit").prop('disabled', false).show();
	}

}

//////////////////////////////////////////////////////////

function PagarComPagSeguro(NumeroBoleto){

	$.ajax({
	type: "POST",
	url: "boletos_confirmar_cartao_criar_pedido_pagseguro.asp", 
	data: {NumeroBoleto: NumeroBoleto},
	success: function(retorno) {

		var verificacao = retorno.substring(0, 3);
		console.log(verificacao);

		if (verificacao == "OK|"){

			var retorno = retorno.replace("OK|", "");
			console.log(retorno);

			Abre_CartaoPagSeguroLightbox(retorno);
		
		}else {
			//erro
			console.log("Erro cartão 1");
		}

	},
	error: function() {
		//erro
		console.log("Erro cartão 2");
	}
	});

}

function Abre_CartaoPagSeguroLightbox(checkoutCode) {

	if (typeof(checkoutCode) !== "undefined" && checkoutCode !== null) {

		var isOpenLightbox = PagSeguroLightbox({
			code: checkoutCode
		}, {
			success : function(transactionCode) {

				console.log("compra do consumo - pagseguro - pedido criado com sucesso");
				//abre(UrlAreaRestrita + 'convencao-pagamento-realizado-2018','ModalPadrao2');
				location.reload();

			},
			abort : function() {
				console.log("compra do consumo - pagseguro - cancelada");
			}
		});

		// Redirecionando o cliente caso o navegador não tenha suporte ao Lightbox
		if (!isOpenLightbox){

			//Em produção
			location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code="+code;

			//Em sandbox
			//location.href="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code="+code;
		
		}

	}

}

//////////////////////////////////////////////////////////

function SelecionarModo(modo) {    

    $(".modo-pagament--item").removeClass("modo-pagament-item--selecionada");
    $("#modo_pagamento_" + modo).addClass("modo-pagament-item--selecionada");
    $("#cartao_modo_" + modo).prop("checked", true);

	if (modo == "credito"){
		$(".cartao-etiqueta-padrao-telefone").hide();
	}else if (modo == "debito"){
		$(".cartao-etiqueta-padrao-telefone").show();
	}

}

function CartaoSelecionarBandeira(bandeira) {    
    $(".icones-bandeira").removeClass("icones-bandeira--selecionada");
    $("#icone_bandeira_" + bandeira).addClass("icones-bandeira--selecionada");
	$("input[name=cartao_bandeira]	").prop("checked", false);
	$("#cartao_bandeira_" + bandeira).prop("checked", true);
}

function CartaoCarregando(acao) {
    var botao_area = $(".botao-area");
    if (acao == "Carregando") {
        botao_area.html('<button class="botao-padrao botao-padrao--confirmar" disabled>Carregando...</button>');
    } else if (acao == "Pagar") {
        botao_area.html('<button class="botao-padrao botao-padrao--confirmar" onclick="CartaoPagar();">CONFIRMAR PAGAMENTO</button>');
    } else if (acao == "Erro") {
        botao_area.html('');
    }
}

function FormatarCartao(cartao) {
	var cartao_secreto = cartao.replace(/\d/gi, "*");
	return cartao.substr(0, 4) + cartao_secreto.substr(4, cartao_secreto.length - 8) + cartao.substr(-4, 4);
}

function CartaoPagar() {
    
    CartaoCarregando("Carregando");

    var erros = "";

    $(".campo-padrao").removeClass("campo-padrao--erro")

    var cartao_modo = $("input[name=cartao_modo]:checked");
    var cartao_bandeira = $("input[name=cartao_bandeira]:checked");
    var cartao_numero = $("#cartao_numero");    
    var cartao_nome_comprador = $("#cartao_nome_comprador");    
    var cartao_telefone = $("#cartao_telefone");    
    var cartao_mes = $("#cartao_mes");    
    var cartao_ano = $("#cartao_ano");    
    var cartao_ccv = $("#cartao_ccv");
    var tipo_boleto = $("#tipo_boleto");
    var codigo_boleto = $("#Codigo");

	if (typeof cartao_modo.val() == "undefined") {
		erros += "S";
		$("#selecione-pagamento").css({ "color": "#9f3b2b" });
	} else {
		$("#selecione-pagamento").css({ "color": "#404040" });
	}

	if (cartao_modo.val() == "Crédito"){
		var UrlPaginaAjax = "boletos-confirmar-cartao-processar-credito";
		var cartao_modo = "Credito";
	}else if (cartao_modo.val() == "Débito"){
		var UrlPaginaAjax = "boletos-confirmar-cartao-processar-debito";
		var cartao_modo = "Debito";
	}else{
		erros += "S";
		var UrlPaginaAjax = "";
	}

    if (cartao_telefone.val() == "" && cartao_modo == "Debito") {
        erros += "S";
        cartao_telefone.addClass("campo-padrao--erro");
    }

	if (typeof cartao_bandeira.val() == "undefined") {
		erros += "S";
		$("#selecione-bandeira").css({ "color": "#9f3b2b" });
	} else {
		$("#selecione-bandeira").css({ "color": "#404040" });
	}

    if (cartao_numero.val() == "") {
        erros += "S";
        cartao_numero.addClass("campo-padrao--erro");
    }

    if (cartao_nome_comprador.val() == "") {
        erros += "S";
        cartao_nome_comprador.addClass("campo-padrao--erro");
    }

    if (cartao_mes.val() == "") {
        erros += "S";
        cartao_mes.addClass("campo-padrao--erro");
    }

    if (cartao_ano.val() == "") {
        erros += "S";
        cartao_ano.addClass("campo-padrao--erro");
    }

    if (cartao_ccv.val() == "") {
        erros += "S";
        cartao_ccv.addClass("campo-padrao--erro");
    }

    if (erros == "") {

        $.ajax({
            url: UrlAreaRestrita + "boletos-confirmar-cartao-dados-cliente/" + codigo_boleto.val(), 
            type: "GET", 
            success: function(retorno) {

				var transacao = JSON.parse(retorno);

				$.ajax({
					url: UrlAreaRestrita + UrlPaginaAjax, 
					type: "POST", 
					data: {
						cliente_identificador: transacao.cliente_identificador,
						cliente_nome: transacao.cliente_nome,
						cliente_primeiro_nome: transacao.cliente_primeiro_nome,
						cliente_ultimo_nome: transacao.cliente_ultimo_nome,
						cliente_email: transacao.cliente_email,
						cliente_tipo_documento: transacao.cliente_tipo_documento,
						cliente_documento: transacao.cliente_documento,
						cliente_telefone: transacao.cliente_telefone,
						
						cliente_endereco_rua: transacao.cliente_endereco_rua,
						cliente_endereco_numero: transacao.cliente_endereco_numero,
						cliente_endereco_complemento: transacao.cliente_endereco_complemento,
						cliente_endereco_bairro: transacao.cliente_endereco_bairro,
						cliente_endereco_cidade: transacao.cliente_endereco_cidade,
						cliente_endereco_estado: transacao.cliente_endereco_estado,
						cliente_endereco_pais: transacao.cliente_endereco_pais,
						cliente_endereco_cep: transacao.cliente_endereco_cep,
						
						compra_tipo: tipo_boleto.val(),
						compra_pedido: transacao.compra_pedido,
						compra_valor: transacao.compra_valor,
						
						cartao_numero: cartao_numero.val(),
						cartao_bandeira: cartao_bandeira.val(),
						cartao_nome_comprador: cartao_nome_comprador.val(),
                        cartao_telefone: cartao_telefone.val().replace(/\D/gi, ""),
						cartao_mes: cartao_mes.val(),
						cartao_ano: cartao_ano.val(),
						cartao_ccv: cartao_ccv.val()
					}, 
					success: function(resultado) {

						var json = JSON.parse(resultado);

						if (json.status == "APPROVED") {

							// APROVADO

                            if (cartao_modo == "Credito") {

								var codigo_transacao = json.codigo;
								$(".mensagem-erro").css("display", "none");
								CartaoConcluirPagamento(codigo_transacao, codigo_boleto.val(), cartao_modo);

                            } else if (cartao_modo == "Debito") {

                                var payment_id = json.payment_id;
                                var redirect_url = json.redirect_url;
                                var issuer_payment_id = json.issuer_payment_id;
                                var payer_authentication_request = json.payer_authentication_request;

                                /**
                                 * MD: referente ao atributo post_data.issuer_payment_id retornado no passo 3 da transação.
                                 * PaReq: referente ao atributo post_data.payer_authentication_request retornado no passo 3 da transação.
                                 * TermUrl: Sua URL, responsável por receber o PaRes por parte do emissor, conforme descrito no passo 8 da transação.
                                 */

                                var form = document.createElement("form");
                                    document.body.appendChild(form);
                                    form.method = "post";
                                    form.target = "_self";
                                    form.action = redirect_url;

                                var md = document.createElement("input");
                                    md.type = "hidden";
                                    md.name = "MD";
                                    md.value = issuer_payment_id;
                                    form.appendChild(md);

                                var PaReq = document.createElement("input");
                                    PaReq.type = "hidden";
                                    PaReq.name = "PaReq";
                                    PaReq.value = payer_authentication_request;
                                    form.appendChild(PaReq);

                                var TermUrl = document.createElement("input");
                                    TermUrl.type = "hidden";
                                    TermUrl.name = "TermUrl";
                                    TermUrl.value = UrlAreaRestrita + "boletos-confirmar-cartao-finalizar-debito/" + codigo_boleto.val();
                                    form.appendChild(TermUrl);

									$("#FormularioCartao").css("display", "none");

                                form.submit();

                            } else {

								CartaoCarregando("Erro");
								$(".mensagem-erro2").css("display", "block");

							}

						} else if (json.status == "REJECTED") {

							// REJEITADO
							CartaoRejeitadosSalvar(transacao.compra_pedido, transacao.compra_valor, json.detalhes, FormatarCartao(cartao_numero.val()), cartao_modo);

						}

					},
					error: function() {
						CartaoCarregando("Pagar");
					}
				});

            },
            error: function() {
				CartaoCarregando("Erro");
				$(".mensagem-erro2").css("display", "block");
            }
        });

    } else {
        CartaoCarregando("Pagar");
    }

}

function CartaoConcluirPagamento(codigo_transacao, compra_pedido, compra_tipo){

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "boletos-confirmar-cartao-concluir-pagamento",
	data: {codigo_transacao: codigo_transacao, compra_pedido: compra_pedido, compra_tipo: compra_tipo},
	cache: false,
	success: function(retorno){

		if (retorno == "OK"){
			
			if (compra_tipo == "Credito"){
				$(".mensagem-erro2").css("display", "none");
				abre(UrlAreaRestrita + 'boletos-confirmar-cartao-concluir-pagamento-sucesso','ModalPadrao2');
			}else if (compra_tipo == "Debito"){
				$("#MensagemCartaoDebitoErro").css("display", "none");
				$("#MensagemCartaoDebitoSucesso").css("display", "block");
				$("#MensagemCartaoDebitoAguardando").css("display", "none");
			}
		
		}else{

			if (compra_tipo == "Credito"){
				 $(".mensagem-erro2").css("display", "block");
			}else if (compra_tipo == "Debito"){
				$("#MensagemCartaoDebitoErro").css("display", "block");
				$("#MensagemCartaoDebitoSucesso").css("display", "none");
				$("#MensagemCartaoDebitoAguardando").css("display", "none");
			}

		}

	}, error: function () {

		if (compra_tipo == "Credito"){
			$(".mensagem-erro2").css("display", "block");
			CartaoCarregando("Erro");
		}else if (compra_tipo == "Debito"){
			$("#MensagemCartaoDebitoErro").css("display", "block");
			$("#MensagemCartaoDebitoSucesso").css("display", "none");
			$("#MensagemCartaoDebitoAguardando").css("display", "none");
		}

	}
	});

}

function CartaoRejeitadosSalvar(compra_pedido, compra_valor, detalhes, digitos, compra_tipo){

	$.ajax({
		url: UrlAreaRestrita + "boletos-rejeitados-salvar", 
		type: "POST", 
		data: {
			compra_pedido: compra_pedido, 
			compra_valor: compra_valor,
			detalhes: detalhes, 
			digitos: digitos,
			compra_tipo: compra_tipo
		},
		success: function() {
			CartaoCarregando("Pagar");
		   $(".mensagem-erro").css("display", "inline");
		},
		error: function() {
			CartaoCarregando("Erro");
			$(".mensagem-erro2").css("display", "block");
		}
	});

}

//////////////////////////////////////////////////////////

function DescontarBonusBoleto(Acao){

	if (Acao == "PerguntaA"){

		$(".PerguntaValorDescontar").show();
		$(".BotaoBloquear").hide();

	}else if (Acao == "PerguntaN"){

		$(".PerguntaValorDescontar").hide();
		$(".BotaoBloquear").show();

	}else if (Acao == "PerguntaS"){

		var Codigo = $("#Codigo").val();

		$(".PerguntaValorDescontar").html("Aguarde...");

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "boletos-confirmar-descontar-valor-parcial",
		data: {Codigo: Codigo},
		cache: false,
		success: function(retorno){

			if (retorno == "OK"){
				abre(UrlAreaRestrita + 'boletos','ModalPadrao2');
			}else{
				$(".PerguntaValorDescontar").css({"color":"#DD0000"}).html("Ops! Alguma coisa aconteceu aqui, entre em contato.");
			}

		}, error: function () {
			$(".PerguntaValorDescontar").css({"color":"#DD0000"}).html("Ops! Alguma coisa aconteceu aqui, entre em contato.");
		}
		});

	}

}

//////////////////////////////////////////////////////////

function PagarKitBonus(Acao) {

	if (Acao == "Pergunta"){

		$("#BotaoInicial").hide();
		$("#Pergunta").show();

	}else if (Acao == "Salvar"){

		var Codigo = $("#Codigo").val();

		$(".BotaoPreto").hide();
		$(".BotaoVermelho").hide();

		$("#BotaoInicial").prop('disabled', true).hide();
		$("#BotaoConfirmar").prop('disabled', true).hide();

		if (Codigo != ""){

			$("#Pergunta2").html("Aguarde...");

			$.ajax({
			type: "post",
			url: UrlAreaRestrita + "pagar-kit-com-bonus-salvar",
			data: {Codigo: Codigo},
			cache: false,
			success: function(retorno){

				if (retorno == "OK"){
					location.reload();
				}else{
					$("#Pergunta2").html("Ops! Alguma coisa aconteceu aqui, entre em contato.");				
				}

			}, error: function () {
				$("#Pergunta2").html("Ops! Alguma coisa aconteceu aqui, entre em contato.");
			}
			});

		}else{

			$(".BotaoPreto").show();
			$(".BotaoVermelho").show();
			
			$("#BotaoInicial").prop('disabled', false).show();
			$("#BotaoConfirmar").prop('disabled', false).show();

		}

	}

}

function PagarKitBonusPY(Acao) {

	if (Acao == "Pergunta"){

		$("#BotaoInicial").hide();
		$("#Pergunta").show();

	}else if (Acao == "Salvar"){

		var Codigo = $("#Codigo").val();

		$(".BotaoPreto").hide();
		$(".BotaoVermelho").hide();

		$("#BotaoInicial").prop('disabled', true).hide();
		$("#BotaoConfirmar").prop('disabled', true).hide();

		if (Codigo != ""){

			$("#Pergunta2").html("Por favor espere...");

			$.ajax({
			type: "post",
			url: UrlAreaRestrita + "pagar-kit-com-bonus-salvar-py",
			data: {Codigo: Codigo},
			cache: false,
			success: function(retorno){

				if (retorno == "OK"){
					location.reload();
				}else{
					$("#Pergunta2").html("¡Huy! Una cosa sucedió aquí, entre en contacto.");				
				}

			}, error: function () {
				$("#Pergunta2").html("¡Huy! Una cosa sucedió aquí, entre en contacto.");
			}
			});

		}else{

			$(".BotaoPreto").show();
			$(".BotaoVermelho").show();
			
			$("#BotaoInicial").prop('disabled', false).show();
			$("#BotaoConfirmar").prop('disabled', false).show();

		}

	}

}

//////////////////////////////////////////////////////////

function VerRede(urlAbre,idAbre,Nivel) {

	$("#"+ idAbre +"").html(DivAguarde);

	var NivelCods = $("#ListaNivel"+ Nivel).val();

	$.ajax({
	type: "post",
	url: urlAbre,
	data: {CodsNivel: NivelCods},
	cache: false,
	success: function(retorno){

		$("#"+ idAbre +"").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();

	}
	});

}

//////////////////////////////////////////////////////////

function BoletosFiltrarPY(FiltroAno) {

	$("#Filtro").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "boletos-py",
	data: {FiltroAno: FiltroAno},
	cache: false,
	success: function(retorno){
		$("#Filtro").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});

}

function BoletosFiltrar(FiltroAno) {

	$("#Filtro").html("");

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "boletos",
	data: {FiltroAno: FiltroAno},
	cache: false,
	success: function(retorno){
		$("#Filtro").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	});

}

//////////////////////////////////////////////////////////

function DadosSenhaEditar() {

	var erro = "";
	var form_dados_senha	= $("#form_dados_senha");
	var senha_nova = $("#senha_nova");

	if (senha_nova.val() == ""){
		senha_nova.css({"border":"1px solid #D00000"});
		erro = "S";
	}else {
		senha_nova.css({"border":"1px solid #cccccc"});
	}

	if (erro == ""){
		form_dados_senha.submit();
	}

}

//////////////////////////////////////////////////////////

function DadosPagamentoEditar(){

	var erro = "";
	var form_dados_pagamento	= $("#form_dados_pagamento");
	var tipo_conta = $("#tipo_conta");
	var banco = $("#banco");
	var agencia = $("#agencia");
	var agencia_dig = $("#agencia_dig");
	var conta = $("#conta");
	var conta_dig = $("#conta_dig");
	var numero_pis = $("#numero_pis");
	var tipo_pessoa = $("#tipo_pessoa");
	var nome_mae = $("#nome_mae");

	if (nome_mae.val() == ""){
		nome_mae.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		nome_mae.css({"border":"1px solid #cccccc"});
	}

	/*if (tipo_conta.val() == ""){
		tipo_conta.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		tipo_conta.css({"border":"1px solid #cccccc"});
	}

	if (banco.val() == ""){
		banco.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		banco.css({"border":"1px solid #cccccc"});
	}

	if (agencia.val() == ""){
		agencia.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		agencia.css({"border":"1px solid #cccccc"});
	}

	if (agencia_dig.val() == ""){
		agencia_dig.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		agencia_dig.css({"border":"1px solid #cccccc"});
	}

	if (conta.val() == ""){
		conta.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		conta.css({"border":"1px solid #cccccc"});
	}

	if (conta_dig.val() == ""){
		conta_dig.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		conta_dig.css({"border":"1px solid #cccccc"});
	}

	if (numero_pis.val() == ""){
		numero_pis.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		numero_pis.css({"border":"1px solid #cccccc"});
	}*/

	if (erro == ""){

		if (tipo_pessoa.val() == "F"){
			$("#DivBotaoSubmit").prop('disabled', true);
			$.ajax({
			type: "post",
			url: UrlAreaRestrita + "dados-pagamento-verifica-pis",
			data: {pis: numero_pis.val()},
			cache: false,
			success: function(retorno){

				if (retorno == "S"){
					form_dados_pagamento.submit();
					numero_pis.css({"border":"1px solid #cccccc"});
				} else {
					$("#DivBotaoSubmit").prop('disabled', false);
					numero_pis.css({"border":"1px solid #D00000"});
				}

			}
			});

		}else {
			form_dados_pagamento.submit();
			$("#DivBotaoSubmit").prop('disabled', true);
		}

	}

}

//////////////////////////////////////////////////////////

function VerificarPis() {

	$("#DivBotaoSubmit").hide();
	$(".Mensagem").html("");

	var numero_pis = $("#numero_pis").val();
	var tipo_pessoa = $("#tipo_pessoa").val();

	if (numero_pis != ""){

		var valida_pis = ValidarPis(numero_pis);

		if (valida_pis == true){
			if (tipo_pessoa == "F"){
				VerificarPisRepetido(numero_pis);
			}else{
			$("#DivBotaoSubmit").show();
			$("#numero_pis").css({"border":"1px solid #cccccc"});
			$(".Mensagem").html("").hide();
			}
		}else {
			$("#DivBotaoSubmit").hide();
			$("#numero_pis").css({"border":"1px solid #D00000"});
			$(".Mensagem").html("Número de PIS/PASEP inválido").show();
		}

	} else {
		$("#DivBotaoSubmit").show();
		$("#numero_pis").css({"border":"1px solid #cccccc"});
		$(".Mensagem").html("").hide();
	}

}

//////////////////////////////////////////////////////////

function VerificarPisRepetido(pis) {

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "dados-pagamento-verifica-pis",
	data: {pis: pis},
	cache: false,
	success: function(retorno){

		if (retorno == "N"){
			$("#DivBotaoSubmit").hide();
			$("#numero_pis").css({"border":"1px solid #D00000"});
			$(".Mensagem").html("Número de PIS/PASEP já cadastrado").show();
		}else {
			$("#DivBotaoSubmit").show();
			$("#numero_pis").css({"border":"1px solid #cccccc"});
			$(".Mensagem").html("").hide();
		}

	}
	});

}

//////////////////////////////////////////////////////////

function ValidarPis(pis) {

	var ftap="3298765432";
	var total=0;
	var resto=0;
	var numPIS=0;
	var strResto="";

	numPIS=pis;

	if (numPIS=="" || numPIS==null) {
		return false;
	}

	if(numPIS.length !== 11 || numPIS === "00000000000" || numPIS === "11111111111" || numPIS === "22222222222" || numPIS === "33333333333" || numPIS === "44444444444" || numPIS === "55555555555" || numPIS === "66666666666" || numPIS === "77777777777" || numPIS === "88888888888" || numPIS === "99999999999") {
	return false;
	}

	for(i=0;i<=9;i++) {
		resultado = (numPIS.slice(i,i+1))*(ftap.slice(i,i+1));
		total=total+resultado;
	}

	resto = (total % 11)

	if (resto != 0) {
		resto=11-resto;
	}

	if (resto==10 || resto==11) {
		strResto=resto+"";
		resto = strResto.slice(1,2);
	}

	if (resto!=(numPIS.slice(10,11))) {
		return false;
	}

	return true;

}

//////////////////////////////////////////////////////////

function DadosEntregaEditar(){

	var erro = "";
	var form_dados_entrega	= $("#form_dados_entrega");
	var tipo_envio = $("#tipo_envio");
	var cep = $("#cep");
	var cep_mensagem = $("#cep-mensagem");
	var endereco = $("#endereco");
	var numero = $("#numero");
	var bairro= $("#bairro");
	var estado = $("#estado");
	var cidade = $("#cidade");
	var enderecox = $("#enderecox");
	var bairrox= $("#bairrox");
	var estadox = $("#estadox");
	var cidadex = $("#cidadex");
	var ponto_apoio = $('#ponto_apoio');
	var ponto_apoiox = $('#ponto_apoiox');
	$("#DivBotaoSubmit").prop('disabled', true);

	if (cep.val() == ""){
		cep.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		cep.css({"border":"1px solid #CCCCCC"});
	}

	if (tipo_envio.val() == "N"){

		if (ponto_apoio.val() == "" && $.isNumeric(ponto_apoio.val()) == false){
			erro = "S";
			ponto_apoiox.css({"border":"1px solid #D00000"});
		}else {
			ponto_apoiox.css({"border":"1px solid #CCCCCC"});
		}

	}

	if (endereco.val() == ""){
		enderecox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		enderecox.css({"border":"1px solid #CCCCCC"});
	}

	if (numero.val() == ""){
		numero.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		numero.css({"border":"1px solid #CCCCCC"});
	}

	if (bairro.val() == ""){
		bairrox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		bairrox.css({"border":"1px solid #CCCCCC"});
	}

	if (estado.val() == ""){
		estadox.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		estadox.css({"border":"1px solid #CCCCCC"});
	}

	if (cidade.val() == ""){
		cidadex.css({"border":"1px solid #D00000"});
		erro = "s";
	}else {
		cidadex.css({"border":"1px solid #CCCCCC"});
	}

	if (erro == ""){
		form_dados_entrega.submit();
	}else{
		$("#DivBotaoSubmit").prop('disabled', false);
	}

}

//////////////////////////////////////////////////////////

function DadosEntregaEditarParaguai(){
	
	var PagarKitBonus = $("#PagarKitBonus").val();

	var erro = "";
	var ponto_apoio_checked = $('[name="ponto_apoio"]').is(':checked');
	var ponto_apoio_value = $('#ponto_apoio:checked').val();
	var blocos = $(".Blocos");
	var mensagem = $(".Mensagem");
	var botao_salvar = $("#BotaoSalvar");

	$(botao_salvar).prop('disabled', true).css({ "display": "none"});	

	if (ponto_apoio_checked == false){
		erro += "&bull; Seleccione un punto de apoyo para recibir su kit<br/>";
		blocos.css({"border":"1px solid #DD0000"});
		mensagem.html(erro).css({ "display": "block"});	
	}else{
		blocos.css({"border":"1px solid #D3D3D3"});
		mensagem.html("").css({ "display": "none"});	
	}

	if (erro == ""){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "dados-entrega-paraguai-salvar",
		data: {ponto_apoio: ponto_apoio_value},
		cache: false,
		success: function(retorno){

			if (PagarKitBonus == "PY"){
				abre(''+ UrlAreaRestrita +'pagar-kit-com-bonus-py','ModalPadrao2');	
			}else{
				window.open(UrlAreaRestrita + "inicio", "_self");
			}

		}
		});

	}else{
		$(botao_salvar).prop('disabled', false).css({ "display": "block"});	
	}

}

function BlocoSelecionado(Bloco){
	$(".Blocos").css({"border":"1px solid #D6D6D6"});
	$(Bloco).css({"border":"1px solid #4DB858"});
}

//////////////////////////////////////////////////////////

function PuxarValorFrete() {

	$("#DivOpcoesFrete1").html("Aguarde...");
	$("#DivOpcoesFrete2").html("Aguarde...");
	$("#DivOpcoesFrete3").html("Aguarde...");

	var tipo_envio = $("#tipo_envio").val();
	var cidade = $("#cidade").val();
	var estado = $("#estado").val();
	var ponto_apoio = $("#ponto_apoio").val();

	$.ajax({
	type: "post",
	url: UrlAreaRestrita + "puxar-valor-frete",
	data: {tipo_envio: tipo_envio, cidade: cidade, estado: estado, ponto_apoio: ponto_apoio},
	cache: false,
	success: function(retorno){

		frete_opcoes = retorno.split("|");
		frete_transportadora = frete_opcoes[0];
		frete_franquia = frete_opcoes[1];
		frete_pa = frete_opcoes[2];

		if (tipo_envio == "T") {

			$("#DivOpcoesFrete1").html(frete_transportadora);

			if (frete_franquia == "N"){
				$(".BlocoFranquia").hide();
			} else {
				$(".BlocoFranquia").show();
				$("#DivOpcoesFrete2").html(frete_franquia);			
			}

		} else {

			$("#DivOpcoesFrete1").html("");
			$("#DivOpcoesFrete2").html("");		
			$("#DivOpcoesFrete3").html(frete_pa);

		}

	}
	});

}

//////////////////////////////////////////////////////////

function PuxarCepEntrega(){

	var tipo_envio = $("#tipo_envio");
	var bloco_endereco = $(".BlocoEndereco");
	var bloco_ponto_apoio = $(".BlocoPontoApoio");
	var bloco_franquia = $(".BlocoFormaEnvia");
	var campo_cep = $("#cep");
	var campo_endereco = $("#endereco");
	var campo_complemento = $("#complemento");
	var campo_bairro = $("#bairro");
	var campo_estado = $("#estado");
	var campo_cidade = $("#cidade");
	var campo_enderecox = $("#enderecox");
	var campo_complementox = $("#complementox");
	var campo_bairrox = $("#bairrox");
	var campo_estadox = $("#estadox");
	var campo_cidadex = $("#cidadex");
	var campo_ponto_apoio = $("#ponto_apoio");
	var campo_ponto_apoiox = $("#ponto_apoiox");
	var mensagem = $("#cep-mensagem");
	var mensagem2 = $("#pa-mensagem2");
	var submit = $("#DivBotaoSubmit");

	var tipo_envio2_op1 = $("#tipo_envio2_op1");
	var BotaoTransportadora = $("#BotaoTransportadora");
	var BotaoFranquia = $("#BotaoFranquia");
	var opcao_frete1 = $("#DivOpcoesFrete1");
	var opcao_frete2 = $("#DivOpcoesFrete2");
	var opcao_frete3 = $("#DivOpcoesFrete3");

	cep = campo_cep.val();
	cep = cep.trim();
	campo_cep.css({"border":"1px solid #D3D3D3"});

	submit.hide();
	bloco_endereco.hide();
	bloco_ponto_apoio.hide();
	bloco_franquia.hide();
	mensagem.html("").attr("class","Mensagem").hide();
	tipo_envio2_op1.attr("checked", "none");
	BotaoTransportadora.css("background", "#ffffff");
	BotaoFranquia.css("background", "#ffffff");
	opcao_frete1.html("");
	opcao_frete2.html("");
	opcao_frete3.html("");

	tipo_envio.val("");
	campo_endereco.val("");
	campo_complemento.val("");
	campo_bairro.val("");
	campo_estado.val("");
	campo_cidade.val("");
	campo_ponto_apoio.val("");
	campo_ponto_apoiox.val("");

	if (cep != ""){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "puxar-cep",
		data: {cep: cep, BuscaEntrega: 'S'},
		cache: false,
		success: function(retorno){

			if (retorno != "NB" && retorno != "NE" && retorno != "NC"){

				$.ajax({
				type: "post",
				url: UrlAreaRestrita + "puxar-cep-entrega",
				data: {cep: retorno},
				cache: false,
				success: function(verificar){

					if (verificar != "N"){

						var retorno2 = retorno;
						var retorno3 = retorno2.replace("++", "&");
						retorno4 = retorno3.split("||");

						endereco = retorno4[0];
						bairro = retorno4[1];
						cidade = retorno4[2];
						estado = retorno4[3];
						complemento = retorno4[4];

						endereco = endereco.trim();
						bairro = bairro.trim();
						cidade = cidade.trim();
						estado = estado.trim();
						complemento = complemento.trim();

						campo_endereco.val(endereco);
						campo_bairro.val(bairro);
						campo_estado.val(estado);
						campo_cidade.val(cidade);
						campo_complemento.val(complemento);

						if (endereco != ""){
							campo_enderecox.attr("disabled", true).css({"border":"1px solid #cccccc"}).val(endereco);
						}else {
							campo_enderecox.attr("disabled", false).css({"border":"1px solid #D00000"}).val("");
						}

						if (bairro != ""){
							campo_bairrox.attr("disabled", true).css({"border":"1px solid #cccccc"}).val(bairro);
						}else {
							campo_bairrox.attr("disabled", false).css({"border":"1px solid #D00000"}).val("");
						}

						if (cidade != ""){
							campo_cidadex.attr("disabled", true).css({"border":"1px solid #cccccc"}).val(cidade);
						}else {
							campo_cidadex.attr("disabled", false).css({"border":"1px solid #D00000"}).val("");
						}

						if (estado != ""){
							campo_estadox.attr("disabled", true).css({"border":"1px solid #cccccc", "background":"#ebebe4"}).val(estado);
						}else {
							campo_estadox.attr("disabled", false).css({"border":"1px solid #D00000", "background":"#ffffff"}).val("");
						}

						var mensagem_retorno1 = "Esse CEP ainda n&atilde;o &eacute; atendido por transportadora.<br/>Complete o endere&ccedil;o abaixo e selecione um ponto de apoio onde ir&aacute; retirar sua cesta.";
						var mensagem_retorno2 = "Os kits dispon&Iacute;veis para esse estado s&atilde;o apenas o KIT 0, KIT 2 e KIT 3.";

						var verificar2 = verificar;
						verificar3 = verificar2.split("|");

						cidade_ativa = verificar3[0];
						cidade_transportadora = verificar3[1];
						cidade_kit = verificar3[2];

						if (cidade_ativa == "S" && cidade_transportadora == "T"){

							tipo_envio.val("T");
							tipo_envio2_op1.attr("checked", "checked");
							BotaoTransportadora.css("background", "#ebebe4");
							BotaoFranquia.css("background", "#ffffff");
							bloco_endereco.show();
							bloco_franquia.show();
							PuxarValorFrete();
						
							if (cidade_kit == "FIXO1"){
								mensagem.html(mensagem_retorno2).attr("class","Mensagem").show();
							}						

							mensagem2.hide();
						
						}else {

							mensagem.html(mensagem_retorno1).attr("class","Mensagem").show();
							tipo_envio.val("N");
							bloco_endereco.show();
							bloco_ponto_apoio.show();

							if (cidade_kit == "FIXO1"){
								mensagem.html(mensagem_retorno1 + "<br/>" + mensagem_retorno2).attr("class","Mensagem").show();
							}

							mensagem2.show();

						}

						// CONDIÇÃO PARA OS ESTADOS AM E RR

						var ponto_apoio = $("#ponto_apoio");
						var ponto_apoiox = $("#ponto_apoiox");

						ponto_apoiox.attr("disabled", false).css({"border":"1px solid #cccccc", "background":"#ffffff"}).val("");

						if (estado == "AM" || estado == 'RR'){

							bloco_endereco.show();
							bloco_ponto_apoio.show();

							if (estado == "AM"){
								ponto_apoio.val("101");
								ponto_apoiox.attr("disabled", true).css({"border":"1px solid #cccccc", "background":"#ebebe4"}).val("101");
							}else{
								ponto_apoio.val("99");
								ponto_apoiox.attr("disabled", true).css({"border":"1px solid #cccccc", "background":"#ebebe4"}).val("99");
							}

							PuxarValorFrete();

						}

						// CONDIÇÃO PARA OS ESTADOS AM E RR

						submit.show();

					}else {

						campo_cep.css({"border":"1px solid #D00000"});
						mensagem.html("Esta cidade n&atilde;o &eacute; atendida pela SCI!").attr("class","Mensagem Erro").show();

					}

				}
				})	;

			}else {

				campo_cep.css({"border":"1px solid #D00000"});

				if (retorno == "NB"){
				mensagem.html("Este bairro n&atilde;o &eacute; atendido pela SCI!").attr("class","Mensagem Erro").show();
				} else if (retorno == "NC"){
				mensagem.html("Este CEP n&atilde;o &eacute; atendido pela SCI!").attr("class","Mensagem Erro").show();
				}else {
				mensagem.html("Esta cidade n&atilde;o &eacute; atendida pela SCI!").attr("class","Mensagem Erro").show();
				}

			}

		}
		});

	}

}

//////////////////////////////////////////////////////////

function PuxarCepCliente(tipo_pessoa){

	if (tipo_pessoa == "F"){
		var campo_cep = "#cliente_cep";
		var campo_endereco = "#cliente_endereco";
		var campo_complemento = "#cliente_complemento";
		var campo_bairro = "#cliente_bairro";
		var campo_estado = "#cliente_estado";
		var campo_cidade = "#cliente_cidade";
	}else {
		var campo_cep = "#cep_empresa";
		var campo_endereco = "#endereco_empresa";
		var campo_bairro = "#bairro_empresa";
		var campo_estado = "#estado_empresa";
		var campo_cidade = "#cidade_empresa";
	}

	cep = $(campo_cep).val();
	cep = cep.trim();

	if (cep != ""){

		$(campo_endereco).val("");
		$(campo_complemento).val("");
		$(campo_bairro).val("");
		$(campo_estado).val("");
		$(campo_cidade).val("");

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "puxar-cep",
		data: {cep: cep},
		cache: false,
		success: function(retorno){

			if (retorno!="NB" && retorno!="NE"){

				$(".Enderecos" + tipo_pessoa).show();

				$.ajax({
				type: "post",
				url: UrlAreaRestrita + "puxar-cep-cliente",
				data: {cep: retorno},
				cache: false,
				success: function(verificar){

					if (verificar == "S"){

						$(campo_cep).css({"border":"1px solid #D3D3D3"});
						$(campo_endereco).css({"border":"1px solid #D3D3D3"});
						$(campo_complemento).css({"border":"1px solid #D3D3D3"});
						$(campo_bairro).css({"border":"1px solid #D3D3D3"});
						$(campo_estado).css({"border":"1px solid #D3D3D3"});
						$(campo_cidade).css({"border":"1px solid #D3D3D3"});

						retorno1 = retorno.split("||");

						endereco = retorno1[0];
						bairro = retorno1[1];
						cidade = retorno1[2];
						estado = retorno1[3];
						complemento = retorno1[4];

						endereco = endereco.trim();
						complemento = complemento.trim();
						bairro = bairro.trim();
						cidade = cidade.trim();
						estado = estado.trim();

						$(campo_endereco).val(endereco);
						$(campo_complemento).val(complemento);
						$(campo_bairro).val(bairro);
						$(campo_estado).val(estado);
						$(campo_cidade).val(cidade);

					}

				}
				})	;

			}else {

				$(campo_endereco).css({"border":"1px solid #D00000"});
				$(campo_complemento).css({"border":"1px solid #D00000"});
				$(campo_bairro).css({"border":"1px solid #D00000"});
				$(campo_estado).css({"border":"1px solid #D00000"});
				$(campo_cidade).css({"border":"1px solid #D00000"});

			}

		}
		});

	}

}

//////////////////////////////////////////////////////////

function VerificarTelefoneMensagem(campo, acao, retorno) {

	var numero = $("#" + campo);
	var mensagem = $("#" + campo + "-mensagem");

	numero.css({"border":"1px solid #D3D3D3"});
	mensagem.html("").attr("class","Mensagem").hide();

	if (acao == "formato" && retorno == "invalido"){

		if (campo == "telefone"){
			var texto = "Telefone";
		}else{
			var texto = "Celular";
		}
	
		numero.css({"border":"1px solid #DD0000"});
		mensagem.html(texto + " inválido").attr("class","Mensagem Erro").show();

	}else if (acao == "quantidade" && retorno == "S"){

		numero.css({"border":"1px solid #DD0000"});
		mensagem.html("Celular digitado já está cadastrado").attr("class","Mensagem Erro").show();

	}

}

function VerificarNumeroTelefone(campo){

	var numero = $("#" + campo).val();

	if (numero != ""){

		$.ajax({
		type: "post",
		url: UrlAreaRestrita + "dados-pessoais-verifica-telefone",
		data: {numero: numero, acao: campo},
		cache: false,
		success: function(retorno){

			if (retorno == "S"){
				VerificarTelefoneMensagem(campo, 'formato', 'invalido');
			}else{

				if (campo == "celular"){

					$.ajax({
					type: "post",
					url: UrlAreaRestrita + "dados-pessoais-verifica-telefone",
					data: {numero: numero, acao: "celular_duplicado"},
					cache: false,
					success: function(retorno){

						VerificarTelefoneMensagem(campo, 'quantidade', retorno);

					}
					});

				}else{
					VerificarTelefoneMensagem(campo, 'formato', retorno);
				}

			}

		}
		});
	
	}

}

//////////////////////////////////////////////////////////

function DadosPessoaisEditar(){

	var erro = "";
	$("#DivBotaoSubmit").prop('disabled', true);
	var invalid = /\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var form_dados_pessoais	= $("#form_dados_pessoais");
	var tipo_pessoa = $('#tipo_pessoa');
	var email = $('#email');
	var nascimento = $('#nascimento');
	var deficiencia = $('#deficiencia');
	var deficiencia_descricao = $('#deficiencia_descricao');
	var cliente_cep = $('#cliente_cep');
	var cliente_endereco = $('#cliente_endereco');
	var cliente_numero = $('#cliente_numero');
	var cliente_bairro = $('#cliente_bairro');
	var cliente_estado = $('#cliente_estado');
	var cliente_cidade = $('#cliente_cidade');
	var horario_atendimento = $('#horario_atendimento');
	var idioma = $('#idioma');

	var telefone_mensagem = $("#telefone-mensagem");	
	var telefone = $("#telefone");

	var celular_mensagem = $("#celular-mensagem");	
	var celular = $("#celular");

	if (tipo_pessoa == "J"){

		var razao_social = $('#razao_social');
		var nome_fantasia = $('#nome_fantasia');
		var telefone_empresa = $('#telefone_empresa');
		var inscricao_estadual = $('#inscricao_estadual');
		var inscricao_municipal = $('#inscricao_municipal');
		var cep_empresa = $('#cep_empresa');
		var endereco_empresa = $('#endereco_empresa');
		var numero_empresa = $('#numero_empresa');
		var bairro_empresa = $('#bairro_empresa');
		var estado_empresa = $('#estado_empresa');
		var cidade_empresa = $('#cidade_empresa');

		if (razao_social.val() == ""){
			razao_social.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			razao_social.css({"border":"1px solid #CCCCCC"});
		}

		if (nome_fantasia.val() == ""){
			nome_fantasia.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			nome_fantasia.css({"border":"1px solid #CCCCCC"});
		}

		if (telefone_empresa.val() == ""){
			telefone_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			telefone_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (inscricao_estadual.val() == ""){
			inscricao_estadual.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			inscricao_estadual.css({"border":"1px solid #CCCCCC"});
		}

		if (inscricao_municipal.val() == ""){
			inscricao_municipal.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			inscricao_municipal.css({"border":"1px solid #CCCCCC"});
		}

		if (cep_empresa.val() == ""){
			cep_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			cep_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (endereco_empresa.val() == ""){
			endereco_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			endereco_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (numero_empresa.val() == ""){
			numero_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			numero_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (bairro_empresa.val() == ""){
			bairro_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			bairro_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (estado_empresa.val() == ""){
			estado_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			estado_empresa.css({"border":"1px solid #CCCCCC"});
		}

		if (cidade_empresa.val() == ""){
			cidade_empresa.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			cidade_empresa.css({"border":"1px solid #CCCCCC"});
		}

	}

	if (email.val() == ""){
		email.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {

		if (invalid.test(email.val()) == false) {
			email.css({"border":"1px solid #E5615D"});
			erro = "s";
		}else {
			email.css({"border":"1px solid #CCCCCC"});
		}

	}

	if (telefone.val() == ""){
		erro += "&bull; Preencha o seu telefone<br />";
		telefone.css({"border":"1px solid #DD0000"});
	}else {

		if (telefone_mensagem.attr("class") == "Mensagem Erro"){
			erro += "&bull; Preencha o telefone corretamente<br />";
			telefone.css({"border":"1px solid #DD0000"});		
		}else {
			telefone.css({"border":"1px solid #D3D3D3"});			
		}

	}

	if (celular.val() == ""){
		erro += "&bull; Preencha o seu celular<br />";
		celular.css({"border":"1px solid #DD0000"});
	}else {

		if (celular_mensagem.attr("class") == "Mensagem Erro"){
			erro += "&bull; Preencha o celular corretamente<br />";
			celular.css({"border":"1px solid #DD0000"});		
		}else {
			celular.css({"border":"1px solid #D3D3D3"});			
		}

	}

	if (deficiencia.val() == ""){
		deficiencia.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {

		if (deficiencia.val() == "Sim"){

			if (deficiencia_descricao.val() == ""){
				deficiencia_descricao.css({"border":"1px solid #E5615D"});
				erro = "s";
			}else{
				deficiencia_descricao.css({"border":"1px solid #CCCCCC"});
			}

		}else{
			deficiencia_descricao.css({"border":"1px solid #CCCCCC"});
		}

	}

	if (cliente_cep.val() == ""){
		cliente_cep.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_cep.css({"border":"1px solid #CCCCCC"});
	}

	if (cliente_endereco.val() == ""){
		cliente_endereco.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_endereco.css({"border":"1px solid #CCCCCC"});
	}

	if (cliente_numero.val() == "" && idioma.val() == "br"){
		cliente_numero.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_numero.css({"border":"1px solid #CCCCCC"});
	}

	if (cliente_bairro.val() == ""){
		cliente_bairro.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_bairro.css({"border":"1px solid #CCCCCC"});
	}

	if (cliente_estado.val() == ""){
		cliente_estado.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_estado.css({"border":"1px solid #CCCCCC"});
	}

	if (cliente_cidade.val() == ""){
		cliente_cidade.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		cliente_cidade.css({"border":"1px solid #CCCCCC"});
	}

	if (horario_atendimento.val() == ""){
		horario_atendimento.css({"border":"1px solid #E5615D"});
		erro = "s";
	}else {
		horario_atendimento.css({"border":"1px solid #CCCCCC"});
	}

	if (erro == ""){
		form_dados_pessoais.submit();
	}else{
		$("#DivBotaoSubmit").prop('disabled', false);
	}

}

//////////////////////////////////////////////////////////

function abre(url,id) {

	if (id=="ModalPadraoChat") {
		var DivAguarde2 = "<div class='modal-dialog' style='width:100%;max-width:950px'><div class='modal-content'><div class='modal-body' style='padding:0px'><div class='ModalTable' id='ModalPadraoChat2'>"+ DivAguarde +"</div></div></div></div>";
	} else {
		var DivAguarde2 = DivAguarde;
	}

	$("#"+ id +"").html(DivAguarde2);

	$.ajax({
	type: "get",
	url: url,
	success: function(retorno){
		$("#"+ id +"").html(retorno);
		$('[data-toggle="tooltip"]').tooltip();
	}
	})

}

function abreModalTutorial(secao){
	$("#secaotutorial").html(DivAguarde);

	$.ajax({
		type: "get",
		url: "/area-restrita-nova/get_video_tutorial.asp?secao=" + secao,
		success: function(retorno)
		{
			var resultado = retorno.split("||");
			$("#titulovideo").html(resultado[0]);
			$("#secaotutorial").html('<iframe style="display: block; margin: 0 auto;" border="0" id="iframeTutorial" src="https://www.youtube.com/embed/'+resultado[1]+'?rel=0" frameborder="0"></iframe>');
			$("#urlVideo").html("https://www.youtube.com/embed/"+resultado[1]+"?rel=0");
		}
	})
}

//////////////////////////////////////////////////////////

function EfeitoMenu(div){
$("#"+ div +"").toggle("slide",{direction:"up"});
}

//////////////////////////////////////////////////////////

function HereditariedadeEditar(){
	var erro = "";
	var nome = $("#nome").val();
	var nascimento = $("#nascimento").val();
	var rg = $("#rg").val();
	var cpf = $("#cpf").val();
	var telefone = $("#telefone").val();
	var telefone_recado = $("#telefone_recado").val();
	var celular = $("#celular").val();
	$("#DivBotaoSubmit").prop('disabled', true);

	$("#nome").css({"border":"1px solid #D3D3D3"});
	$("#nascimento").css({"border":"1px solid #D3D3D3"});
	$("#rg").css({"border":"1px solid #D3D3D3"});
	$("#cpf").css({"border":"1px solid #D3D3D3"});
	$("#telefone").css({"border":"1px solid #D3D3D3"});
	$("#telefone_recado").css({"border":"1px solid #D3D3D3"});
	$("#celular").css({"border":"1px solid #D3D3D3"});
	$("#mensagem-cpf").hide();

	if (nome == ""){
		$("#nome").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (nascimento == ""){
		$("#nascimento").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (rg == ""){
		$("#rg").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (cpf == ""){
		$("#cpf").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (telefone == ""){
		$("#telefone").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (telefone_recado == ""){
		$("#telefone_recado").css({"border":"1px solid #DD0000"});
		erro = "S";
	}

	if (celular == ""){
		$("#celular").css({"border":"1px solid #DD0000"});
		erro = "S";
	}


	if (erro == ""){
		$("#FormHereditariedade").submit();
	}else{
		$("#DivBotaoSubmit").prop('disabled', false);
	}
}

//////////////////////////////////////////////////////////

function ValidarCPF(){

	var erro = "";

	cpf = $("#cpf").val();
	//cpf = cpf.replace(/[\d]+/g, "");
	cpf = cpf.replace(".", "");
	cpf = cpf.replace(".", "");
	cpf = cpf.replace("-", "");

	if(cpf === ""){
	 erro = "S";
	}

	// Elimina CPFs inválidos conhecidos

	if(cpf.length !== 11 || cpf === "00000000000" || cpf === "11111111111" || cpf === "22222222222" || cpf === "33333333333" || cpf === "44444444444" || cpf === "55555555555" || cpf === "66666666666" || cpf === "77777777777" || cpf === "88888888888" || cpf === "99999999999") {
	 erro = "S";
	}

	// Valida 1 digito
	add = 0;

	for (i = 0; i < 9; i ++) {
	 add += parseInt(cpf.charAt(i)) * (10 - i);
	}

	rev = 11 - (add % 11);

	if (rev === 10 || rev === 11) {
	 rev = 0;
	}

	if (rev !== parseInt(cpf.charAt(9))) {
	 erro = "S";
	}

	// Valida 2º digito
	add = 0;

	for (i = 0; i < 10; i ++) {
	 add += parseInt(cpf.charAt(i)) * (11 - i);
	}

	rev = 11 - (add % 11);

	if (rev === 10 || rev === 11) {
	 rev = 0;
	}

	if (rev !== parseInt(cpf.charAt(10))) {
	 erro = "S";
	}

	$("#cpf").css({"border":"1px solid #D3D3D3"});
	$("#mensagem-cpf").hide();

	if (erro == "S"){
		$("#cpf").css({"border":"1px solid #DD0000"});
		$("#mensagem-cpf").show();
	}else{
		$("#cpf").css({"border":"1px solid #D3D3D3"});
		$("#mensagem-cpf").hide();
	}
}

//////////////////////////////////////////////////////////////////////////

function ValidaSenha(obj) {

	// MUDAR VARIAVEIS NA FUNÇÃO CAMPOS IGUAIS

	QtdeCaracteres();

	function QtdeCaracteres() {

		if (obj.length >= 8) {

			AlphaNumerico();

		} else {

			retorno = false;
			msg = "&bull; Sua senha precisa conter no mínimo 8 dígitos, entre letras e números.";

		}

	}

	function AlphaNumerico() {

		if (obj.match(/^([a-zA-Z0-9-\!\@\#\$\%\¨\&\*\(\)\+\=\{\[\^\~\}\]\:\?\-\_]+)$/) != null) {

			SequenciasObvias();

		} else {

			retorno = false;
			msg = "&bull; Sua senha precisa conter no mínimo 8 dígitos, entre letras e números.";

		}

	}

	function SequenciasObvias() {

		if ((obj.match("123456789") || obj.match("987654321") || obj.match("1234")) != null) {

			retorno = false;
			msg = "&bull; A senha contém uma sequência muito fácil.";

		} else {

			CamposIguais();

		}

	}

	function CamposIguais() {

		var nascimento = $("#data_nascimento").val();
		var telefone = $("#telefone").val();
		var cpf = $("#cpf").val();
		var rg = $("#rg").val();

		nascimento = RemoverCaracteres(nascimento);
		telefone = RemoverCaracteres(telefone);
		cpf = RemoverCaracteres(cpf);
		rg = RemoverCaracteres(rg);

		if (obj.match(nascimento) != null && obj.match(nascimento) != ""){

			retorno = false;
			msg = "&bull; A senha não pode conter sua data de nascimento.";

		} else if (obj.match(telefone) != null && obj.match(telefone) != "") {

			retorno = false;
			msg = "&bull; A senha não pode conter seu número de telefone.";

		} else if (obj.match(cpf) != null && obj.match(cpf) != "") {

			retorno = false;
			msg = "&bull; A senha não pode conter seu cpf.";

		} else if (obj.match(rg) != null && obj.match(rg) != "") {

			retorno = false;
			msg = "&bull; A senha não pode conter seu rg.";

		} else {

			retorno = true;
			msg = "Senha OK!";

		}

	}

	function RemoverCaracteres(variavel) {

		if (variavel.match(/\)/)){

			variavel = variavel.substring(4, variavel.length);

		}

		variavel = variavel.replace(/\//g, "");
		variavel = variavel.replace(/\ /g, "");
		variavel = variavel.replace(/\(/g, "");
		variavel = variavel.replace(/\)/g, "");
		variavel = variavel.replace(/\./g, "");
		variavel = variavel.replace(/\-/g, "");

		return variavel;

	}

	return retorno + "|" + msg;

}

function ValidarSenha(){

	var erro = "";
	var submit_form = $("#form_dados_senha");
	var botao_enviar = $("#DivBotaoSubmit");
	$("#DivBotaoSubmit").prop('disabled', true);

	var senha_antiga = $("#senha_antiga");
	var senha_antiga2 = $("#senha_antiga2");
	var senha = $("#senha_nova1");
	var senha_confirmar = $("#senha_nova2");
	var senha_mensagem = $("#senha-mensagem");

	senha_mensagem.html("").attr("class","Mensagem").hide();
	$("#mensagem").css({"display":"none"});

	if (senha_antiga.val() == ""){
		erro += "&bull; Preencha a sua senha antiga<br />";
		senha_antiga.css({"border":"1px solid #DD0000"});
	}else{
		senha_antiga.css({"border":"1px solid #CCCCCC"});
	}

	if (senha.val() == "" ){
		erro += "&bull; Preencha a sua nova senha<br />";
		senha.css({"border":"1px solid #DD0000"});
		senha_confirmar.css({"border":"1px solid #DD0000"});
	} else {

		var retorno = ValidaSenha(senha.val());
		var retorno = retorno.split("|");
		var senha_retorno = retorno[0];
		var senha_msg = retorno[1];

		if (senha_retorno == "false"){
			erro += "&bull; Corrija a sua senha<br />";
			senha.css({"border":"1px solid #DD0000"});
			senha_mensagem.html(senha_msg).show();
			$("#mensagem").css({"display":"inline"});
		}else {

			senha.css({"border":"1px solid #CCCCCC"});

			if (senha.val() != senha_confirmar.val()){
				erro += "<br />";
				senha_confirmar.css({"border":"1px solid #DD0000"});
				senha_mensagem.html("&bull; Senha e repita sua senha precisam ser iguais").show();
				$("#mensagem").css({"display":"inline"});
			}else {
				senha_confirmar.css({"border":"1px solid #CCCCCC"});
			}

			if (senha.val() == senha_antiga.val()){
				erro += "&bull; Corrija a sua senha<br />";
				senha.css({"border":"1px solid #DD0000"});
				senha_confirmar.css({"border":"1px solid #DD0000"});
				senha_mensagem.html("&bull; A nova senha não pode ser a mesma que a senha antiga").show();
				$("#mensagem").css({"display":"inline"});
			}else {
				senha_confirmar.css({"border":"1px solid #CCCCCC"});
			}

			if (senha_antiga2.val() != senha_antiga.val()){
				erro += "<br />";
				senha_antiga.css({"border":"1px solid #DD0000"});
				senha_mensagem.html("&bull; A senha antiga está incorreta").show();
				$("#mensagem").css({"display":"inline"});
			}else {
				senha_antiga.css({"border":"1px solid #CCCCCC"});
			}

		}

	}


	if (erro == ""){
		submit_form.submit();
	}else{
		$("#mensagem").css({"display":"inline"});
		$("#erro-mensagem").html(erro);
		$("#DivBotaoSubmit").prop('disabled', false);
	}

}

//////////////////////////////////////////////////////////

function AlterarPagtoConsumoAuto() {

	var StatusOpcaoDesconto = $("#StatusOpcaoDesconto").is(':checked');
	var StatusPagtoAutoMes = $("#StatusPagtoAutoMes").val();

	if (StatusOpcaoDesconto==true){

		StatusDisponivel = "S"

		if (StatusPagtoAutoMes=="N") {
		} else {
		$("#DivDescontoKit").hide();
		}

		$("#DivDescontoKit2").show();

	} else {

		StatusDisponivel = "N"

		if (StatusPagtoAutoMes=="N") {
		} else {
		$("#DivDescontoKit").show();
		}

		$("#DivDescontoKit2").hide();

	}

	$.ajax({
		type: "post",
		url: UrlAreaRestrita +'pagar-kit-com-bonus-automatico',
		data: {Status: StatusDisponivel},
		cache: false,
		error: function() {
			AjaxErro();
		}
	})

}

//////////////////////////////////////////////////////////

function AlterarDivulgacaoMidia() {

	var StatusOpcaoDivulgar = $("#StatusOpcaoDivulgar").is(':checked');
	var Permite = "";
	if (StatusOpcaoDivulgar==true){
		Permite = "S";
	} else {
		Permite = "N";
	}

	$.ajax({
		type: "post",
		url: UrlAreaRestrita +'altera-divulgacao',
		data: {Status: Permite},
		cache: false,
		error: function() {
			AjaxErro();
		}
	})
}

//////////////////////////////////////////////////////////

function mudaLateral(qual){

	if(qual == "Quadro"){

		var div = $("#BlocosPadrao");

			div.fadeOut(400, function() {

				$("#BlocoQuadro").fadeIn(400);
				divCorpo = $("#Corpo");
				$("#RolagemLateral").css({"height":"calc(100% - 190px)"});
				divCorpo.fadeOut(400, function() {
					$.ajax({
						url: 'quadro_dos_sonhos.asp',
						success: function(retorno){
							
							$("#CorpoOutraPagina").html(retorno);
							$("#CorpoOutraPagina").attr('style', 'overflow: initial !important');;
							$("#CorpoOutraPagina").fadeIn(400);

							$('[data-toggle="tooltip"]').tooltip();

						}
					});

				});

			});

	}else if (qual == "Perfil"){
			
		$("#BlocosPadrao").fadeOut(400, function() {		
				
			$("#BlocoPerfil").fadeIn(400);
			$("#Corpo").fadeOut(400, function() {
				$("#CorpoMobile").hide();				
				$("#CorpoOutraPagina").attr('style', 'overflow: hidden !important');				
				$("#CorpoOutraPagina").fadeIn(400);
				$("#CorpoOutraPagina").load("perfil_cliente.asp");
			});

		});

	}else{

		var div = $("#BlocoQuadro");
		div.fadeOut(400, function() {
			
			$("#BlocoPerfil").fadeOut(400);
			$("#BlocosPadrao").fadeIn(400);
			$("#RolagemLateral").css({"height":"calc(100% - 122px)"});
			divCorpo = $("#CorpoOutraPagina");
			divCorpo.fadeOut(400, function() {
				$("#Corpo").fadeIn(400);
				carrosel2();
				$('[data-toggle="tooltip"]').tooltip();
				
				//Correção do banner sumindo na volta
				$(".Banner").css("background", "");
				$(".Banner").css("background", "url('imagens/banner-4-convencao.jpg') no-repeat center center");
			});

		});

	}
	
	
	

}

//////////////////////////////////////////////////////////

var MktZapTemporizadorChat;
var MktZapTemporizadorBotao;
var MktZapElementoWidgetIframe;
var MktZapJSONInformacoes;

function MktZapVerificaChatCarregado () {
	MktZapTemporizadorChat = setInterval(function () {
		if (parseInt($("#widget_iframe").length) > 0) {
			clearInterval(MktZapTemporizadorChat);
			MktZapVerificaBotaoAbrir();
		}
	}, 500);
}

function MktZapVerificaBotaoAbrir () {	
	MktZapTemporizadorBotao = setInterval(function () {
		if (parseInt($("#widget_iframe").css("height")) == "40") {
			MktZapClicarBotaoAbrir();
		} else {
			clearInterval(MktZapTemporizadorBotao);
			MktZapPreencherFormulario();
		}
	}, 500);
}

function MktZapClicarBotaoAbrir () {
	$("#widget_iframe").contents().find(".widget-header").eq(0).click();
}

function MktZapPreencherFormulario () {	
	MktZapElementoWidgetIframe = $("#widget_iframe");
	MktZapElementoWidgetIframe.contents().find("#name").val(MktZapJSONInformacoes.nome);
	MktZapElementoWidgetIframe.contents().find("#email").val(MktZapJSONInformacoes.email);
	MktZapElementoWidgetIframe.contents().find("#input-number").val(MktZapJSONInformacoes.id_cadastro);
	MktZapEntrarConversa();
}

function MktZapEntrarConversa () {
	// $("#widget_iframe").contents().find("button").click();
}

function ChatMktza () {
	
	$.ajax({
		url: "chat_mktzap_dados.asp",
		type: "GET",
		success: function (retorno) {
		
			MktZapJSONInformacoes = JSON.parse(retorno);

			$("#chat_mktza").html("");
			$("#widget_iframe").remove();

			$.ajax({
				url: "chat_mktza.html", 
				type: "GET", 
				cache: false, 
				success: function (retorno) {

					$.when($("#chat_mktza").html(retorno)).then(function() {
						MktZapVerificaChatCarregado();
					});

				}, error: function() {
					ChatMktza();
				}
			});

		}
	});

}

// Fix VH no chrome android

window.addEventListener('resize', () => {

  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);

});

window.addEventListener('load', () => {

  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
  
});