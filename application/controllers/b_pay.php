<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_pay extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_comission");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.parents_id,
                                    customer.code,
                                    customer.email,
                                    customer.created_at,
                                    customer.phone,
                                    customer.password,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    customer.address,
                                    customer.date_start,
                                    customer.date_end,
                                    customer.city,
                                    customer.active,
                                    customer.status_value,
                                    paises.nombre as pais,
                                    regiones.nombre as region
                                    ",
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7 and regiones.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'regiones, customer.region = regiones.id')
                                        );

         $obj_customer = $this->obj_customer->get_search_row($params); 
         //GET SPONSOR
         $parent = $obj_customer->parents_id;
         $name = $obj_customer->first_name.' '.$obj_customer->last_name;
         $param_sponsor = array(
                        "select" =>"customer.code,customer.first_name,customer.last_name",
                        "where" => "customer.customer_id = $parent");

         $obj_sponsor = $this->obj_customer->get_search_row($param_sponsor);
         
         
         //SEND DATA TO VIEW  
         echo '
             
               <div id="principal" class="tabcontent" style="display: block;">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="profile-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-form" data-behaviour="container">
                            <div class="panel-heading text-uppercase clearfix">
                                <div class="pull-left">
                                    <h3>Datos Personales</h3>
                                </div>    
                                <div class="pull-right tooltip-demo">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="btn btn-default btn-sm" onclick="cerrar_pagina();" data-original-title="Cerrar ventana"><i class="fa fa-times"></i> Cerrar</a>
                                </div>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">         
                    <div data-behaviour="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-male fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="user-name-info"><span>'.$obj_customer->code.'</span></div>
                                                <p class="form-control">
                                                    <span>'.$name.'</span>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 border-left">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-envelope fa-3x"></i></div>
                                        <div class="media-body">
                                            <div class="control-label">E-mail</div>
                                            <p class="form-control">
                                                <span>'.$obj_customer->email.'</span>
                                                <input type="hidden" id="customer_id" name="customer_id" disabled="" value="56">
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
                <div class="col-md-12">
                    <div class="panel panel-default panel-form" data-behaviour="container">
                        <div class="panel-heading text-uppercase clearfix">
                            <h3 class="title_back">Activación</h3>
                        </div>
                       <hr class="style-2"> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar-check-o fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Fecha de Creación :</label>
                                                    <p class="form-control"><span>'.$obj_customer->created_at.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar-check-o fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Fecha de Activación :</label>
                                                    <p class="form-control">
                                                    <span>---</span>
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
            <div class="row">
                 <div class="col-md-6">
                    <div class="panel panel-default panel-form fix-info">
                        <div class="panel-heading text-uppercase">
                            <div class="clearfix">
                                <h3 class="title_back">Teléfono</h3>
                            </div>
                        </div>
                        <hr class="style-1">
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-mobile fa-4x" aria-hidden="true"></i></div>
                                        <div class="media-body">
                                             <div class="control-label">Teléfono</div>
                                             <p class="form-control"><span>'.$obj_customer->phone.'</span></p>
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
                                <h3 class="title_back">Identificación</h3>
                            </div>
                        </div>
                        <hr class="style-1">
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-id-card fa-3x"></i></div>
                                        <div class="media-body">
                                             <label class="control-label">Pasaporte / Numero de Identidad</label>
                                             <p class="form-control"><span>'.$obj_customer->dni.'</span></p>
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
                            <h3 class="title_back">Dirección</h3>
                        </div>
                       <hr class="style-2"> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">País :</label>
                                                    <p class="form-control"><span>'.$obj_customer->pais.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Región :</label>
                                                     <p class="form-control"><span>'.$obj_customer->region.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Dirección :</label>
                                                    <p class="form-control"><span>Av. Tomas Guzman 513 - SJM</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Ciudad :</label>
                                                <p class="form-control"><span>'.$obj_customer->city.'</span></p>
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
</div>
</div>
</div>
    '
         ;
         
	}
        
        public function extracto(){
    
            //GET SESSION   
            $this->get_session();
            //GET CUSTOMER_ID
            $customer_id = $_SESSION['customer']['customer_id'];
            
            //GET DATA TOTAL
            $params = array(
                        "select" =>"sum(amount) as total_referido,
                                    (select sum(amount) from commissions where bonus_id between 2 and 11) as total_consumo, 
                                    (select sum(amount) from commissions where bonus_id between 12 and 15) as total_pl
                                    ",
                        "where" => "bonus_id = 1 and customer_id = $customer_id",                              
                        "order" => "commissions_id DESC"              
                                        );            
            //GET DATA COMMISSIONS
            $obj_comission_total= $this->obj_comission->get_search_row($params);
            //GET TOTAL
            $total =  $obj_comission_total->total_referido + $obj_comission_total->total_consumo + $obj_comission_total->total_pl;
            //SET PARAM
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.code,
                                    customer.first_name,
                                    customer.last_name,
                                    bonus.name as bonus,
                                    commissions.amount,
                                    sell.date,
                                    invoices.invoice_id,
                                    invoices.customer_id,
                                    commissions.status_value,
                                    commissions.date,
                                    c1.code,
                                    c1.first_name,
                                    c1.last_name",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id',
                                        'sell, sell.sell_id = commissions.sell_id',
                                        'invoices, invoices.invoice_id = sell.invoice_id',
                                        'customer as c1, c1.customer_id = invoices.customer_id'), 
                        "where" => "customer.customer_id = $customer_id and commissions.active = 1",                              
                        "order" => "commissions.commissions_id DESC",
                        "limit" => "50"              
                                        );            
            
            //GET DATA COMMISSIONS
            $obj_comission= $this->obj_comission->search($params);
            
             echo "
        <div id='payments' class='tabcontent' style='display: block;'>
    <div class='row ml-custom'>
        <div class='col-xs-12'>
            <div class='row'>
                <div class='col-md-12'>
                        <div class='panel panel-default panel-form' data-behaviour='container'>
                            <div class='panel-heading text-uppercase clearfix'>
                                <div class='pull-left'>
                                    <h3>Extracto</h3>
                                </div>    
                                <div class='pull-right tooltip-demo'>
                                    <a title='' data-placement='top' data-toggle='tooltip' class='btn btn-default btn-sm' onclick='cerrar_pagina();' data-original-title='Cerrar ventana'><i class='fa fa-times'></i> Cerrar</a>
                                </div>
                            </div>
                                    <div class='col-lg-12'>
                                      <div id='panelDemo14' class='panel panel-success'>
                                            <div class='panel-body'>
                                                <div id='archivos_subidos'>
                                                    <div class='row'>
                                                        <div class='col-lg-6'>
                                                            <div class='table-responsive'>
                                                                <table class='table table-hover'>
                                                                <a class='btn btn-primary btn-block' href='javascript:void(0);'>Extracto</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan='3'></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style='padding: 10px'><i class='fa fa-check-circle-o'></i></td>
                                                                            <td style='padding: 10px'>Referidos Directos</td>
                                                                            <td style='padding: 10px' class='text-center'><b>".format_number_moneda_soles($obj_comission_total->total_referido)."</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding: 10px'><i class='fa fa-check-circle-o'></i></td>
                                                                            <td style='padding: 10px'>Bono Consumo</td>
                                                                            <td style='padding: 10px' class='text-center'><b>".format_number_moneda_soles($obj_comission_total->total_consumo)."</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding: 10px'><i class='fa fa-check-circle-o'></i></td>
                                                                            <td style='padding: 10px'>Bono PL</td>
                                                                            <td style='padding: 10px' class='text-center'><b>".format_number_moneda_soles($obj_comission_total->total_pl)."</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan='2'>
                                                                                <a class='btn btn-primary btn-block' href='javascript:void(0);'>total</a>
                                                                            </td>
                                                                            <td>
                                                                                <a class='btn btn-primary btn-block' href='javascript:void(0);'>".format_number_moneda_soles($total)."</a>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class='col-lg-6'>
                                                            <div role='alert' class='alert alert-info'>
                                                                    <strong>Nota:</strong><br>
                                                                    Solo se muestran las 50 últimas comisiones ganadas.
                                                            </div>
                                                        </div>


                       


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='col-sm-12'>
                                      <div id='panelDemo14' class='panel panel-success'>
                                            <div class='panel-body'>
                                                <div id='archivos_subidos'>
                                                    <div class='row'>
                                                        <div class='col-lg-12'>
                                                            <div class='table-responsive'>
                                                                <table class='table table-hover'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th style='padding: 15px'><b>Fecha</b></th>
                                                                            <th style='padding: 15px'><b>Concepto</b></th>
                                                                            <th style='padding: 15px'><b>Por Referir a</b></th>
                                                                            <th style='padding: 15px'><b>Importe</b></th>
                                                                            <th style='padding: 15px' class='text-center'><b>Estado</b></th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                                      foreach ($obj_comission as $value) {
                                                                            echo "<tr>
                                                                                <td style='padding: 15px'><b>".formato_fecha_barras($value->date)."<b></td>
                                                                                <td style='padding: 15px'>$value->bonus</td>
                                                                                <td align='center' style='padding: 15px; font-size: 12px !important;'><b>$value->first_name  $value->last_name</b><br/>($value->code)</td>
                                                                                <td style='padding: 15px'>".format_number_moneda_soles($value->amount)."</td>
                                                                                <td style='padding: 15px' class='text-center'>
                                                                                    <span class='label label-success'>Abonado</span>
                                                                                </td>
                                                                            </tr>";
                                                                         }
                                                                 echo "        
                                                                    </tbody>
                                                                </table>
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







       
        ";
            
            
        
    }
        
        public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
    
        public function get_total_messages($customer_id){
        $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and active = 1 and status_value = 1 and support <> 1",
                        
                                        );
            $obj_message = $this->obj_messages->get_search_row($params);
            //GET TOTAL MESSAGE ACTIVE   
            $all_message = $obj_message->total;
            return $all_message;
    }
    
        public function get_messages($customer_id){
            $params = array(
                        "select" =>"messages_id,
                                    date,
                                    subject,
                                    label,
                                    type,
                                    messages",
                        "where" => "customer_id = $customer_id and status_value = 1 and support <> 1",
                        "order" => "messages_id DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            //GET ALL MESSAGE   
            return $obj_message;
    }
}
