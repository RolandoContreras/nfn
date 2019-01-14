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
                          <p>Rellene el registro abajo para formar parte de nuestra red</p>
                        </div>
                        <div class="themify_builder_sub_row module_subrow clearfix sub_row_6-0-1">
                          <div class="subrow_inner gutter-none col_align_top">
                            <div class="col4-1 sub_column module_column first sub_column_post_6 sub_column_6-0-1-0">
                            </div>
                            <div class="col4-2 sub_column module_column middle sub_column_post_6 sub_column_6-0-1-1">
                              <div class="tb-column-inner">
                                <div id="contact-6-sub_row_6-0-1-1-0" class="module module-contact contact-6-sub_row_6-0-1-1-0 contact-animated-label  ">
                                  <form class="builder-contact" action="javascript:void(0);" method="post" onsubmit="register();" enctype="multipart/form-data">
                                    <div class="contact-message"></div>
                                    <div class="builder-contact-fields">
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                          <p class="text-contact">Nombres<span class="required">*</span></p>
                                          <input type="text" name="name" id="name" onkeyup="fade_name(this.value);" class="form-control"/>
                                          <span id="message_name" class="field-validation-error" style="display:none;">El Nombre es requerido</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                          <p class="text-contact">Apellidos<span class="required">*</span></p>
                                          <input type="text" name="last_name" id="last_name" onkeyup="fade_last_name(this.value);" class="form-control"/>
                                          <span id="message_last_name" class="field-validation-error" style="display:none;">Los apellidos son requeridos</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">Email<span class="required">*</span></p>
                                            <input type="email" name="email" id="email" onkeyup="fade_email(this.value);" class="form-control"/>
                                            <span id="message_email" class="field-validation-error" style="display:none;">El Email es requerido</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">DNI<span class="required">*</span></p>
                                            <input type="text" name="dni" id="dni" onkeyup="fade_dni(this.value);" class="form-control"/>
                                            <span id="message_dni" class="field-validation-error" style="display:none;">El dni es requerido</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">Teléfono<span class="required">*</span></p>
                                            <input type="text" name="phone" id="phone" onkeyup="fade_phone(this.value);" class="form-control"/>
                                            <span id="message_phone" class="field-validation-error" style="display:none;">El teléfono es requerido</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">Contraseña<span class="required">*</span></p>
                                            <input type="password" name="pass" id="pass" onkeyup="fade_pass(this.value);" class="form-control"/>
                                            <span id="message_pass" class="field-validation-error" style="display:none;">La contraseña es requerida</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">Confirmar contraseña<span class="required">*</span></p>
                                            <input type="password" name="pass2" id="pass2" onkeyup="fade_pass2(this.value);" class="form-control"/>
                                            <span id="message_pass2" class="field-validation-error" style="display:none;">La confirmación es requerida</span>
                                            <span id="message_pass3" class="field-validation-error" style="display:none;">Las contraseñas no coinciden</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-message builder-contact-textarea-field" data-order="">
                                       <p class="text-contact">Dirección<span class="required">*</span></p>
                                        <div class="control-input">
                                          <textarea name="address" onkeyup="fade_address(this.value);" id="address" rows="8" cols="45" class="form-control"></textarea>
                                          <span id="message_address" class="field-validation-error" style="display:none;">La dirección es requerida</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-message builder-contact-textarea-field" data-order="">
                                       <p class="text-contact">País<span class="required">*</span></p>
                                        <div class="control-input">
                                            <select onchange="validate_region(this.value);" name="pais" id="pais">
                                                <option  selected value="">Seleccionar</option>
                                                    <?php  foreach ($obj_paises as $key => $value) { ?>
                                                           <option style="border-style: solid !important" value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                                                    <?php } ?>
                                            </select>
                                                <span id="message_pais" class="field-validation-error" style="display:none;">El país es requerido</span>
                                        </div>
                                      </div>
                                     <div class="builder-contact-field builder-contact-field-message builder-contact-textarea-field" data-order="">
                                       <p class="text-contact">Región<span class="required">*</span></p>
                                        <div class="control-input">
                                            <select name="region" id="region" style="margin-bottom: 10px;">
                                                <option  selected="selected" value="">Seleccionar</option>
                                            </select>
                                            <span id="message_region" class="field-validation-error" style="display:none;">La regíón es requerido</span>
                                        </div>
                                      </div>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <p class="text-contact">Ciudad<span class="required">*</span></p>
                                            <input type="text" name="city" id="city" onkeyup="fade_ciudad(this.value);" class="form-control"/>
                                            <span id="message_city" class="field-validation-error" style="display:none;">La ciudad es requerida</span>
                                        </div>
                                      </div>
                                      <br/>
                                      <div class="builder-contact-field builder-contact-field-subject builder-contact-text-field">
                                        <div class="control-input">
                                            <button id="submit"class="btn btn-primary"> Siguiente </button><br/><br/>
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