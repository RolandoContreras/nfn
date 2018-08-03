<!DOCTYPE html>
<html lang="en">
<!--START HEAD-->
<?php $this->load->view("head");?>
<!--END HEAD-->
<body>
<div class="super_container">
	<!-- Header -->
	<header class="header d-flex flex-row justify-content-end align-items-center trans_200">
		<!-- Logo -->
		<div class="logo mr-auto">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="130">
		</div>
		<!-- Navigation -->
                <?php $this->load->view("nav2");?>
		<!-- Hamburger -->
		<div class="hamburger_container bez_1">
                    <i class="fa fa-bars trans_200"></i>
		</div>
	</header>
	<!-- Menu -->
	<div class="menu_container">
		<div class="menu menu_mm text-right">
			<div class="menu_close"><i class="fa fa-times-circle trans_200"></i></div>
                        <?php 
                            //INIT VAR
                            $active_home = "";
                            $active_buy = "";
                            $active_login = "";
                            $active_faq = "";

                            $url = explode("/",uri_string());
                            $nav = $url[0];
                            switch ($nav) {
                                case 'home':
                                    $active_home = "active";
                                    break;
                                case 'buy':
                                    $active_buy = "active";
                                    break;
                                case 'login':
                                    $active_login = "active";
                                    break;
                                case 'faq':
                                    $active_faq = "active";
                                    break;
                                default:
                                    $active_home = "active";
                                    break;
                            }        
                            ?>
                           <ul>
                                <li class="<?php echo $active_home;?>"><a href="<?php echo site_url().'home'?>">Inicio</a></li>
                                <li><a href="<?php echo site_url().'home/#features'?>" >Características</a></li>
                                <li class="<?php echo $active_buy;?>"><a href="<?php echo site_url().'buy';?>">¡Comprar!</a></li>
                                <li><a href="<?php echo site_url().'home/#contact';?>">Contacto</a></li>
                                <li class="<?php echo $active_login;?>"><a href="<?php echo site_url().'login';?>">Login</a></li>
                                <li class="<?php echo $active_faq;?>"><a href="<?php echo site_url().'faq';?>">FAQ</a></li>
                                <li>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
                                </li>
                            </ul>
		</div>
	</div>
	<!-- Home -->
        <!--CRIPTOCURRENCY-->
        <header id="comprarBitcoin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center margin-bottom-30">
                        <div class="icon_box_title">
                            <h1 class="title-currency margin-top100">Comprar criptomonedas nunca fue tan fácil! </h1>
                        </div>
                    </div>
                </div>
			<div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="col-md-6 hidden-sm  hidden-xs  margin-top-30 wow bounceInLeft animated animated" style="visibility: visible;">
                                    <img src="<?php echo site_url().'static/page_front/images/compra_btc.png';?>" alt="Comprar criptomoneda" title="Comprar criptomoneda" width="600">
                                </div>
                            </div>
                            <div class="col-md-1"> </div>
                            <div class="col-xs-5 col-md-5">
                                <form action="<?php echo site_url().'buy/bank';?>" method="post">
                                <div class="col-md-12 marginbottom15">
                                    <div id="bloqueGris-original" class="col-lg-12 bloqueGris">
                                        <div class="col-lg-12">
                                            <h4 class="question_currency">
                                                ¿Cuánto quieres comprar?
                                            </h4>
                                            <p class="p_currency">
                                                Introduce la cantidad en dólares que deseas comprar en criptomonedas.
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="calculador">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd fa-2x"></i>
                                                    </span>
                                                    <input class="form-control erroneous-input" onkeyup="validate_usd(this.value);" style="height: 44px; width: 50%;" data-val="true" id="price_dolar" name="price_dolar" placeholder="100" value="<?php echo $number_price?>" type="text">
                                                    <input type="hidden" name="price" id="price" value="<?php echo $btc_price;?>"/> 
                                                </div>
                                                <span id="message" style="font-size:11px; display: none;" class="field-validation-error" data-valmsg-for="Nombre" data-valmsg-replace="true"> El importe introducido no esta dentro del rango permitido. Rango permitido: 10 - 10000000</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 height-15"></div>    
                                    <div id="bloqueGris-original" class="col-lg-12 bloqueGris">
                                        <div class="col-lg-12">
                                            <h4 class="question_currency">¿Qué criptomoneda quieres?</h4>
                                            <p class="p_currency">Por el momento estamos trabajando con bitocon.</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="calculador">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-btc fa-2x"></i>
                                                    </span>
                                                    <input id="btc" name="btc" class="form-control erroneous-input" style="height: 44px; width: 50%;" data-val="true" placeholder="0" value="<?php echo $btc_price_10;?>" type="text">
                                                </div>
                                            </div>
                                            <span class="field-validation-valid error-message" data-valmsg-for="ImporteSolicitadoEur" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 height-15"></div>    
                                        <div class="text-center">
                                            <input id="submit" type="submit" class="submit_btn_comprar trans_300" value="Comprar">
                                                
                                        </div>
                                        <div class="margin-top-15">
                                            <a class="texto-enlace" href="<?php echo site_url().'faq';?>" target="_blank">
                                                    ¿Todavía sin monedero?
                                                </a>
                                        </div>
                                </div>
                                    </form>
                            </div>
                    </div>
            </div>
        </header>
        <!--END CRYPTOCURRENCY-->
	<!-- Footer -->
	<?php $this->load->view("footer");?>
        <!--END FOOTER-->
    </div>
<script src="<?php echo site_url().'static/page_front/js/buy.js';?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo site_url().'static/page_front/js/jquery-3.2.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/popper.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/TweenMax.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/TimelineMax.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/ScrollMagic.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/animation.gsap.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/ScrollToPlugin.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/slick.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/owl.carousel.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/jquery.scrollTo.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/easing.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/custom.js';?>"></script>
</body>
</html>