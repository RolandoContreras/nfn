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
                                            <a class="brand">USUARIOS</a>
                                            <button class="btn btn-small" onclick="nuevo_users();"><i class="fa fa-plus"></i> Nuevo</button>
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
                                <th>FECHA DE CREACIÓN</th>
                                <th>NOMBRE</th>
                                <th>PRIVILEGIO</th>
                                <th>USUARIO</th>
                                <th>ESTADO</th> 
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($obj_users as $value): ?>
                                <td align="center"><b><?php echo $value->user_id;?></b></td>
                                <td align="center"><?php echo formato_fecha($value->created_at);?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center">
                                     <?php if ($value->privilage == 1) {
                                        $valor = "Basico";
                                        $stilo = "label label-warning";
                                    }else{
                                        $valor = "Total";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center"><?php echo $value->email;?></td>
                                
                                <td align="center">
                                    <?php if ($value->active == 0) {
                                        $valor = "Inactivo";
                                        $stilo = "label label-important";
                                    }else{
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-small" onclick="edit_users('<?php echo $value->user_id;?>');"><i class="fa fa-edit"></i> Editar</button>
                                                    <button class="btn btn-small" onclick="delete_users('<?php echo $value->user_id;?>');"><i class="fa fa-trash"></i> Eliminar</button>
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
<script src="static/cms/js/users.js"></script>