<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("bonus_model","obj_bonus");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("invoices_model","obj_invoices");
    }
	
	public function crear_factura_consumo(){
	if($this->input->is_ajax_request()){   
            $this->get_session();
            //GET CUSTOMER CALIFY ON BINARY
            $params = array(
                        "select" =>"customer_id,
                                    box_id",
                         "where" => "status_value = 1"
            );
            $obj_customer= $this->obj_customer->search($params);
                if(count($obj_customer) > 0){
                    foreach ($obj_customer as $value) {
                        //CREATE INVOICE CONSUME
                    $data_invoice = array(
                        'customer_id' => $value->customer_id,
                        'box_id' => $value->box_id,
                        'subject' => "Consumo",
                        'type' => 2,
                        'date' => date("Y-01-31 H:i:s"),
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    $this->obj_invoices->insert($data_invoice);
                    }
                }
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