<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_invoices extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("box_model","obj_box");
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
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1",
                        "order" => "invoices.invoice_id DESC"
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
                                <div class='panel panel-default panel-form' data-behaviour='container'>
                                    <div class='panel-heading text-uppercase clearfix'>
                                        <div class='pull-left'>
                                            <h3>Facturas de Compra</h3>
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
    
    public function cambiar_kit()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        $nombre = $_SESSION['customer']['name'];
        //GET ALL KIT ACTIVE
        $param_box = array(
                            "select" => "box_id,
                                         name,
                                         price,
                                         img",
                            "where" => "active = 1 and status_value = 1");
        $obj_box = $this->obj_box->search($param_box);
            
        $params = array(
                        "select" =>"customer.code,
                                    customer.box_id",
                        "where" => "customer.customer_id = $customer_id"
               );
           //GET DATA FROM CUSTOMER
           $customer_box = $this->obj_customer->get_search_row($params);
           
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
                                            <h3>Cambiar el KIT</h3>
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
                                                                <div class='col-lg-12'>
                                                                    <div id='CadastroPasso2'>
                                                                        <div class='centralizar_2'>
                                                                            <div class='tituloPagina'>ELIJA SU KIT</div>
                                                                                <p class='text-contact-2'>¡Hola! $nombre, Ahora usted puede elegir el kit que desea consumir.</p>
                                                                                        <div class='BlocoPrincipal'>";
                                                                                            foreach ($obj_box as $value) {
                                                                                                $url_img = site_url()."static/backoffice/images/box/$value->img";
                                                                                                if($value->box_id == $customer_box->box_id){
                                                                                                    $actual = "- (Actual)";
                                                                                                }else{
                                                                                                    $actual = "";
                                                                                                }
                                                                                                echo "<div class='Blocos'>
                                                                                                    <div class='TituloKit'>
                                                                                                        <span class='alignCenter_title'>$value->name</span>
                                                                                                    </div>
                                                                                                    <div class=ImagemKit'>
                                                                                                        <span class='alignCenter'>
                                                                                                            <img src='$url_img' alt='$value->name'>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class='ValorKit'>
                                                                                                        <div class='Valor'>Precio:&nbsp;&nbsp;&nbsp;&nbsp;<b>".format_number_moneda_soles($value->price)."</b></div>
                                                                                                    </div>
                                                                                                    <div class='BotoesKit'>
                                                                                                        <div class='Botao'>
                                                                                                                <button onclick='cambiar_kit($value->box_id)' class='btn btn-success btn-block'><i class='fa fa-shopping-basket'></i> Seleccionar Kit $actual</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>";
                                                                                            }
                                                                                        echo "
                                                                                        </div>
                                                                                    
                                                                </div>
                                                            </div>
                                                            <div id='messages_confirmation'>
                                                                
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
    
    public function change_kit()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        //GET BOX_ID
        $box_id = $this->input->post("box_id");
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //UPDATE TABLE CUSTOMER
        $data = array(
                        'box_id' => $box_id,
                    ); 
                    $this->obj_customer->update($customer_id,$data);
        $data = '<div class="alert alert-success" style="text-align: center">Cambiado Exitosamente</div>';            
        echo json_encode($data);            
    }
    
    public function pagar_kit(){
        //VERIFIRY GET SESSION    
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
           
        $params = array(
                        "select" =>"active_consume",
                        "where" => "customer_id = $customer_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_customer = $this->obj_customer->get_search_row($params);
           //VALIDATE CONSUME ACTUIVE
           if($obj_customer->active_consume == 1){
               $cheked = "checked";
           }else{
               $cheked = "";
           }
           
        
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
                                            <h3><b>Pagar el KIT con bonos</b></h3>
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
                                                                <div class='col-lg-12'>
                                                                    <div role='alert' class='alert'>
                                                                            NFN puede recoger o pagar automáticamente el valor de su kit cada mes, si tiene suficiente bono en dicho mes.
                                                                            <br/><br/>
                                                                            ¿Desea habilitar el descuento automático?
                                                                             <div class='onoffswitch'>
                                                                                <input onclick='change_pagar_bono();' type='checkbox' name='onoffswitch' class='onoffswitch-checkbox' id='myonoffswitch' $cheked>
                                                                                <label class='onoffswitch-label' for='myonoffswitch'>
                                                                                    <span class='onoffswitch-inner'></span>
                                                                                    <span class='onoffswitch-switch'></span>
                                                                                </label>
                                                                            </div>
                                                                            <br/>
                                                                            <div id='messages_false' style='display:none;'>
                                                                                 <div role='alert' class='alert alert-info'>
                                                                                    Usted puede utilizar sus créditos para el pago de su kit manualmente.
                                                                                </div>
                                                                            </div>
                                                                            <div id='messages_true' style='display:none;'>
                                                                                 <div role='alert' class='alert alert-success'>
                                                                                    El descuento de su kit se hará automáticamente 
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
    
    public function change_pagar_bono()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        //GET BOX_ID
        $check = $this->input->post("check");
        
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //UPDATE TABLE CUSTOMER
        if($check == "false"){
            $active_consume = 0;
        }else{
            $active_consume = 1;
        }
        $data = array(
                        'active_consume' => $active_consume,
                    ); 
                    $this->obj_customer->update($customer_id,$data);
        $data['message'] = $active_consume;         
        echo json_encode($data);            
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
                                    invoices.type,
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
                                                                                        <a title='Cerrar ventana' data-placement='top' data-toggle='tooltip' class='btn btn-default btn-sm' onclick='cerrar_pagina_3();'><i class='fa fa-times'></i> Cerrar</a>
                                                                                    </div>
                                                                            </div>
                                                                    <div class='mail-body'>
                                                                        <form method='post' id='upload_form' name='upload_form' enctype='multipart/form-data' onclick='upload();' action='javascript:void(0);'>
                                                                                <label>De:</label>
                                                                                    <div class='form-group'>
                                                                                        <input class='form-control' name='name' id='name' placeholder='De' value='$obj_invoice->first_name $obj_invoice->last_name' disabled=''>
                                                                                            <input type='hidden' class='form-control' name='invoice_id' id='invoice_id' placeholder='De' value='$invoice_id'>
                                                                                            <input type='hidden' class='form-control' name='type' id='type' value='$obj_invoice->type'>
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
        $type = $_POST['type'];
        
        if($type == '1'){
            $name_path = "nuevo_cliente";
        }else{
            $name_path = "consumos";
        }
        
        $param = array(
                        "select" =>"invoice_id,active",
                         "where" => "invoice_id = $invoice_id"
                         );
         $obj_invoice = $this->obj_invoices->get_search_row($param);
         
         //VERIFI STATUS
        if($obj_invoice->active == 0){
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = "./static/backoffice/images/invoices/$name_path/";
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
