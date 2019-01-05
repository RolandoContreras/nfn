<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_tit_contacto');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_bitcoin');?> <span style='color:#D4AF37'><?php echo format_number_6decimal($price_btc);?> <i class="fa fa-eur"></i></span></a>
            </div>
        </div>
         <!-- Page content-->
            <div class="row">
               <div class="col-lg-12">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           <?=lang('idioma.b_consulta');?>
                        </div>
                        <div class="panel-body">
                            <div class="form-inline" >
                                <button onclick="show();" class="btn btn-success"><?=lang('idioma.b_nuevo_mensaje');?> <i class="fa fa-plus-circle"></i></button>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div style="display: none;" id="form-support">
                                  <br>
                                  <div class="panel teal">
                                    <div class="panel-body">
                                     <form method="post" id="form_support" enctype="multipart/form-data">
                                                 <label><?=lang('idioma.b_subject');?></label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="title" id="title" placeholder="<?=lang('idioma.b_soporte_asunto');?>" type="text" value="">
                                                    </div>
                                                    <div class="form-group">
                                                           <textarea class="form-control" name="message" id="message" placeholder="<?=lang('idioma.b_mensaje');?>" style="height: 200px;width: 100% !important"></textarea>
                                                   </div>
                                                    <hr>
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-danger" onclick="hide();"><?=lang('idioma.b_cerrar');?></button>
                                                        <button type="submit" name="upload" id="upload" class="btn btn-primary"><?=lang('idioma.b_crear_mensaje');?></button>
                                                    </div>
                                                     <div id="message_reponse"></div>
                                            </form>
                                    </div>
                                   </div>
                                </div>
                            </div>
                         <br/>
                                <div class="panel-heading">
                                    <?=lang('idioma.b_lista');?>
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th align="center"><?=lang('idioma.b_numero_mensaje');?></th>
                                                 <th align="center"><?=lang('idioma.b_soporte_fecha');?></th>
                                                 <th align="center"><?=lang('idioma.b_soporte_asunto');?></th>
                                                 <th align="center"><?=lang('idioma.b_respuesta');?></th>
                                                 <th align="center"><?=lang('idioma.b_estado');?></th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_message_support as $value) { ?>
                                      <tr>
                                          <td><?php echo $value->messages_id;?></b></td>
                                          <td><b><?php echo formato_fecha_barras($value->date);?></b></td>
                                          <td><?php echo $value->title;?></b></td>
                                          <td><b><?php echo $value->answer;?></b></td>
                                          <td>
                                               <?php 
                                               if($value->active == 1){ ?>
                                                   <span class="label label-default"><?=lang('idioma.b_en_espera');?></span>
                                               <?php }else{ ?>
                                                   <span class="label label-success"><?=lang('idioma.b_contestado');?></span>
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
            <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>  
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
<script>
$(document).ready(function(){
    $("#form_support").on('submit',function(e){
        e.preventDefault();
            if($('#message').val() == '' ||  $('#subject').val() == ''){
                $("#message_reponse").html('<div class="alert alert-danger" style="text-align: center">Debe llenar todos los campos</div>');
            }else{
                $.ajax({
                url : "<?php echo site_url().'backoffice/soporte/validate'?>",
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#message_reponse").html(data);
                }
            });
            }
    });
});
</script>
<script src="<?php echo site_url().'static/backoffice/js/support.js';?>"></script>
</html>