<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Inicio de Sesión | New Future Network</title>
<link rel="icon" href="images/favicons/favicon.ico">
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
        <p class="login-box-msg">Sign in to start your session</p>
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
