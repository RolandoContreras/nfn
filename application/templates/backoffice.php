<!DOCTYPE html>
<html lang="es">
<head>
  <title>Oficina Virtual NFN</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css' />
  <base href="https://www.scipiracicaba.com.br/area-restrita-nova/">
  <!--FAVICO-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-57x57.png';?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-60x60.png';?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-72x72.png';?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-76x76.png';?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-114x114.png';?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-120x120.png';?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-144x144.png';?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-152x152.png';?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/favicon/apple-icon-180x180.png';?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url().'static/page_front/images/favicon/android-icon-192x192.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/favicon/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url().'static/page_front/images/favicon/favicon-96x96.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/favicon/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/favicon/manifest.json';?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo site_url().'static/page_front/images/favicon/ms-icon-144x144.png';?>">
    <meta name="theme-color" content="#ffffff">
  <!--NED FAVICON-->
  <link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/style.css?v=7';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/bootstrap.min.css';?>" type="text/css"/>
  <!-- CSS DO PERFIL -->
  <link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/style_perfil.css?v=6';?>" type="text/css"/>
  <!-- //CSS DO PERFIL -->
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/jquery-1.11.3.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/jquery-ui.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/mask.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/scripts.js?VURJEsv7GiktO6i';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/jquery.nicescroll.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/jquery.uploadfile.js';?>"></script>
  <!-- SCRIPTS DO PERFIL -->
  <script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/scripts_perfil.js';?>"></script>
  <script>
        var site = '<?php echo site_url();?>';
  </script>
  <!-- //SCRIPTS DO PERFIL -->
  <script type="text/javascript">
    //tamanho width
    function verificaTamanho() {
    	document.getElementById("DivTamanhoTela").innerHTML = $(window).width() + 17;
    	
    	if(($(window).width() + 17) < 955) {
    		$("#RolagemCorpo").getNiceScroll().remove();
    		$("#RolagemLateral").getNiceScroll().remove();
    		$("#RolagemKit").getNiceScroll().remove();
    		$("#CorpoOutraPagina").getNiceScroll().remove();
    		$("#CorpoBloqueio").getNiceScroll().remove();
    		$("#Bloqueio").getNiceScroll().remove();
    	}
    
    	if(($(window).width()) < 980) {
    	$("#DivExtratoRolagem").css({"width": $(window).width() - 70 +"px"});
    	} else {
    	$("#DivExtratoRolagem").css({"width": "100%"});
    	}
    
    	if(($(window).width() + 17) < 980) {
    		$("#BotaoQuadroDesktop").hide();
    		$("#BotaoQuadroMobile").show();
    	}else{
    		$("#BotaoQuadroDesktop").show();
    		$("#BotaoQuadroMobile").hide();
    	}
    
    }
    
    //tamanho height
    function verificaTamanho2() {
    	document.getElementById("DivTamanhoTela2").innerHTML = $(window).height();
    }
    
    //rolagem desktop
    $(document).ready(function(){
    	$("#RolagemLateral").niceScroll();
    	$("#RolagemCorpo").niceScroll();
    	$("#RolagemKit").niceScroll();
    	$("#CorpoOutraPagina").niceScroll();
    	$("#CorpoBloqueio").niceScroll();
    	$("#Bloqueio").niceScroll();
    
    	// TOOLTIP
    	$('[data-toggle="tooltip"]').tooltip();
    });
    
    
    //menu fixo 
    var $w = $(window);
    
    $w.on("scroll", function(){
    if( $w.scrollTop() > 90 ) {
    	$("#MenuFixo").show("slide",{direction:"up"},200);
    } else {
    	$("#MenuFixo").hide("slide",{direction:"up"},200);
    }
    });
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="robots" content="noindex,nofollow,nosnippet,noarchive,noimageindex" />
</head>

