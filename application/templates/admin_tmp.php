<!DOCTYPE html>
<html lang="en">	
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:29 GMT -->
    <head>
        <meta charset="utf-8">
        <title>CMS - NFN</title>
        <base href="<?php echo site_url();?>">
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
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url().'static/page_front/images/favicon/favicon.ico';?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url().'static/page_front/images/favicon/favicon.ico';?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow" />
        <!-- CSS -->
        <link href="static/cms/css/core/bootstrap.css" rel="stylesheet">	
        <link href="static/cms/css/core/combine_fonts.css" rel="stylesheet">	
        <link href="static/cms/css/core/buttons.css" rel="stylesheet">
        <link href="static/cms/css/core/cms.css" rel="stylesheet">
        <link href="static/cms/css/style.css" rel="stylesheet">
        <!-- color style -->
        <link href="static/cms/css/core/dark.css" rel="stylesheet">
        <link href="static/cms/css/core/bootstrap-responsive.css" rel="stylesheet">
        <link href="static/cms/plugins/datepicker/css/datepicker.css" rel="stylesheet">
        <link href="static/cms/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="plugins/html5.js"></script>
        <![endif]-->
        <script src="static/cms/js/core/jquery.js"></script>        
        <script src="static/cms/plugins/wysiwyg/wysihtml5-0.3.0_rc3.min.js"></script>
        <script src="static/cms/js/core/bootstrap.js"></script>	                    
        <script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="static/cms/js/browserplus-min.js"></script>
        <script type="text/javascript" src="static/cms/plugins/plupload/js/plupload.full.js"></script>
        <script type="text/javascript" src="static/cms/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
        <script src="static/cms/js/core/jquery.validate.min.js"></script>
        <script src="static/cms/js/core/bootstrap-alert.js"></script>
        <script src="static/cms/js/demo.js"></script>
        <script src="static/cms/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript">
            var site = '<?php echo site_url();?>';
        </script>
        <script src="https://use.fontawesome.com/3aa4a6fd0b.js"></script>
    </head>
<body>
<!-- top fixed navbar -->
    <div id="header" class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo site_url();?>dashboard/panel">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo.png'?>" alt="logo" width="55"></a>
                <div class="btn-toolbar pull-right">                        
                <!-- /btn-group -->
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <img class="image_icons" src="<?php echo site_url().'static/cms/png/user91.png';?>"> 
                                <?php echo $_SESSION['usercms']['name'];?>
                                <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu megamenu col2 ud">
                                <ul>
                                    <a href="<?php echo site_url().'dashboard/logout';?>"><img class="image_icons" src="<?php echo site_url().'static/cms/png/door9.png';?>"> Cerrar Session</a>
                                </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- top fixed navbar -->
    <div class="container-fluid">
        <div class="row-fluid">
                <!-- sidebar -->
            <div id="sidebar" class="span2">			
                    <div class="accordion custom-acc" id="accordionSB">
                            <div class="accordion-group fs">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#dashboardsb">
                                        Mantenimientos  
                                        </a>
                                    </div>
                                    <div id="dashboardsb" class="accordion-body collapse">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li><a href="<?php echo site_url()."dashboard/panel";?>"><i class="icon-large icon-th"></i>Panel</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/bonos";?>"><i class="icon-large icon-th"></i>Bonos</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/box";?>"><i class="icon-large icon-th"></i>Box</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/clientes";?>"><i class="icon-large icon-th"></i>Clientes</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/eventos";?>"><i class="icon-large icon-th"></i>Eventos</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/comisiones";?>"><i class="icon-large icon-th"></i>Comisiones</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/comentarios";?>"><i class="icon-large icon-th"></i>Comentarios</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/informativos";?>"><i class="icon-large icon-th"></i>Mensajes Informativos</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/noticias";?>"><i class="icon-large icon-th"></i>Noticias</a></li>
                                            <?php if($_SESSION['usercms']['privilage'] == 2){ ?>
                                            <li><a href="<?php echo site_url()."dashboard/usuarios";?>"><i class="icon-large icon-th"></i>Usuarios</a></li>
                                            <?php } ?>
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#sell">
                                    Ventas / Activaciones
                                    </a>
                                </div>
                                <div id="sell" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/activaciones_clientes";?>"><i class="icon-large icon-th"></i>Activaciones Clientes</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/activaciones_consumos";?>"><i class="icon-large icon-th"></i>Activaciones Consumos</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><i class="icon-large icon-th"></i>Ventas</a>
                                            </li>
                                        </ul>                                     
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#pay">
                                    Pagos Comisiones
                                    </a>
                                </div>
                                <div id="pay" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/pagos";?>"><i class="icon-large icon-th"></i>Pagos</a>
                                            </li>
                                        </ul>                                     
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#report">
                                    Reportes
                                    </a>
                                </div>
                                <div id="report" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="javascript:void(0);"><i class="icon-large icon-th"></i>Total Comisiones</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><i class="icon-large icon-th"></i>Comisión x Asociado</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><i class="icon-large icon-th"></i>Asociados</a>
                                            </li>
                                        </ul>                                     
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <!-- sidebar 

            <!-- main content -->
            <div id="main_content" class="span10">
                <div class="widget_container">
                    <div class="well nomargin">
                        <ul class="breadcrumbs-custom in-well">
                            <li><a href="<?php echo $link_modulo?>"><?php echo $modulos?></a></li>                            
                            <li class="active"><?php echo $seccion;?></li>
                        </ul>
                    </div>
                </div>                
                <?php echo $body; ?>	
            </div>
            <!-- main content -->
        </div>
    </div>

</body>
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:36 GMT -->
</html>