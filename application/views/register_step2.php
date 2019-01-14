<!DOCTYPE html>
<html lang="es">
<!--STAR HEAD-->
<?php $this->load->view("head");?>
<!--END HEAD-->
<body class="home page-template-default page page-id-6 themify-fw-4-0-0 themify-ultra-2-0-2 skin-app webkit not-ie full_width sidebar-none no-touch builder-parallax-scrolling-active ready-view header-horizontal fixed-header transparent-header footer-left-col  tagline-off rss-off search-off header-widgets-off footer-menu-navigation-off tile_enable filter-hover-none filter-featured-only masonry-enabled">
  <script type="text/javascript">
    function themifyMobileMenuTrigger(e) {
            if( document.body.clientWidth > 0 && document.body.clientWidth <= tf_mobile_menu_trigger_point ) {
                    document.body.classList.add( 'mobile_menu_active' );
            } else {
                    document.body.classList.remove( 'mobile_menu_active' );
            }
    }
    themifyMobileMenuTrigger();
    document.addEventListener( 'DOMContentLoaded', function () {
            jQuery( window ).on('tfsmartresize.tf_mobile_menu', themifyMobileMenuTrigger );
    }, false );
  </script>
  <div id="pagewrap" class="hfeed site">
    <div id="headerwrap">
      <div class="header-icons">
        <a id="menu-icon" href="#mobile-menu"><span class="menu-icon-inner"></span></a>
      </div>
      <header id="header" class="pagewidth clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        <div class="header-bar">
          <div id="site-logo">
              <a href="<?php echo site_url();?>" title="NFN">
                  <span>
                      <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="nfn-logo" width="60"/>
                  </span>
              </a>
          </div>
        </div>
        <!-- /.header-bar -->
        <div id="mobile-menu" class="sidemenu sidemenu-off">
          <div class="navbar-wrapper clearfix">
            <div class="social-widget">
            </div>
            <!-- /.social-widget -->
            <?php $this->load->view("nav");?>
            <!-- /#main-nav-wrap -->
          </div>
          <a id="menu-icon-close" href="#"></a>
        </div>
      </header>
    </div>
    <div id="body" class="clearfix">
      <div id="layout" class="pagewidth clearfix">
        <div id="content" class="clearfix">
          <div id="page-6" class="type-page">
            <div class="page-content entry-content">
              <div id="themify_builder_content-6" data-postid="6" class="themify_builder_content themify_builder_content-6 themify_builder">
                <!-- START CONTACT -->
                <div class="themify_builder_row module_row clearfix repeat tb_section-contact module_row_6 themify_builder_6_row module_row_6-6">
                  <div class="row_inner col_align_top margin-top-8">
                    <div class="module_column tb-column col-full first tb_6_column module_column_0 module_column_6-6-0 padding-top34">
                      <div class="tb-column-inner">
                        <div id="text-6-6-0-0" class="module module-text text-6-6-0-0  repeat  ">
                          <h2>REGISTRO</h2>
                        </div>
                        <div class="themify_builder_sub_row module_subrow clearfix sub_row_6-0-1">
                          <div class="subrow_inner gutter-none col_align_top">
                            <div class="col4-1 sub_column module_column first sub_column_post_6 sub_column_6-0-1-0">
                            </div>
                            <div class="col4-2 sub_column module_column middle sub_column_post_6 sub_column_6-0-1-1">
                              <div class="tb-column-inner">
                                <div id="contact-6-sub_row_6-0-1-1-0" class="module module-contact contact-6-sub_row_6-0-1-1-0 contact-animated-label  ">
                                  <form class="builder-contact" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                                    <div class="contact-message"></div>
                                    <div class="builder-contact-fields">
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                          <p class="text-contact">Ingrese el código de su Patrocinador<span class="required">*</span></p>
                                          <input type="text" name="code" id="code" onkeyup="fade_code(this.value);" class="form-control"/>
                                          <span id="message_code" class="field-validation-error" style="display:none;">El código es requerido</span>
                                          <input type="hidden" name="code_real" id="code_real" value="0"/>
                                        </div>
                                          <div class="alert-0"></div>
                                          <br/>
                                          <div class="control-input">
                                              <button type="button" class="Botao2 text-verify" onclick="verify_code();">Verificar código</button>
                                        </div>
                                      </div>
                                      <br/>
                            <div id="CadastroPasso2">
                                        <div class="centralizar_2">
                                            <div class="tituloPagina">ELIJA SU KIT</div>
                                                <p class="text-contact-2">¡Hola!&nbsp;<?php echo $_SESSION['new_customer']['name'];?>! Ahora usted puede elegir el kit que desea consumir. Recordando que se puede cambiar posteriormente en su oficina virtual.<span class="required">*</span></p>
                                                    <div class="BlocoPrincipal">
                                                        <?php foreach ($obj_box as $value) { ?>
                                                                <div class="Blocos">
                                                                    <div class="TituloKit">
                                                                        <span class="alignCenter_title"><?php echo $value->name?></span>
                                                                    </div>
                                                                    <div class="ImagemKit">
                                                                        <span class="alignCenter">
                                                                            <img src='<?php echo site_url()."static/backoffice/images/box/$value->img";?>' alt="<?php echo $value->name?>">
                                                                        </span>
                                                                    </div>
                                                                    <div class="ValorKit">
                                                                        <div class="Valor">Precio: <?php echo format_number_moneda_soles($value->price);?></div>
                                                                    </div>
                                                                    <div class="BotoesKit">
                                                                        <div class="Botao">
                                                                            <span class="Botao2">
                                                                                <input type="radio" class="radio_box" name="box" name="box" value="<?php echo $value->box_id?>" <?php if($value->box_id == 1){echo "checked";}?>> Seleccionar Box<br>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        <?php } ?>
                                                </div>
                                        </div>
                                     </div>
                                      <br/>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <button id="submit" disabled="" onclick="crear();" class="btn btn-primary"> Crear Registro </button><br/><br/>
                                            <div id="messages_respose" class="alert alert-success" style="text-align: center; display: none;">Registro Creado Exitosamente.</div>
                                            <div id="messages_respose_2" class="alert alert-danger" style="text-align: center; display: none;">Usuario Invalido.</div>
                                        </div>
                                      </div>
                                     </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="col4-1 sub_column module_column last sub_column_post_6 sub_column_6-0-1-2">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footerwrap">
      <?php $this->load->view("footer");?>
    </div>
  </div>
  <script src="<?php echo site_url().'static/page_front/js/register.js';?>"></script>
  <!-- wp_footer -->
  <link rel='stylesheet' href='<?php echo site_url().'static/page_front/css/step2.css';?>' media='all'/>
  <script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?php echo site_url().'static/login/js/jquery-2.2.3.min.js';?>'></script>
<script src="<?php echo site_url().'static/page_front/js/login.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/fastclick.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/app.min.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/demo.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/icheck.min.js.js';?>"></script>
</body>
</html>