<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>    

<div class="span11">
    <div id="quick_post" class="widget_container">
        <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"><?php echo isset($obj_dinamic) ? $obj_dinamic->title:"";?></a>
                                </div>
                        </div>
                </div>
                <form method="post">
                    <fieldset>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-edit"></i></span>
                                <input class="input-large" size="16" id="title" name="title" value="<?php echo isset($obj_dinamic) ? $obj_dinamic->title:"";?>" style="width:88%;" placeholder="Título" type="text">
                            </div>
                        </div>
                    </div>
                        <textarea name="content" id="content" rows="10" cols="80">
                            <?php if($obj_dinamic->content != ""){
                                echo $obj_dinamic->content;
                            } ?>
                        </textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script> 
                    <br>
                    <input onclick="save_content('2');" class="btn btn-primary" value="Guardar"/>
                    </fieldset>
                </form>
        </div>
    </div>
</div>
<script src="static/cms/js/dinamic.js"></script>