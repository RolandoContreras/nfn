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
                            $active_contact = "";

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
                                case 'contact':
                                    $active_contact = "active";
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
                                <li class="<?php echo $active_contact;?>"><a href="<?php echo site_url().'home/#contact';?>">Contacto</a></li>
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
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center margin-bottom-30">
                        <div class="icon_box_title">
                            <h1 class="title-currency-contact margin-top100">Rellena el formulario, estaremos encantados de ayudarte.</h1>
                        </div>
                    </div>
                </div>
			<div class="row">
                            <div class="col-md-4 hidden-xs panel-bitcoinDinero-col">
                                <p><span class="textogris">Porqué Easycripto</span></p>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-PagoSeguro">
                                            <i id="safe" class="fa fa-shield fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Pago seguro</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-Soporte">
                                            <i id="support" class="fa fa-ticket fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Soporte Personalizado</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-Competitivos">
                                            <i id="support" class="fa fa-trophy fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Los precios más competitivos</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-PagoSeguro">
                                            <i id="price" class="fa fa-check-circle fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Sin necesidad de registro</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-Soporte">
                                            <i id="record" class="fa fa-space-shuttle fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Tus Bitcoins en tiempo record</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-Competitivos">
                                            <i id="price" class="fa fa-certificate fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Tus Bitcoins garantizados</span>
                                    </div>
                                </div>
                                <div class="panelporqueComprar">
                                    <div class="porqueComprar">
                                        <span class="icon-Competitivos">
                                            <i id="safe" class="fa fa-user fa-2x"></i>
                                        </span>
                                        <span class="textoGrisInputs">Muy fáciles de comprar</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 panel-bitcoinDinero-col">
                            <p><span class="textogris">Datos de cliente</span></p>
                                    <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <span id="btcwallet-faq" class="fa fa-google-wallet fa-2x"></span>
                                            </span>
                                            <input type="text" onkeyup="fade_wallet(this.value);" class="form-control padding-right-27" id="wallet" name="wallet" placeholder="Ingresa tu wallet">
                                        </div>
                                        <span id="message_wallet" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Ingrese una wallet valida</span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <span id="email-faq" class="fa fa-check fa-2x sweet-11"></span>
                                            </span>
                                            <input type="text" onkeyup="fade_phone(this.value);" class="form-control" id="phone" name="phone" placeholder="Ingresa tu teléfono">
                                        </div>
                                        <span id="message_phone" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Ingrese su telefono</span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <span id="email-faq" class="fa fa-envelope fa-2x sweet-11"></span>
                                            </span>
                                            <input type="email" onkeyup="fade_email(this.value);" class="form-control" id="email" name="email" placeholder="Ingresa tu email" >
                                        </div>
                                        <span id="message_email" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Ingrese un email valido</span>
                                    </div>

                                    <p><span class="textogris">Métodos de pago</span></p>
                                    <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <input checked="checked" type="radio" name="radio" id="radio" value="1"/>
                                            </span>
                                            <span class="input-group-addon">
                                                <span id="telephone-faq" class="fa fa-credit-card fa-lg"></span>
                                            </span>
                                            <input type="text" class="form-control" disabled="disabled" placeholder="Tarjeta de débito / crédito +2%">
                                        </div>
                                        <span id="telephone-valid" class="glyphicon glyphicon-ok form-control-feedback success-glypp-bit-2 hidden" aria-hidden="true"></span>
                                    </div>    
                                        <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <input type="radio" name="radio" id="radio" value="2"/>
                                            </span>
                                            <span class="input-group-addon">
                                                <span id="telephone-faq" class="fa fa-university fa-lg"></span>
                                            </span>
                                            <input type="text" class="form-control" disabled="disabled" placeholder="Transferencia Bancaria">
                                        </div>
                                        <span id="telephone-valid" class="glyphicon glyphicon-ok form-control-feedback success-glypp-bit-2 hidden" aria-hidden="true"></span>
                                    </div>
                                </div>
                            
                            <div class="col-sm-4 panel-bitcoinDinero-col">
                            <p><span class="textoAzulClaro">Importe de la compra</span></p>
                            <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <span id="btcwallet-faq" class="fa fa-dollar-sign fa-2x"></span>
                                            </span>
                                            <input disabled="disabled" type="text" class="form-control padding-right-27"  value="<?php echo format_number_2decimal($price_dolar);?>">
                                            <input  type="hidden" id="price_dolar" name="price_dolar" value="<?php echo $price_dolar;?>">
                                        </div>
                                    </div>
                            <div class="form-group has-feedback">
                                        <div class="input-group bitcoinDineroDatos">
                                            <span class="input-group-addon">
                                                <span id="btcwallet-faq" class="fa fa-bitcoin fa-2x"></span>
                                            </span>
                                            <input type="text" disabled="disabled" class="form-control padding-right-27" value="<?php echo $btc;?>">
                                            <input  type="hidden" id="btc" name="btc" value="<?php echo $btc;?>">
                                        </div>
                                    </div>
<!--                                <div class="captcha">
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-theme="light" data-sitekey="6LdDdQwTAAAAAHlVZCFGbkSgSI8pf4zm5dpyLhWw"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdDdQwTAAAAAHlVZCFGbkSgSI8pf4zm5dpyLhWw&amp;co=aHR0cHM6Ly93d3cuYml0bm92by5jb206NDQz&amp;hl=es&amp;v=v1531759913576&amp;theme=light&amp;size=normal&amp;cb=cr8ibx6fxz6g" role="presentation" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" width="304" height="78" frameborder="0"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                                </div>-->
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 panel-bitcoinDinero-col margin-top-50">
                            <a href="<?php echo site_url().'buy';?>"><button class="submit_btn_comprar_back trans_300" value="Retrocede" type="submit">Retroceder</button></a>
                        </div>
                        <div class="col-sm-4 panel-bitcoinDinero-col margin-top-50">
                            <input id="submit" onclick="validate();" class="submit_btn_comprar_2 trans_300" value="Comprar" type="submit">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
        </header>
        <!--END CRYPTOCURRENCY-->
	<!-- Footer -->
	<?php $this->load->view("footer");?>
        <!--END FOOTER-->
    </div>
<script src="<?php echo site_url().'static/page_front/js/bank.js';?>"></script>
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