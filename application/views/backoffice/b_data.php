<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Perfil</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
    <div class="tab">
        <button class="tablinks active"  onclick="openCity(event, 'principal')"><b>INFORMACIÓN PRINCIPAL</b></button>
        <button class="tablinks" onclick="openCity(event, 'payments')"><b>CONTRASEÑAS</b></button>
    </div>
<div id="principal" class="tabcontent" style="display:block !important">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="profile-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-form" data-behaviour="container">
                            <div class="panel-heading text-uppercase clearfix">
                                <h3 class="title"><?php echo "Información";?></h3>
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
                                            <div class="user-name-info"><span><?php echo $obj_customer->username;?></span></div>
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
                                            <div class="control-label"><?php echo "E-mail";?></div>
                                            <p class="form-control">
                                                <span><?php echo $obj_customer->email;?></span>
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
                                            <div class="control-label"><?php echo "Teléfono Movil:";?></div>
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
                    <div class="col-md-6">
                        <div class="panel panel-default panel-form fix-info">
                            <div class="panel-heading text-uppercase">
                                <div class="clearfix">
                                    <h3 class="title"><?php echo "País";?></h3>
                                </div>
                            </div>
                            <hr class="style-1"/>
                            <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="form-group has-feedback">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?php echo "País :";?></label>
                                                    <p class="form-control"><span><?php echo $obj_customer->pais;?></span></p>
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
                                <h3 class="title"><?php echo "Identificación";?></h3>
                            </div>
                        </div>
                        <hr class="style-1"/>
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-id-card fa-3x"></i></div>
                                        <div class="media-body">
                                             <label class="control-label"><?php echo "Pasaporte / Numero de Identidad:";?></label>
                                             <p class="form-control"><span><?php echo $obj_customer->dni;?></span></p>
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
                            <h3 class="title"><?php echo "Dirección";?></h3>
                        </div>
                       <hr class="style-2"/> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label"><?php echo "Región :";?></label>
                                                     <p class="form-control"><span><?php echo $obj_customer->region;?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                    <label class="control-label"><?php echo "Ciudad :";?></label>
                                                <p class="form-control"><span><?php echo $obj_customer->city;?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr class="style-1"/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo "Dirección :";?></label>
                                                    <p class="form-control"><span><?php echo $obj_customer->address;?></span></p>
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
</div>
</div>  
<!--BANK DETAILS-->    
<div id="payments" class="tabcontent">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default panel-form" data-behaviour="container">
                        <div class="panel-heading text-uppercase clearfix">
                            <h3 class="title pull-left"><?php echo replace_vocales_voculeshtml("Billetera de bitcoin");?></h3>
                            <div class="pull-right">
                                <button type="button" onclick="alter_btc();" class="btn btn-primary btn-sm edit-btn">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar </button>
                                </div>                            
                        </div>
                        <hr class="style-2"/>
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group">
                                    <label class="control-label"><?php echo replace_vocales_voculeshtml("Dirección de bitcoin: ");?></label>
                                    <div class="form-group">
                                        <p class="form-control">
                                            <input type="text" id="btc" name="btc" class="form-control form-control" data-constraints="@NotEmpty" value="<?php echo $obj_customer->btc_address;?>"/>
                                        </p>
                                    </div>
                                    <div id="alert_message_wallet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                        <form name="form">
                        <div class="panel panel-default panel-form">
                            <div class="panel-heading text-uppercase">
                                <h3>Cambiar Contraseña</h3>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">
                                <div class="">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label required">Contraseña Actual</label>
                                        <span class="invite-link-more-info" data-tooltip data-tooltip-class="tooltip-info" title="Introduzca su contraseña actual."><i class="fa fa-lg fa-question-circle"></i></span>
                                        <input type="password" id="password" name="password" onkeyup="validate_password(this.value);" class="form-control form-control" maxlength="50" data-constraints="@NotEmpty"/>
                                        <span class="alert-0"></span>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Nueva Contraseña</label>
                                        <input type="password" id="password_one" name="password_one" disabled  required="required" class="form-control form-control"/>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Repita Nueva Contraseña</label>
                                        <input type="password" id="password_two" name="password_two" required="required" disabled  class="form-control form-control"/></div>

                                    </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="mb-10">
                                            <a class="btn btn-primary btn-block" onclick="alter_password();" name="button_password" style="word-wrap: break-word; white-space: normal !important;"><?php echo replace_vocales_voculeshtml("Cambiar Contraseña");?></a>
                                            <div id="alert_message_password"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div> 
</div>    
<script src="<?php echo site_url().'static/backoffice/js/data.js';?>"></script>
</section>
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<style>
    /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    
    border-radius: 15px 15px 0px 0px;
    -moz-border-radius: 15px 15px 0px 0px;
    -webkit-border-radius: 15px 15px 0px 0px;
    border: 0px solid #000000;
    
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
   /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
background: #45484d; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover, #45484d 0%, #000000 100%); /* FF3.6-15 */
background: -webkit-radial-gradient(center, ellipse cover, #45484d 0%,#000000 100%); /* Chrome10-25,Safari5.1-6 */
background: radial-gradient(ellipse at center, #45484d 0%,#000000 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
color:white;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
    
    
