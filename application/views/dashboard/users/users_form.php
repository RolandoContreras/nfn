<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<link href="<?php echo site_url();?>static/cms/plugins/tags/chosen.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/plugins/tags/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>static/cms/js/users.js"></script>
<script src="<?php echo site_url();?>static/cms/plugins/ckeditor/ckeditor.js"></script>
<!-- main content -->

<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/usuarios/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Usuarios</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
              <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($obj_users)?$obj_users->user_id:"";?>">
              <strong>Usuario:</strong><br> 
              <input type="text" id="email" name="email" value="<?php echo isset($obj_users->email)?$obj_users->email:"";?>" class="input-xlarge-fluid" placeholder="Correo Electrónico">
              <br><br>
              <strong>Contraseña:</strong><br> 
              <input type="password" id="password" name="password" value="<?php echo isset($obj_users->password)?$obj_users->password:"";?>" class="input-xlarge-fluid" placeholder="Contraseña">
              <br><br>
              <strong>Nombres:</strong><br> 
              <input type="text" id="first_name" name="first_name" value="<?php echo isset($obj_users->first_name)?$obj_users->first_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Apellidos:</strong><br> 
              <input type="text" id="last_name" name="last_name" value="<?php echo isset($obj_users->last_name)?$obj_users->last_name:"";?>" class="input-xlarge-fluid" placeholder="Apellidos">
              <br><br>
                <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Privilegio:</strong>
                        <select name="privilage" id="privilage">
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_users->privilage == 1){ echo "selected";}
                                    }else{echo "";} ?>>Básico</option>
                                    <option value="2" <?php if(isset($obj_customer)){
                                        if($obj_users->privilage == 2){ echo "selected";}
                                    }else{echo "";} ?>>Total</option>
                        </select>
                    </div>
                </div>
              <br><br>
                    <div class="well nomargin" style="width: 200px;">
                        <div class="inner">
                            <strong>Estado:</strong>
                            <select name="active" id="active">
                                        <option value="0" <?php if(isset($obj_customer)){
                                            if($obj_users->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>Inactivo</option>
                                        <option value="1" <?php if(isset($obj_customer)){
                                            if($obj_users->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Activo</option>
                            </select>
                        </div>
                    </div>
                <br><br>
                <br><br>
            
                 
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_users();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
<script type="text/javascript">
    var show = '<?php echo $modulos?>';
    $(".chzn-select").chosen();
    
    $("#tags").chosen().change( function(e){
        $("#tag").val($(this).val());
    });         
    
    $('#timepicker1').timepicker({
        minuteStep: 1,    
        showSeconds: true,
        showMeridian: false,
        showInputs: true
    });
        
    $('#timepicker1').on('change', function() {                
        $("#time").val($(this).val());        
    });
</script>
