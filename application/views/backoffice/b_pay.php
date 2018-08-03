      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Pagos</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>
            <div class="row">
               <div class="col-lg-12">
                <!--SHOW ALERT  MESSAGE INFORMATIVE-->
                <div class="col-md-12"> 
                    <?php 
                    foreach ($messages_informative as $value) { ?>
                        <div class="row">
                            <div class="col-md-12"> 
                                        <div class="panel panel-warning">
                                                    <div class="panel-heading clearfix"> 
                                                    <div class="panel-title">Mensaje: <b><?php echo $value->title;?></b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?php echo $value->text;?></p> 
                                                </div> 
                                        </div> 
                                </div>
                            </div>
                    <?php } ?>
                </div>  
                <!--END SHOW ALERT MESSAGE INFORMATIVE-->
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           Solicitar Pago
                        </div>
                        <div class="panel-body">
                            <div role="alert" class="alert alert-info">
                                <strong>Nota:</strong><br>
                            <?php echo "Los pedidos de cobro se efectúan todos los miércoles.<br/>El monto mínimo para rescate es de $10";?><br>
                            </div><br/>
                            <div class="form-inline" >
                                <p class="lead">
                                Saldo Disponible en Billetera:
                                <b><?php if(count($obj_balance_disponible) > 0){echo "$".$obj_balance_disponible;}else{echo "$0.00";}?></b>
                                </p>
                                <div class="form-group">
                                <label for="monto">Monto que Solicita:</label>
                                <select id="monto" name="monto" class="form-control">
                                    <option value="">***Seleccionar***</option>
                                    <option value="3"><?php if(count($obj_balance_disponible)>0){echo "$".$obj_balance_disponible." - "."Total";}else{echo "$0.00 - Total";}?></option>
                                </select>
                                </div>
                                <?php 
                                //GET TODAY DATE
                                $today = date("Y-m-d"); 
                                //GET WEDNESDAY
                                $s_and_s = date('w',strtotime($today));
                                if($s_and_s != '3'){$style="disabled";}else{$style="";} ?>
                                <!--BLOCK THE BOTON IF IS SATUDAY OR SUNDAY-->
                                        <input class="form-inline" type="hidden" name="SolicitarPago" value="1"/>
                                        <button onclick="enviar_pago();" <?php echo $style;?> class="btn btn-success">Enviar Solicitud</button>
                                </div>
                            </div><br/>
                                <div class="panel-heading">
                                    Movimientos
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                 <thead>
                                    <tr>
                                         <th align="center">Concepto</th>
                                         <th align="center">Fecha</th>
                                         <th align="center">Monto Enviado</th>
                                         <th align="center">Estado</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr>
                                          <td >Pagos por comisiones</td>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td>
                                               <?php 
                                               if($value->status_value == 2){ ?>
                                                   <span class="label label-danger">Cancelado/Devuelto</span>
                                               <?php }elseif($value->status_value == 3){ ?>
                                                   <span style="color: #00620C" class="label label-warning">En espera de procesar</span>
                                               <?php }elseif($value->status_value == 4){ ?>
                                                   <span class="label label-success">Procesado</span>
                                               <?php } ?>
                                           </td>
                                       </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                                </div>
                     </div>
                  </div>  
            </div>
      </section>
</body>
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-modal.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.dataTables.min.js';?>"></script>
<link href="<?php echo site_url().'static/cms/css/core/jquery.dataTables.css';?>" rel="stylesheet"/>
 <script>
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url().'static/backoffice/js/pay.js';?>"></script>
</html>