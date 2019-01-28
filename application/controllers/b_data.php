<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_data extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("customer_bank_model","obj_customer_bank");

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
                                    <h3><b>Datos Personales</b></h3>
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
        
        public function contrasena(){
        //VERIFIRY GET SESSION    
        $this->get_session();
        echo '
       <div id="payments" class="tabcontent" style="display: block;">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                        <form name="form">
                        <div class="panel panel-default panel-form">
                            <div class="panel-heading text-uppercase clearfix">
                                <div class="pull-left">
                                    <h3><b>Cambiar Contraseña</b></h3>
                                </div>    
                                <div class="pull-right tooltip-demo">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="btn btn-default btn-sm" onclick="cerrar_pagina();" data-original-title="Cerrar ventana"><i class="fa fa-times"></i> Cerrar</a>
                                </div>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">
                                <div class="">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label required">Contraseña Actual</label>
                                        <span class="invite-link-more-info" data-tooltip="" data-tooltip-class="tooltip-info" title="Introduzca su contraseña actual."><i class="fa fa-lg fa-question-circle"></i></span>
                                        <input type="password" id="password" name="password" onkeyup="validate_password(this.value);" class="form-control form-control" maxlength="50" data-constraints="@NotEmpty">
                                        <span class="alert-0"></span>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Nueva Contraseña</label>
                                        <input type="password" id="password_one" name="password_one" disabled="" required="required" class="form-control form-control">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Repita Nueva Contraseña</label>
                                        <input type="password" id="password_two" name="password_two" required="required" disabled="" class="form-control form-control"></div>

                                    </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="mb-10">
                                            <a class="btn btn-primary btn-block" onclick="alter_password();" name="button_password" style="word-wrap: break-word; white-space: normal !important;">Cambiar Contraseña</a>
                                        </div>
                                            <div id="alert_message_password"></div>
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
        ';
        
    }
    
        public function datos_pagos(){
            //VERIFIRY GET SESSION    
            $this->get_session();
            $customer_id = $_SESSION['customer']['customer_id'];
            //VERIFY IF ISSET
            $params = array(
                        "select" =>"customer_bank_id,
                                    bank_name,
                                    titular,
                                    account_number,
                                    account_number_inter",
                        "where" => "customer_id = $customer_id",
                                    );
            $obj_customer = $this->obj_customer_bank->get_search_row($params); 
            $count_customer = count($obj_customer); 
            
            if($count_customer == 1){
                $bank = $obj_customer->bank_name;
                $account_number = $obj_customer->account_number;
                $account_number_inter = $obj_customer->account_number_inter;
                $titular = $obj_customer->titular;
            }else{
                $bank = "";
                $account_number = "";
                $account_number_inter = "";
                $titular = "";
            }
            
            echo '
       <div id="payments" class="tabcontent" style="display: block;">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                        <form name="form">
                        <div class="panel panel-default panel-form">
                            <div class="panel-heading text-uppercase clearfix">
                                <div class="pull-left">
                                    <h3><b>Datos para Pago</b></h3>
                                </div>    
                                <div class="pull-right tooltip-demo">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="btn btn-default btn-sm" onclick="cerrar_pagina();" data-original-title="Cerrar ventana"><i class="fa fa-times"></i> Cerrar</a>
                                </div>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">
                                <div class="">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label required">Nombre de Banco</label>
                                        <input type="text" id="bank" name="bank" class="form-control form-control" value="'.$bank.'" data-constraints="@NotEmpty">
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Número de Cuenta (Ahorros s/.)</label>
                                        <input type="text" id="account" name="account" required="required" value="'.$account_number.'" class="form-control form-control">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Número de Cuenta Interbancario</label>
                                        <input type="text" id="account_inter" name="account_inter" value="'.$account_number_inter.'" required="required" class="form-control form-control"></div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group"><label class="control-label required">Títular de la Cuenta</label>
                                        <input type="text" id="titular" name="titular" value="'.$titular.'" required="required" class="form-control form-control"></div>
                                    </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="mb-10">
                                            <a class="btn btn-primary btn-block" onclick="save_bank();" name="button_password" style="word-wrap: break-word; white-space: normal !important;">Guardar Datos</a>
                                        </div>
                                            <div id="alert_message"></div>
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
        ';
        
    }
        
        public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 2 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
        }
        
        public function save_bank(){
            
         if($this->input->is_ajax_request()){  
           //SELECT ID FROM CUSTOMER
           $customer_id = $_SESSION['customer']['customer_id'];
           $bank = $this->input->post('bank');
           $account = $this->input->post('account');
           $account_inter = $this->input->post('account_inter');
           $titular = $this->input->post('titular');
           //VERIFY IF ISSET
           $params = array(
                        "select" =>"customer_bank_id",
                        "where" => "customer_id = $customer_id",
                                    );
         $obj_customer = $this->obj_customer_bank->total_records($params);
         if($obj_customer == 1){
             //UPDATE DATA EN CUSTOMER_BANK TABLE
               $data = array(
                   'bank_name' => $bank,
                   'account_number' => $account,
                   'account_number_inter' => $account_inter,
                   'titular' => $titular,
               ); 
               $this->obj_customer_bank->update($customer_id,$data);
         }else{
             //CREATE REGISTER ON CUSTOMER TABLE
                $data = array(
                   'customer_id' => $customer_id,
                   'bank_name' => $bank,
                   'account_number' => $account,
                   'account_number_inter' => $account_inter,
                   'titular' => $titular,
                   'created_by' => $customer_id,
                   'updated_at' => date("Y-m-d H:i:s")
                ); 
                $this->obj_customer_bank->insert($data);
         }

            $data['message'] = "true";
            echo json_encode($data); 
            }
        }
        
        public function update_password(){
             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $password_one = $this->input->post('password_one');
               $customer_id = $_SESSION['customer']['customer_id'];
               
               if($password_one != ""){
                            //UPDATE DATA EN CUSTOMER TABLE
                            $data = array(
                                            'password' => $password_one,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);

                                 $data['message'] = "true";
                                 $data['print'] = "La contraseña de cambio con exito";
                                 $data['url'] = "misdatos";
                             echo json_encode($data); 
                    
               }else{
                     $data['message'] = "false";
                     $data['print'] = "Las contraseñas no deben estan en blanco";
                     $data['url'] = "misdatos";
                     echo json_encode($data); 
               }
            }
        }

        public function validate_password() {
        //SELECT ID FROM CUSTOMER
        $password = str_to_minuscula(trim($this->input->post('password')));
        $customer_id = $_SESSION['customer']['customer_id'];
        
        $param_customer = array(
            "select" => "password",
            "where" => "customer_id = '$customer_id' and password = '$password'");
        $customer = count($this->obj_customer->get_search_row($param_customer));
        
        if ($customer > 0) {
            $data['message'] = "true";
            $data['print'] = "✔ Verificado";
        } else {
            $data['message'] = "false";
            $data['print'] = "Contraseña Incorrecta";
        }
        echo json_encode($data);
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
