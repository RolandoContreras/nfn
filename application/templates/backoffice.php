<!DOCTYPE html>
<html lang="es">
<head>
  <title>Oficina Virtual NFN</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css' />
  <base href="<?php echo site_url().'backoffice';?>">
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
  
  <!--STYLE 3T CLUB-->
    <link href="<?php echo site_url().'static/backoffice/css/assets/entypo.css';?>" rel="stylesheet">
    <!-- /entypo font stylesheet -->
    <link href="<?php echo site_url().'static/backoffice/css/one/style_one.css';?>" rel="stylesheet">
    <!-- Font awesome stylesheet -->
    <link href="<?php echo site_url().'static/backoffice/css/assets/font-awesome.min.css';?>" rel="stylesheet">
    <!-- /font awesome stylesheet -->
    <!-- Bootstrap stylesheet min version -->
    <link href="<?php echo site_url().'static/backoffice/css/assets/bootstrap.min.css';?>" rel="stylesheet">
    <!-- /bootstrap stylesheet min version -->
    <!-- Mouldifi core stylesheet -->
    <link href="<?php echo site_url().'static/backoffice/css/assets/mouldifi-core.css';?>" rel="stylesheet">
    <!-- /mouldifi core stylesheet -->
    <link href="<?php echo site_url().'static/backoffice/css/assets/mouldifi-forms.css';?>" rel="stylesheet">
    <script src="https://use.fontawesome.com/3aa4a6fd0b.js"></script>
    <!--STYLE 3T CLUB-->
  
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

<body onresize="verificaTamanho(); verificaTamanho2();" onload="verificaTamanho(); verificaTamanho2();">
  <div id="chat_mktza"></div>
  <div id="DivTamanhoTela" style="position:fixed; background:#000000; color:#FFFFFF; z-index:900; padding:10px; display:none"></div>
  <div id="DivTamanhoTela2" style="position:fixed; background:#000000; color:#FFFFFF; margin-top:25px;  z-index:900; display:none"></div>
  <!------- Menu mobile ------>
    <div id="MenuMobile">
        <div class="ParteMenu">
            <div class="Logo" onclick="EfeitoMenu('MenuMobile');">
                <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" height="80" align="center" style="cursor:pointer" />
              <div style="position:relative">
                <div style="position:absolute; right:10px; top:10px">
                  <img src="<?php echo site_url().'static/backoffice/images/fechar.png';?>" width="20" height="20" align="center" style="cursor:pointer" />
                </div>
              </div>
            </div>

    <!-- Menu fixo -->
        <div class="DivMargemMenu">
            <div class="Menu" onclick="window.open('<?php echo site_url().'backoffice'?>','_self');">
                <span class="DivValign">Página Principal</span>
            </div>
            <div class="Linhas"></div>
            <!--MENU MIS DATOS-->
                <div class="Menu">
                    <span class="DivValign">Mis datos</span>
                </div>
                    <div class="Linhas2"></div>
                    <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-pessoais','ModalPadrao2');" alt=" Datos personales" title="Datos personales">
                        <span class="DivValign">&bull; Datos personales</span>
                    </div>
                    <div class="Linhas2"></div>

                    <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('<?php echo site_url().'backoffice/contrasena;';?>','ModalPadrao2');" alt="Contraseña" title="Contraseña">
                        <span class="DivValign">&bull; Contraseña</span></div>
                    <div class="Linhas"></div>
            <!--MENU BOX-->
                <div class="Menu">
                    <span class="DivValign">Box</span>
                </div>
                    <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2');" alt="Cambiar el kit" title="Cambiar el kit">
                        <span class="DivValign">&bull; Cambiar el Box</span>
                    </div>
                    <div class="Linhas2"></div>
                    <div class="Linhas"></div>
            <!--MENU RED-->
                <div class="Menu">
                    <span class="DivValign">Red</span>
                </div>
                    <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/py/registro-datos-personales','_blank');" alt="Agregar cliente" title="Agregar cliente">
                        <span class="DivValign">&bull; Agregar cliente</span>
                    </div>
                    <div class="Linhas2"></div>
                    <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2');" alt="Ver la red" title="Ver la red">
                        <span class="DivValign">&bull; Ver la red</span></div>
                        <div class="Linhas2"></div>

                        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/meus-indicados-diretos','ModalPadrao4');" alt="Mis indicadores directos" title="Mis indicadores directos">
                            <span class="DivValign">&bull; Mis indicadores directos</span>
                        </div>
                        <div class="Linhas"></div>
            <!--MENU APOYO-->
                    <div class="Menu">
                        <span class="DivValign">Apoyo</span>
                    </div>
                        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/sac','ModalPadrao2');" alt="SAC" title="SAC">
                            <span class="DivValign">&bull; SAC</span>
                        </div>
                        <div class="Linhas2"></div>

                        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2');" alt="Downloads" title="Downloads">
                            <span class="DivValign">&bull; Descargas</span>
                        </div>
                        <div class="Linhas2"></div>

                        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_self');" alt="Calendario de eventos" title="Calendario de eventos">
                            <span class="DivValign">&bull; Calendario de eventos</span></div>
                        <div class="Linhas2"></div>

                        <div class="SubMenu" onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')" alt="Manual de negocios" title="Manual de negocios">
                            <span class="DivValign">&bull; Manual de negocios</span>
                        </div>
                        <div class="Linhas2"></div>
                        <div class="Linhas"></div>
            <!--MENU INTERACTIVIDAD-->
                    <div class="Menu">
                        <span class="DivValign">Interactividad</span>
                    </div>
                        <div class="Linhas2"></div>
                        <div class="SubMenu" onclick="window.open('https://www.facebook.com/SCIParaguayOficial/','_self');" alt="Facebook" title="Facebook">
                            <span class="DivValign">&bull; Facebook</span>
                        </div>
                        <div class="Linhas2"></div>
                        <div class="SubMenu" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="EfeitoMenu('MenuMobile');abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2');" alt="Solicitud" title="Solicitud">
                            <span class="DivValign">&bull; Solicitud</span>
                        </div>
                        <div class="Linhas2"></div>
                        <div class="Linhas"></div>
                        <div class="Menu" onclick="window.open('https://www.scipiracicaba.com.br/escritorio-virtual/sair','_self');" alt="Dejar" title="Dejar">
                            <span class="DivValign">Salir</span>
                        </div>
        </div>
