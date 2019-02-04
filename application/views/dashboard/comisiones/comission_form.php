<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/comission.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/comisiones/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de Comisiones</a>
                                </div>
                        </div>
                </div>
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_comission->commissions_id)?$obj_comission->commissions_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="commissions_id" name="commissions_id" value="<?php echo isset($obj_comission->commissions_id)?$obj_comission->commissions_id:"";?>">
              <br><br>
              <strong>ID Cliente:</strong><br>
              <input type="text" id="customer_id" onblur="validate_customer(this.value);" name="customer_id" value="<?php echo isset($obj_comission->customer_id)?$obj_comission->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
              <br><br>
              <strong>Código:</strong><br>
              <input type="text" id="code" name="code" value="<?php echo isset($obj_comission->code)?$obj_comission->code:"";?>" class="input-xlarge-fluid" placeholder="Código" disabled="">
              <br><br>
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_comission->first_name)?$obj_comission->first_name." ".$obj_comission->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="date" name="date" value="<?php echo isset($obj_comission->date)?formato_fecha_barras($obj_comission->date):"";?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Monto:</strong><br>   
              <input type="text" id="amount" name="amount" value="<?php echo isset($obj_comission->amount)?$obj_comission->amount:0;?>" class="input-xlarge-fluid">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                      <select name="active" id="active">
                                  <option value="1" <?php if($obj_comission->active == 1){ echo "selected";}?>>Abonado</option>
                                  <option value="2" <?php if($obj_comission->active == 2){ echo "selected";}?>>Espera de procesar</option>
                                  <option value="3" <?php if($obj_comission->active == 3){ echo "selected";}?>>Pagado</option>
                      </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_comissions();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
