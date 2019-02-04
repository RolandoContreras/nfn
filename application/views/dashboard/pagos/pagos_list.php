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
                                            <a class="brand">LISTADO DE  COBROS</a>
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
                                <th>CÓDIGO</th>
                                <th>CLIENTE</th>
                                <th>BENEFICIARIO</th>
                                <th>BANCO</th>
                                <th>OBS</th>
                                <th>MONTO</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_pay as $value): ?>
                            <tr>
                                <td align="center"><?php echo $value->pay_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center" style="color:#fff;" class="label-success" align="center"><b><?php echo $value->code;?></b></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name.'<br/><b>DNI: '.$value->dni.'</b>';?></td>
                                <td class="label-warning" style="color:white;" align="center">
                                    <?php echo $value->razon_social.'<br/><b>'.$value->ruc.'</b><br/>'.$value->address_ruc;?>
                                </td>
                                <td class="label-info" style="color:white;" align="center">
                                    <?php echo $value->bank_name.'<br/><b>'.$value->account_number.'</b><br/>'.$value->account_number_inter;?>
                                </td>
                                <td align="center"><?php echo $value->obs;?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo $value->amount;?></td>
                                <td align="center">
                                    <?php if ($value->active == 4) {
                                        $valor = "Devuelto o Cancelado";
                                        $stilo = "label label-important";
                                    }elseif($value->active == 2){
                                        $valor = "Es espera de procesamiento";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 3){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-small" onclick="ver_detalle('<?php echo $value->pay_id;?>');"><i class="fa fa-eye"></i> Detalle</button>
                                                    <button class="btn btn-small" onclick="edit_pay('<?php echo $value->pay_id;?>');"><i class="fa fa-edit"></i>  Editar</button>
                                                    <button class="btn btn-small" onclick="pagado('<?php echo $value->pay_id;?>');"><i class="fa fa-check"></i> Pagado</button>
                                                    <button class="btn btn-small" onclick="devolver('<?php echo $value->pay_id;?>');"><i class="fa fa-times"></i> Devolver</button>
                                                    
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