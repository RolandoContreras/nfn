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
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1"
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
                                                                                                $stilo = "label label-info";
                                                                                            }elseif($value->active == 1){
                                                                                                $valor = "Pendiente";
                                                                                                $stilo = "label label-warning";
                                                                                            }elseif($value->active == 2){
                                                                                                $valor = "Procesado";
                                                                                                $stilo = "label label-success";
                                                                                            }else{
                                                                                                $valor = "Cancelado";
                                                                                                $stilo = "label label-danger";
                                                                                            } 
                                                                                     echo   "<td style='padding: 25px' class='text-center'>
                                                                                            <span class='label $stilo'>$valor</span>
                                                                                        </td>
                                                                                        <td style='padding: 25px'>";
                                                                                            if($value->active == 0){ 
                                                                                                echo "<a class='label btn-primary' onclick='upload_images($value->invoice_id);' style='word-wrap: break-word; white-space: normal !important;'>&nbsp;<i class='fa fa-upload'></i>&nbsp;&nbsp;&nbsp;Subir&nbsp;&nbsp;&nbsp;</a>";
                                                                                             }elseif($value->active == 3){
                                                                                                echo "<a class='label btn-primary' onclick='upload_images($value->invoice_id);' style='word-wrap: break-word; white-space: normal !important;'>&nbsp;<i class='fa fa-upload'></i>&nbsp;&nbsp;&nbsp;Subir&nbsp;&nbsp;&nbsp;</a>"; 
                                                                                             }else{
                                                                                                echo "<a style='word-wrap: break-word; white-space: normal !important;'>&nbsp;<i class='fa fa-check'></i></a>";  
                                                                                             }
                                                                                        "</td>
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
    
    public function carga_documento()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA
        $invoice_id = $_GET['data'];
        $params = array(
                        "select" =>"customer.code,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.invoice_id,
                                    invoices.date,
                                    invoices.subject,
                                    invoices.active,
                                    box.name,
                                    box.price",
                        "join" => array('customer, invoices.customer_id = customer.customer_id',
                                        'box, invoices.box_id = box.box_id'),
                        "where" => "invoices.invoice_id = $invoice_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_invoice = $this->obj_invoices->get_search_row($params);
           
        echo "
            <div id='payments' class='tabcontent' style='display: block;'>
            <div class='row ml-custom'>
                <div class='col-xs-12'>
                    <div class='row'>
                        <div class='col-md-12'>
                                <div class='panel panel-default panel-form'>
                                    <div class='panel-heading text-uppercase'>
                                        <h3>Información de Pago</h3>
                                    </div>
                                            <div class='col-lg-12'>
                                              <div id='panelDemo14' class='panel panel-success'>
                                                    <div class='panel-body'>
                                                        <div id='archivos_subidos'>
                                                            <div class='row'>
                                                                <div class='mail-box-header'>
                                                                            <div class='mail-box-header clearfix'>
                                                                                    <div class='pull-right tooltip-demo'>
                                                                                        <a title='Cerrar ventana' data-placement='top' data-toggle='tooltip' class='btn btn-default btn-sm' onclick='cerrar_pagina();'><i class='fa fa-times'></i> Cerrar</a>
                                                                                    </div>
                                                                            </div>
                                                                    <div class='mail-body'>
                                                                        <form method='post' id='upload_form' name='upload_form' enctype='multipart/form-data' onclick='upload();' action='javascript:void(0);'>
                                                                                <label>De:</label>
                                                                                    <div class='form-group'>
                                                                                        <input class='form-control' name='name' id='name' placeholder='De' value='$obj_invoice->first_name $obj_invoice->last_name' disabled=''>
                                                                                            <input type='hidden' class='form-control' name='invoice_id' id='invoice_id' placeholder='De' value='$invoice_id'>
                                                                                    </div>
                                                                                 <label>Kit:</label>
                                                                                    <div class='form-group'>
                                                                                        <input class='form-control' placeholder='Kit' type='text' value='$obj_invoice->name - ".format_number_moneda_soles($obj_invoice->price)."' disabled=''/>
                                                                                    </div>
                                                                                 <label>N° Deposito Bancario:</label>
                                                                                    <div class='form-group'>
                                                                                        <input class='form-control' placeholder='Ingrese en número' id='bank_number' name='bank_number' type='text'/>
                                                                                    </div>
                                                                                 <label>Imagen del envio (opcional)</label>
                                                                                    <div class='form-group'>
                                                                                        <input type='file' value='Upload Imagen de Envio' name='image_file' id='image_file'>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class='form-group text-right'>
                                                                                        <button title='Enviar pago' data-placement='top' data-toggle='tooltip' type='submit' class='btn btn-primary'><i class='fa fa-reply'></i> Enviar</button>
                                                                                    </div>
                                                                                     <div id='uploaded_image'></div>
                                                                            </form>
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
         //SEND DATA TO VIEW  
    }
    
    public function upload(){          
        //GET SESION ACTUALY
        $this->get_session();
        //GER DATA POST
        $invoice_id = $_POST['invoice_id'];
        $bank_number = $_POST['bank_number'];
        
        $param = array(
                        "select" =>"invoice_id,active",
                         "where" => "invoice_id = $invoice_id"
                         );
         $obj_invoice = $this->obj_invoices->get_search_row($param);
         //VERIFI STATUS
        if($obj_invoice->active == 0){
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/invoices/nuevo_cliente/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);
                $this->upload->do_upload('image_file');
                    $data = array('upload_data' => $this->upload->data());
                    $img = $_FILES["image_file"]["name"];
            }
                    $data_param = array(
                               'active' => 1,
                               'activation_code' => $bank_number,
                               'img' => $img,
                               'updated_at' => date("Y-m-d H:i:s"),
                               'updated_by' => $_SESSION['customer']['customer_id']);          
                    //SAVE DATA IN TABLE    
                    $this->obj_invoices->update($invoice_id, $data_param);
        }
            echo '<div class="alert alert-success" style="text-align: center">Enviado Exitosamente</div>';
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
