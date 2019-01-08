<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">COMENTARIOS</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>NOMBRE</th>
                                <th>CORREO</th>
                                <th>ASUNTO</th>
                                <th>COMENTARIO</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_comments as $value): ?>
                        <tr>
                            <th><?php echo $value->comment_id;?></th>
                            <td><?php echo formato_fecha($value->date_comment);?></td>
                            <td align="center" style="color:#fff;" class="label-success"><?php echo $value->name;?></td>
                            <td><?php echo $value->email;?></td>
                            <td><?php echo $value->subject;?></td>
                            <td><?php echo $value->comment;?></td>
                            
                            <td>
                                <?php if ($value->active == 0) {
                                    $valor = "Leido";
                                    $stilo = "label label-success";
                                }else{
                                    $valor = "No Leido";
                                    $stilo = "label label-important";
                                } ?>
                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <?php 
                                            if($value->active == 0){ ?>
                                                    <button class="btn btn-small" onclick="change_state_no('<?php echo $value->comment_id;?>');"><i class="fa fa-bookmark"></i> Marcar como no Contestado</button>
                                            <?php }else{ ?>
                                                    <button class="btn btn-small" onclick="change_state('<?php echo $value->comment_id;?>');"><i class="fa fa-bookmark"></i> Marcar como Contestado</button> 
                                            <?php } ?>
                                        </div>
                                </div>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
           <!--</form>-->         
        </div>
    </div>
</div><!-- main content -->
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url();?>static/cms/js/comments.js"></script>