<!-- /Menu fixo -->
        </div>
    </div>
<!------- /Menu mobile ------>
<script type="text/javascript">
  window.history.pushState( '', '', '<?php echo site_url().'backoffice'?>' );
</script>
<script type="text/javascript" src="<?php echo site_url().'static/backoffice/js/js_css/upclick-min.js';?>"></script>
<!-- COLOCAR NO TOPO -->
<div id="RolagemLateral">
  <div class="Blocos" style="padding-top:0px">
      <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" height="120" align="center" alt="NFN - New Future Network" title="NFN - New Future Network" />
  </div>
  <style type="text/css">
      .botaozinho {background-image:url('<?php echo site_url().'static/backoffice/images/foto-perfil.jpg';?>');background-size:cover;cursor:pointer}
  </style>
  <div class="Blocos">
    <div class="TextoBemVindo">¡Bienvenido, <?php echo $_SESSION['customer']['name'];?>!<br>ID:
      <font style="font-weight:400"><?php echo $_SESSION['customer']['code'];?></font>
    </div>
  </div>
  <?php 
        $active = $_SESSION['customer']['active'];
        if($active == 1){
            $text = "Activo";
            $style = "label-success";
        }else{
            $text = "Inactivo";
            $style = "label-danger";
        }
    ?>
  <div class="Blocos <?php echo $style;?>">
        <span class="title">
           <?php echo $text;?>
        </span>
  </div>
  <!-- //Lateral do quadro dos sonhos -->
  <!-- Lateral do Perfil -->
  <div class="Blocos" id="BlocoPerfil" style="display:none; border-bottom:0px">
    <div class="FraseDia" style="font-size:15px">¡SEAN BIENVENIDOS A NFN!</div>
    <div class="FraseDia" style="font-weight: 400;margin-top:3px;font-size:16px">Hable más sobre usted</div>
    <div class="VoltarAoEscritorio" onclick="mudaLateral('Home')">
      <div style="float:left; margin-left:5px;"><img src="imagens_perfil/voltar_ev.png" width="24" height="20" alt="Voltar ao escritório virtual" title="Volver a la oficina virtual" /></div>
      <div
        style="float:right; margin-right:5px">
        <font style="font-weight:600; font-size:14.5px; color:#5e5e5e">Volver a la oficina virtual</font>
    </div>
  </div>
