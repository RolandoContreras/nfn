<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<link href="<?php echo site_url();?>static/cms/plugins/tags/chosen.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/plugins/tags/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>static/cms/js/informative.js"></script>
<script src="<?php echo site_url();?>static/cms/plugins/ckeditor/ckeditor.js"></script>
<!-- main content -->

<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/informativos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Mensajes Informativos</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
              <input type="hidden" name="messages_id" id="messages_id" value="<?php echo isset($obj_informative)?$obj_informative->messages_id:"";?>">
              <input type="text" id="title" name="title" value="<?php echo isset($obj_informative->title)?$obj_informative->title:"";?>" class="input-xlarge-fluid" placeholder="Título">
              <br><br>
              <textarea class="input-large" id="text" name="text" rows="5" style="width:97%;height:180px;" placeholder="Contenido"><?php echo isset($obj_informative->text)?$obj_informative->text:"";?></textarea>
              <br><br>
                    <div class="well nomargin" style="width: 200px;">
                        <div class="inner">
                            <strong>Estado para el sistema:</strong>
                            <select name="active" id="active">
                                        <option value="">[ Seleccionar ]</option>
                                        <option value="0" <?php if(isset($obj_informative)){
                                            if($obj_informative->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>Inactivo</option>
                                        <option value="1" <?php if(isset($obj_informative)){
                                            if($obj_informative->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Activo</option>
                            </select>

                        </div>
                    </div>
                <br><br>
                <br><br>
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_informative();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
