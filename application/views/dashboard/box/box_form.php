<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/box.js"></script>
<form method="post" id="upload_form" enctype="multipart/form-data" action="<?php echo site_url()."dashboard/box/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Box</a>
                                </div>
                        </div>
                </div>
              <input type="hidden" name="box_id" id="box_id" value="<?php echo isset($obj_box)?$obj_box->box_id:"";?>">
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_box->name)?$obj_box->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Precio:</strong><br>   
              <input type="text" id="price" name="price" value="<?php echo isset($obj_box->price)?$obj_box->price:"";?>" class="input-xlarge-fluid" placeholder="Precio">
              <br><br>
              <strong>Puntos:</strong><br>   
              <input type="text" id="point" name="point" value="<?php echo isset($obj_box->point)?$obj_box->point:"";?>" class="input-xlarge-fluid" placeholder="Puntos">
              <br><br>
              <strong>Descripción:</strong><br>   
              <textarea class="form-control" name="description" id="" placeholder="Descripción" style="height: 200px;width: 100% !important" placeholder="Descripcion">
                  <?php echo isset($obj_box->description)?$obj_box->description:"";?>
              </textarea>
              <br><br>
              <?php 
              if(isset($obj_box->box_id)){ ?>
              <img src='<?php echo site_url()."static/backoffice/images/box/$obj_box->img";?>' width="100" />
              <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_box)?$obj_box->img:"";?>">
              <br><br>
              <?php } ?>
              
              <strong>Imagen:</strong><br>   
              <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="active" id="active">
                         <option value="1" <?php echo isset($obj_box->active) == 1 ? "selected":"";?>>Activo</option>
                         <option value="0" <?php echo isset($obj_box->active) == 0 ? "selected":"";?>>Inactivo</option>
                  </select>
                  </div>
              </div>
              <div id="uploaded_image"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_box();">Cancelar</button>  
                    <button type="submit" name="upload" id="upload" class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>