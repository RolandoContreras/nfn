<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/faq.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/faq/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de FAQ</a>
                                </div>
                        </div>
                </div>
                <?php if(isset($obj_dinamic)){ ?>
                    <strong>ID:</strong><br>
                    <input type="text" value="<?php echo isset($obj_dinamic->dinamic_id)?$obj_dinamic->dinamic_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                    <input type="hidden" id="dinamic_id" name="dinamic_id" value="<?php echo isset($obj_dinamic->dinamic_id)?$obj_dinamic->dinamic_id:"";?>">
                    <br><br>
                <?php } ?>
              <strong>Título:</strong><br>
              <input type="text" id="title" name="title" value="<?php echo isset($obj_dinamic->title)?$obj_dinamic->title:"";?>" class="input-xlarge-fluid" placeholder="Título">
              <br><br>
              <strong>Contenido:</strong><br>
                <textarea name="content" id="content" rows="10" cols="80">
                   <?php echo isset($obj_dinamic->content)?$obj_dinamic->content:"";?>
                </textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
              <br><br>
                  <strong>Estado:</strong>
                      <select name="active" id="active">
                          <option value="1" <?php if(isset($obj_dinamic->active) == 1){ echo "selected";}?>>Activo</option>
                          <option value="0" <?php if(isset($obj_dinamic->active) == 0){ echo "selected";}?>>Inactivo</option>
                      </select>
                <div id="alert_message"></div>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_faq();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>   
               </div>
            
           
            
              </div>
              
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
