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
  <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/main.css';?>" type="text/css"/>
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
                        <div id="text-6-6-0-0" class="module module-text text-6-6-0-0 repeat">
                          <h2>EVENTOS</h2>
                        </div>
                            <div class="limiter">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Fecha</th>
									<th class="cell100 column2">Evento</th>
									<th class="cell100 column3">Hora</th>
									<th class="cell100 column4">Expositor</th>
									<th class="cell100 column5">Flyer</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
                                                    <tbody>
                                                        <?php
                                                        if(count($obj_events) > 0){
                                                            foreach ($obj_events as $key => $value) { ?>
                                                            <tr class="row100 body">
                                                                <td class="cell100 column1"><?php echo formato_fecha_barras($value->date);?></td>
                                                                <td class="cell100 column2"><?php echo $value->name;?></td>
                                                                <td class="cell100 column3"><?php echo formato_hora($value->time);?></td>
                                                                <td class="cell100 column4"><?php echo $value->expositor;?></td>
                                                                <td class="cell100 column5">
                                                                    <a href="<?php echo site_url().'static/cms/images/events/'.$value->img;?>" download><img src="<?php echo site_url().'static/cms/images/events/'.$value->img;?>" alt="<?php echo $value->name;?>" width="70"/></a>
                                                                </td>
                                                            </tr>
                                                        <?php } 
                                                        }else{ ?>
                                                            <tr class="row100 body">
                                                                <td class="cell100 column5" colspan="5" align="center">NO HAY EVENTOS</td>
                                                            </tr>
                                                        <?php } ?>
                                                        
                                                        
                                                        
                                                    </tbody>
						</table>
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
      </div>
    </div>
    <div id="footerwrap">
      <?php $this->load->view("footer");?>
    </div>
  </div>
  <script type='text/javascript'>
    /* <![CDATA[ */
    var themify_vars = {"version":"4.0.0","url":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/themes\/themify-ultra\/themify","map_key":null,"includesURL":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-includes\/","isCached":null,"minify":{"css":{"themify-icons":false,"themify.framework":false,"lightbox":false,"themify-builder-style":false},"js":{"backstretch.themify-version":false,"bigvideo":false,"themify.dropdown":false,"themify-tiles":false,"themify.mega-menu":false,"themify.builder.script":false,"themify.scroll-highlight":false,"themify-youtube-bg":false,"themify.parallaxit":false,"themify.ticks":false}}};
    var tbLocalScript = {"isAnimationActive":"1","isParallaxActive":"1","isParallaxScrollActive":"1","animationInviewSelectors":[".module.wow",".module_row.wow",".builder-posts-wrap > .post.wow"],"backgroundSlider":{"autoplay":5000,"speed":2000},"animationOffset":"100","videoPoster":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/themes\/themify-ultra\/themify\/themify-builder\/img\/blank.png","backgroundVideoLoop":"yes","builder_url":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/themes\/themify-ultra\/themify\/themify-builder","framework_url":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/themes\/themify-ultra\/themify","version":"4.0.0","fullwidth_support":"1","fullwidth_container":"body","loadScrollHighlight":"1","addons":{"builder_contact":{"js":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/plugins\/builder-contact\/assets\/scripts.js","css":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/plugins\/builder-contact\/assets\/style.css","ver":"1.2.8","selector":".module-contact","external":"var BuilderContact = {\"admin_url\":\"https:\\\/\\\/themify.me\\\/demo\\\/themes\\\/ultra-app\\\/wp-admin\\\/admin-ajax.php\"};"},"contact":{"selector":".module-contact","css":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/plugins\/builder-contact\/assets\/style.css","js":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/plugins\/builder-contact\/assets\/scripts.js","external":"var BuilderContact = {\"admin_url\":\"https:\\\/\\\/themify.me\\\/demo\\\/themes\\\/ultra-app\\\/wp-admin\\\/admin-ajax.php\"};","ver":"1.2.8"},"pricing-table":{"selector":".module-pricing-table","css":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-content\/plugins\/builder-pricing-table\/assets\/style.css","ver":"1.1.3"}},"breakpoints":{"tablet_landscape":[769,"1280"],"tablet":[681,"768"],"mobile":"680"},"ticks":{"tick":30,"ajaxurl":"https:\/\/themify.me\/demo\/themes\/ultra-app\/wp-admin\/admin-ajax.php","postID":6}};
    var themifyScript = {"lightbox":{"lightboxSelector":".themify_lightbox","lightboxOn":true,"lightboxContentImages":false,"lightboxContentImagesSelector":"","theme":"pp_default","social_tools":false,"allow_resize":true,"show_title":false,"overlay_gallery":false,"screenWidthNoLightbox":600,"deeplinking":false,"contentImagesAreas":"","gallerySelector":".gallery-icon > a","lightboxGalleryOn":true},"lightboxContext":"body"};
    var tbScrollHighlight = {"fixedHeaderSelector":"#headerwrap.fixed-header","speed":"900","navigation":"#main-nav, .module-menu .menu-bar","scrollOffset":"-5","scroll":"internal"};
    /* ]]> */
  </script>
  <link href="<?php echo site_url().'static/page_front/css/demo.css';?>" rel="stylesheet"/>
  <link href="<?php echo site_url().'static/page_front/css/slide.css';?>" rel="stylesheet"/>
  <script src="<?php echo site_url().'static/page_front/js/modernizr.js';?>"></script>
  <script src='<?php echo site_url().'static/page_front/js/bootstrap.min.js';?>'></script>
  <script src='<?php echo site_url().'static/page_front/js/main.js?ver=4.0.0';?>'></script>
  <script src='<?php echo site_url().'static/page_front/js/imagesloaded.min.js?ver=3.2.0';?>'></script>
  <script src='<?php echo site_url().'static/page_front/js/themify.sidemenu.js?ver=2.0.2';?>'></script>
  <script src='<?php echo site_url().'static/page_front/js/themify.script.js?ver=2.0.2';?>'></script>
  <script src='<?php echo site_url().'static/page_front/js/comment-reply.min.js?ver=4.9.7';?>'></script>
</body>
</html>
