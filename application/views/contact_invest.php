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
                        <div class="panelporqueComprar">
                            <div class="porqueComprar">
                                <span class="icon-PagoSeguro">
                                    <i id="safe" class="fa fa-shield fa-2x"></i>
                                </span>
                                <span class="textoGrisInputs">
                                    Pago seguro
                                </span>
                            </div>
                        </div>
                        <div class="panelporqueComprar">
                            <div class="porqueComprar">
                                <span class="icon-Soporte">
                                    <i id="support" class="fa fa-ticket fa-2x"></i>
                                </span>
                                <span class="textoGrisInputs">
                                    Soporte Personalizado
                                </span>
                            </div>
                        </div>
                        <div class="panelporqueComprar">
                            <div class="porqueComprar">
                                <span class="icon-Competitivos">
                                    <i id="price" class="fa fa-certificate fa-2x"></i>
                                </span>
                                <span class="textoGrisInputs">
                                    Los precios más competitivos
                                </span>
                            </div>
                        </div>

                    </div>
                            <div class="col-md-8 panel-bitcoinDinero-col">
                                <form method="post" action="">                        
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="active">Nombre</label>
                                        <input class="form-control" onkeyup="fade_name(this.value);" id="name" name="name" placeholder="Indicanos tu nombre" type="text">
                                        <span id="message_name" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El Nombre es requerido</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="active">Email</label>
                                        <input autocomplete="off" onkeyup="fade_email(this.value);" class="form-control" data-val="true" data-val-required="Rellena el formulario, estaremos encantados de ayudarte." id="email" name="email" placeholder="Indicanos tu email" type="email">
                                        <span id="message_email" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Un email válido es requerido</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input autocomplete="off" onkeyup="fade_phone(this.value);" class="form-control" id="phone" name="phone" placeholder="Teléfono" type="phone">
                                        <span id="message_phone" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El teléfono es requerido</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="active">Empresa</label>
                                        <input autocomplete="off" class="form-control" id="company" name="company" placeholder="Empresa" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Comentarios</label>
                                        <textarea class="form-control" onkeyup="fade_comments(this.value);" cols="20" data-val="true" id="comments" name="comments" rows="3"></textarea>
                                        <span id="message_comments" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Debes introducir tus comentarios</span>
                                    </div>
<!--                                    <div class="captcha">
                                        <script src="https://www.google.com/recaptcha/api.js"></script>
                                        <div class="g-recaptcha" data-theme="light" data-sitekey="6LdDdQwTAAAAAHlVZCFGbkSgSI8pf4zm5dpyLhWw"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdDdQwTAAAAAHlVZCFGbkSgSI8pf4zm5dpyLhWw&amp;co=aHR0cHM6Ly93d3cuYml0bm92by5jb206NDQz&amp;hl=es&amp;v=v1531759913576&amp;theme=light&amp;size=normal&amp;cb=jsl2be4lq8xd" role="presentation" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" width="304" height="78" frameborder="0"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                                    </div>-->
                                    <div class="blockacepta">
                                        <div class="checkbox">
                                            <label>
                                                <input data-val="true" id="term" name="term"  onClick="fade_term(this.value);"value="true" type="checkbox"><input name="AceptoTerminos" value="false" type="hidden">
                                                Acepto la <a class="blue-color-link" href="<?php echo site_url().'notice/privacy'?>" target="_blank">política de privacidad</a>.
                                            </label>
                                            <span id="message_term" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">Acepto Terminos no debe estar vacío</span>
                                        </div>
                                    </div>
                                <input onclick="send_messages();"  style="cursor: pointer" class="reply_submit_btn trans_300" value="Enviar formulario"/>
                                </form>
                                <br/>
                                <div id="messages" class="alert alert-success" style="text-align: center; display: none;">Enviado Correctamente.</div>
                    </div>
                    </div>
            </div>
        </header>
        <!--END CRYPTOCURRENCY-->
	<!-- Footer -->
	<?php $this->load->view("footer");?>
        <!--END FOOTER-->
    </div>
<script src="<?php echo site_url().'static/page_front/js/contact_invest.js';?>"></script>
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