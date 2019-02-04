<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_pays extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commission");
        $this->load->model("pay_commission_model","obj_pay_commission");
        $this->load->model("pay_model","obj_pay");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount,
                                    pay.obs,
                                    pay.active,
                                    customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.code,
                                    customer.email,
                                    customer.dni,
                                    customer_bank.bank_name,
                                    customer_bank.account_number,
                                    customer_bank.account_number_inter,
                                    customer_bank.razon_social,
                                    customer_bank.ruc,
                                    customer_bank.address_ruc,
                                    ",
                        "join" => array('customer, pay.customer_id = customer.customer_id',
                                        'customer_bank, customer.customer_id = customer_bank.customer_id'),
                        "where" => "pay.status_value = 1",
                        "order" => "pay.pay_id DESC"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay= $this->obj_pay->search($params);
           
           /// PAGINADO
            $modulos ='pagos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pagos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pay",$obj_pay);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_list");
    }
    
    public function details($pay_id){  
        
           $this->get_session();
           $params = array(
                        "select" =>"commissions.commissions_id,
                                    commissions.amount,
                                    commissions.date,
                                    commissions.active,
                                    bonus.bonus_id,
                                    bonus.name",
                        "where" => "pay_commission.pay_id = $pay_id",
                        "join" => array('commissions, pay_commission.commissions_id = commissions.commissions_id',
                                        'bonus, commissions.bonus_id = bonus.bonus_id'),
                        "order" => "commissions.date ASC"
                        );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
           /// PAGINADO
            $modulos ='cobros'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pagos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pay_commission",$obj_pay_commission);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_details");
    }
    
    public function pagado(){
        
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            //UPDATE FILES PAY
            $data_pay = array(
                        'active' => 3,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
                    
            //SELECT ALL FILE WHERE PAY_ID = $pay_id
            $params = array(
                        "select" =>"commissions_id",
                        "where" => "pay_id = $pay_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
            
           foreach ($obj_pay_commission as $value) {
                $data_comission = array(
                        'active' => 3,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_commission->update($value->commissions_id,$data_comission);    
           }  
                $data['message'] = "true";
                echo json_encode($data); 
            exit();
        }
    }
    
    public function devolver(){
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            //UPDATE FILES PAY
            $data_pay = array(
                        'active' => 4,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
                    
            //SELECT ALL FILE WHERE PAY_ID = $pay_id
            $params = array(
                        "select" =>"commissions_id",
                        "where" => "pay_id = $pay_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
            
           foreach ($obj_pay_commission as $value) {
                $data_comission = array(
                        'active' => 1,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_commission->update($value->commissions_id,$data_comission);    
           }
                    $data['message'] = "true";
                    echo json_encode($data); 
            exit();
        }
    }
    
    public function load($pay_id=NULL){
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"pay.pay_id,
                                    pay.amount,
                                    pay.date,
                                    pay.obs,
                                    pay.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.code,
                                    pay.active
                                    ",
                         "where" => "pay_id = $pay_id",
                         "join" => array('customer, pay.customer_id = customer.customer_id'),
            ); 
            $obj_pays  = $this->obj_pay->get_search_row($params); 
            
            $modulos ='pagos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pays",$obj_pays);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_form");    
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
        
    public function validate(){
        
        $pay_id =  $this->input->post('pay_id');
        $customer_id =  $this->input->post('customer_id');
        $amount =  $this->input->post('amount');
        $obs =  $this->input->post('obs');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $active =  $this->input->post('active');
        
        //UPDATE DATA
        $data = array(
                'customer_id' => $customer_id,
                'amount' => $amount,
                'obs' => $obs,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_pay->update($pay_id, $data);
        redirect(site_url()."dashboard/pagos");
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