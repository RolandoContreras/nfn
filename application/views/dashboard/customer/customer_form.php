<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="<?php echo site_url();?>static/cms/js/customer.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- main content -->

<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/clientes/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Clientes</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($obj_customer)?$obj_customer->customer_id:"";?>">
              
                <div class="well nomargin" style="width: 600px;">
                    <div class="inner">
                    <strong>País:</strong>
                        <select name="pais" id="pais">
                        <option value="">[ Seleccionar ]</option>
                            <?php foreach ($obj_paises as $value ): ?>
                        <option value="<?php echo $value->id;?>"
                            <?php 
                                    if(isset($obj_customer->country)){
                                            if($obj_customer->country==$value->id){
                                                echo "selected";
                                            }
                                    }else{
                                              echo "";
                                    }

                            ?>><?php echo $value->nombre;?>
                        </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br/>
                </div>
              <br><br>
              <strong>ID:</strong><br>
              <input type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_customer->customer_id)?$obj_customer->customer_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <br><br>
              <strong>Usuario:</strong><br>
              <input type="text" id="username" name="username" value="<?php echo isset($obj_customer->email)?$obj_customer->email:"";?>" class="input-xlarge-fluid" placeholder="Username">
              <br><br>
              <strong>Contraseña:</strong><br>              
              <input type="password" id="password" name="password" value="<?php echo isset($obj_customer->password)?$obj_customer->password:"";?>" class="input-xlarge-fluid" placeholder="Contraseña">
              <br><br>
              <strong>Nombres:</strong><br>   
              <input type="text" id="first_name" name="first_name" value="<?php echo isset($obj_customer->first_name)?$obj_customer->first_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Apellidos:</strong><br>
              <input type="text" id="last_name" name="last_name" value="<?php echo isset($obj_customer->last_name)?$obj_customer->last_name:"";?>" class="input-xlarge-fluid" placeholder="Apellidos">
              <br><br>
              <strong>Correo:</strong><br>
              <input type="text" id="email" name="email" value="<?php echo isset($obj_customer->email)?$obj_customer->email:"";?>" class="input-xlarge-fluid" placeholder="Correo Electrónico">
              <br><br>
              <strong>DNI:</strong><br>
              <input type="text" id="dni" name="dni" value="<?php echo isset($obj_customer->dni)?$obj_customer->dni:"";?>" class="input-xlarge-fluid" placeholder="DNI">
              <br><br>
              <strong>Fecha de Nacimiento:</strong><br>
              <input type="text" id="fecha_de_nacimiento" name="fecha_de_nacimiento" value="<?php echo formato_fecha_barras($obj_customer->birth_date);?>" class="input-xlarge-fluid" placeholder="Fecha de Nacimiento">
              <br><br>
              <strong>Telefono:</strong><br>
              <input type="text" id="phone" name="phone" class="input-small-fluid" placeholder="Telefono" value="<?php echo isset($obj_customer->phone)?$obj_customer->phone:"";?>">
              <br><br>
              <strong>Dirección:</strong><br>
              <textarea name="address" id="address" placeholder="Dirección ..." style="width: 90%; height: 100px;"><?php echo isset($obj_customer->address)?$obj_customer->address:"";?></textarea>
              <script type="text/javascript">CKEDITOR.replace("adress")</script> 
              <br><br>
              <strong>Provincia:</strong><br>
              <input type="text" id="provincia" name="provincia" class="input-small-fluid" placeholder="Provincia" value="<?php echo isset($obj_customer->provincia)?$obj_customer->provincia:"";?>">
              <br><br>
              <strong>Población:</strong><br>
              <input type="text" id="city" name="city" class="input-small-fluid" placeholder="Ciudad" value="<?php echo isset($obj_customer->city)?$obj_customer->city:"";?>">
              <br><br>
                <div class="well nomargin" style="width: 200px;">
                <div class="inner">
                <strong>Estado:</strong>
                    <select name="active" id="active">
                                <option value="">[ Seleccionar ]</option>
                                <option value="0" <?php if(isset($obj_customer)){
                                    if($obj_customer->active == 0){ echo "selected";}
                                }else{echo "";} ?>>Inactivo</option>
                                <option value="1" <?php if(isset($obj_customer)){
                                    if($obj_customer->active == 1){ echo "selected";}
                                }else{echo "";} ?>>Activo</option>
                    </select>
                </div>
                </div>
                <br><br>
                <strong>Fecha de Creación:</strong><br>
                <input type="text" id="created_at" name="created_at" class="input-small-fluid" placeholder="Fecha de Creación" value="<?php echo isset($obj_customer->created_at)?$obj_customer->created_at:"";?>" disabled="">
                <br><br>
                <br><br>
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_customer();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
