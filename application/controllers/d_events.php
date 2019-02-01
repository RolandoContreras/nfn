<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_events extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("events_model","obj_events");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            //get data events
            $params = array(
                        "select" =>"event_id,
                                    name,
                                    date,
                                    expositor,
                                    img,
                                    time,
                                    status_value",
                        "order" => "event_id DESC",
                                    ); 
            //GET DATA COMMISSIONS
            $obj_events = $this->obj_events->search($params);
            
            /// PAGINADO
            $modulos ='eventos'; 
            $seccion = 'Lista';
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_events",$obj_events);
            $this->tmp_mastercms->render("dashboard/events/events_list");
    }
    
    public function load($event_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($event_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "event_id = $event_id",
            ); 
            $obj_events  = $this->obj_events->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_events",$obj_events);
          }
      
            $modulos ='eventos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/events/events_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $event_id = $this->input->post("event_id");
        $name =  $this->input->post('name');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $time =  $this->input->post('time');
        $img2 = $this->input->post("img2");
        $status_value = $this->input->post("status_value");
        $expositor =  $this->input->post('expositor');
        
        if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/cms/images/events/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
            }
            
            $img = $_FILES["image_file"]["name"];
            //VERIFY IMG
                
            
            if($event_id != ""){
                if($img == ""){
                    $img = $img2;
                }
                $data = array(
                        'name' => $name,
                        'date' => $date,
                        'time' => $time,
                        'img' => $img,
                        'expositor' => $expositor,
                        'status_value' => $status_value,
                        'created_by' => $_SESSION['usercms']['user_id'],
                        'created_at' => date("Y-m-d H:i:s")
                    );
                $this->obj_events->update($event_id, $data);
            }else{
            // INSERT ON TABLE activation_message
                $data = array(
                        'name' => $name,
                        'date' => $date,
                        'time' => $time,
                        'img' => $img,
                        'expositor' => $expositor,
                        'status_value' => $status_value,
                        'created_by' => $_SESSION['usercms']['user_id'],
                        'created_at' => date("Y-m-d H:i:s")
                    ); 
                   $this->obj_events->insert($data);

            }
        redirect(site_url()."dashboard/eventos");
    }
    
    public function delete(){
            //UPDATE DATA OTROS
        if($this->input->is_ajax_request()){  
              $event_id = $this->input->post("event_id");
                if(count($event_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_events->update($event_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>

