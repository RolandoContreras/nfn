<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();     
        $this->load->model('users_model','obj_user');
    }
    
    public function index(){    
       $this->load->view('dashboard');
        header("Access-Control-Allow-Origin: *");
    }
    
    public function validate(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {  
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
            header('Access-Control-Allow-Credentials: true');  
            header('Access-Control-Max-Age: 86400');   
        }  

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {  

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))  
                header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))  
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");  
        }  
            $this->form_validation->set_rules('email','email',"required|trim|valid_email|callback_validar_user");
            $this->form_validation->set_rules('password','password','required|trim');              
    	    $this->form_validation->set_message('required','Campo requerido %s');    	    
            $this->form_validation->set_message('valid_email','Correo Invalido %s');    	    
            
            if ($this->form_validation->run($this)== false){                
    	        $cadena  = explode("</p>", validation_errors());                
    	        $cadena2 = implode("<p>", $cadena);
    	        $cadena3 = explode("<p>", $cadena2);
    	        array_pop($cadena3);
    	        array_shift($cadena3);                
    	        $data['print'] = $cadena3[0];
                $data['message'] = "false";       
                
    	    }else{
                $data['message'] = "true";
    	        $data['print'] = "Bienvenido al sistema";
                $data['url'] = site_url()."dashboard/panel";               
            }         
            echo json_encode($data);  
            exit();           
    }
    
    public function validar_user($email){
        //get data password
        $password = $this->input->post('password');  
        //count if isset
        $params = array("select" =>"users.user_id,
                                    users.first_name,
                                    users.last_name,
                                    users.email,
                                    users.privilage,
                                    users.active",
                             "where" => "users.email = '$email' and users.password = '$password' and users.active = 1");
        $obj_user_login = $this->obj_user->total_records($params);
        
        if ($obj_user_login > 0){
            //get data
            $obj_user = $this->obj_user->get_search_row($params);
            if ($obj_user->active == 1){                            
                $data_user_session['user_id'] = $obj_user->user_id;
                $data_user_session['name'] = $obj_user->first_name.' '.$obj_user->last_name;
                $data_user_session['email'] = $obj_user->email;
                $data_user_session['privilage'] = $obj_user->privilage;
                $data_user_session['logged_usercms'] = "TRUE";
                $data_user_session['status'] = $obj_user->active;
                $_SESSION['usercms'] = $data_user_session;                
                return true;    
            }else{
                $this->form_validation->set_message('validar_user', "Usuario Inactivo");
                return false;
            }
        }else{
            $this->form_validation->set_message('validar_user', "El correo y/o la contraseña no son correctas");
            return false;
        }
    }
    
    public function logout(){        
        $this->session->unset_userdata('usercms');
	$this->session->destroy();
        redirect('dashboard'); 
    }
}