<body onresize="verificaTamanho(); verificaTamanho2();" onload="verificaTamanho(); verificaTamanho2(); ">

  <div id="chat_mktza"></div>

  <div id="DivTamanhoTela" style="position:fixed; background:#000000; color:#FFFFFF; z-index:900; padding:10px; display:none"></div>
  <div id="DivTamanhoTela2" style="position:fixed; background:#000000; color:#FFFFFF; margin-top:25px;  z-index:900; display:none"></div>



  <!------- Menu mobile ------>
  <div id="MenuMobile">

    <!-- 	<div class="ParteEscura" ></div> -->
    <div class="ParteMenu">

      <div class="Logo" onclick="EfeitoMenu('MenuMobile');">
        <img src="imagens/logotipo-sci.png" width="217" height="63" align="center" style="cursor:pointer" />
        <div style="position:raltive">
          <div style="position:absolute; right:10px; top:10px">
            <img src="imagens/fechar.png" width="20" height="20" align="center" style="cursor:pointer" />
          </div>
        </div>
      </div>

      <!-- Menu fixo -->
      <div class="DivMargemMenu">
        <div class="Menu" onclick="window.open('https://www.scipiracicaba.com.br/escritorio-virtual/inicio','_self');"><span class="DivValign">Página Principal</span></div>
        <div class="Linhas"></div>
        <div class="Menu"><span class="DivValign">Mis datos</div>

				
					<div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-entrega-paraguai','ModalPadrao2');" title="Datos de retirada del Kit" alt="Datos de retirada del Kit"><span class="DivValign">&bull; Datos de retirada del Kit</span></div>

        <div class="Linhas2"></div>



        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-pessoais','ModalPadrao2');"
          alt=" Datos personales" title="Datos personales"><span class="DivValign">&bull; Datos personales</span></div>
        <div class="Linhas2"></div>



        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/senha','ModalPadrao2');"
          alt="Contraseña" title="Contraseña"><span class="DivValign">&bull; Contraseña</span></div>
        <div class="Linhas"></div>

        <div class="Menu"><span class="DivValign">Kit</span></div>



        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2');"
          alt="Cambiar el kit" title="Cambiar el kit"><span class="DivValign">&bull; Cambiar el kit</span></div>
        <div class="Linhas2"></div>



        <!--<div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/cupons','ModalPadrao2');"><span class="DivValign">&bull; Cupons</span></div>-->
        <div class="Linhas"></div>

        <div class="Menu"><span class="DivValign">Red</span></div>

        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/py/registro-datos-personales','_blank');" alt="Agregar cliente" title="Agregar cliente"><span class="DivValign">&bull; Agregar cliente</span></div>

        <div class="Linhas2"></div>
        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2');"
          alt="Ver la red" title="Ver la red"><span class="DivValign">&bull; Ver la red</span></div>
        <div class="Linhas2"></div>



        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/meus-indicados-diretos','ModalPadrao4');"
          alt="Mis indicadores directos" title="Mis indicadores directos"><span class="DivValign">&bull; Mis indicadores directos</span></div>
        <div class="Linhas"></div>

        <div class="Menu"><span class="DivValign">Apoyo</span></div>
        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/sac','ModalPadrao2');"
          alt="SAC" title="SAC"><span class="DivValign">&bull; SAC</span></div>
        <div class="Linhas2"></div>
        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2');"
          alt="Downloads" title="Downloads"><span class="DivValign">&bull; Downloads</span></div>
        <div class="Linhas2"></div>


        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_self');" alt="Calendario de eventos" title="Calendario de eventos"><span class="DivValign">&bull; Calendario de eventos</span></div>

        <div class="Linhas2"></div>

        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/tv-sci','ModalPadrao2');"
          alt="Vídeo conferencia" title="Vídeo conferencia"><span class="DivValign">&bull; Vídeo conferencia</span></div>

        <div class="Linhas2"></div>

        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')" alt="Manual de negocios" title="Manual de negocios"><span class="DivValign">&bull; Manual de negocios</span></div>

        <div class="Linhas2"></div>


        <div class="Linhas"></div>

        <div class="Menu"><span class="DivValign">Interactividad</span></div>

        <div class="SubMenu" onclick="window.open('https://www.youtube.com/channel/UCWssjK78s0rDbMcmDLENDlg?sub_confirmation=1','_blank');" alt="TV SCI" title="TV SCI"><span class="DivValign">&bull; TV SCI</span></div>

        <div class="Linhas2"></div>
        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/caderno-marketing','_self');" alt="Revista online" title="Revista online"><span class="DivValign">&bull; Revista online</span></div>
        <div class="Linhas2"></div>

        <div class="SubMenu" onclick="window.open('https://www.facebook.com/SCIParaguayOficial/','_self');" alt="Facebook" title="Facebook"><span class="DivValign">&bull; Facebook</span></div>

        <div class="Linhas2"></div>
        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2');"
          alt="Solicitud" title="Solicitud"><span class="DivValign">&bull; Solicitud</span></div>
        <div class="Linhas2"></div>
        <div class="Linhas"></div>
        <div class="Menu" onclick="window.open('https://www.scipiracicaba.com.br/escritorio-virtual/sair','_self');" alt="Dejar" title="Dejar"><span class="DivValign">Dejar</span></div>
      </div>
      <!-- /Menu fixo -->

    </div>
  </div>

  <!------- /Menu mobile ------>



  <script type="text/javascript">
    window.history.pushState( '', '', 'https://www.scipiracicaba.com.br/escritorio-virtual/inicio' );
  </script>

  <script type="text/javascript" src="js_css/upclick-min.js"></script>
  <!-- COLOCAR NO TOPO -->

  <div id="RolagemLateral">

    <div class="Blocos" style="padding-top:0px"><img src="imagens/logotipo-sci.png" width="217" height="63" align="center" alt="SCI - Sistema de Consumo Inteligente" title="SCI - Sistema de Consumo Inteligente"
      /></div>

    <style type="text/css">
      .botaozinho {background-image:url('https://www.scipiracicaba.com.br/img_site/foto-perfil/foto-perfil-padrao.jpg');background-size:cover;cursor:pointer}
    </style>



    <div class="Blocos">


      <div class="botaozinho FotoCliente" id="FotoCliente">
        <div class="FotoBotao" id="FotoBotao" name="FotoBotao" data-toggle="modal" data-target="#ModalPadrao" border="0" onclick="abre('cropper_altera_foto.asp', 'ModalPadrao2')"></div>
      </div>

      <div class="TextoBemVindo">¡Bienvenido, Rolando!<br>ID:
        <font style="font-weight:400">1540265</font>
      </div>
    </div>

    <div id="BlocosPadrao">
      <!-- <div class="Blocos">
			<div class="FraseDia">“Se Deus encheu tua vida de obstáculos, é porque ele acredita na tua capacidade de passar por cada um!”</div>
		</div> -->



      <!-- desabilitado -->
      <div class="Blocos Tempo" style="display:none">
        <div class="ImgInfo"><img src="imagens/tempo.png" width="31" height="26" align="center" /></div>
        <div class="TextoInfo"><span class="DivValign">Piracicaba |27ºC | nublado</span></div>

        <div class="ImgInfo"><img src="imagens/calendario.png" width="30" height="26" alt="" /></div>
        <div class="TextoInfo"><span class="DivValign">05/01/2019</span></div>
      </div>


      <!-- desabilitado -->



    </div>

    <!-- Lateral do quadro dos sonhos -->
    <div class="" id="BlocoQuadro" style="display: none; ">

      <div class="Blocos">
        <div class="FraseDia" style="font-weight: 400;">
          ¡Usted está en su cuadro de los sueños!Establezca metas y todos los días¡Crea, podrás conquistar!Configurar tu marco de los sueños ypersonaliza a su manera.
        </div>
      </div>

      <div class="Blocos" id="BlocoOpcoes" style="display: none;"></div>

      <div style="float:left; background:#fff; position:fixed; left:0px; bottom:92px">
        <div class="VoltarAoEscritorio" onclick="mudaLateral('Home')" style="position:initial; margin-bottom:15px">
          <div style="float:left; margin-left:5px;"><img src="quadro_dos_sonhos/imagens/voltar_ev.png" width="24" height="20" alt="Voltar ao escritório virtual" title="Volver a la oficina virtual"
            /></div>
          <div style="float:right; margin-right:5px">
            <font style="font-weight:600; font-size:14.5px; color:#5e5e5e">Volver a la oficina virtual</font>
          </div>
        </div>
      </div>
    </div>


    <!-- //Lateral do quadro dos sonhos -->

    <!-- Lateral do Perfil -->
    <div class="Blocos" id="BlocoPerfil" style="display:none; border-bottom:0px">
      <div class="FraseDia" style="font-size:15px">¡SEAN BIENVENIDOS A SCI!</div>
      <div class="FraseDia" style="font-weight: 400;margin-top:3px;font-size:16px">Hable más sobre usted</div>

      <div class="VoltarAoEscritorio" onclick="mudaLateral('Home')">
        <div style="float:left; margin-left:5px;"><img src="imagens_perfil/voltar_ev.png" width="24" height="20" alt="Voltar ao escritório virtual" title="Volver a la oficina virtual" /></div>
        <div style="float:right; margin-right:5px">
          <font style="font-weight:600; font-size:14.5px; color:#5e5e5e">Volver a la oficina virtual</font>
        </div>
      </div>
    </div>
    <!-- //Lateral do Perfil -->



  </div>

  <div class="Radio" style=""><iframe src="player2.asp" style="width:270px; height:92px" scrolling="no" frameborder="0"></iframe></div>
  <!-- <div class="Radio" style="background-color:#5bb179"><img src="img_gerenciamento/player.png" width="270" height="44" border="0"></div> -->


  <!-- FOTO PERFIL UPLOAD -->
  <!--
