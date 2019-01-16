<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct() { 
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("paises_model", "obj_paises");
        $this->load->model("regiones_model", "obj_regiones");
        $this->load->model("box_model", "obj_box");
        $this->load->model("invoices_model", "obj_invoices");
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
            //SELECT URL IF ISSET USERNAME
            $url = explode("/", uri_string());
            if (isset($url[3])) {
                $username = $url[3];
                //Select params
                $params = array(
                    "select" => "customer_id,first_name, position_temporal,username,identificador",
                    "where" => "username = '$username'");
                $obj_paises['obj_customer'] = $this->obj_customer->get_search_row($params);
            }
            //Select params
            $params = array(
                "select" => "id, nombre",
                "where" => "id_idioma = 7");
            $obj_paises['obj_paises'] = $this->obj_paises->search($params);
            /// VIEW
            $this->load->view("register", $obj_paises);
	}
        
        public function validate()
	{
            //GET DATA STRING
            if ($this->input->is_ajax_request()) {
                $name = $this->input->post("name"); 
                $last_name = $this->input->post("last_name"); 
                $email = $this->input->post("email"); 
                $dni = $this->input->post("dni"); 
                $pass = $this->input->post("pass"); 
                $phone = $this->input->post("phone"); 
                $address = $this->input->post("address"); 
                $pais = $this->input->post("pais"); 
                $region = $this->input->post("region"); 
                $city = $this->input->post("city"); 

                //CREATE SESION NEW_CUSTOMER
                $data_new_customer_session['name'] = $name;
                $data_new_customer_session['last_name'] = $last_name;
                $data_new_customer_session['email'] = $email;
                $data_new_customer_session['dni'] = $dni;
                $data_new_customer_session['pass'] = $pass;
                $data_new_customer_session['phone'] = $phone;
                $data_new_customer_session['address'] = $address;
                $data_new_customer_session['pais'] = $pais;
                $data_new_customer_session['region'] = $region;
                $data_new_customer_session['city'] = $city;
                $_SESSION['new_customer'] = $data_new_customer_session; 
                
                if(isset($_SESSION['new_customer'])){
                    $data['status'] = "true";
                }else{
                    $data['status'] = "false";
                }
                echo json_encode($data);
                exit();
            }
	}
        
        public function step2()
	{   
            //GET SESION NEW CUSTOMER
            $this->get_session();
            //SELECT ID FROM CUSTOMER
            $param_box = array(
                                "select" => "box_id,
                                             name,
                                             price,
                                             img",
                                "where" => "active = 1 and status_value = 1");
            $obj_box['obj_box'] = $this->obj_box->search($param_box);
            
            $this->load->view("register_step2",$obj_box);
            
	}
        
        public function create_register()
	{   
            //GET SESION NEW CUSTOMER
            $this->get_session();
            //SET TIMEZONE AMERICA
            date_default_timezone_set('America/Lima');
            //get data
            $box = $this->input->post("box");
            $code = str_to_minuscula(trim($this->input->post('code')));
            $param_customer = array(
                "select" => "customer_id",
                "where" => "code = '$code' and status_value = 1");
            $customer = $this->obj_customer->get_search_row($param_customer);
            $customer_id = $customer->customer_id;
            $count = count($customer);
            
            if($count == 1){
                //CREATE CÓDIGO
                $param_customer = array(
                    "select" => "code",
                    "where" => "status_value = 1",
                    "order" => "code DESC",
                    );
                $customer = $this->obj_customer->get_search_row($param_customer);
                $new_code = $customer->code + 1;
                $new_code = str_pad($new_code, 7, "0", STR_PAD_LEFT);
                
                //INSERT TABLE CUSTOMER
                $data = array(
                        'first_name' => $_SESSION['new_customer']['name'],
                        'last_name' => $_SESSION['new_customer']['last_name'],
                        'code' => $new_code,
                        'box_id' => $box,
                        'email' => $_SESSION['new_customer']['email'],
                        'password' => $_SESSION['new_customer']['pass'],
                        'parents_id' => $customer_id,
                        'address' => $_SESSION['new_customer']['address'],
                        'phone' => $_SESSION['new_customer']['phone'],
                        'dni' => $_SESSION['new_customer']['dni'],
                        'city' => $_SESSION['new_customer']['city'],
                        'country' => $_SESSION['new_customer']['pais'],
                        'region' => $_SESSION['new_customer']['region'],
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    $customer_id = $this->obj_customer->insert($data);
                    
                //CREATE INVOICE
                $data_invoice = array(
                        'customer_id' => $customer_id,
                        'box_id' => $box,
                        'subject' => "Activación Cliente",
                        'box_id' => $box,
                        'type' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    $this->obj_invoices->insert($data_invoice);
                    
                    $data_customer_session['customer_id'] = $customer_id;
                    $data_customer_session['code'] = $new_code;
                    $data_customer_session['name'] = $_SESSION['new_customer']['name'].' '.$_SESSION['new_customer']['last_name'];
                    $data_customer_session['email'] = $_SESSION['new_customer']['email'];
                    $data_customer_session['active'] = 0;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['status'] = 1;
                    $_SESSION['customer'] = $data_customer_session; 
                    
                    //CREATE EMAIL
                    $this->message($_SESSION['new_customer']['name'],$new_code,$_SESSION['new_customer']['email'],$_SESSION['new_customer']['pass']);
                    $data['status'] = "true";
            }else{
                    $data['status'] = "false";
            }
            echo json_encode($data);
	}
        
        
    public function validate_region() {
        if ($this->input->is_ajax_request()) {
        $id_pais = trim($this->input->post('id'));
        //SELECT ID FROM CUSTOMER
        $param_regiones = array(
            "select" => "id,nombre",
            "where" => "id_pais = $id_pais and id_idioma = 7");
        $region['region'] = $this->obj_regiones->search($param_regiones);

        if (count($region) > 0) {
            $data['message'] = "true";
            $data['print'] = $region['region'];
        } else {
            $data['message'] = "false";
            $data['print'] = "Seleccionar un país";
        }
        echo json_encode($data);
        }
    }

    public function validate_code() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $code = str_to_minuscula(trim($this->input->post('code')));
            $param_customer = array(
                "select" => "customer_id,
                             first_name,
                             last_name",
                "where" => "code = '$code' and status_value = 1");
            $customer = $this->obj_customer->get_search_row($param_customer);
            $count = count($customer);
            
            if ($count == 1) {
                $data['message'] = "true";
                $data['print'] = "$customer->first_name $customer->last_name (verificado)! <i class='fa fa-check-square-o' aria-hidden='true'></i>";
                $data['code'] = $customer->customer_id;
            } else {
                $data['message'] = "false";
                $data['print'] = "Cliente no existe! <i class='fa fa-times-circle-o' aria-hidden='true'></i>";
            }
            echo json_encode($data);
            }
        }
        
    public function message($name,$code,$email,$pass){
       $mensaje = wordwrap("<html>
            <div style='margin-top:25px'>
            <table width='100%' cellspacing='0' cellpadding='0' border='0'>
            <tbody>
            <tr>
            <td style='padding:15px 0;border-top:1px dotted #c5c5c5' width='100%'>
                <table style='table-layout:fixed' width='100%' cellspacing='0' cellpadding='0' border='0'>
                    <tbody>
                    <tr>
                        <td style='padding:0;margin:0' width='100%' valign='top'>
                            <p style='font-family:Lucida Grande','Lucida Sans Unicode','Lucida Sans',Verdana,Tahoma,sans-serif;font-size:15px;line-height:18px;margin-bottom:0;margin-top:0;padding:0;color:#1b1d1e'>
                            <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'><b>Estimado cliente</strong></b> (New Future Network)</p>
                            <div class='m_-8753525431338155893zd-comment' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                              <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                              Hola $name, nos complace confirmarle que su cuenta ha sido creada exitosamente y le facilitamos sus datos para entrar a nuestra plataforma.</p>
                              <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'><em>Datos de entrada a plataforma:</em></p>
                              <ul dir='auto' style='list-style-type:disc;margin:10px 0 15px 30px;padding-left:15px' type='disc'>
                                <li style='Verdana,sans-serif;font-size:14px;line-height:22px;margin:10px 0' type='disc'>Código: <em>$code</em></li>
                                <li style='Verdana,sans-serif;font-size:14px;line-height:22px;margin:10px 0' type='disc'>Contraseña: <em>$pass</em></li>
                              </ul>
                              <p></p>
                              <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                              <em><a href='https://rednfn.com' target='_blank'>www.rednfn.com</a></em></p>
                              <p></p>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
                    <div style='padding:10px;line-height:18px;font-family:Verdana,Arial,sans-serif;font-size:12px;color:#aaaaaa;margin:10px 0 14px 0;padding-top:10px;border-top:1px solid #eeeeee'></div>
                    Este correo electrónico es un servicio de New Future Network. 
                    <div style='clear:left;float:left;margin-top:10px;width:100%;font-family:Arial,Helvetica,sans-serif;font-size:12px!important'>
                    <span style='font-size:10px;display:block;margin-top:8px!important'>
                    La información contenida en este mensaje y/o archivo(s) adjunto(s), enviada desde Red NFN, es confidencial/privilegiada y está destinada a ser leída sólo por la(s) persona(s) a la(s) que va dirigida. Le recordamos que sus datos han sido incorporados en el sistema de tratamiento de nuestra empresa y que siempre y cuando se cumplan los requisitos exigidos por la normativa, usted podrá ejercer sus derechos de acceso, rectificación, limitación de tratamiento, supresión, portabilidad y oposición/revocación, en los términos que establece la normativa vigente en materia de protección de datos. 
                    Si usted lee este mensaje y no es el destinatario señalado, el empleado o el agente responsable de entregar el mensaje al destinatario, o ha recibido esta comunicación por error, le informamos que está totalmente prohibida, y puede ser ilegal, cualquier divulgación, distribución o reproducción de esta comunicación, y le rogamos que nos lo notifique inmediatamente y nos devuelva el mensaje original a la dirección contacto@rednfn.com. Gracias 
                    </span>
                </div>'
                .</html>", 70, "\n", true);
                    $titulo = "Bienvenido(a) - [New Future Network]";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: New Future Network <contacto@rednfn.com>\r\n";
                    $bool = mail("$email",$titulo,$mensaje,$headers);
    }
    
    public function get_session(){          
        if (isset($_SESSION['new_customer'])){
            return true;
        }else{
            redirect(site_url().'register');
        }
    }

}
