<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
//        $this->load->model("currency_model","obj_currency");
//        $this->load->model("messages_model","obj_messages");
//        $this->load->model("sell_model","obj_sell");
//        $this->load->model("news_model","obj_news");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET MESSAGE INFORMATIVE
//        $messages_informative = $this->get_messages_informative();
        //GET NEWS
        
//        $obj_news = $this->get_news();
            
//            $this->tmp_backoffice->set("messages_informative",$messages_informative);
//            $this->tmp_backoffice->set("obj_news",$obj_news);
            $this->tmp_backoffice->render("backoffice/b_home");
    }
    
    public function contrasena()
    {
        echo "123456789";
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


    
