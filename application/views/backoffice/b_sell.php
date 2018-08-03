<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Compras</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>
         <!-- Page content-->
         <!--<div class="content-wrapper">-->
            <div class="row">
               <div class="col-lg-12">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           Compras
                        </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th>Fecha</th>
                                                 <th>Monto</th>
                                                 <th>Estado</th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_sell as $value) { ?>
                                      <tr>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td>
                                               <?php if ($value->active == 1) {
                                                    $valor = "En Proceso";
                                                    $stilo = "label label-default";
                                                }elseif($value->active == 2){
                                                    $valor = "Cancelado";
                                                    $stilo = "label label-danger";
                                                }elseif($value->active == 3){
                                                    $valor = "Procesado";
                                                    $stilo = "label label-success";
                                                }?>
                                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                           </td>   
                                       </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                                </div>
                     </div>
                  </div>  

              <!--SPINNER-->
        <div id="spinner"></div>
    <!--END SPINNER--> 
            </div>
            <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>  
         <!--</div>-->
      </section>
</body>
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-modal.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.dataTables.min.js';?>"></script>
<link href="<?php echo site_url().'static/cms/css/core/jquery.dataTables.css';?>" rel="stylesheet"/>

 <script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url().'static/backoffice/js/commission.js';?>"></script>
</html>