</div>
<!-- //Lateral do Perfil -->
</div>
<style type="text/css">
  .BordaBotaoPosicao {position:relative} .BordaBotao {position:absolute; left:-5px; top:-5px; border:5px solid #D64541; width:65px; height:65px; border-radius:100%} .BordaBotaoPL {position:absolute; left:-5px; top:-5px; border:5px solid #F3C77B; width:65px; height:65px; border-radius:100%} .BordaBotaoFacebook {position:absolute; left:-5px; top:-5px; border:5px solid #5E7FC1; width:65px; height:65px; border-radius:100%} /*==== Video responsivo no modal ====== */ .video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;} .video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;} /* Paraguai */ #Corpo .DivGrupo3 {float:left;width:286px}
</style>
<!-- alerta do sac -->
<!-- abre o quadro dos sonhos direto se vier do painel pela pagina do quadro -->
<!-- abre o quadro dos sonhos direto se vier do painel pela pagina do quadro -->
<!-- CONTEUDO DESKTOP -->
<div id="Corpo" style="background:url('img_gerenciamento/fundo-branco2.jpg'); background-size:cover">
  <div id="Topo">
    <div class="Titulo" style="color:#404040; ">
        <span class="DivAlign">OFICINA VIRTUAL NFN</span>
    </div>
    <style type="text/css">
      #Topo .BotoesTopo {float:right; width:calc(100% - 315px); margin-left:10px} #Topo .DivBolinhas {float:right; margin-right:15px; width:65px; height:65px; border-radius:100%; display:table; text-align:center} #Topo .BolinhaMenor {width:45px; height:45px; margin-right:0px; margin-top:10px} #Topo .Imagem {width:65px; height:65px; border-radius:100%; cursor:pointer;} #Topo .ImagemMenor {width:45px; height:45px; cursor:pointer;} #Topo .ImagemDesabilitado {width:65px; height:65px; cursor:default; filter:alpha(opacity=50);opacity:0.5} #Topo .BordaBotaoPosicaoEfeito {position:relative} #Topo .BordaBotao {position:absolute; left:-5px; top:-5px; border-radius:100%; cursor:pointer} #Topo .EfeitoBotaoFace {border:5px solid #5E7FC1} #Topo .EfeitoBotaoSac {border:5px solid #D64541} #Topo .EfeitoBotaoPL {border:5px solid #b9cee4} /*-- Responsivo --*/ @media screen and (max-width: 1100px){ #Topo .BotoesTopo {width:100%; margin:0px; margin-bottom:20px} }
    </style>
    <!--**OBS IMPORTANTES**A LISTA DO DESKTOP ESTÁ EM **FLOAT RIGHT** ENTÃO A INSERÇÃO DOS ÍCONES É DA **DIRETA PARA A ESQUERDA**ESTES MESMOS ÍCONES ESTÃO NO MOBILE, ENTÃO ALTEREM TAMBÉM NA PAGINA **INICIO_BOTOES_MOBILE.ASP**-->
    <div class="BotoesTopo">
      <!-- 'SAIR DO EV' -->
      <div class="DivBolinhas BolinhaMenor">
          <span class="DivValign">
              <img src="<?php echo site_url().'static/backoffice/images/botonsalir.png';?>" class="ImagemMenor" data-toggle="tooltip" data-placement="bottom" title="Salir" onclick="window.open('<?php echo site_url().'salir';?>', '_self');" alt="Salir" />
          </span>
      </div>
    </div>
    <div class="BannersTopo">
      <div class="PubImagem"> 
      </div>
    </div>
  </div>
  <div class="CorpoRolagem" id="RolagemCorpo">
    <div class="WidthQuadrados">
      <!-- START MIS DATOS -->
      <div class="DivGrupo0">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Mis datos" title="Mis datos"> Mis datos </div>
        </div>
        <div class="DivGrupo2">
          <div class="DivQuadrado" style="background-color:#913d88;filter:alpha(opacity=30);opacity:.3"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/2.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Datos de pago</div>
              </span>            
          </div>
          <div class="DivQuadrado" style="background-color:#9d5797;filter:alpha(opacity=30);opacity:.3"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/27.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Datos del beneficiario</div>
              </span>            
          </div>
          <div class="DivQuadrado DivQuadrado3" style="background-color:#9b59b6;" data-toggle="tooltip" title="Es necesario que mantenga sus datos siempre actualizados" alt="Datos personales Es necesario que mantenga sus datos siempre actualizados"> 
                <span class="DivValign">
                    <div class="DivQuadrado1">
                        <img src="<?php echo site_url().'static/backoffice/images/3.png';?>" border="0">
                    </div>
                    <div class="DivQuadrado2">Datos personales</div>
                </span>
            <div class="DivQuadrado0">
              <span class="DivValign">
                  <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('<?php echo site_url().'backoffice/datos';?>','ModalPadrao2')" style="width:286px"></div>
              </span>              
            </div>
          </div>
          <div class="DivQuadrado" style="background-color:#bc91d2" data-toggle="tooltip" title="Si es necesario cambiar la contraseña de acceso" alt="Contraseña Si es necesario cambiar la contraseña de acceso">
            <span class="DivValign">
                <div class="DivQuadrado1">
                    <img src="<?php echo site_url().'static/backoffice/images/4.png';?>" border="0">
                </div>
                <div class="DivQuadrado2">Contraseña</div>
            </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('<?php echo site_url().'backoffice/contrasena';?>','ModalPadrao2')" ></div>
                </span>              
            </div>
          </div>
        </div>
      </div>
      <!-- END MIS DATOS -->
      <!-- START BOX -->
      <div class="DivGrupo3 DivMarginLeft">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Box" title="Box"> Box </div>
        </div>
        <div class="DivGrupo2">
          <div class="DivQuadrado" style="background-color:#1f3a93" data-toggle="tooltip" title="Haga clic aquí para generar su boleto" alt="Facturas Haga clic aquí para generar su boleto">
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/5.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Facturas</div>
              </span>
            <div class="DivQuadrado0">
              <span class="DivValign">
                  <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/boletos-py','ModalPadrao2')" ></div>
              </span>              
            </div>
          </div>
          <div class="DivQuadrado" style="background-color:#4b77be" data-toggle="tooltip" title="Aquí puede cambiar el tipo de kit que desea recibir este mes" alt="Cambiar el kit Aquí puede cambiar el tipo de kit que desea recibir este mes"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/7.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Cambiar el Box</div>
              </span>
            <div class="DivQuadrado0">
                  <span class="DivValign">
                      <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2')" ></div>
                  </span>              
            </div>
          </div>
          <div class="DivQuadrado" style="background-color:#1e8bc3" data-toggle="tooltip" title="Opción disponible del 01 al 05 de cada mes" alt="Pagar kit con bonos Opción disponible del 01 al 05 de cada mes">
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/8.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Pagar box con bonos</div>
          </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/pagar-kit-com-bonus-py','ModalPadrao2')"></div>
                </span>              
            </div>
          </div>
        </div>
      </div>
      <!-- END BOX -->
      <!-- START RED-->
      <div class="DivGrupo0 DivMarginLeft">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Red" title="Red"> Red </div>
        </div>
        <div class="DivGrupo2">
          <div class="DivQuadrado" style="background-color:#049372" data-toggle="tooltip" title="Haga clic aquí para hacer un nuevo registro en su red" alt="Añadir cliente Haga clic aquí para hacer un nuevo registro en su red"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/9.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Añadir cliente</div>
              </span>
            <div class="DivQuadrado0">
              <span class="DivValign">
                  <div class="DivQuadrado5" onclick="window.open('<?php echo site_url().'register';?>','_blank');"></div>
              </span>              
            </div>
          </div>
          <div class="DivQuadrado" style="background-color:#00b16a" data-toggle="tooltip" title="Acompañar a su equipo" alt="Ver red Acompañar a su equipo">
                <span class="DivValign">
                      <div class="DivQuadrado1">
                          <img src="<?php echo site_url().'static/backoffice/images/10.png';?>" border="0">
                      </div>
                      <div class="DivQuadrado2">Ver red</div>
                </span>
                <div class="DivQuadrado0">
                    <span class="DivValign">
                        <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2')"></div>
                    </span>              
                </div>
          </div>
          <div class="DivQuadrado " style="background-color:#26c281" data-toggle="tooltip" title="Profesionalización y reconocimiento por el Plan de Carrera de SCI" alt="Plano de carrera Profesionalización y reconocimiento por el Plan de Carrera de SCI"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/11.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Plan Carrera</div>
              </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/plano-de-carreira','ModalPadrao2')"></div>
                </span>              
            </div>
          </div>
          <div class="DivQuadrado DivQuadrado3" style="background-color:#18ad90" data-toggle="tooltip" title="Acompañe toda bonificación que se genera en su red" alt="Extracto Acompañe toda bonificación que se genera en su red"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/12.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">Extracto</div>
              </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/extrato-py','ModalPadrao2')" style="width:286px"></div>
                </span>              
            </div>
          </div>
          <div class="DivQuadrado" style="background-color:#4daf7c" data-toggle="tooltip" title="Compruebe todas sus indicaciones directas" alt="Mis nominados directos Compruebe todas sus indicaciones directas">
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/13.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Mis referidos directos</div>
          </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="abre('<?php echo site_url().'backoffice/directos';?>','ModalPadrao4')" ></div>
                </span>              
            </div>
          </div>
        </div>
      </div>
      <!-- END RED-->
      <div class="DivGrupo1 DivGrupoMargin DivApoio">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Apoyo" title="Apoyo">Apoyo</div>
        </div>
        <div class="DivGrupo2">
          <div class="DivQuadrado DivQuadrado3" style="background-color:#b23527" data-toggle="tooltip" title="Servicio al Cliente" alt="Servicio al Cliente"> 
              <span class="DivValign">
                  <div class="DivQuadrado1">
                      <img src="<?php echo site_url().'static/backoffice/images/14.png';?>" border="0">
                  </div>
                  <div class="DivQuadrado2">SAC</div>
              </span>
            <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadraoChat" onclick="abre('chat.asp','ModalPadraoChat')" style="width:286px"></div>
                </span>              
            </div>
        </div>
        <div class="DivQuadrado " style="background-color:#ed4132" data-toggle="tooltip" title="Aquí tienes acceso a diversos materiales de apoyo y divulgación. ¡Accede y echa un vistazo!" alt="Aquí tienes acceso a diversos materiales de apoyo y divulgación. ¡Accede y echa un vistazo!"> 
            <span class="DivValign">
                <div class="DivQuadrado1">
                    <img src="<?php echo site_url().'static/backoffice/images/15.png';?>" border="0">
                </div>
                <div class="DivQuadrado2">Descargas</div>
            </span>
          <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2')" ></div>
                </span>            
          </div>
        </div>
        <div class="DivQuadrado" style="background-color:#ed4132" data-toggle="tooltip" title="Acceda y quédese dentro de todas las presentaciones de negocios que ocurren en todo Brasil y Paraguay diariamente" alt="Calendario de eventos Acceda y quédese dentro de todas las presentaciones de negocios que ocurren en todo Brasil y Paraguay diariamente">
        <span class="DivValign">
            <div class="DivQuadrado1">
                <img src="<?php echo site_url().'static/backoffice/images/18.png';?>" border="0">
            </div>
            <div class="DivQuadrado2">Calendario de eventos</div></span>
          <div class="DivQuadrado0">
                <span class="DivValign">
                    <div class="DivQuadrado5" onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_blank')"></div>
                </span>            
          </div>
        </div>
      <div class="DivQuadrado" style="background-color:#ed321f" data-toggle="tooltip" title="Manual de Negocios, Normas de Uso, Conducta y Política de Privacidad" alt="Manual de negocios Manual de Negocios, Normas de Uso, Conducta y Política de Privacidad"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/28.png';?>" border="0">
              </div>
              <div class="DivQuadrado2" id = "div_manual_negocio" style="font-size: 12px">Manual de negocios</div>
          </span>
        <div class="DivQuadrado0">
            <span class="DivValign">
                <div class="DivQuadrado5" onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')"></div>
            </span>          
        </div>
      </div>
    </div>
  </div>
  <div class="DivGrupo0 DivGrupoMargin DivMarginLeft">
    <div class="DivGrupoTitulo">
      <div class="DivGrupoTitulo1" alt="Interactividad" title="Interactividad"> Interactividad </div>
    </div>
    <div class="DivGrupo2">
      <div class="DivQuadrado" style="background-color:#e68517" data-toggle="tooltip" title="Entérate de las novedades" alt="Youtube NFN Entérate de las novedades">
      <span class="DivValign">
          <div class="DivQuadrado1">
              <img src="<?php echo site_url().'static/backoffice/images/20.png';?>" border="0">
          </div>
          <div class="DivQuadrado2">Youtube NFN</div>
      </span>
        <div class="DivQuadrado0">
            <span class="DivValign">
                <div class="DivQuadrado5" onclick="window.open('https://www.youtube.com/channel/UCsKH0cc3ve4aGCBQ4Luo0-g','_blank')"></div>
            </span>          
        </div>
      </div>
      <div class="DivQuadrado " style="background-color:#eb974e" data-toggle="tooltip" title="Diariamente se hacen varias entradas en nuestro Facebook. Siga!" alt="Facebook Diariamente se hacen varias entradas en nuestro Facebook. Siga!"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/22.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Facebook</div>
          </span>
        <div class="DivQuadrado0">
            <span class="DivValign">
                <div class="DivQuadrado5" onclick="window.open('https://www.facebook.com/nfnoficial/','_blank')"></div>
            </span>          
        </div>
    </div>
    <div class="DivQuadrado" style="background-color:#e88a37" data-toggle="tooltip" title="Acompañe diariamente nuestro Instagram" alt="Instagram Acompañe diariamente nuestro Instagram">
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/35.png';?>" border="0">
        </div>
        <div class="DivQuadrado2">Instagram</div>
    </span>
      <div class="DivQuadrado0">
           <span class="DivValign">
               <div class="DivQuadrado5" onclick="window.open('https://www.instagram.com/nfnperu/?hl=es-la','_blank')"></div>
           </span>        
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
      <div class="BlocoPrincipal">
          <span class="DivValign">
              <div class="Logotipo">
                  <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" height="65" alt="logo" />
              </div>
              <div class="MenuMobile" onclick="EfeitoMenu('MenuMobile');">&nbsp;<img src="<?php echo site_url().'static/backoffice/images/menu-mobile2.png';?>" width="27" height="19" align="center" style="margin-top:-3px;"/>&nbsp;MENÚ</div></span></div>
    </div>
    <div id="TopoMobile">
      <div class="BlocoPrincipal">
          <span class="DivValign">
              <div class="Logotipo">
                  <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" height="65" alt="logo" /></div>
              <div class="MenuMobile" onclick="EfeitoMenu('MenuMobile');">&nbsp;<img src="<?php echo site_url().'static/backoffice/images/menu-mobile2.png';?>" width="27" height="19" align="center" style="margin-top:-3px;"/>&nbsp;MENÚ</div>
          </span>
      </div>
      <div class="Titulo">OFICINA VIRTUAL NFN</div>
      <div class="BlocoFoto">
          <div class="FotoCliente" id="FotoClienteMobile" style="background-image:url('<?php echo site_url().'static/backoffice/images/foto-perfil.jpg  ';?>');background-size:cover;cursor:pointer;">
            <input type="button" id="FotoBotaoMobile" name="FotoBotaoMobile" style="cursor:pointer;">
        </div>
        <div class="TextoBemVindo">Bienvenido Rolando!<br>ID:
          <font style="font-weight:400">1540265</font>
        </div>
      </div>
      <style type="text/css">
        #TopoMobile .BotoesTopo {float:left; width:100%; margin-left:10px; margin-top:20px; margin-bottom:10px} #TopoMobile .DivBolinhas {float:left; margin-right:15px; width:65px; height:65px; border-radius:100%; display:table; text-align:center} #TopoMobile .BolinhaMenor {width:45px; height:45px; margin-right:0px; margin-top:10px} #TopoMobile .Imagem {width:65px; height:65px; border-radius:100%; cursor:pointer;} #TopoMobile .ImagemMenor {width:45px; height:45px; cursor:pointer;} #TopoMobile .ImagemDesabilitado {width:65px; height:65px; cursor:default; filter:alpha(opacity=50);opacity:0.5} #TopoMobile .BordaBotaoPosicaoEfeito {position:relative} #TopoMobile .BordaBotao {position:absolute; left:-5px; top:-5px; border-radius:100%; cursor:pointer} #TopoMobile .EfeitoBotaoFace {border:5px solid #5E7FC1} #TopoMobile .EfeitoBotaoSac {border:5px solid #D64541} #TopoMobile .EfeitoBotaoPL {border:5px solid #b9cee4} /*-- Responsivo --*/ @media screen and (max-width: 580px){ #TopoMobile .DivBolinhas {width:45px; height:45px} #TopoMobile .Imagem {width:45px; height:45px} #TopoMobile .ImagemDesabilitado {width:45px; height:45px} } @media screen and (max-width: 440px){ #TopoMobile .DivBolinhas{margin-bottom: 15px;} }
      </style>
      <div class="BotoesTopo" style="width:calc(100% - 10px)">
        <!-- 'NOTIFICAÇÃO DE NOVO ATENDIMENTO NO SAC' -->
        <div class="DivBolinhas" id="BotaoMensagemSac">
            <span class="DivValign">
                <img src="<?php echo site_url().'static/backoffice/images/botaosac.png';?>" class="ImagemDesabilitado" data-toggle="tooltip" data-placement="bottom" title="En el momento usted no tiene nuevas atenciones en el SAC" alt="sac - En el momento usted no tiene nuevas atenciones en el SAC"/>
            </span>
        </div>
      </div>
    </div>
    <div class="ConteudoBlocos" style="margin-bottom:40px">
      <!-- BLOCOS -->
      <div class="DivGrupo">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Mis datos">Mis datos</div>
        </div>
        <div class="DivQuadrado" style="background-color:#8e44ad"> 
            <span class="DivValign">
                <div class="DivQuadrado1">
                    <img src="<?php echo site_url().'static/backoffice/images/1.png';?>" border="0">
                </div>
                <div class="DivQuadrado2">Punto de apoyo</div>
            </span>
          <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-entrega-paraguai','ModalPadrao2')" alt="Punto de apoyo">
                <span class="DivValign">
                    <div class="DivQuadrado5"></div>
                </span> 
          </div>
        </div>
        <div class="DivQuadrado" style="background-color:#913d88;filter:alpha(opacity=30);opacity:.3"> <span class="DivValign"><div class="DivQuadrado1"><img src="imagens/2.png" border="0"></div><div class="DivQuadrado2" >Datos de pago</div></span>          </div>
        <div class="DivQuadrado" style="background-color:#9d5797;filter:alpha(opacity=30);opacity:.3"> <span class="DivValign"><div class="DivQuadrado1"><img src="imagens/27.png" border="0"></div><div class="DivQuadrado2" >Datos del beneficiario</div></span>          </div>
        <div class="DivQuadrado" style="background-color:#9b59b6"> <span class="DivValign"><div class="DivQuadrado1"><img src="imagens/3.png" border="0"></div><div class="DivQuadrado2" >Datos personales</div></span>
          <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/dados-pessoais','ModalPadrao2')" alt="Datos personales">
                <span class="DivValign">
                    <div class="DivQuadrado5"></div>
                </span> 
          </div>
        </div>
        <div class="DivQuadrado" style="background-color:#bc91d2"> 
            <span class="DivValign">
                <div class="DivQuadrado1">
                    <img src="<?php echo site_url().'static/backoffice/images/4.png';?>" border="0">
                </div>
                <div class="DivQuadrado2">Contraseña</div>
            </span>
            <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('<?php echo site_url().'backoffice/contrasena';?>','ModalPadrao2')" alt="Contraseña">
                <span class="DivValign">
                    <div class="DivQuadrado5"></div>
                </span> 
          </div>
        </div>
      </div>
      <div class="DivGrupo">
        <div class="DivGrupoTitulo">
          <div class="DivGrupoTitulo1" alt="Box">Box</div>
        </div>
        <div class="DivQuadrado" style="background-color:#1f3a93"> 
            <span class="DivValign">
                <div class="DivQuadrado1">
                    <img src="<?php echo site_url().'static/backoffice/images/5.png';?>" border="0">
                </div>
                <div class="DivQuadrado2">Facturas</div>
            </span>
          <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/boletos-py','ModalPadrao2')" alt="Facturas">
                <span class="DivValign">
                    <div class="DivQuadrado5"></div>
                </span> 
          </div>
      </div>
      <div class="DivQuadrado" style="background-color:#4b77be"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/7.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Cambiar el box</div>
          </span>
        <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/alterar-kit','ModalPadrao2')" alt="Cambiar el kit">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
        </div>
      </div>
      <div class="DivQuadrado" style="background-color:#1e8bc3"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/8.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Pagar box con bonos</div>
          </span>
        <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/pagar-kit-com-bonus-py','ModalPadrao2')" alt="Pagar kit con bonos">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
        </div>
      </div>
    </div>
    <div class="DivGrupo">
      <div class="DivGrupoTitulo">
        <div class="DivGrupoTitulo1" alt="Red">Red</div>
      </div>
      <div class="DivQuadrado" style="background-color:#049372"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/9.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Añadir cliente</div>
          </span>
          <div class="DivQuadrado0" onclick="window.open('<?php echo site_url().'register';?>','_blank');" alt="Añadir Cliente">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
        </div>
      </div>
      <div class="DivQuadrado" style="background-color:#00b16a"> 
          <span class="DivValign">
              <div class="DivQuadrado1">
                  <img src="<?php echo site_url().'static/backoffice/images/10.png';?>" border="0">
              </div>
              <div class="DivQuadrado2">Ver red</div>
          </span>
        <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/ver-rede','ModalPadrao2')" alt="Ver red">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
        </div>
    </div>
    <div class="DivQuadrado" style="background-color:#26c281"> 
        <span class="DivValign">
            <div class="DivQuadrado1">
                <img src="<?php echo site_url().'static/backoffice/images/11.png';?>" border="0">
            </div>
            <div class="DivQuadrado2">Plan Carrera</div></span>
      <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/plano-de-carreira','ModalPadrao2')" alt="Plan Carrera">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
      </div>
    </div>
    <div class="DivQuadrado" style="background-color:#18ad90"> <span class="DivValign"><div class="DivQuadrado1"><img src="imagens/12.png" border="0"></div><div class="DivQuadrado2" >Extracto</div></span>
      <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/extrato-py','ModalPadrao2')" alt="Extracto">
            <span class="DivValign">
                <div class="DivQuadrado5"></div>
            </span> 
      </div>
  </div>
  <div class="DivQuadrado" style="background-color:#4daf7c"> 
      <span class="DivValign">
          <div class="DivQuadrado1">
              <img src="<?php echo site_url().'static/backoffice/images/13.png';?>" border="0">
          </div>
          <div class="DivQuadrado2">Mis referidos directos</div></span>
    <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao3" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/meus-indicados-diretos','ModalPadrao4')" alt="Mis referidos directos">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
    </div>
  </div>
</div>
<div class="DivGrupo">
  <div class="DivGrupoTitulo">
    <div class="DivGrupoTitulo1" alt="Apoyo">Apoyo</div>
  </div>
  <div class="DivQuadrado" style="background-color:#b23527"> 
      <span class="DivValign">
          <div class="DivQuadrado1">
              <img src="<?php echo site_url().'static/backoffice/images/14.png';?>" border="0">
          </div>
          <div class="DivQuadrado2">SAC</div>
      </span>
    <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadraoChat" onclick="abre('chat.asp','ModalPadraoChat')" alt="SAC">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
    </div>
  </div>
  <div class="DivQuadrado" style="background-color:#ed4132"> 
      <span class="DivValign">
          <div class="DivQuadrado1">
              <img src="<?php echo site_url().'static/backoffice/images/15.png';?>" border="0">
          </div>
          <div class="DivQuadrado2">Descargas</div></span>
    <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/downloads','ModalPadrao2')" alt="Descargas">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
    </div>
  </div>
<div class="DivQuadrado" style="background-color:#ed4132"> 
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/18.png';?>" border="0"></div>
        <div class="DivQuadrado2" >Calendario de eventos</div>
    </span>
  <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/agenda-sci-py','_blank')" alt="Calendario de eventos">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
  </div>
</div>
<div class="DivQuadrado" style="background-color:#ed321f"> 
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/28.png';?>" border="0"></div>
        <div class="DivQuadrado2" id = "div_manual_negocio" style="font-size: 12px">Manual de negocios</div>
    </span>
  <div class="DivQuadrado0" onclick="window.open('https://www.scipiracicaba.com.br/downloads/Manual_de_Negocios_SCI_PY.pdf')" alt="Manual de negocios">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
  </div>
</div>
</div>
<div class="DivGrupo">
  <div class="DivGrupoTitulo">
    <div class="DivGrupoTitulo1" alt="Interactividad"> Interactividad </div>
  </div>
  <div class="DivQuadrado" style="background-color:#e68517"> 
      <span class="DivValign">
          <div class="DivQuadrado1">
              <img src="<?php echo site_url().'static/backoffice/images/20.png';?>" border="0">
          </div>
          <div class="DivQuadrado2">Youtube NFN</div>
      </span>
    <div
      class="DivQuadrado0" onclick="window.open('https://www.youtube.com/channel/UCWssjK78s0rDbMcmDLENDlg?sub_confirmation=1','_blank')" alt="Youtube NFN">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
    </div>
</div>
<div class="DivQuadrado" style="background-color:#eb974e"> 
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/22.png';?>" border="0">
        </div>
        <div class="DivQuadrado2">Facebook</div>
    </span>
  <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_facebook.asp','ModalPadrao2')" alt="Facebook">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
  </div>
</div>
<div class="DivQuadrado" style="background-color:#e88a37"> 
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/35.png';?>" border="0">
        </div>
        <div class="DivQuadrado2">Instagram</div>
    </span>
  <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('modal_instagram.asp','ModalPadrao2')" alt="Instagram">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
  </div>
</div>
<div class="DivQuadrado" style="background-color:#e7a13c"> 
    <span class="DivValign">
        <div class="DivQuadrado1">
            <img src="<?php echo site_url().'static/backoffice/images/26.png';?>" border="0">
        </div>
        <div class="DivQuadrado2">Solicitud</div>
    </span>
  <div class="DivQuadrado0" data-dismiss="modal" data-toggle="modal" data-target="#ModalPadrao" onclick="abre('https://www.scipiracicaba.com.br/escritorio-virtual/download-aplicativo','ModalPadrao2')" alt="Solicitud">
        <span class="DivValign">
            <div class="DivQuadrado5"></div>
        </span> 
  </div>
</div>
</div>
<!-- //BLOCOS -->
</div>
</div>
</div>
<!-- //CONTEUDO MOBILE -->
<!--MODAL (para abrir o conteudo das paginas) -->
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
        <h4 class="modal-title">TUTORIALES NFN</h4>
      </div>
      <div class="modal-body" id="blocos_tutoriais"></div>
      <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button></div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" id="ChatMktZap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" style="width: 350px" role="document">
    <div class="modal-content">
      <div class="modal-header"> <button type="button" class="close" onclick="$('#ChatMktZap').modal('hide');"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Conversar</h4>
      </div>
      <div class="modal-body" id="ChatMktZapIframe"></div>
    </div>
  </div>
</div>
<div id="ModalTutorial" class="modal fade" role="dialog" onclose="paraVideo(ModalTutorial)">
  <div class="modal-dialog modal-lg">
    <!-- Modal de vídeo-->
    <div class="modal-content">
      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TUTORIAL - <span id="titulovideo"></span></h4>
      </div>
      <div class="modal-body video-container" id="secaotutorial" style=""> </div>
      <div class="modal-footer">
        <div style="float: left; text-align: left; width: 90%"> <span>Compartir este vídeo </span>
          <div> <span class="Input" id="urlVideo" style="width: 50%; float: left; margin-right: 10px; overflow: hidden; height: auto;"> </span> <button type="button"
              class="btn btn-default" style="float: left;" onclick="copiar(urlVideo, this)">Copiar URL</button> </div>
        </div>
        <div> <button type="button" style="margin-top: 19px;" class="btn btn-default" data-dismiss="modal">Cerca</button> </div>
      </div>
    </div>
  </div>
</div>
<script>
  function copiar(element, context) { var $temp = $("<input>"); $("body").append($temp); $temp.val($(element).text()).select(); document.execCommand("copy"); $temp.remove(); } function paraVideo(modal){ $('#iframeTutorial').remove(); //código para fechar a modal aqui $(modal).modal("hide"); }
</script>
<!--//MODAL (para abrir o conteudo das paginas) -->
<script type="text/javascript">
  function FecharPagina(){ window.history.pushState( '', '', '<?php echo site_url().'backoffice';?>' ); }
</script>
</body>

</html>
<script type="text/javascript">
  $.ajax({ type: "get", url: "https://www.scipiracicaba.com.br/escritorio-virtual/app/verificar", success: function(retorno){ console.log(retorno); } });
</script>
<script type="text/javascript">
//  $(document).ready(function () { abre("https://www.scipiracicaba.com.br/escritorio-virtual/bem-vindo-dados-pagamento", "ModalPadrao2"); $("#ModalPadrao").modal("show"); });
</script>
<div id="popup-bemvindo">
  <!-- vazio -->
</div>
<script>
  var velocidade = 1000; var valor = 1; function pisca() { if (valor == 1) { $('#div_manual_negocio').css({'color':'#FFFFFF'}); //console.log('1'); valor=0; } else { $('#div_manual_negocio').css({'color':'#FFFF90'}); valor=1; //console.log('2'); } setTimeout("pisca();",velocidade); } setTimeout("pisca();",velocidade);
</script>