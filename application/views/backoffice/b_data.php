<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?=lang('idioma.b_tit_perfil');?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?=lang('idioma.b_precio_bitcoin');?> <span style='color:#D4AF37'><?php echo format_number_6decimal($price_btc);?> <i class="fa fa-eur"></i></span></a>
        </div>
    </div> 
<div id="principal" class="tabcontent" style="display:block !important">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="profile-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-form" data-behaviour="container">
                            <div class="panel-heading text-uppercase clearfix">
                                <h3 class="title"><?=lang('idioma.b_informacion');?></h3>
                            </div>
                            <hr class="style-2"/>
                            <div class="panel-body">         
                    <div data-behaviour="content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-male fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="user-name-info"><span><?php echo $obj_customer->email;?></span></div>
                                                <p class="form-control">
                                                    <span><?php echo $obj_customer->first_name." ".$obj_customer->last_name;?></span>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 border-left">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-envelope fa-3x"></i></div>
                                        <div class="media-body">
                                            <div class="control-label"><?=lang('idioma.b_email');?></div>
                                            <p class="form-control">
                                                <span><?php echo strtolower($obj_customer->email);?></span>
                                                <input type="hidden" id="customer_id" name="customer_id" disabled value="<?php echo $obj_customer->customer_id;?>">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 border-left">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-mobile fa-4x" aria-hidden="true"></i></div>
                                        <div class="media-body">
                                            <div class="control-label"><?=lang('idioma.b_movil');?></div>
                                            <p class="form-control">
                                                <span><?php echo $obj_customer->phone;?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-default panel-form fix-info">
                            <div class="panel-heading text-uppercase">
                                <div class="clearfix">
                                    <h3 class="title"><?=lang('idioma.b_fecha_namiciento');?></h3>
                                </div>
                            </div>
                            <hr class="style-1"/>
                            <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="form-group has-feedback">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?=lang('idioma.b_fecha');?></label>
                                                     <p class="form-control"><span><?php echo formato_fecha_barras($obj_customer->birth_date);?></span></p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default panel-form fix-info">
                            <div class="panel-heading text-uppercase">
                                <div class="clearfix">
                                    <h3 class="title"><?=lang('idioma.b_codigo_postal');?></h3>
                                </div>
                            </div>
                            <hr class="style-1"/>
                            <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="form-group has-feedback">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-id-card fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?=lang('idioma.b_number');?></label>
                                                     <p class="form-control"><span><?php echo $obj_customer->postal;?></span></p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="panel panel-default panel-form fix-info">
                        <div class="panel-heading text-uppercase">
                            <div class="clearfix">
                                <h3 class="title"><?=lang('idioma.b_identificacion');?>
                                    <?php $obj_customer->dni == "" ? $style="disable":$style=""?>
                                    <div class="pull-right">
                                        <button onclick="alter_dni();" class="submit_btn_comprar"><?=lang('idioma.b_guardar');?></button>
                                 </div></h3>
                            </div>
                        </div>
                        <hr class="style-1"/>
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-id-card fa-3x"></i></div>
                                        <div class="media-body">
                                             <label class="control-label"><?=lang('idioma.b_pasaporte');?></label>
                                             <?php 
                                             if($obj_customer->dni == ""){ ?>
                                                 <input type="text" id="dni" name="dni" required="required" class="form-control form-control"/>
                                                 <span id="dni_success" style="font-size: 12px; display: none;" class="label label-success"><?=lang('idioma.b_documento_guardado');?></span>
                                            </div>
                                             <?php }else{ ?>
                                                <p class="form-control"><span><?php echo $obj_customer->dni;?></span></p>
                                             <?php } ?>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-form" data-behaviour="container">
                        <div class="panel-heading text-uppercase clearfix">
                            <h3 class="title"><?=lang('idioma.b_direccion');?></h3>
                        </div>
                       <hr class="style-2"/> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?=lang('idioma.b_pais');?></label>
                                                     <p class="form-control"><span><?php echo $obj_customer->pais;?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?=lang('idioma.b_provincia');?></label>
                                                     <p class="form-control"><span><?php echo $obj_customer->provincia;?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                    <label class="control-label"><?=lang('idioma.b_localidad');?></label>
                                                <p class="form-control"><span><?php echo $obj_customer->city;?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr class="style-1"/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label"><?=lang('idioma.b_direccion');?></label>
                                                    <p class="form-control"><span><?php echo $obj_customer->address;?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                        <!--<form>-->
                        <div class="panel panel-default panel-form">
                            <div class="panel-heading text-uppercase">
                                <h3 class="title"><?=lang('idioma.b_cambiar_contrasena');?></h3>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">
                                <div class="">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label required"><?=lang('idioma.b_contrasena_actual');?></label>
                                        <span class="invite-link-more-info" data-tooltip data-tooltip-class="tooltip-info" title="<?=lang('idioma.b_introduzca_contrasena');?>"><i class="fa fa-lg fa-question-circle"></i></span>
                                        <input type="password" id="password" name="password" onkeyup="validate_password(this.value);" class="form-control form-control" maxlength="50" data-constraints="@NotEmpty"/>
                                        <span id="message" style="font-size: 12px; display: none; text-align: center" class="field-validation-error"><?=lang('idioma.b_contrasena_invalida');?></span>
                                        <span id="message_success" style="font-size: 12px; display: none;" class="label label-success"><?=lang('idioma.b_contrasena_valida');?></span>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required"><?=lang('idioma.b_nueva_contrasena');?></label>
                                        <input type="password" id="password_one" name="password_one" required="required" class="form-control form-control"/>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required"><?=lang('idioma.b_repita_contrasena');?></label>
                                        <input type="password" id="password_two" name="password_two" required="required" class="form-control form-control"/></div>

                                    </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="mb-10">
                                            <button onclick="alter_password();" class="submit_btn_comprar"><?=lang('idioma.b_cambiar_contrasena');?></button>
                                            <span id="password_success" style="font-size: 12px; display: none;" class="label label-success"><?=lang('idioma.b_contrasena_cambiada');?></span>
                                            <span id="password_no_success" style="font-size: 12px; display: none;" class="label label-danger"><?=lang('idioma.b_datos_invalidos');?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                     <!--</form>-->
                </div>
        </div>
            
            
            
            </div>
</div>
</div>
</div>
</div>  
</section>
<script src="<?php echo site_url().'static/backoffice/js/data.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
    
    
