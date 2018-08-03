<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Tablero</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <!--SHOW ALERT MESSAGE INFORMATIVE --> 
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <?php foreach ($messages_informative as $value) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-success">
                                            <header class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse_message"><i class="collapse-caret fa  fa-angle-up"></i> Informativo</a>
                                            </header>
                                            <div id="collapse_message" class="panel-collapse collapse in center">
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
                            </div>
                    <?php } ?>
                </div>
            </div>
            <!--END SHOW ALERT INFORMATIVE MESSAGE--> 
            <!--START NEWS-->
            <?php if($obj_news){ ?>
                <div class="col-lg-12">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-success">
                                    <header class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse61"><i class="collapse-caret fa  fa-angle-up"></i> Noticias</a>
                                    </header>
                                    <div id="collapse61" class="panel-collapse collapse in center">
                                        <div class="panel-body">
                                            <?php foreach ($obj_news as $value) { ?>
                                            <div>
                                                <img class="text-center img-rounded img-responsive" src="<?php echo site_url()."static/backoffice/images/new/$value->img";?>">
                                            </div>
                                            <hr>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
            <?php } ?>
            <!--END NEWS-->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box" style="background-color: #bbebba !important">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">TOTAL DE COMPRA</h5>
                            <p class="title"><?php if(count($obj_total)>0){echo "$".number_format($obj_total,'2','.',',');}else{echo "$0.00";}?></p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-btc fa-4x" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
            
            <div class="col-lg-12">
            <div class="row">
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box" style="background-color: #fff !important">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">Bitcoin</h5>
                            <p class="title"><span style="color:#D4AF37">$396.20</span><span style="color:red;font-size: 14px;font-weight: bold;"> -4.52</span></p><br/>
                            <img src="<?php echo site_url().'static/backoffice/images/valor.png';?>" style="display: block; width: 231px; height: 85px;">
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <button class="btn btn-success">Comprar</button>
                        </div>
                        </div>
                    </div>
                 <div class="col-sm-6">
                     <div class="well media media-badges box-height box" style="background-color: #fff !important">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">Etherium</h5>
                            <p class="title"><span style="color:#D4AF37">$499.71</span><span style="color:red;font-size: 14px;font-weight: bold;"> -2.01</span></p><br/>
                            <img src="<?php echo site_url().'static/backoffice/images/valor.png';?>" style="display: block; width: 231px; height: 85px;">
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <button class="btn btn-success" disabled="">Comprar</button>
                        </div>
                    </div>
                 </div>
            </div>   
            <div class="row">
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box" style="background-color: #fff !important">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">Dash</h5>
                            <p class="title"><?php echo $price_btc;?></p><br/>
                            <img src="<?php echo site_url().'static/backoffice/images/valor.png';?>" style="display: block; width: 231px; height: 85px;">
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <button class="btn btn-success" disabled="">Comprar</button>
                        </div>
                        </div>
                    </div>
                 <div class="col-sm-6">
                     <div class="well media media-badges box-height box" style="background-color: #fff !important">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">Litecoin</h5>
                            <p class="title"><span style="color:#D4AF37">$98.40</span><span style="color:green;font-size: 14px;font-weight: bold;"> +5.52</span><br/>
                            <img src="<?php echo site_url().'static/backoffice/images/valor.png';?>" style="display: block; width: 231px; height: 85px;">
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <button class="btn btn-success" disabled="">Comprar</button>
                        </div>
                    </div>
                 </div>
            </div>    
        </div>
            
             <!--BUY BITCOIN-->
         <div class="col-md-12"> 
            <div class="panel panel-success">
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title">COTIZAR BITCOIN</div> 
                    </div>
                <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">VALOR DOLARES</h5>
                            <input type="text" onkeyup="validate_usd(this.value);" class="form-control form-control" name="usd" id="usd"/> 
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                        </div>
                        </div>
                </div>
                <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">VALOR BITCOIN</h5>
                            <input type="text" onkeyup="validate_btc(this.value);" class="form-control form-control" name="btc" id="btc"/> 
                            <input type="hidden" name="price" id="price" value="<?php echo $only_price;?>"/> 
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-btc fa-2x" aria-hidden="true"></i>
                        </div>
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="bs-example">
                        <a onclick="make_order(<?php echo $obj_customer->customer_id;?>);"><button type="button" class="btn btn-success btn-block"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="bold">COMPRA BITCOIN</span></button></a>     
                        <br/>
                    </div>
                </div>
               <div class="col-md-12" id="alert_message"></div>         
            </div> 
        </div> 
        <!--END BUY BITCOIN-->
            </div>
        </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
