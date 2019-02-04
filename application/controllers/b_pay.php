<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_pay extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_comission");
        $this->load->model("pay_model","obj_pay");
        $this->load->model("pay_commission_model","obj_pay_commision");
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
        /// GET CUSTOMER ID
        $customer_id = $_SESSION['customer']['customer_id'];
        
        //GET DATA TOTAL
            $params = array(
                        "select" =>"sum(amount) as total
                                    ",
                        "where" => "active = 1 and customer_id = $customer_id",                              
                        "order" => "commissions_id DESC"              
                                        );            
            //GET DATA COMMISSIONS
            $obj_comission_total= $this->obj_comission->get_search_row($params);
        
        $params = array(
                        "select" =>"pay_id,
                                    date,
                                    amount,
                                    amount_total,
                                    active",
                        "where" => "customer_id = $customer_id and status_value = 1",
                                    );

         $obj_pay = $this->obj_pay-> search($params); 
         
         //SEND DATA TO VIEW  
         echo "
        <div id='payments' class='tabcontent' style='display: block;'>
    <div class='row ml-custom'>
        <div class='col-xs-12'>
            <div class='row'>
                <div class='col-md-12'>
                        <div class='panel panel-default panel-form' data-behaviour='container'>
                            <div class='panel-heading text-uppercase clearfix'>
                                <div class='pull-left'>
                                    <h3><b>Cobros</b></h3>
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
                                                        <div class='col-lg-8'>
                                                            <div class='table-responsive'>
                                                                <table class='table table-hover'>
                                                                <a class='btn btn-primary btn-block' href='javascript:void(0);'>TOTAL</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan='3'></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style='padding: 10px'><i class='fa fa-check-circle-o'></i></td>
                                                                            <td style='padding: 10px'>Importe Disponible</td>
                                                                            <td style='padding: 10px' class='text-center'><b>".format_number_moneda_soles($obj_comission_total->total)."</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan='3' align='center'>
                                                                                <div class='form-inline'>
                                                                                    <div class='form-group'>
                                                                                        <label for='monto'>Monto que Solicita:</label>
                                                                                            <select id='monto' name='monto' class='form-control'>
                                                                                                <option value=''>***Seleccionar***</option>
                                                                                                <option value='$obj_comission_total->total'>".format_number_moneda_soles($obj_comission_total->total)."</option>
                                                                                            </select>
                                                                                        <button onclick='enviar_pago();' class='btn btn-success'>Enviar Solicitud</button>
                                                                                    </div>
                                                                                </div> 
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div id='messages_pay'></div>

                                                            </div>
                                                        </div>
                                                        <div class='col-lg-4'>
                                                            <div role='alert' class='alert alert-info'>
                                                                    <strong>Importante:</strong><br>
                                                                    -	Los pagos se procesan a partir de los días <b>5 al 8</b> y del <b>18 al 21</b> de cada mes<br/>
                                                                    -	Recuerde completar sus datos de pagos y beneficiario para la correcta transferencia.

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
                                                                            <th style='padding: 15px'><b>Importe</b></th>
                                                                            <th style='padding: 15px' class='text-center'><b>Estado</b></th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                                      if(count($obj_pay) > 0){
                                                                          foreach ($obj_pay as $value) {
                                                                            echo "<tr>
                                                                                <td style='padding: 15px'><b>".formato_fecha_barras($value->date)."<b></td>
                                                                                <td style='padding: 15px'>".format_number_moneda_soles($value->amount_total)."</td>";
                                                                                    if($value->active == 2){
                                                                                            $style = "label-warning";
                                                                                            $value = "En Espera";
                                                                                    }else if($value->active == 3){
                                                                                            $style = "label-success";
                                                                                            $value = "Procesado";
                                                                                    }else{
                                                                                            $style = "label-danger";
                                                                                            $value = "Cancelado";
                                                                                    } 
                                                                              echo " <td style='padding: 15px' class='text-center'>
                                                                                    <span class='label $style'>$value</span>
                                                                                </td>
                                                                            </tr>";
                                                                         }
                                                                      }else{
                                                                          echo "<tr><td colspan='3' style='padding: 15px' align='center'>No hay registros</td></tr>";
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
                        "where" => "customer.customer_id = $customer_id",                              
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
    
        public function validate(){
            if($this->input->is_ajax_request()){   
                //GET MONTO
                date_default_timezone_set('America/Lima');
                $monto = trim($this->input->post('monto'));
                //GET CUSTOMER_ID FROM $_SESSION
                $customer_id = $_SESSION['customer']['customer_id'];
               
                 if($monto >= "100"){
                        //GET TOTAL AMOUNT AND TO BE PAGOS DIARIOS
                        $params = array(
                                "select" =>"commissions_id,
                                            bonus_id,
                                            date",
                                 "where" => "commissions.customer_id = $customer_id and active = 1",
                            );

                   $obj_commission = $this->obj_comission->search($params); 
                   //CREATE DATA IN PAY
                        $data = array(
                            'amount' => $monto,
                            'descount' => 0,
                            'amount_total' => $monto,
                            'customer_id' => $customer_id,
                            'active' => 2,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['customer']['customer_id'],
                        ); 
                        $pay_id = $this->obj_pay->insert($data);
                        
                    //UPDATE TABLE COMMISSIONS THE AMOUNT TO PAY
                   foreach ($obj_commission as $value) {
                            $data = array(
                                'active' => 2,
                            ); 
                            $this->obj_comission->update($value->commissions_id,$data);

                            //CREATE DATA IN PAY_COMMISSION
                            $data_pay_commission = array(
                                'pay_id' => $pay_id,
                                'commissions_id' => $value->commissions_id,
                                'status_value' => 1,
                                'created_at' => date("Y-m-d H:i:s"),
                                'created_by' => $_SESSION['customer']['customer_id'],
                            ); 
                            $this->obj_pay_commision->insert($data_pay_commission);
                   }    
                            $data['message'] = 'true';
                            echo json_encode($data);
                            exit();   

               }else{
                   $data['message'] = 'false';
                   echo json_encode($data);
                   exit();   
               }
           } 
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