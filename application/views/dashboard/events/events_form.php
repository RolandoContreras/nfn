<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/events.js"></script>
<form id="customer-form" name="cobros-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/eventos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de Eventos</a>
                                </div>
                        </div>
                </div>
              <?php 
              if(isset($obj_events)){ ?>
                    <strong>ID:</strong><br>
                    <input type="text" value="<?php echo isset($obj_events->event_id)?$obj_events->event_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                    <input type="hidden" id="event_id" name="event_id" value="<?php echo isset($obj_events->event_id)?$obj_events->event_id:"";?>">
                    <br><br>
              <?php } ?>  
              
              <strong>Nombre del Evento:</strong><br>   
              <input type="text" id="name" name="name" value="<?php echo isset($obj_events->name)?$obj_events->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="date" name="date" value="<?php echo isset($obj_events->date)?formato_fecha_barras($obj_events->date):"";?>" class="input-xlarge-fluid" placeholder="DD/MM/YYYY">
              <br><br>
              <strong>Hora: 24 horas</strong><br>   
              <input type="text" id="time" name="time" value="<?php echo isset($obj_events->time)?$obj_events->time:"";?>" class="input-xlarge-fluid" placeholder="HH:MM">
              <br><br>
              <strong>Expositor:</strong><br>   
              <input type="text" id="expositor" name="expositor" value="<?php echo isset($obj_events->expositor)?$obj_events->expositor:"";?>" class="input-xlarge-fluid">
              <br><br>
              <?php 
              if(isset($obj_events->event_id)){ ?>
              <img src='<?php echo site_url()."static/cms/images/events/$obj_events->img";?>' width="100" />
              <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_events)?$obj_events->img:"";?>">
              <br><br>
              <?php } ?>
              <strong>Imagen:</strong><br>   
              <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="status_value" id="status_value">
                         <option value="1" <?php if(isset($obj_events->status_value) == 1){ echo "selected";}?>>Activo</option>
                         <option value="0" <?php if(isset($obj_events->status_value) == 0){ echo "selected";}?>>Inactivo</option>
                  </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_events();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
