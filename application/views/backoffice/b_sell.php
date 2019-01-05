<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_tit_compras');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_bitcoin');?> <span style='color:#D4AF37'><?php echo format_number_6decimal($price_btc);?> <i class="fa fa-eur"></i></span></a>
            </div>
        </div>
         <!-- Page content-->
         <!--<div class="content-wrapper">-->
            <div class="row padding-botom-150">
               <div class="col-lg-12">
                     <div class="panel panel-warning">
                        <div class="panel-heading">
                           <?=lang('idioma.b_tit_compras');?>
                        </div>
                                <div role="alert" class="alert alert-default" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th><?=lang('idioma.b_fecha');?></th>
                                                 <th><?=lang('idioma.b_importe');?></th>
                                                 <th><?=lang('idioma.b_moneda');?></th>
                                                 <th><?=lang('idioma.b_cantidad');?></th>
                                                 <th><?=lang('idioma.b_estado');?></th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_sell as $value) { ?>
                                      <tr>
                                          <td><?php echo formato_fecha_barras($value->date);?></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td><img src='<?php echo site_url()."static/page_front/images/monedas/$value->img";?>' width="30" alt="<?php echo $value->currency;?>"/>&nbsp;&nbsp;<?php echo $value->currency;?></td>
                                          <td><?php echo $value->amount_btc;?></td>
                                          <td>
                                               <?php if ($value->active == 1) {
                                                    $stilo = "label label-default";
                                                }elseif($value->active == 2){
                                                    $stilo = "label label-danger";
                                                }elseif($value->active == 3){
                                                    $stilo = "label label-success";
                                                }?>
                                                <span class="<?php echo $stilo ?>"><?php 
                                                   if ($value->active == 1) { ?>
                                                    <?=lang('idioma.b_pendiente');?>
                                               <?php }elseif($value->active == 2){ ?>
                                                    <?=lang('idioma.b_cancelado');?>
                                               <?php }elseif($value->active == 3){ ?>
                                                    <?=lang('idioma.b_procesado');?>
                                               <?php }?>
                                               </span>
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