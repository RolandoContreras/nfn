<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_sac extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("category_model","obj_category");

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
        //GET DATA MESSAGES
        $params = array(
                        "select" =>"messages.messages_id,
                                    messages.date,
                                    messages.subject,
                                    messages.messages,
                                    messages.answer,
                                    messages.active,
                                    category.name as category",
                        "where" => "messages.customer_id = $customer_id",
                        "join" => array('category, messages.category_id = category.category_id')
                                        );

         $obj_messages = $this->obj_messages->search($params); 
         
         //GET DATA CATEGORY
         $params = array(
                        "select" =>"category_id,
                                    name",
                        "where" => "active = 1");
         $obj_category = $this->obj_category->search($params); 
         
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
                                            <h3>Servicio Atención al Cliente</h3>
                                        </div>    
                                        <div class='pull-right tooltip-demo'>
                                            <a title='' data-placement='top' data-toggle='tooltip' class='btn btn-default btn-sm' onclick='cerrar_pagina();' data-original-title='Cerrar ventana'><i class='fa fa-times'></i> Cerrar</a>
                                        </div>
                                    </div>
                                            <div class='col-lg-12'>
                                              <div class='panel panel-info'>
                        <div class='panel-heading'>Crea un ticket</div>
                        <div class='panel-body'>
                            <div class='form-inline'>
                                <button onclick='show();' class='btn btn-success'>Abrir un nuevo tiquet <i class='fa fa-plus-circle'></i></button>
                                </div>
                            </div>
                              <div class='col-md-12'>
                                <div style='display: none;' id='form-messages'>
                                  <br>
                                  <div class='panel teal'>
                                    <div class='panel-body'>
                                     <form method='post' id='form-messages_2' name='form-messages_2' enctype='multipart/form-data' onclick='create_messages();' action='javascript:void(0);'>
                                                    <label>Categoría:</label>
                                                    <div class='form-group'>
                                                        <select class='form-control' name='category' id='category'>
                                                            <option value=''>Seleccionar</option>";
                                                            foreach ($obj_category as $value) { 
                                                                echo "<option value='$value->category_id'>$value->name</option>";
                                                            }
                                                    echo "     
                                                        </select>
                                                    </div>
                                                    <label>Asunto:</label>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='subject' id='subject' placeholder='Asunto' type='text' value=''>
                                                    </div>
                                                    <div class='form-group'>
                                                           <textarea class='form-control' name='message' id='message' placeholder='Mensaje' style='height: 200px;width: 100% !important'></textarea>
                                                   </div>
                                                   <label>Debe seleccionar la imagen</label>
                                                    <div class='form-group'>
                                                        <input type='file' value='Upload Imagen de Envio' name='image_file' id='image_file'>
                                                    </div>
                                                    <hr>
                                                    <div class='form-group text-right'>
                                                        <button class='btn btn-danger' onclick='hide();'>Cerrar</button>
                                                        <button type='submit' class='btn btn-primary'>Crear Ticket</button>
                                                    </div>
                                                     <div id='message_reponse'></div>
                                            </form>
                                    </div>
                                   </div>
                                </div>
                            </div>
                         <br>
                                <div class='panel-heading'>Lista</div>
                                <div class='panel-body'>
                                    <table class='table table-hover'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th><b>Fecha</b></th>
                                                                            <th><b>Categoría</b></th>
                                                                            <th><b>Asunto</b></th>
                                                                            <th><b>Mensaje</b></th>
                                                                            <th><b>Respuesta</b></th>
                                                                            <th class='text-center'><b>Estado</b></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                                      foreach ($obj_messages as $value) {
                                                                            echo "<tr>
                                                                                <td style='padding: 15px'>".formato_fecha_barras($value->date)."</td>
                                                                                <td style='padding: 15px'>$value->category</td>
                                                                                <td style='padding: 15px'>$value->subject</td>
                                                                                <td style='padding: 15px'>$value->messages</td>
                                                                                <td style='padding: 15px'>$value->answer</td>";
                                                                                    if($value->active == 1){
                                                                                        $style = "label-default";
                                                                                        $value = "En Espera";
                                                                                    }else{
                                                                                        $style = "label-success";
                                                                                        $value = "Contestado";
                                                                                    }    
                                                                             echo   "<td style='padding: 25px' class='text-center'>
                                                                                    <span class='label $style'>$value</span>
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
                    </div>"
         ;
         
	}
        
        public function create_messages(){
            
            if($this->input->is_ajax_request()){  
              //SELECT ID FROM CUSTOMER
              $customer_id = $_SESSION['customer']['customer_id'];
              //GET DATA
              $subject = $_POST['subject'];
              $message = $_POST['message'];
              $category = $_POST['category'];

              //VERIFY ACTIVE
              $params = array(
                        "select" =>"messages_id",
                        "where" => "customer_id = $customer_id and active = 1");
                $obj_messages = $this->obj_messages->total_records($params); 
                if($obj_messages == 0){
                    if(isset($_FILES["image_file"]["name"])){
                       $config['upload_path']          = './static/backoffice/images/messages/';
                       $config['allowed_types']        = 'gif|jpg|png|jpeg';
                       $config['max_size']             = 1000;
                       $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('image_file')){
                             $error = array('error' => $this->upload->display_errors());
                              echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                        }
                        else{
                            $data = array('upload_data' => $this->upload->data());
                            $img = $_FILES["image_file"]["name"];
                            //INSERT ON TABLE MESSAGES
                               $data_img = array(
                                   'category_id' => $category,
                                   'customer_id' => $customer_id,
                                   'date' => date("Y-m-d H:i:s"),
                                   'subject' => $subject,
                                   'messages' => $message,
                                   'img' => $img,
                                   'active' => 1,
                                   'status_value' => 1,
                                   'created_at' => date("Y-m-d H:i:s"),
                                   'created_by' => $customer_id);
                               $this->obj_messages->insert($data_img);
                               echo '<div class="alert alert-success" style="text-align: center">Creado Exitosamente</div>';
                        }
                   }
                }else{
                    echo '<div class="alert alert-info" style="text-align: center">Ya fue creado el registro</div>';
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
}
