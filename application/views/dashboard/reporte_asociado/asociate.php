<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<div id="main_content" class="span10">
<div class="row-fluid">
        <div class="widget_container">
            <div class="well nomargin" style="padding:10px;">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Vista Global de Clientes</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                        <tr>
                                            <th>CONCEPTO</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a><i class="fa fa-users"></i> Total Clientes</a></td>
                                            <td><b><?php echo $obj_total_customer;?></b></td>
                                        </tr>
                                        <tr>
                                            <td><a><i class="fa fa-users"></i> Total Clientes Activos</a></td>
                                            <td><b><?php echo $obj_total_activos;?></b></td>
                                        </tr>
                                        <tr>
                                            <td><a><i class="fa fa-users"></i> Total Clientes Inactivos</a></td>
                                            <td><b><?php echo $obj_total_inactivos;?></b></td>
                                        </tr>
                                        <tr>
                                            <td><a><i class="fa fa-users"></i> Total Clientes en <?php echo $year;?></a></td>
                                            <td><b><?php echo $obj_total_customer_year;?></b></td>
                                        </tr>
                                        <tr>
                                            <td><a><i class="fa fa-users"></i> Total Clientes <?php echo $month;?></a></td>
                                            <td><b><?php echo $obj_total_customer_month;?></b></td>
                                        </tr>
                                    </tbody>
                            </table>
                    </div>
        </div>
        <div class="widget_container">
                    <div class="well nomargin" style="padding:10px;">
                            <div class="chart-container">
                                <canvas id="chart"></canvas>
                            </div>
                    </div>
            </div>
    </div>
    <input type="hidden" id="ene" value="<?php echo $obj_customer_by_month->total_ene;?>"/>
    <input type="hidden" id="feb" value="<?php echo $obj_customer_by_month->total_feb;?>"/>
    <input type="hidden" id="mar" value="<?php echo $obj_customer_by_month->total_mar;?>"/>
    <input type="hidden" id="abr" value="<?php echo $obj_customer_by_month->total_abr;?>"/>
    <input type="hidden" id="may" value="<?php echo $obj_customer_by_month->total_may;?>"/>
    <input type="hidden" id="jun" value="<?php echo $obj_customer_by_month->total_jun;?>"/>
    <input type="hidden" id="jul" value="<?php echo $obj_customer_by_month->total_jul;?>"/>
    <input type="hidden" id="ago" value="<?php echo $obj_customer_by_month->total_ago;?>"/>
    <input type="hidden" id="set" value="<?php echo $obj_customer_by_month->total_set;?>"/>
    <input type="hidden" id="oct" value="<?php echo $obj_customer_by_month->total_oct;?>"/>
    <input type="hidden" id="nov" value="<?php echo $obj_customer_by_month->total_nov;?>"/>
    <input type="hidden" id="dic" value="<?php echo $obj_customer_by_month->total_dic;?>"/>
    
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">LISTA DE CLIENTES MES - <?php echo $month;?> </a>
                                            <button class="btn btn-small" onclick="export_cliente();"><i class="fa fa-bookmark"></i> Exportar Clientes</button>
                                    </div>
                            </div>
                    </div>
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>USUARIO</th>
                                <th>CLIENTES</th>
                                <th>PAÍS</th>
                                <th>ESTADO</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_customer as $value): ?>
                                <td align="center"><b><?php echo $value->customer_id;?></b></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo $value->email;?></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center"><b><?php echo $value->country;?></b></td>
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div><!-- main content -->
</div>
<script>
    var ene = document.getElementById('ene').value;
    var feb = document.getElementById('feb').value;
    var mar = document.getElementById('mar').value;
    var abr = document.getElementById('abr').value;
    var may = document.getElementById('may').value;
    var jun = document.getElementById('jun').value;
    var jul = document.getElementById('jul').value;
    var ago = document.getElementById('ago').value;
    var set = document.getElementById('set').value;
    var oct = document.getElementById('oct').value;
    var nov = document.getElementById('nov').value;
    var dic = document.getElementById('dic').value;
    
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: "Clientes por mes",
            backgroundColor: 'transparent',
            borderColor: 'rgb(14, 11, 63)',
            borderWidth: 2,
            hoverBackgroundColor: "rgba(14, 11, 63,0.4)",
            hoverBorderColor: "rgba(14, 11, 63)",
            data: [ene, feb, mar, abr, may, jun, jul, ago, set, oct, nov, dic]
        }]
    },
    options: {}
});
</script>
<style>
canvas {
  border: 1px dotted blue;
}
.chart-container {
  position: relative;
  margin: auto;
  height: 60vh;
  width: 60vw;
}
</style>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="static/cms/js/associated.js"></script>