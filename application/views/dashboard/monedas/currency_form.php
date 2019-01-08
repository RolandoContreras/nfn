<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/moneda.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/monedas/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Monedas</a>
                                </div>
                        </div>
                </div>
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_currency->currency_id)?$obj_currency->currency_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="currency_id" name="currency_id" value="<?php echo isset($obj_currency->currency_id)?$obj_currency->currency_id:"";?>">
              <br><br>
              <strong>Nombre:</strong><br>
              <input type="text" id="name" name="name" value="<?php echo isset($obj_currency->name)?$obj_currency->name:"";?>" class="input-xlarge-fluid" placeholder="Name">
              <br><br>
              <strong>Nombre Api:</strong><br>
              <input type="text" id="slug" name="slug" value="<?php echo isset($obj_currency->slug)?$obj_currency->slug:"";?>" class="input-xlarge-fluid" placeholder="Slug">
              <br><br>
              <strong>Porcentaje:</strong><br>
              <input type="text" id="percent" name="percent" value="<?php echo isset($obj_currency->percent)?$obj_currency->percent:"";?>" class="input-xlarge-fluid" placeholder="Procentaje">
              <br><br>
                  <strong>Estado:</strong>
                      <select name="active" id="active">
                                  <option value="1" <?php if($obj_currency->active == 1){ echo "selected";}?>>Activo</option>
                                  <option value="0" <?php if($obj_currency->active == 0){ echo "selected";}?>>Inactivo</option>
                      </select>
                <div id="alert_message"></div>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_moneda();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>   
               </div>
            
           
            
              </div>
              
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
