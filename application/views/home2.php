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
                <?php $this->load->view("nav");?>
		<!-- Hamburger -->
		<div class="hamburger_container bez_1">
                    <i class="fa fa-bars trans_200"></i>
		</div>
	</header>
	<!-- Menu -->
	<div class="menu_container">
		<div class="menu menu_mm text-right">
			<div class="menu_close"><i class="fa fa-times-circle trans_200"></i></div>
                           <ul>
                                <li class="active"><a href="<?php echo site_url().'home'?>">Inicio</a></li>
                                <li><a href="#features" >Características</a></li>
                                <li><a href="<?php echo site_url().'buy';?>">¡Comprar!</a></li>
                                <li><a href="#contact">Contacto</a></li>
                                <li><a href="<?php echo site_url().'login';?>">Login</a></li>
                                <li><a href="<?php echo site_url().'faq';?>">FAQ</a></li>
                                <li>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
                                </li>
                            </ul>
		</div>
	</div>
	<!-- Home -->
	<div class="home">
		<div class="home_background_container prlx_parent">
                    <div class="home_background prlx" style="background-image:url(<?php echo site_url().'static/page_front/images/slider_background.jpg';?>)"></div>
		</div>
		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<!-- Slider -->
			<div class="owl-carousel owl-theme hero_slider">
				<!-- Slider Item -->
				<div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
					<span></span>
                                        <span></span>
					<span>CRIPTOMONEDAS</span>
					<span>seguro, facil y rápido</span>
                                        <div class="button with250 icon_box_button trans_200" style="border: solid 2px #FFF !important;">
                                            <a href="#" style="color:#FFF !important;"class="trans_200 font-size">COMPRAR</a>
					</div>
                                        <span id="compra">COMPRA CRIPTOMONEDAS DE MANERA SEGURA</span>
                                        <div class="align-items-center justify-content-center">
                                            <div class="double_arrow nav_links rotare270" data-scroll-to=".icon_boxes">
                                                <i class="fa fa-chevron-left trans_200"></i>
                                                <i class="fa fa-chevron-left trans_200"></i>
                                            </div>
                                        </div>
				</div>
			</div>
			<!-- Hero Slider Navigation Left -->
			<div class="hero_slider_nav hero_slider_nav_left">
				<div class="hero_slider_prev d-flex flex-column align-items-center justify-content-center trans_200">
					<i class="fa fa-chevron-left trans_200"></i>
				</div>
			</div>
			<!-- Hero Slider Navigation Right -->
			<div class="hero_slider_nav hero_slider_nav_right">
				<div class="hero_slider_next d-flex flex-column align-items-center justify-content-center trans_200">
					<i class="fa fa-chevron-right trans_200"></i>
				</div>
			</div>
		</div>
		<div class="hero_side_text_container">
                    <div class="hero_side_text">
                        <div class="col-lg-2">
                            <div class="footer_col rotare90">
                                    <ul>
                                        <li class="padding_top_15"><a href="#"><i class="fa fa-facebook-f fa-2x"></i></a></li>
                                        <li class="padding_top_15"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                                        <li class="padding_top_15"><a href="#"><i class="fa fa-youtube fa-2x"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
		</div>
	</div>
        <!--CRIPTOCURRENCY-->
        <div class="icon_boxes">
        <section class="pricing-plane-area section_padding_100_70 clearfix padding_top_50" class="icon_boxes">    
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Heading Text  -->
                        <div class="section-heading text-center" id="coins">
                            <h1 class="title-currency">COMPRAR MONEDAS</h1>
                            <div class="line-shape"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row no-gutters">
                    <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" style="padding: 10px; visibility: visible; animation-name: fadeInUp;">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <!-- Package Text  -->
                            <div class="package-plan">
                                <img src="<?php echo site_url().'static/page_front/images/monedas/btc-logo.png';?>" alt="bitcoin" width="100">
                                <h5 class="currency_text">BITCOIN</h5>
                                <div class="ca-price d-flex justify-content-center">
                                    <h4><?php echo "$".$btc?></h4>                                   
                                </div>
                                <h6 style="color: #BCC0CA;">por moneda</h6>
                            </div>
                            <!-- Plan Button  -->
                            <div class="plan-button">
                                <a href="<?php echo site_url().'buy';?>">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" style="padding: 10px; visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;" data-wow-delay="0.3s">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <!-- Package Text  -->
                            <div class="package-plan">
                                <img src="<?php echo site_url().'static/page_front/images/monedas/cash-logo.jpg';?>" alt="bitcoin" width="170">
                                <h5 class="currency_text">BITCOIN CASH</h5>
                                <div class="ca-price d-flex justify-content-center">
                                    <h4><?php echo "$".$bch?></h4>
                                </div>
                                <h6 style="color: #BCC0CA;">por moneda</h6>
                            </div>
                            <!-- Plan Button  -->
                            <div class="plan-button">
                                <a href="<?php echo site_url().'buy';?>">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" style="padding: 10px; visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;" data-wow-delay="0.6s">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <!-- Package Text  -->
                            <div class="package-plan">
                                <img src="<?php echo site_url().'static/page_front/images/monedas/eth-logo.png';?>" alt="bitcoin" width="90">
                                <h5 class="currency_text">ETHEREUM</h5>
                                <div class="ca-price d-flex justify-content-center">
                                    <h4><?php echo "$".$eth?></h4>
                                </div>
                                <h6 style="color: #BCC0CA;">por moneda</h6>
                            </div>
                            <!-- Plan Button  -->
                            <div class="plan-button">
                                <a href="<?php echo site_url().'buy';?>">COMPRAR</a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" style="padding: 10px; visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;" data-wow-delay="0.9s">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <!-- Package Text  -->
                            <div class="package-plan">
                                <img src="<?php echo site_url().'static/page_front/images/monedas/dash-logo.png';?>" alt="bitcoin" width="100">
                                <h5 class="currency_text">DASH</h5>
                                <div class="ca-price d-flex justify-content-center">
                                    <h4><?php echo "$".$dash?></h4>
                                </div>
                                <h6 style="color: #BCC0CA;">por moneda</h6>
                            </div>
                            <!-- Plan Button  -->
                            <div class="plan-button">
                                <a href="<?php echo site_url().'buy';?>">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                   <div class="col-12  col-md-3 col-lg-3 ">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <div class="plan-button">
                            </div>
                        </div>
                    </div>
                   <div class="col-12  col-md-6 col-lg-6 wow fadeInUp" style="padding: 10px; visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;" data-wow-delay="0.9s">
                        <!-- Package Price  -->
                        <div class="single-price-plan text-center">
                            <div class="plan-button">
                                <a class="criptomonedas" href="<?php echo site_url().'allcurrency';?>">VER TODAS LAS MONEDAS</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </section>
            </div>
        <!--END CRYPTOCURRENCY-->
	<!-- Icon Boxes -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="icon_box_title">
                                <h1 class="future-adversing">FORMA PARTE DEL MUNDO DE LAS CRIPTOMONEDAS</h1>
                            </div>
                    </div>

                    <div class="col-lg-6 icon_box_col">
                            <!-- Icon Box Item -->
                            <div class="icon_box_item" style="text-align:center">
                                    <h2 class="atificial-text">RÁPIDO Y SENCILLO</h2>
                                    <p><img src="<?php echo site_url().'static/page_front/images/variedad.jpg';?>" alt="rápido" width="250"/> </p>
                            </div>
                            <!-- Icon Box Item -->
                            <div class="icon_box_item" style="text-align:center">
                                    <h2 class="atificial-text">AMPLIA COBERTURA DE SERVICIOS</h2>
                                    <p><img src="<?php echo site_url().'static/page_front/images/amplia.png';?>" alt="cobertura" width="250"/> </p>
                            </div>
                            
                    </div>
                    <div class="col-lg-6 icon_box_col">
                            <!-- Icon Box Item -->
                            <div class="icon_box_item" style="text-align:center">
                                    <h2 class="atificial-text">SEGURIDAD Y CONFIANZA</h2>
                                    <p><img src="<?php echo site_url().'static/page_front/images/seguridad.png';?>" alt="seguridad" width="250"/> </p>
                            </div>
                            
                            <!-- Icon Box Item -->
                            <div class="icon_box_item" style="text-align:center">
                                    <h2 class="atificial-text">SIN INTERMEDIARIOS</h2>
                                    <p><img src="<?php echo site_url().'static/page_front/images/intermediarios.png';?>" alt="intermediarios" width="400"/> </p>
                            </div>
                    </div>
                </div>
            </div>
	<div class="services" id="features">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h1>¿POR QUÉ ELEGIR EASYCRIPTO?</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="h_slider_container services_slider_container">
			<div class="service_slider_outer">
				<!-- Services Slider -->
				<div class="owl-carousel owl-theme services_slider">
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                            <i class="fa fa-ticket icon" aria-hidden="true"></i>
									</div>
									<h2>Soporte Personalizado</h2>
								</div>
								<p>Atención personalizada para la compra de criptomonedas.</p>
							</div>
						</div>
					</div>
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                                <i class="fa fa-certificate icon"></i>
									</div>
									<h2>Servicios Exclusivos</h2>
								</div>
								<p>Destinado a grandes inversionistas con una atención preferente.</p>
							</div>
						</div>
					</div>
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                                <i class="fa fa-shield icon"></i> 
									</div>
									<h2>Plataforma Segura</h2>
								</div>
								<p>Plataforma 100% segura durante todo el proceso de compras de criptomonedas.</p>
							</div>
						</div>
					</div>
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                                <i class="fa fa-area-chart icon"></i>
									</div>
									<h2>Innovaciones</h2>
								</div>
								<p>Conectado y adaptado a cualquier dispositivo para simplificar y agilizar los procesos de pago y gestión de la información.</p>
							</div>
						</div>
					</div>
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                                <i class="fa fa-fighter-jet icon" aria-hidden="true"></i>
									</div>
									<h2>Rapidez</h2>
								</div>
								<p>Obtenga sus criptomonedas de la forma más rápida y eficiente.</p>
							</div>
						</div>
					</div>
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
                                                                                <i class="fa fa-users icon"></i>
									</div>
									<h2>Equipo</h2>
								</div>
								<p>Profesionales del mundo de las criptomonedas y las finanzas analizan en todo momento el mercado para ofrecer la mejor atención al cliente.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="services_slider_nav services_slider_nav_left"><i class="fas fa-chevron-left trans_200"></i></div>
				<div class="services_slider_nav services_slider_nav_right"><i class="fas fa-chevron-right trans_200"></i></div>

			</div>
		</div>
	</div>
        
        
	<div class="cta">
		<div class="cta_background" style="background-color:#452b78"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-5 order-lg-1 order-2">
					<div class="cta_content">
						<h1>Servicio exclusivo para grandes inversores</h1>
						<p>Servicio exclusivo enfocado a clientes que quieran adquirir Criptomonedas por un valor igual o superior a 50.000€. Easycripto te brindará una atención preferente y personalizada para la gestión de sus activos.</p>
                                                 <div class="button icon_box_button trans_200 with250" style="border: solid 2px #FFF !important;">
                                                     <a href="<?php echo site_url().'contact/invest';?>" style="color:#FFF !important;"class="trans_200 ">CONTACTE CON NOSOTROS</a>
                                                </div>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-1 order-lg-2 order-1">
					<div class="cta_image d-flex flex-column justify-content-end">
                                            <img src="<?php echo site_url().'static/page_front/images/tablet.png';?>" alt="clientes exclusivos">
					</div>
				</div>
			</div>
		</div>
	</div>
        
        <div class="services" id="contact">
        <div class="container" >
            <div class="row contact_row">
                <div class="col text-center">
                    <div class="section_title">
                        <h1>CONTACTO</h1>
                        <p class="under_header_p">Mantente en contacto con nosotros llenando el formulario de contacto <br>Realiza todas las preguntas que tengas y responderemos a la brevedad.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Reply -->
                    <div class="reply">
                        <div class="reply_form_container">
                            <!-- Reply Form -->
                            <form id="reply_form">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <div class="wow bounceInLeft animated animated" style="visibility: visible;">
                                            <input class="form-control" onkeyup="fade_name(this.value);" id="name" name="name" placeholder="Indicanos tu nombre" type="text">
                                            <span id="message_name" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El Nombre es requerido</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <div class="wow bounceInLeft animated animated" style="visibility: visible;">
                                            <input class="form-control" onkeyup="fade_email(this.value);" id="email" name="email" placeholder="Indicanos tu email" type="email">
                                        <span id="message_email" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El Email es requerido</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 margin-top-20"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="wow bounceInLeft animated animated" style="visibility: visible;">
                                            <input class="form-control" onkeyup="fade_subject(this.value);" id="subject" name="subject" placeholder="Indicanos el Asunto" type="text">
                                            <span id="message_subject" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El Asunto es requerido</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 margin-top-20"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="wow bounceInLeft animated animated" style="visibility: visible;">
                                            <textarea class="form-control" onkeyup="fade_comments(this.value);" cols="20" data-val="true" id="comments" name="comments" rows="3" placeholder="Indicanos tu Comentarios"></textarea>
                                            <span id="message_comments" class="field-validation-error" style="display:none;" data-valmsg-for="Nombre" data-valmsg-replace="true">El Comentario es requerido</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input onclick="send_messages_home();"  style="cursor: pointer" class="reply_submit_btn trans_300" value="Enviar formulario"/>
                                </div>
                            </form>
                            <br/>
                            <div id="messages" class="alert alert-success" style="text-align: center; display: none;">Enviado Correctamente.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
	<!-- Footer -->
	<?php $this->load->view("footer");?>
        <!--END FOOTER-->
    </div>
<script src="<?php echo site_url().'static/page_front/js/contact_home.js';?>"></script>
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