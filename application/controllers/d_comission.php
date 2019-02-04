<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_comission extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("commissions_model","obj_comission");
        $this->load->model("customer_model","obj_customer");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.code,
                                    bonus.name as bonus,
                                    commissions.amount,
                                    commissions.active,
                                    commissions.date,
                                    c1.code as code_2,
                                    c1.first_name as first_name_2,
                                    c1.last_name as last_name_2",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id',
                                        'sell, sell.sell_id = commissions.sell_id',
                                        'invoices, invoices.invoice_id = sell.invoice_id',
                                        'customer as c1, c1.customer_id = invoices.customer_id'
                                        ),
                         "order" => "commissions.commissions_id DESC"              
                                        );            
            
            //GET DATA COMMISSIONS
            $obj_comission= $this->obj_comission->search($params);
            
            /// PAGINADO
            $modulos ='comisiones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
            $this->tmp_mastercms->render("dashboard/comisiones/comission_list");
    }
    
    public function load($commissions_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($commissions_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    commissions.customer_id,
                                    commissions.date,
                                    commissions.amount,
                                    commissions.bonus_id,
                                    commissions.status_value,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.code",
                         "where" => "commissions_id = $commissions_id",
                         "join" => array('customer, commissions.customer_id = customer.customer_id')
            ); 
            $obj_comission  = $this->obj_comission->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
          }
      
            $modulos ='comisiones'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/comisiones/comission_form");    
    }
    
    public function validate(){
        
        $commissions_id =  $this->input->post('commissions_id');
        $customer_id =  $this->input->post('customer_id');
        $amount =  $this->input->post('amount');
        $bonus_id =  $this->input->post('bonus_id');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $status_value =  $this->input->post('status_value');
        
        //UPDATE DATA
        $data = array(
                'commissions_id' => $commissions_id,
                'customer_id' => $customer_id,
                'amount' => $amount,
                'bonus_id' => $bonus_id,
                'date' => $date,
                'status_value' => $status_value,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_comission->update($commissions_id, $data);
        redirect(site_url()."dashboard/comisiones");
    }
    
    public function mark_pay(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
              $commissions_id = $this->input->post("commissions_id");
              
                if(count($commissions_id) > 0){
                    $data = array(
                        'active' => 3,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comission->update($commissions_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function validate_customer() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $customer_id = $this->input->post('customer_id');
            $param = array(
                "select" => "customer_id,
                             code,
                             first_name,
                             last_name",
                "where" => "customer_id = $customer_id");
            $obj_customer = $this->obj_customer->get_search_row($param);
            
            if (count($obj_customer) > 0) {
                $data['message'] = "true";
                $data['code'] = $obj_customer->code;
                $data['name'] = $obj_customer->first_name." ".$obj_customer->last_name;
                $data['print'] = '<div class="alert alert-success" style="text-align: center">Usuario Encontrado.</div>';
            } else {
                $data['message'] = "false";
                $data['print'] = '<div class="alert alert-danger" style="text-align: center">Usuario no Existe.</div>';
            }
            echo json_encode($data);
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