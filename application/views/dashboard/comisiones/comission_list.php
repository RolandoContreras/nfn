<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container" style="width: 110%;">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 110%;">
                                            <a class="brand">LISTADO DE  COMISIONES</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100%;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>FECHA</th>
                                <th>ASOCIADO</th>
                                <th>CÓDIGO</th>
                                <th>BONO</th>
                                <th>REFERIR A</th>
                                <th>MONTO</th> 
                                <th>ESTADO</th> 
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($obj_comission as $value): ?>
                                <td align="center"><?php echo $value->commissions_id;?></td>
                                <td class="label-info" style="color:white;" align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td class="label-info" style="color:white;" align="center"><?php echo $value->code;?></td>
                                <td class="label-warning" style="color:white;" align="center"><?php echo $value->bonus;?></td>
                                <td align="center"><?php echo $value->first_name_2." ".$value->last_name_2."<br><b>".($value->code_2)."</b>";?></td>
                                <td align="center" class="label-success" style="color:#fff;"><b><?php echo format_number_moneda_soles($value->amount);?></b></td>
                                <td align="center">
                                    <?php if (($value->active == 1)) {
                                        $valor = "Abonado";
                                        $stilo = "label label-default";
                                    }elseif($value->active == 2){
                                        $valor = "Espera de procesar";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 3){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                                <button class="btn btn-small" onclick="edit_comissions('<?php echo $value->commissions_id;?>');"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn btn-small" onclick="mark_pay_comissions('<?php echo $value->commissions_id;?>');"><i class="fa fa-usd"></i> Marcar Pagado</button>
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
<script src="static/cms/js/comission.js"></script>