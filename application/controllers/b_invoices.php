<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_invoices extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
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
                        "select" =>"customer.code,
                                    invoices.invoice_id,
                                    invoices.date,
                                    invoices.subject,
                                    invoices.active,
                                    box.name,
                                    box.price",
                        "join" => array('customer, invoices.customer_id = customer.customer_id',
                                        'box, invoices.box_id = box.box_id'),
                        "where" => "customer.customer_id = $customer_id and invoices.type = 1 and customer.status_value = 1"
               );
           //GET DATA FROM CUSTOMER
           $obj_invoices = $this->obj_invoices->search($params);
           
         //SEND DATA TO VIEW  
    echo "
        <div id='payments' class='tabcontent' style='display: block;'>
            <div class='row ml-custom'>
                <div class='col-xs-12'>
                    <div class='row'>
                        <div class='col-md-12'>
                                <div class='panel panel-default panel-form'>
                                    <div class='panel-heading text-uppercase'>
                                        <h3>Facturas de Compras</h3>
                                    </div>
                                            <div class='col-lg-12'>
                                              <div id='panelDemo14' class='panel panel-success'>
                                                    <div class='panel-body'>
                                                        <div id='archivos_subidos'>
                                                            <div class='row'>
                                                                <div class='col-lg-12'>
                                                                    <div class='table-responsive'>
                                                                        <table class='table table-hover'>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style='padding: 25px'><b>Fecha</b></th>
                                                                                    <th style='padding: 25px'><b>Kit</b></th>
                                                                                    <th style='padding: 25px'><b>Precio</b></th>
                                                                                    <th style='padding: 25px'><b>Especie</b></th>
                                                                                    <th style='padding: 25px'><b>Estado</b></th>
                                                                                    <th style='padding: 25px'><b>Acción</b></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>";
                                                                              foreach ($obj_invoices as $value) {
                                                                                        if($value->active == 1){
                                                                                            $style = "label-success";
                                                                                            $text = "activo";
                                                                                        }else{
                                                                                            $style = "label-danger";
                                                                                            $text = "inactivo";
                                                                                        }
                                                                                    echo "<tr>
                                                                                        <td style='padding: 25px'><b>".formato_fecha_barras($value->date)."<b></td>
                                                                                        <td style='padding: 25px'>$value->name</td>
                                                                                            <td style='padding: 25px'>".format_number_moneda_soles($value->price)."</td>
                                                                                        <td style='padding: 25px'>$value->subject</td>";
                                                                                            if ($value->active == 0) {
                                                                                                $valor = "Sin acción";
                                                                                                $stilo = "label label-defaul";
                                                                                            }elseif($value->active == 1){
                                                                                                $valor = "Pendiente";
                                                                                                $stilo = "label label-warning";
                                                                                            }elseif($value->active == 2){
                                                                                                $valor = "Procesado";
                                                                                                $stilo = "label label-success";
                                                                                            }else{
                                                                                                $valor = "Procesado";
                                                                                                $stilo = "label label-important";
                                                                                            } 
                                                                                     echo   "<td style='padding: 25px' class='text-center'>
                                                                                            <span class='label $style'>$text</span>
                                                                                        </td>
                                                                                        <td style='padding: 25px'>
                                                                                            <a class='label btn-primary' onclick='alter_password();' style='word-wrap: break-word; white-space: normal !important;'>&nbsp;<i class='fa fa-upload'></i>&nbsp;&nbsp;&nbsp;Subir&nbsp;&nbsp;&nbsp;</a>
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
                    </div>";
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
}
