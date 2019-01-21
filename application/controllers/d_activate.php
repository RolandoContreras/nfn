<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("bonus_model","obj_bonus");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("sell_model","obj_sell");
        $this->load->model("matrix_model","obj_matrix");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.first_name,
                                    customer.last_name,
                                    customer.code,
                                    customer.customer_id,
                                    customer.parents_id,
                                    invoices.invoice_id,
                                    invoices.activation_code,
                                    invoices.img,
                                    invoices.date,
                                    invoices.subject,
                                    invoices.active,
                                    box.name,
                                    box.price",
                        "join" => array('customer, invoices.customer_id = customer.customer_id',
                                        'box, invoices.box_id = box.box_id'),
                        "where" => "invoices.type = 1 and customer.status_value = 1"
               );
           //GET DATA FROM CUSTOMER
           $obj_invoices = $this->obj_invoices->search($params);
           
           /// PAGINADO
            $modulos ='activaciones_clientes'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $invoice_id = $this->input->post("invoice_id");
                $customer_id = $this->input->post("customer_id");
                $parents_id = $this->input->post("parents_id");
                
                //GET SPONSOR ACTIVE
                    $params = array(
                        "select" =>"active",
                        "where" => "customer_id = $parents_id and customer.status_value = 1"
                    );
                $obj_customer= $this->obj_customer->get_search_row($params);
                $active = $obj_customer->active;
                
                //INSERT COMMISSION TABLE
                    $data = array(
                        'invoice_id' => $invoice_id,
                        'active' => 1,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                   $sell_id = $this->obj_sell->insert($data);
                //VERIFY IF PARENT IS ACTIVE                
                if($active > 0){
                    //GET BONUS SPONSOR
                    $this->pay_directo($parents_id,$sell_id);
                    //SET TREE
                }
                //ACTIVE CUSTOMER
                $data_customer = array(
                        'active' => 1,
                        'date_start' => date("Y-m-d"),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                $this->obj_customer->update($customer_id,$data_customer);
                
                //CHANGES STATUS INVOICE
                $data_invoice = array(
                        'active' => 2,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                $this->obj_invoices->update($invoice_id,$data_invoice);
                
                //CREATE MATRIX ON TABLE
                $this->matrix($parents_id,$customer_id);
                die();
                echo json_encode($data); 
                exit();
            }
    }
 
    public function pay_directo($parents_id,$sell_id){
                //GET PERCENT FROM BONUS
                $params = array(
                        "select" =>"name,
                                    percent",
                        "where" => "bonus_id = 1 and status_value = 1"
               );
                //GET DATA FROM BONUS
                $obj_bonus= $this->obj_bonus->get_search_row($params);
                $percet = $obj_bonus->percent;
                
                //INSERT COMMISSION TABLE
                    $data = array(
                        'sell_id' => $sell_id,
                        'customer_id' => $parents_id,
                        'bonus_id' => 1,
                        'amount' => $percet,
                        'active' => 1,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_commissions->insert($data);
    }
    
    public function matrix($parents_id,$customer_id){
        
                //GET SPONSOR DATA
                    $params = array(
                        "select" =>"nivel,
                                    position",
                        "where" => "customer_id = $parents_id and status_value = 1"
                    );
                //GET DATA FROM BONUS
                $obj_matrix = $this->obj_matrix->get_search_row($params);
                
                //create nivel secundario
                $nivel_sec = 1;
                $nivel = $obj_matrix->nivel;
                $position = $obj_matrix->position;
                
                if($position == 0){
                    $new_position = 1;
                }else{
                    $new_position = (($position - 1) * 3) + 1;
                }
                
                //CREATE NIVEL
                $new_nivel = $nivel + 1;
                $total_position = pow(3, $nivel_sec);
                $end_position =  ($new_position + $total_position) - 1;
                //CREATE IDENTIFICADOR
                    $params = array(
                        "select" =>"position",
                        "where" => "nivel = $new_nivel and position between $new_position and $end_position",
                        "order" => "position ASC"
                    );
                //GET DATA FROM BONUS
                $obj_position = $this->obj_matrix->search($params);
                $count = count($obj_position);
                
                
                
                if($count == 0){
                    //INSERT COMMISSION TABLE
                    $data = array(
                        'customer_id' => $customer_id,
                        'nivel' => $new_nivel,
                        'position' => $new_position,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_matrix->insert($data);
                    echo json_encode($data); 
                    exit();
                }else{
                        //GET TOTAL POSITION
                        $obj_1ra_position = $this->obj_matrix->get_search_row($params);
                        $obj_1ra_position = $obj_1ra_position->position;
                        $position_alt = $new_position;
                        
                            foreach ($obj_position as $key => $value) {
                                   if($key == 0 && $value->position != $position_alt){
                                        $obj_last_position = $position_alt - 1;
                                        break;
                                    }else{
                                        if($count == 1){
                                            $obj_last_position = $value->position;
                                        }else{
                                            if($key >= 1 and $key <= $end_position - 1){
                                                $position_alt = $position_alt + 1;
                                                if($position_alt != $value->position){
                                                    $obj_last_position = $position_alt - 1;
                                                    break;
                                                }else{
                                                    $obj_last_position = $value->position;
                                                }
                                            }
                                        }
                                    }
                            }
                               
                            
                        $last_position = $obj_last_position;
                        
                        //GET TOTAL POSITION
                            if($last_position >= $end_position){
                                
                                    $new_nivel = $new_nivel + 1;
                                    $nivel_sec = $nivel_sec + 1;
                                    
                                for ($i = 1; $i <= 10000; $i++) {
                                    $new_position = (($obj_1ra_position - 1) * 3) + 1;
                                    $total_position = pow(3, $nivel_sec);
                                    $end_position =  ($new_position + $total_position) - 1;
                                    
                                    $params = array(
                                                    "select" =>"position",
                                                    "where" => "nivel = $new_nivel and position between $new_position and $end_position",
                                                    "order" => "position ASC"
                                                );
                                                    //GET DATA FROM BONUS
                                                    $obj_position = $this->obj_matrix->search($params);
                                                    
                                                    $count = count($obj_position);
                                                    if($count == 0){
                                                            //INSERT COMMISSION TABLE
                                                            $data = array(
                                                                'customer_id' => $customer_id,
                                                                'nivel' => $new_nivel,
                                                                'position' => $new_position ,
                                                                'status_value' => 1,
                                                                'date' => date("Y-m-d H:i:s"),
                                                                'created_at' => date("Y-m-d H:i:s"),
                                                                'created_by' => $_SESSION['usercms']['user_id'],
                                                            ); 
                                                            $this->obj_matrix->insert($data);
                                                            echo json_encode($data); 
                                                            exit();
                                                    }else{
                                                        $position_alt = $new_position;
                                                        foreach ($obj_position as $key => $value) {
                                                                if($key == 0 && $value->position != $position_alt){
                                                                    $obj_last_position = $position_alt - 1;
                                                                    break;
                                                                }else{
                                                                    if($count == 1){
                                                                        $obj_last_position = $value->position;
                                                                    }else{
                                                                        if($key >= 1 and $key <= $end_position - 1){
                                                                            $position_alt = $position_alt + 1;
                                                                            if($position_alt != $value->position){
                                                                                $obj_last_position = $position_alt - 1;
                                                                                break;
                                                                            }else{
                                                                                $obj_last_position = $value->position;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                           }
                                                           
                                                        $last_position = $obj_last_position;
                                                        if($last_position <  $end_position){
                                                            //INSERT COMMISSION TABLE
                                                            $data = array(
                                                                'customer_id' => $customer_id,
                                                                'nivel' => $new_nivel,
                                                                'position' => $last_position + 1,
                                                                'status_value' => 1,
                                                                'date' => date("Y-m-d H:i:s"),
                                                                'created_at' => date("Y-m-d H:i:s"),
                                                                'created_by' => $_SESSION['usercms']['user_id'],
                                                            ); 
                                                            $this->obj_matrix->insert($data);
                                                            echo json_encode($data); 
                                                            exit();
                                                        }else{
                                                            $new_nivel = $new_nivel + 1;
                                                            $nivel_sec = $nivel_sec + 1;
                                                            $obj_1ra_position = $new_position;
                                                        }
                                                    }
                                }
                            }else{
                                //CREATE NEW POSITION ADD +1
                                $new_position = $last_position + 1;
                                if($last_position == 0){
                                   $new_nivel = $new_nivel +1; 
                                }
                                //INSERT COMMISSION TABLE
                                $data = array(
                                    'customer_id' => $customer_id,
                                    'nivel' => $new_nivel,
                                    'position' => $new_position,
                                    'status_value' => 1,
                                    'date' => date("Y-m-d H:i:s"),
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'created_by' => $_SESSION['usercms']['user_id'],
                                ); 
                                $this->obj_matrix->insert($data);
                                echo json_encode($data); 
                                exit();
                            }
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