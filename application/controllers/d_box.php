<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_box extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("box_model","obj_box");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"box_id,
                                        name,
                                        price,
                                        point,
                                        img,
                                        description,
                                        active",
                "where" => "status_value = 1");            
            //GET DATA COMMISSIONS
            $obj_box= $this->obj_box->search($params);
            
            /// PAGINADO
            $modulos ='box'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_box",$obj_box);
            $this->tmp_mastercms->render("dashboard/box/box_list");
    }
    
    public function load($box_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($box_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"box_id,
                                    name,
                                    price,
                                    point,
                                    img,
                                    description,
                                    active",
                         "where" => "box_id = $box_id",
            ); 
            $obj_box  = $this->obj_box->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_box",$obj_box);
          }
      
            $modulos ='box'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/box/box_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $box_id = $this->input->post("box_id");
        $img2 = $this->input->post("img2");
        $name =     $this->input->post('name');
        $price =     $this->input->post('price');
        $point =  $this->input->post('point');
        $description =  $this->input->post('description');
        $active =  $this->input->post('active');
        
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/box/';
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
                
            
                if($box_id != ""){
                    if($img == ""){
                        $img = $img2;
                    }
                    $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'description' => $description,
                            'active' => $active,
                            'status_value' => 1,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        );
                    $this->obj_box->update($box_id, $data);
                }else{
                // INSERT ON TABLE activation_message
                    $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'description' => $description,
                            'active' => $active,
                            'status_value' => 1,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        ); 
                       $this->obj_box->insert($data);
                    
                }
        
        redirect(site_url()."dashboard/box");
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