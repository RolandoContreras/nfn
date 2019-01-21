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
                                            <a class="brand">LISTADO DE ACTIVACIONES NUEVOS CLIENTES</a>
                                    </div>
                            </div>
                    </div>
                
                <div class="well nomargin" style="width: 100% !important;">
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>N° OPERACIÓN</th>
                                <th>ASUNTO</th>
                                <th>IMAGEN</th>
                                <th>KIT</th>
                                <th>IMPORTE</th>
                                <th>CÓDIGO CLIENTE</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_invoices as $value): ?>
                            <tr>
                                <td align="center"><b><?php echo $value->invoice_id;?></b></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center" style="color:#fff;" class="label-important">
                                    <?php 
                                    if($value->activation_code == ""){
                                        echo "---";
                                    }else{
                                        echo $value->activation_code;
                                    } ?>
                                </td>
                                <td align="center" ><?php echo $value->subject;?></td>
                                <td align="center">
                                    <?php 
                                    if($value->img != ""){
                                        echo '<img src="'.site_url()."static/backoffice/images/invoices/nuevo_cliente/$value->img".'" alt="kit" width="40"';
                                    }else{
                                        echo "---";
                                    }
                                    ?>
                                </td>
                                <td align="center" style="color:#fff;" class="label-info"><?php echo $value->name;?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo format_number_moneda_soles($value->price);?></td>
                                <td align="center" style="color:#fff;" class="label-warning"><b><?php echo $value->code;?></b></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center">
                                    <?php if ($value->active == 0) {
                                        $valor = "Sin acción";
                                        $stilo = "label label-defaul";
                                    }elseif($value->active == 1){
                                        $valor = "Pendiente";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 2){
                                        $valor = "Procesado";
                                        $stilo = "label label-success";
                                    }else{
                                        $valor = "Procesado";
                                        $stilo = "label label-important";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <?php  if($value->active == 1){ ?>
                                                <div class="operation">
                                                    <div class="btn-group"> 
                                                        <button class="btn btn-small" onclick="active_cliente('<?php echo $value->invoice_id;?>','<?php echo $value->customer_id;?>','<?php echo $value->parents_id;?>');"><i class="fa fa-check"></i>  Activar</button>
                                                        <button class="btn btn-small" onclick="cancelar_cliente('<?php echo $value->invoice_id;?>');"><i class="fa fa-times-circle"></i>  Cancelar</button>
                                                    </div>
                                                </div>
                                    <?php }else{ ?>
                                            <span class="label label-defaul">Sin acción</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
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
<script src="static/cms/js/active.js"></script>