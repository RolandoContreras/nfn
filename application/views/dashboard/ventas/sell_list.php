<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span11">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 100%;">
                                            <a class="brand">LISTADO DE VENTAS</a>
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
                                <th>USUARIO</th>
                                <th>NOMBRES</th>
                                <th>WALLET BTC</th>
                                <th>OBS</th>
                                <th>MONTO</th>
                                <th>DESC</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_pay as $value): ?>
                            <tr>
                                <td align="center"><?php echo $value->sell_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo $value->username;?></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center" style="color:#fff;" class="label-inverse"><b><?php echo $value->btc_address;?></b></td>
                                <td align="center"><?php echo $value->obs;?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo $value->amount;?></td>
                                <td align="center" style="color:#fff;" class="label-info"><?php echo $value->descount;?></td>
                                <td align="center">
                                    <?php if ($value->active == 2) {
                                        $valor = "Cancelado";
                                        $stilo = "label label-important";
                                    }elseif($value->active == 1){
                                        $valor = "Por procesar";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 3){
                                        $valor = "Procesado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-small" onclick="edit_pay('<?php echo $value->sell_id;?>');"><i class="fa fa-edit"></i>  Editar</button>
                                                    <button class="btn btn-small" onclick="delete_customer('<?php echo $value->sell_id;?>');"><i class="fa fa-trash"></i> Eliminar</button>
<!--                                                    <button class="btn btn-small" onclick="pagado('<?php echo $value->sell_id;?>','<?php echo $value->first_name;?>','<?php echo $value->username;?>','<?php echo $value->amount;?>','<?php echo $value->email;?>');"><i class="fa fa-check"></i> Pagado</button>
                                                    <button class="btn btn-small" onclick="devolver('<?php echo $value->sell_id;?>','<?php echo $value->first_name;?>','<?php echo $value->username;?>','<?php echo $value->amount;?>','<?php echo $value->email;?>');"><i class="fa fa-chevron-left"></i> Devolver</button>-->
                                                    
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
<script src="static/cms/js/cobros.js"></script>