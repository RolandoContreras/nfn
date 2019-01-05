<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Inicio de Sesión | New Future Network</title>
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
<!--END FAVICON-->
<link rel="apple-touch-icon" href="images/favicons/apple-touch-icon.png">
<link rel="stylesheet" href="<?php echo site_url().'static/login/css/bootstrap.min.css';?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo site_url().'static/login/css/AdminLTE.min.css';?>">
<link rel="stylesheet" href="<?php echo site_url().'static/login/css/all-skins.min.css';?>">
<script>
    var site = '<?php echo site_url();?>';
</script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin:1% auto;">
    <div class="login-logo">
        <b>
            <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>">
        </b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Iniciar Sesión</p>
        <form method="post" action="javascript:void(0);" onsubmit="login();" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" name="code"  placeholder="Código Usuario" class="form-control" id="code"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control" id="pass"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <div class="g-recaptcha" data-sitekey="6Lc684YUAAAAAKbiFYJvMx83vmSSJHH8N03PXnKx"></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="no_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">El usuario y/o contraseña incorrectas.</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="captcha_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Captcha no verificado</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="messages">
                    <div class="alert alert-success validation-errors">
                        <p class="user_login_id" style="text-align: center;">Bienvenido.</p>
                    </div>
                </div>
                <div class="form-group has-feedback"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <button id="submit" onclick="login();" class="btn btn-primary btn-block btn-flat">Inicio de Sesión</button>
                    </div>
                </div>
            </form>
		<div class="text-center">
        	<p>&nbsp;</p>
                <p><a href="<?php echo site_url().'forgot';?>">¿Olvidaste tu contraseña?</a></p>
		</div>
    </div>
</div>
</body>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?php echo site_url().'static/login/js/jquery-2.2.3.min.js';?>'></script>
<script src="<?php echo site_url().'static/page_front/js/login.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/fastclick.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/app.min.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/demo.js';?>"></script>
<script src="<?php echo site_url().'static/login/js/icheck.min.js.js';?>"></script>
</html>