<script type="text/javascript">
var campo = document.getElementById("FotoBotao");

upclick({
element: campo,
action: "https://www.scipiracicaba.com.br/escritorio-virtual/lateral-foto-perfil-upload",
cache: false,
multiple: true,
onstart: function(){
	$("#FotoCliente").css({"background-image":"url('imagens/carregando.gif')", "background-size":"initial"});
	$("#FotoClienteMobile").css({"background-image":"url('imagens/carregando.gif')", "background-size":"initial"});
},
oncomplete: function(retorno) {
//	alert(retorno);
	//$("#FotoCliente").css({"background-image":"url('https://www.scipiracicaba.com.br/img_site/foto-perfil/"+ retorno +"')", "background-size":"cover"});
	//$("#FotoClienteMobile").css({"background-image":"url('https://www.scipiracicaba.com.br/img_site/foto-perfil/"+ retorno +"')", "background-size":"cover"});
	location.reload();
}
});
</script>-->

  <!-- //FOTO PERFIL UPLOAD -->


  <script type="text/javascript">
    //Para o video do modal ao fechar
    $('body').on('hidden.bs.modal', '.modal', function () {
    	$('#iframeTutorial').remove();
    });
    
    /* Função adicionada para corrigir a barra de rolagem com dois modal aberto */
    $(document).on('hidden.bs.modal', function (event) {
      if ($('.modal:visible').length) {
        $('body').addClass('modal-open');
      }
    });
  </script>

  <style type="text/css">
    .BordaBotaoPosicao {position:relative}
    .BordaBotao {position:absolute; left:-5px; top:-5px; border:5px solid #D64541; width:65px; height:65px; border-radius:100%}
    .BordaBotaoPL {position:absolute; left:-5px; top:-5px; border:5px solid #F3C77B; width:65px; height:65px; border-radius:100%}
    .BordaBotaoFacebook {position:absolute; left:-5px; top:-5px; border:5px solid #5E7FC1; width:65px; height:65px; border-radius:100%}
    /*==== Video responsivo no modal ====== */
    .video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;}
    .video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;}
    /* Paraguai */
    #Corpo .DivGrupo3 {float:left;width:286px}
  </style>

  <script type="text/javascript">
    setInterval(function() {
    $('.BordaBotao').animate({opacity:0}, 200, "linear", function(){
        $(this).delay(200);
        $(this).animate({opacity:1}, 200, function(){
       });
    
        $(this).delay(200);
    });
    
    },300);
    
    setInterval(function() {
    $('.BordaBotaoPL').animate({opacity:0}, 200, "linear", function(){
        $(this).delay(200);
        $(this).animate({opacity:1}, 200, function(){
       });
    
        $(this).delay(200);
    });
    
    },300);
    
    setInterval(function() {
    $('.BordaBotaoFacebook').animate({opacity:0}, 200, "linear", function(){
        $(this).delay(200);
        $(this).animate({opacity:1}, 200, function(){
       });
    
        $(this).delay(200);
    });
    
    },300);
  </script>
  <!-- alerta do sac -->

  <!-- abre o quadro dos sonhos direto se vier do painel pela pagina do quadro -->

  <!-- abre o quadro dos sonhos direto se vier do painel pela pagina do quadro -->


  <!-- CONTEUDO DESKTOP -->
  <div id="Corpo" style="background:url('img_gerenciamento/fundo-branco2.jpg'); background-size:cover">



    <div id="Topo">
      <div class="Titulo" style="color:#404040; "><span class="DivAlign">OFICINA VIRTUAL SCI</span></div>


      <style type="text/css">
        #Topo .BotoesTopo {float:right; width:calc(100% - 315px); margin-left:10px}
        #Topo .DivBolinhas {float:right; margin-right:15px; width:65px; height:65px; border-radius:100%; display:table; text-align:center}
        #Topo .BolinhaMenor {width:45px; height:45px; margin-right:0px; margin-top:10px}
        #Topo .Imagem {width:65px; height:65px; border-radius:100%; cursor:pointer;}
        #Topo .ImagemMenor {width:45px; height:45px; cursor:pointer;}
        #Topo .ImagemDesabilitado {width:65px; height:65px; cursor:default; filter:alpha(opacity=50);opacity:0.5}
        #Topo .BordaBotaoPosicaoEfeito {position:relative}
        #Topo .BordaBotao {position:absolute; left:-5px; top:-5px; border-radius:100%; cursor:pointer}
        #Topo .EfeitoBotaoFace {border:5px solid #5E7FC1}
        #Topo .EfeitoBotaoSac {border:5px solid #D64541}
        #Topo .EfeitoBotaoPL {border:5px solid #b9cee4}
        
        /*-- Responsivo --*/
        @media screen and (max-width: 1100px){
        #Topo .BotoesTopo {width:100%; margin:0px; margin-bottom:20px}
        }
      </style>

      <!--
**OBS IMPORTANTES**
A LISTA DO DESKTOP ESTÁ EM **FLOAT RIGHT** ENTÃO A INSERÇÃO DOS ÍCONES É DA **DIRETA PARA A ESQUERDA**
ESTES MESMOS ÍCONES ESTÃO NO MOBILE, ENTÃO ALTEREM TAMBÉM NA PAGINA **INICIO_BOTOES_MOBILE.ASP**
-->

      <div class="BotoesTopo">

        <!-- 'SAIR DO EV' -->
        <div class="DivBolinhas BolinhaMenor"><span class="DivValign">
		<img src="imagens/botaosair.png" class="ImagemMenor" data-toggle="tooltip" data-placement="bottom" title="Dejar" onclick="window.open('https://www.scipiracicaba.com.br/escritorio-virtual/sair', '_self');"  alt="Dejar" />
	</span></div>
        <!-- //SAIR DO EV' -->


        <!-- 'NOTIFICAÇÃO PARA CURTIR PÁGINA NO FACEBOOK' -->

        <div class="DivBolinhas" style="display:none"><span class="DivValign">
			
				<div class="BordaBotaoPosicaoEfeito"  onclick="abre('/area-restrita-nova/curtir_pagina.asp','ModalPadrao2')" data-toggle="modal" data-target="#ModalPadrao">
					<div class="BordaBotao EfeitoBotaoFace"  data-toggle="tooltip" data-placement="bottom" data-html="true" title="<div style='width:180px'>Corta la página oficial de SCI en Facebook</div>">
					</div>
				</div>

				<img src="imagens/botaofacebook.png"  class="Imagem"/>
			
		</span></div>

        <!-- //NOTIFICAÇÃO PARA CURTIR PÁGINA NO FACEBOOK' -->


        <!-- 'NOTIFICAÇÃO DE NOVO ATENDIMENTO NO SAC' -->
        <div class="DivBolinhas" id="BotaoMensagemSac"><span class="DivValign">
		
			<img src="imagens/botaosac.png" class="ImagemDesabilitado" data-toggle="tooltip" data-placement="bottom" title="En el momento usted no tiene nuevas atenciones en el SAC" alt="SAC - En el momento usted no tiene nuevas atenciones en el SAC"/>
		
	</span></div>
        <!-- //NOTIFICAÇÃO DE NOVO ATENDIMENTO NO SAC' -->


        <!-- 'NOTIFICAÇÃO DE NOVA CONQUISTA' -->
        <div class="DivBolinhas"><span class="DivValign">

		

			<span><img src="imagens/back_plano_de_carreira_conquistas.png" class="ImagemDesabilitado" data-toggle="tooltip" data-placement="bottom"/></span>



          </span>
        </div>
        <!-- //NOTIFICAÇÃO DE NOVA CONQUISTA' -->



        <!-- 'LÍDER DE EXPANSÃO' -->

        <div class="DivBolinhas"><span class="DivValign">
		<span data-toggle="modal" data-target="#ModalPadrao" onclick="abre('lider_expansao.asp','ModalPadrao2')"><img src="https://www.scipiracicaba.com.br/img_site/lideres_expansao/paulo_lima_p.jpg" class="Imagem" data-toggle="tooltip" data-placement="bottom" title="Haga clic aquí para conocer a su Coordinador de Expansión!" alt="Haga clic aquí para conocer a su Coordinador de Expansión!"/></span>
          </span>
        </div>

        <!-- //LÍDER DE EXPANSÃO' -->

      </div>


      <div class="BannersTopo">


        <div style="float:left;width:100%;text-align:left;margin-bottom:5px;font-size:12px">CERTIFICACIONES SCI BRASIL</div>


        <div class="PubImagem ">
          <img src="imagens/banner-iso-9001.jpg" class="PubImagem2">
        </div>

        <div class="PubImagem ">
          <img src="imagens/banner-great-place.jpg" class="PubImagem2">
        </div>



      </div>

    </div>



    <div class="CorpoRolagem" id="RolagemCorpo">
      <div class="WidthQuadrados">

        <!-- BLOCOS -->

        <style type="text/css">
          .EstrelaAmarela {float:left;position:absolute;top:6px;left:6px;width:20px;height:19px;background:url('imagens/favorito.png')}
          			/* .EstrelaAmarela:hover {background:url('imagens/favorito2.png');} */
          			.EstrelaBranca {float:left;position:absolute;top:6px;left:6px;width:20px;height:19px;background:url('imagens/favorito2.png')}
          			/* .EstrelaBranca:hover {background:url('imagens/favorito.png');} */
          
          			#FotoBotaoMobile {float: left; width: 100%; height: 100%; opacity: 0; cursor: pointer;}
        </style>



        <div class="DivGrupo0">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Mis datos" title="Mis datos"> Mis datos </div>
          </div>

          <div class="DivGrupo2">



            <div class="DivQuadrado " style="background-color:#8e44ad" data-toggle="tooltip" title="" alt="Punto de apoyo ">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/1.png" border="0"></div>
											<div class="DivQuadrado2" >Punto de apoyo</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela1"  onclick="Favoritos('Dados de entrega')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-entrega-paraguai','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#913d88;filter:alpha(opacity=30);opacity:.3">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/2.png" border="0"></div>
											<div class="DivQuadrado2" >Datos de pago</div>
										</span>
            </div>



            <div class="DivQuadrado " style="background-color:#9d5797;filter:alpha(opacity=30);opacity:.3">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/27.png" border="0"></div>
											<div class="DivQuadrado2" >Datos del beneficiario</div>
										</span>
            </div>



            <div class="DivQuadrado DivQuadrado3" style="background-color:#9b59b6" data-toggle="tooltip" title="Es necesario que mantenga sus datos siempre actualizados"
              alt="Datos personales Es necesario que mantenga sus datos siempre actualizados">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/3.png" border="0"></div>
											<div class="DivQuadrado2" >Datos personales</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela3"  onclick="Favoritos('Dados pessoais')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-pessoais','ModalPadrao2')" style="width:286px"></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#bc91d2" data-toggle="tooltip" title="Si es necesario cambiar la contraseña de acceso" alt="Contraseña Si es necesario cambiar la contraseña de acceso">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/4.png" border="0"></div>
											<div class="DivQuadrado2" >Contraseña</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela4"  onclick="Favoritos('Senha')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/senha','ModalPadrao2')" ></div></span>

              </div>
            </div>



          </div>

        </div>



        <div class="DivGrupo3 DivMarginLeft">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Kit" title="Kit"> Kit </div>
          </div>

          <div class="DivGrupo2">



            <div class="DivQuadrado " style="background-color:#1f3a93" data-toggle="tooltip" title="Haga clic aquí para generar su boleto" alt="Facturas Haga clic aquí para generar su boleto">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/5.png" border="0"></div>
											<div class="DivQuadrado2" >Facturas</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela5"  onclick="Favoritos('Boletos')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/boletos-py','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#4b77be" data-toggle="tooltip" title="Aquí puede cambiar el tipo de kit que desea recibir este mes" alt="Cambiar el kit Aquí puede cambiar el tipo de kit que desea recibir este mes">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/7.png" border="0"></div>
											<div class="DivQuadrado2" >Cambiar el kit</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela7"  onclick="Favoritos('Alterar kit')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#1e8bc3" data-toggle="tooltip" title="Opción disponible del 01 al 05 de cada mes" alt="Pagar kit con bonos Opción disponible del 01 al 05 de cada mes">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/8.png" border="0"></div>
											<div class="DivQuadrado2" >Pagar kit con bonos</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela8"  onclick="Favoritos('Pagar kit com bônus')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/pagar-kit-com-bonus-py','ModalPadrao2')" ></div></span>

              </div>
            </div>



          </div>

        </div>



        <div class="DivGrupo0 DivMarginLeft">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Red" title="Red"> Red </div>
          </div>

          <div class="DivGrupo2">



            <div class="DivQuadrado " style="background-color:#049372" data-toggle="tooltip" title="Haga clic aquí para hacer un nuevo registro en su red" alt="Añadir cliente Haga clic aquí para hacer un nuevo registro en su red">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/9.png" border="0"></div>
											<div class="DivQuadrado2" >Añadir cliente</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela9"  onclick="Favoritos('Adicionar cliente')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  onclick="window.open('https://www.scipiracicaba.com.br/py/registro-datos-personales','_blank');" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#00b16a" data-toggle="tooltip" title="Acompañar a su equipo" alt="Ver red Acompañar a su equipo">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/10.png" border="0"></div>
											<div class="DivQuadrado2" >Ver red</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela10"  onclick="Favoritos('Ver rede')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#26c281" data-toggle="tooltip" title="Profesionalización y reconocimiento por el Plan de Carrera de SCI"
              alt="Plano de carrera Profesionalización y reconocimiento por el Plan de Carrera de SCI">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/11.png" border="0"></div>
											<div class="DivQuadrado2" >Plano de carrera</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela11"  onclick="Favoritos('Plano de carreira')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/plano-de-carreira','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado DivQuadrado3" style="background-color:#18ad90" data-toggle="tooltip" title="Acompañe toda bonificación que se genera en su red"
              alt="Extracto Acompañe toda bonificación que se genera en su red">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/12.png" border="0"></div>
											<div class="DivQuadrado2" >Extracto</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela12"  onclick="Favoritos('Extrato')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/extrato-py','ModalPadrao2')" style="width:286px"></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#4daf7c" data-toggle="tooltip" title="Compruebe todas sus indicaciones directas" alt="Mis nominados directos Compruebe todas sus indicaciones directas">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/13.png" border="0"></div>
											<div class="DivQuadrado2" >Mis nominados directos</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela13"  onclick="Favoritos('Meus indicados diretos')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/meus-indicados-diretos','ModalPadrao4')" ></div></span>

              </div>
            </div>



          </div>

        </div>



        <div class="DivGrupo1 DivGrupoMargin DivApoio">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Apoyo" title="Apoyo"> Apoyo </div>
          </div>

          <div class="DivGrupo2">



            <div class="DivQuadrado DivQuadrado3" style="background-color:#b23527" data-toggle="tooltip" title="Compruebe todas sus indicaciones directas" alt="SAC Compruebe todas sus indicaciones directas">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/14.png" border="0"></div>
											<div class="DivQuadrado2" >SAC</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela14"  onclick="Favoritos('SAC')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  data-dismiss="modal" data-toggle="modal" data-target="#ModalPadraoChat" onclick="abre('chat.asp','ModalPadraoChat')" style="width:286px"></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#ed4132" data-toggle="tooltip" title="Aquí tienes acceso a diversos materiales de apoyo y divulgación. ¡Accede y echa un vistazo!"
              alt="Downloads Aquí tienes acceso a diversos materiales de apoyo y divulgación. ¡Accede y echa un vistazo!">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/15.png" border="0"></div>
											<div class="DivQuadrado2" >Downloads</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela15"  onclick="Favoritos('Downloads')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#e26a6a" data-toggle="tooltip" title="Adquiere su pasaporte para el mayor evento del año de SCI" alt="Convención Adquiere su pasaporte para el mayor evento del año de SCI">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/16_1.png" border="0"></div>
											<div class="DivQuadrado2" >Convención</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela16_1"  onclick="Favoritos('Convenção')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/convencao-2018','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#ef4836;filter:alpha(opacity=30);opacity:.3">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/17.png" border="0"></div>
											<div class="DivQuadrado2" >Tienda online</div>
										</span>
            </div>



            <div class="DivQuadrado " style="background-color:#ed4132" data-toggle="tooltip" title="Acceda y quédese dentro de todas las presentaciones de negocios que ocurren en todo Brasil y Paraguay diariamente"
              alt="Calendario de eventos Acceda y quédese dentro de todas las presentaciones de negocios que ocurren en todo Brasil y Paraguay diariamente">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/18.png" border="0"></div>
											<div class="DivQuadrado2" >Calendario de eventos</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela18"  onclick="Favoritos('Calendário de eventos')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_blank')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#d94838" data-toggle="tooltip" title="De lunes a viernes a las 12h00 (am) al vivo" alt="TV SCI De lunes a viernes a las 12h00 (am) al vivo">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/25.png" border="0"></div>
											<div class="DivQuadrado2" >TV SCI</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaAmarela"  -->

                <!--<div class="EstrelaAmarela" id="Estrela25"  onclick="Favoritos('TV SCI')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/tv-sci','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#ed321f" data-toggle="tooltip" title="Manual de Negocios, Normas de Uso, Conducta y Política de Privacidad"
              alt="Manual de negocios Manual de Negocios, Normas de Uso, Conducta y Política de Privacidad">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/28.png" border="0"></div>
											<div class="DivQuadrado2"  id = "div_manual_negocio" style="font-size: 12px">Manual de negocios</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela28"  onclick="Favoritos('Manual de Negócios e Código de Ética SCI')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')" ></div></span>

              </div>
            </div>



          </div>

        </div>



        <div class="DivGrupo0 DivGrupoMargin DivMarginLeft">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Interactividad" title="Interactividad"> Interactividad </div>
          </div>

          <div class="DivGrupo2">



            <div class="DivQuadrado " style="background-color:#e68517" data-toggle="tooltip" title="Todos los martes y jueves a las 9h *horas BR" alt="Youtube SCI Todos los martes y jueves a las 9h *horas BR">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/20.png" border="0"></div>
											<div class="DivQuadrado2" >Youtube SCI</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela20"  onclick="Favoritos('Youtube SCI')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  onclick="window.open('https://www.youtube.com/channel/UCWssjK78s0rDbMcmDLENDlg?sub_confirmation=1','_blank')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#eb974e" data-toggle="tooltip" title="Diariamente se hacen varias entradas en nuestro Facebook. Siga!"
              alt="Facebook Diariamente se hacen varias entradas en nuestro Facebook. Siga!">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/22.png" border="0"></div>
											<div class="DivQuadrado2" >Facebook</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela22"  onclick="Favoritos('Facebook')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_facebook.asp','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#e88a37" data-toggle="tooltip" title="Acompañe diariamente nuestro Instagram" alt="Instagram Acompañe diariamente nuestro Instagram">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/35.png" border="0"></div>
											<div class="DivQuadrado2" >Instagram</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela35"  onclick="Favoritos('Instagram')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_instagram.asp','ModalPadrao2')" ></div></span>

              </div>
            </div>



            <div class="DivQuadrado DivQuadrado3" style="background-color:#e7a13c" data-toggle="tooltip" title="Instale el APP y tenga la SCI en la punta de sus dedos"
              alt="Solicitud Instale el APP y tenga la SCI en la punta de sus dedos">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/26.png" border="0"></div>
											<div class="DivQuadrado2" >Solicitud</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela26"  onclick="Favoritos('Aplicativo')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2')" style="width:286px"></div></span>

              </div>
            </div>



            <div class="DivQuadrado " style="background-color:#f9bf3b" data-toggle="tooltip" title="Siga todas las cuestiones y las noticias en el Revista de Marketing SCI"
              alt="Revista Online Siga todas las cuestiones y las noticias en el Revista de Marketing SCI">
              <span class="DivValign">
											<div class="DivQuadrado1"><img src="imagens/21.png" border="0"></div>
											<div class="DivQuadrado2" >Revista Online</div>
										</span>

              <div class="DivQuadrado0">

                <!-- style="EstrelaBranca"  -->

                <!--<div class="EstrelaBranca" id="Estrela21"  onclick="Favoritos('Revista Online')"></div>-->

                <span class="DivValign"><div class="DivQuadrado5"  onclick="window.open('https://www.scipiracicaba.com.br/caderno-marketing','_blank')" ></div></span>

              </div>
            </div>



          </div>

        </div>



        <!-- //BLOCOS -->

      </div>
    </div>

  </div>
  <!-- //CONTEUDO DESKTOP -->

  <!-- CONTEUDO PERFIL/QUADRO SONHOS -->
  <div id="CorpoOutraPagina"></div>
  <!-- //CONTEUDO PERFIL/QUADRO SONHOS -->

  <!-- CONTEUDO BLOQUEIO PASSO A PASSO -->
  <div id="CorpoBloqueio"></div>
  <!-- //CONTEUDO BLOQUEIO PASSO A PASSO -->

  <!-- CONTEUDO MOBILE -->
  <div id="CorpoMobile">
    <div class="Centralizar">



      <div id="MenuFixo">
        <div class="BlocoPrincipal"><span class="DivValign">
					<div class="Logotipo"><img src="imagens/logotipo-sci.png" width="217" height="63" alt="" /></div>
					<div class="MenuMobile" onclick="EfeitoMenu('MenuMobile');">&nbsp;<img src="imagens/menu-mobile2.png" width="27" height="19" align="center" style="margin-top:-3px;"/>&nbsp;MENÚ</div>
				</span></div>
      </div>



      <div id="TopoMobile">



        <div class="BlocoPrincipal"><span class="DivValign">
				<div class="Logotipo"><img src="imagens/logotipo-sci.png" width="217" height="63" alt="" /></div>
				<div class="MenuMobile" onclick="EfeitoMenu('MenuMobile');">&nbsp;<img src="imagens/menu-mobile2.png" width="27" height="19" align="center" style="margin-top:-3px;"/>&nbsp;MENÚ</div>
			</span></div>



        <div class="Titulo">OFICINA VIRTUAL SCI</div>



        <div class="BlocoFoto">
          <div class="FotoCliente" id="FotoClienteMobile" style="background-image:url('https://www.scipiracicaba.com.br/img_site/foto-perfil/foto-perfil-padrao.jpg');background-size:cover;cursor:pointer;"><input type="button" id="FotoBotaoMobile" name="FotoBotaoMobile" style="cursor:pointer;"></div>

          <div class="TextoBemVindo">BienvenidoRolando!<br>ID:
            <font style="font-weight:400">1540265</font>
          </div>
        </div>

        <!-- FOTO PERFIL UPLOAD -->
        <script type="text/javascript">
          var campo = document.getElementById("FotoBotaoMobile");
          
          			upclick({
          			element: campo,
          			action: "https://www.scipiracicaba.com.br/escritorio-virtual/lateral-foto-perfil-upload",
          			cache: false,
          			multiple: true,
          			onstart: function(){
          				
          				$("#FotoCliente").css({"background-image":"url('imagens/carregando.gif')", "background-size":"initial"});
          				$("#FotoClienteMobile").css({"background-image":"url('imagens/carregando.gif')", "background-size":"initial"});
          
          			},
          			oncomplete: function(retorno) {
          
          				var banner_mes = "01";
          				var banner_ano = "2019";
          
          				if (parseInt(banner_ano) <= parseInt("2018") && parseInt(banner_mes) <= parseInt("07")){
          					var banner_url = "plano_carreira_imagem_antigo.asp";
          				}else{
          					var banner_url = "plano_carreira_imagem.asp";
          				}
          
          				$.ajax({
          				url: banner_url,
          				data: {CodCadastro: '1540265'},
          				type: "POST",
          				async: true,
          				success: function(){
          					location.reload();
          				}
          				});
          				
          				//$("#FotoCliente").css({"background-image":"url('https://www.scipiracicaba.com.br/img_site/foto-perfil/"+ retorno +"')", "background-size":"cover"});
          				//$("#FotoClienteMobile").css({"background-image":"url('https://www.scipiracicaba.com.br/img_site/foto-perfil/"+ retorno +"')", "background-size":"cover"});
          			
          			}
          			});
        </script>
        <!-- //FOTO PERFIL UPLOAD -->

        <!-- <div class="FraseDia">“Se Deus encheu tua vida de obstáculos, é porque ele acredita na tua capacidade de passar por cada um!”</div> -->


        <style type="text/css">
          #TopoMobile .BotoesTopo {float:left; width:100%; margin-left:10px; margin-top:20px; margin-bottom:10px}
          #TopoMobile .DivBolinhas {float:left; margin-right:15px; width:65px; height:65px; border-radius:100%; display:table; text-align:center}
          #TopoMobile .BolinhaMenor {width:45px; height:45px; margin-right:0px; margin-top:10px}
          #TopoMobile .Imagem {width:65px; height:65px; border-radius:100%; cursor:pointer;}
          #TopoMobile .ImagemMenor {width:45px; height:45px; cursor:pointer;}
          #TopoMobile .ImagemDesabilitado {width:65px; height:65px; cursor:default; filter:alpha(opacity=50);opacity:0.5}
          #TopoMobile .BordaBotaoPosicaoEfeito {position:relative}
          #TopoMobile .BordaBotao {position:absolute; left:-5px; top:-5px; border-radius:100%; cursor:pointer}
          #TopoMobile .EfeitoBotaoFace {border:5px solid #5E7FC1}
          #TopoMobile .EfeitoBotaoSac {border:5px solid #D64541}
          #TopoMobile .EfeitoBotaoPL {border:5px solid #b9cee4}
          
          /*-- Responsivo --*/
          @media screen and (max-width: 580px){
          
          	#TopoMobile .DivBolinhas {width:45px; height:45px}
          	#TopoMobile .Imagem {width:45px; height:45px}
          	#TopoMobile .ImagemDesabilitado {width:45px; height:45px}
          
          }
          
          @media screen and (max-width: 440px){
          
          	#TopoMobile .DivBolinhas{margin-bottom: 15px;}
          
          }
        </style>

        <!-- 
**OBS IMPORTANTES**
A LISTA DO MOBILE ESTÁ EM **FLOAT LEFT** ENTÃO A INSERÇÃO DOS ÍCONES É DA **ESQUERDA PARA A DIREITA** - CONTRARIO DO DESKTOP - CUIDADO PARA NÃO SE CONFUNDIR
ESTES MESMOS ÍCONES ESTÃO NO DESKTOP, ENTÃO ALTEREM TAMBÉM NA PAGINA **INICIO_BOTOES_TOPO.ASP**
-->

        <div class="BotoesTopo" style="width:calc(100% - 10px)">

          <!-- 'LÍDER DE EXPANSÃO' -->

          <div class="DivBolinhas"><span class="DivValign">
				<span data-toggle="modal" data-target="#ModalPadrao" onclick="abre('lider_expansao.asp','ModalPadrao2')"><img src="https://www.scipiracicaba.com.br/img_site/lideres_expansao/paulo_lima_p.jpg" class="Imagem" data-toggle="tooltip" data-placement="bottom" title="Haga clic aquí para conocer a su Coordinador de Expansión!"/></span>
            </span>
          </div>

          <!-- //LÍDER DE EXPANSÃO' -->




          <!-- 'NOTIFICAÇÃO DE NOVO ATENDIMENTO NO SAC' -->
          <div class="DivBolinhas" id="BotaoMensagemSac"><span class="DivValign">
		
			<img src="imagens/botaosac.png" class="ImagemDesabilitado" data-toggle="tooltip" data-placement="bottom" title="En el momento usted no tiene nuevas atenciones en el SAC" alt="sac - En el momento usted no tiene nuevas atenciones en el SAC"/>
		
	</span></div>
          <!-- //NOTIFICAÇÃO DE NOVO ATENDIMENTO NO SAC' -->


          <!-- 'NOTIFICAÇÃO PARA CURTIR PÁGINA NO FACEBOOK' -->

          <div class="DivBolinhas" style="display:none"><span class="DivValign">
			
				<div class="BordaBotaoPosicaoEfeito"  onclick="abre('/area-restrita-nova/curtir_pagina.asp','ModalPadrao2')" data-toggle="modal" data-target="#ModalPadrao">
					<div class="BordaBotao EfeitoBotaoFace"  data-toggle="tooltip" data-placement="bottom" data-html="true" title="<div style='width:180px'>Corta la página oficial de SCI en Facebook</div>">
					</div>
				</div>
			
				<img src="imagens/botaofacebook.png"  class="Imagem"/>
			
		</span></div>

          <!-- //NOTIFICAÇÃO PARA CURTIR PÁGINA NO FACEBOOK' -->


        </div>


      </div>


      <style type="text/css">
        .RadioMobile {float:left; width:95%; margin-left:10px; margin-top:15px}
      </style>
      <div class="RadioMobile" style=""><iframe src="player2.asp" style="width:270px; height:95px" scrolling="no" frameborder="0"></iframe></div>


      <div class="ConteudoBlocos" style="margin-bottom:40px">

        <!-- BLOCOS -->


        <div class="DivGrupo">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Mis datos"> Mis datos </div>
          </div>



          <div class="DivQuadrado" style="background-color:#8e44ad">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/1.png" border="0"></div>
									<div class="DivQuadrado2" >Punto de apoyo</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-entrega-paraguai','ModalPadrao2')"
              alt="Punto de apoyo">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#913d88;filter:alpha(opacity=30);opacity:.3">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/2.png" border="0"></div>
									<div class="DivQuadrado2"  >Datos de pago</div>
								</span>
          </div>



          <div class="DivQuadrado" style="background-color:#9d5797;filter:alpha(opacity=30);opacity:.3">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/27.png" border="0"></div>
									<div class="DivQuadrado2"  >Datos del beneficiario</div>
								</span>
          </div>



          <div class="DivQuadrado" style="background-color:#9b59b6">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/3.png" border="0"></div>
									<div class="DivQuadrado2" >Datos personales</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-pessoais','ModalPadrao2')"
              alt="Datos personales">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#bc91d2">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/4.png" border="0"></div>
									<div class="DivQuadrado2" >Contraseña</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/senha','ModalPadrao2')"
              alt="Contraseña">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



        </div>



        <div class="DivGrupo">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Kit"> Kit </div>
          </div>



          <div class="DivQuadrado" style="background-color:#1f3a93">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/5.png" border="0"></div>
									<div class="DivQuadrado2" >Facturas</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/boletos-py','ModalPadrao2')"
              alt="Facturas">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#4b77be">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/7.png" border="0"></div>
									<div class="DivQuadrado2" >Cambiar el kit</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2')"
              alt="Cambiar el kit">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#1e8bc3">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/8.png" border="0"></div>
									<div class="DivQuadrado2" >Pagar kit con bonos</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/pagar-kit-com-bonus-py','ModalPadrao2')"
              alt="Pagar kit con bonos">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



        </div>



        <div class="DivGrupo">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Red"> Red </div>
          </div>



          <div class="DivQuadrado" style="background-color:#049372">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/9.png" border="0"></div>
									<div class="DivQuadrado2" >Añadir cliente</div>
								</span>

            <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/py/registro-datos-personales','_blank');" alt="Añadir cliente">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#00b16a">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/10.png" border="0"></div>
									<div class="DivQuadrado2" >Ver red</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2')"
              alt="Ver red">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#26c281">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/11.png" border="0"></div>
									<div class="DivQuadrado2" >Plano de carrera</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/plano-de-carreira','ModalPadrao2')"
              alt="Plano de carrera">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#18ad90">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/12.png" border="0"></div>
									<div class="DivQuadrado2" >Extracto</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/extrato-py','ModalPadrao2')"
              alt="Extracto">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#4daf7c">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/13.png" border="0"></div>
									<div class="DivQuadrado2" >Mis nominados directos</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/meus-indicados-diretos','ModalPadrao4')"
              alt="Mis nominados directos">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



        </div>



        <div class="DivGrupo">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Apoyo"> Apoyo </div>
          </div>



          <div class="DivQuadrado" style="background-color:#b23527">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/14.png" border="0"></div>
									<div class="DivQuadrado2" >SAC</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadraoChat" onclick="abre('chat.asp','ModalPadraoChat')" alt="SAC">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#ed4132">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/15.png" border="0"></div>
									<div class="DivQuadrado2" >Downloads</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2')"
              alt="Downloads">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#e26a6a">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/16_1.png" border="0"></div>
									<div class="DivQuadrado2" >Convención</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/convencao-2018','ModalPadrao2')"
              alt="Convención">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#ef4836;filter:alpha(opacity=30);opacity:.3">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/17.png" border="0"></div>
									<div class="DivQuadrado2"  >Tienda online</div>
								</span>
          </div>



          <div class="DivQuadrado" style="background-color:#ed4132">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/18.png" border="0"></div>
									<div class="DivQuadrado2" >Calendario de eventos</div>
								</span>

            <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_blank')" alt="Calendario de eventos">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#d94838">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/25.png" border="0"></div>
									<div class="DivQuadrado2" >TV SCI</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/tv-sci','ModalPadrao2')"
              alt="TV SCI">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#ed321f">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/28.png" border="0"></div>
									<div class="DivQuadrado2"  id = "div_manual_negocio"  style="font-size: 12px">Manual de negocios</div>
								</span>

            <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')" alt="Manual de negocios">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



        </div>



        <div class="DivGrupo">

          <div class="DivGrupoTitulo">
            <div class="DivGrupoTitulo1" alt="Interactividad"> Interactividad </div>
          </div>



          <div class="DivQuadrado" style="background-color:#e68517">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/20.png" border="0"></div>
									<div class="DivQuadrado2" >Youtube SCI</div>
								</span>

            <div class="DivQuadrado0" onclick="window.open('https://www.youtube.com/channel/UCWssjK78s0rDbMcmDLENDlg?sub_confirmation=1','_blank')" alt="Youtube SCI">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#eb974e">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/22.png" border="0"></div>
									<div class="DivQuadrado2" >Facebook</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_facebook.asp','ModalPadrao2')" alt="Facebook">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#e88a37">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/35.png" border="0"></div>
									<div class="DivQuadrado2" >Instagram</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_instagram.asp','ModalPadrao2')" alt="Instagram">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#e7a13c">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/26.png" border="0"></div>
									<div class="DivQuadrado2" >Solicitud</div>
								</span>

            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2')"
              alt="Solicitud">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



          <div class="DivQuadrado" style="background-color:#f9bf3b">
            <span class="DivValign">
									<div class="DivQuadrado1"><img src="imagens/21.png" border="0"></div>
									<div class="DivQuadrado2" >Revista Online</div>
								</span>

            <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/caderno-marketing','_blank')" alt="Revista Online">
              <!--<div class="DivQuadrado4"></div> -->
              <span class="DivValign"><div class="DivQuadrado5"></div></span>
            </div>
          </div>



        </div>


        <!-- //BLOCOS -->

      </div>



    </div>
  </div>
  <!-- //CONTEUDO MOBILE -->


  <!--	MODAL (para abrir o conteudo das paginas) -->
  <div class="modal fade-scale" id="ModalPadrao" role="dialog" onclick="FecharPagina()">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="ModalPadrao2"></div>
    </div>
  </div>

  <div class="modal fade-scale" id="ModalPadrao3" role="dialog" onclick="FecharPagina()">
    <div class="modal-dialog modal-400">
      <div class="modal-content" id="ModalPadrao4"></div>
    </div>
  </div>

  <div class="modal fade-scale" id="ModalPadrao5" role="dialog" onclick="FecharPagina()">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="ModalPadrao6"></div>
    </div>
  </div>

  <div class="modal fade-scale" id="ModalPadrao7" role="dialog" onclick="FecharPagina()">
    <div class="modal-dialog modal-800">
      <div class="modal-content" id="ModalPadrao8"></div>
    </div>
  </div>

  <div class="modal fade-scale" id="ModalPadrao9" role="dialog" onclick="FecharPagina()" style="overflow-y:scroll">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="ModalPadrao10"></div>
    </div>
  </div>

  <div class="modal fade-scale" id="ModalPadraoChat" role="dialog" onclick="FecharPagina()" style="overflow-y:scroll"></div>

  <!-- Modal Tutorial -->
  <div id="ModalTutoriais" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TUTORIALES SCI</h4>

        </div>
        <div class="modal-body" id="blocos_tutoriais">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-sm" id="ChatMktZap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" style="width: 350px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="$('#ChatMktZap').modal('hide');"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Conversar</h4>
        </div>
        <div class="modal-body" id="ChatMktZapIframe"></div>
      </div>
    </div>
  </div>

  <div id="ModalTutorial" class="modal fade" role="dialog" onclose="paraVideo(ModalTutorial)">
    <div class="modal-dialog  modal-lg">
      <!-- Modal de vídeo-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TUTORIAL - <span id="titulovideo"></span></h4>
        </div>

        <div class="modal-body  video-container" id="secaotutorial" style="">

        </div>

        <div class="modal-footer">
          <div style="float: left; text-align: left; width: 90%">
            <span>Compartir este vídeo </span>
            <div>
              <span class="Input" id="urlVideo" style="width: 50%; float: left; margin-right: 10px; overflow: hidden; height: auto;">
	    		</span>
              <button type="button" class="btn btn-default" style="float: left;" onclick="copiar(urlVideo, this)">Copiar URL</button>
            </div>
          </div>
          <div>
            <button type="button" style="margin-top: 19px;" class="btn btn-default" data-dismiss="modal">Cerca</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function copiar(element, context) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
    function paraVideo(modal){
    	$('#iframeTutorial').remove();
    	//código para fechar a modal aqui
    	$(modal).modal("hide");
    }
  </script>

  <!--	//MODAL (para abrir o conteudo das paginas) -->



  <script type="text/javascript">
    function FecharPagina(){
    window.history.pushState( '', '', 'https://www.scipiracicaba.com.br/escritorio-virtual/inicio' );
    }
  </script>

</body>

</html>

<script type="text/javascript">
  $.ajax({
  			type: "get",
  			url: "https://www.scipiracicaba.com.br/escritorio-virtual/app/verificar",
  			success: function(retorno){
  				console.log(retorno);
  			}
  		});
</script>


<script type="text/javascript">
  // BOAS VINDAS
  //$(document).ready(function () {
  //	abre("https://www.scipiracicaba.com.br/escritorio-virtual/bem-vindo-dados-pagamento", "ModalPadrao2");
  //	$("#ModalPadrao").modal("show");
  //});
</script>

<script type="text/javascript">
  // APP
  //$(document).ready(function () {
  //	abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2');
  //	$("#ModalPadrao").modal("show");
  //});
</script>


<script type="text/javascript">
  $(document).ready(function () { //aviso
  		abre("https://www.scipiracicaba.com.br/escritorio-virtual/avisos-popup", "ModalPadrao2");
  		$("#ModalPadrao").modal("show");
  	});
</script>



<div id="popup-bemvindo">
  <!-- vazio -->
</div>



<script>
  var velocidade = 1000;
  var valor = 1;
  
  function pisca() {
  if (valor == 1) {
  	$('#div_manual_negocio').css({'color':'#FFFFFF'});
  	//console.log('1');
  	valor=0;
  } else {
  	$('#div_manual_negocio').css({'color':'#FFFF90'});
  	valor=1;
  	//console.log('2');
  }
  	setTimeout("pisca();",velocidade);
  }
  
  setTimeout("pisca();",velocidade);
</script>