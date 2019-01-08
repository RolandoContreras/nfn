<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/sell.js"></script>
<form id="customer-form" name="cobros-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/ventas/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de Ventas - Tarjeta</a>
                                </div>
                        </div>
                </div>
              <div class="well nomargin" style="width: 600px;">
                    <div class="inner">
                    <strong>Criptomoneda:</strong>
                        <select name="currency" id="currency">
                        <option value="">[ Seleccionar ]</option>
                            <?php foreach ($obj_currency as $value ): ?>
                        <option value="<?php echo $value->currency_id;?>"
                            <?php 
                                    if(isset($obj_sell->currency_id)){
                                            if($obj_sell->currency_id==$value->currency_id){
                                                echo "selected";
                                            }
                                    }else{
                                              echo "";
                                    }
                            ?>><?php echo $value->name;?>
                        </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br/>
              </div>  
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_sell->sell_id)?$obj_sell->sell_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="sell_id" name="sell_id" value="<?php echo isset($obj_sell->sell_id)?$obj_sell->sell_id:"";?>">
              <input type="hidden" id="type_sell" name="type_sell" value="1">
              <br><br>
              <strong>Cliente:</strong><br>
              <input type="text" value="<?php echo isset($obj_sell->first_name)?$obj_sell->first_name." ".$obj_sell->last_name:"";?>" class="input-xlarge-fluid" placeholder="Cliente" disabled="">
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="date" name="date" value="<?php echo isset($obj_sell->date)?formato_fecha_barras($obj_sell->date):"";?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Precio €:</strong><br>   
              <input type="text" id="price" name="price" value="<?php echo isset($obj_sell->price)?$obj_sell->price:0;?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Comisión €:</strong><br>   
              <input type="text" id="tax" name="tax" value="<?php echo isset($obj_sell->tax)?$obj_sell->tax:0;?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Importe €:</strong><br>   
              <input type="text" id="amount" name="amount" value="<?php echo isset($obj_sell->amount)?$obj_sell->amount:0;?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Wallet:</strong><br>   
              <input type="text" id="wallet" name="wallet" value="<?php echo isset($obj_sell->wallet)?$obj_sell->wallet:"";?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Cantidad  Criptomoneda:</strong><br>   
              <input type="text" id="amount_btc" name="amount_btc" value="<?php echo isset($obj_sell->amount_btc)?$obj_sell->amount_btc:0;?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Observaciones:</strong><br>              
              <textarea class="form-control" name="obs" id="obs" style="height: 200px;width: 100% !important"><?php echo ($obj_sell->obs != "") ? $obj_sell->obs : "";?></textarea>
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="active" id="active">
                         <option value="1" <?php if($obj_sell->active == 1){ echo "selected";}?>>Pendiente</option>
                         <option value="2" <?php if($obj_sell->active == 2){ echo "selected";}?>>Cancelado</option>
                         <option value="3" <?php if($obj_sell->active == 3){ echo "selected";}?>>Procesado</option>
                  </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_card();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
