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
                                            <a class="brand">LISTADO DE BOX</a>
                                            <button class="btn btn-small" onclick="nuevo_box();"><i class="fa fa-plus"></i> Nuevo</button>
                                    </div>
                            </div>
                    </div>
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>PRECIO</th>
                                <th>PUNTOS</th>
                                <th>IMAGEN</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_box as $value): ?>
                                <tr>
                            <th><?php echo $value->box_id;?></th>
                            <td align="center"><?php echo strtoupper($value->name);?></td>
                            <td align="center" class="label-info" style="color:#FFF;"><?php echo format_number_moneda_soles($value->price);?></td>
                            <td align="center" class="label-success" style="color:#FFF;"><?php echo format_number_miles($value->point);?></td>
                            <td><img width="100" src="<?php echo site_url()."static/backoffice/images/box/$value->img";?>" alt="<?php echo $value->name;?>"/></td>
                            <td>
                            <textarea class="form-control" name="description" id="description" placeholder="Descripción" style="height: 200px;width: 100% !important"><?php echo $value->description;?></textarea>
                            </td>
                            <td align="center">
                                <?php if ($value->active == 0) {
                                    $valor = "No Activo";
                                    $stilo = "label label-important";
                                }else{
                                    $valor = "Activo";
                                    $stilo = "label label-success";
                                } ?>
                                <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                            </td>
                            
                            <td align="center">
                                <div class="operation">
                                        <div class="btn-group">
                                           <button class="btn btn-small" onclick="edit_box('<?php echo $value->box_id;?>');"><i class="fa fa-edit"></i> Editar</button>
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
<script src="<?php echo site_url();?>static/cms/js/box.js"></script>