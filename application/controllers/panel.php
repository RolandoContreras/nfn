<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        //GET THE SESSION
        $this->get_session();
        
        //GET TOTAL ROWS
        $params = array("select" =>"count(comment_id) as total_comments,
                                    (select count(*) from customer) as total_customer, 
                                    (select count(*) from messages where support = 1) as total_messages_support,
                                    (select count(*) from users where status_value = 1) as total_users");
        $obj_total = $this->obj_comments->get_search_row($params);

         //GET PENDING ROWS
        $params = array("select" =>"count(*) as pending_comments,
                                    (select count(*) from messages where support = 1 and active = 1) as pending_messages_support,
                                    ",
                        "where" => "active = 1");
        $obj_pending = $this->obj_comments->get_search_row($params);
        
        //GET LASTEST COMMENT  
        $params = array(
                        "select" =>"comment_id,
                                    name,
                                    comment,
                                    email,
                                    active,
                                    status_value,
                                    date_comment",
                         "order" => "date_comment DESC"
            );
        $obj_last_comment = $this->obj_comments->get_search_row($params);
        
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        

        $this->tmp_mastercms->set('obj_pending',$obj_pending);
        $this->tmp_mastercms->set('obj_last_comment',$obj_last_comment);
        $this->tmp_mastercms->set('obj_total',$obj_total);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('panel');
     }
     
    public function masive_messages(){
        //ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){  
                //GET TITLE AND MESSAGES
                $title = $this->input->post("title");
                $message_content = $this->input->post("message_content");
                
                $params = array(
                        "select" =>"customer.email",
                        "where" => "customer.active = 1"
               
               );
                //GET DATA FROM CUSTOMER
                $obj_customer= $this->obj_customer->search($params);
                
                $array_email = "";
                    foreach ($obj_customer as $key => $value) {
                        $array_email .= "$value->email".",";
                    }
                
                $images = "static/cms/messages/images/flyer-webinar.jpg";
                $img_path = "<img src='".site_url().'/'.$images."' alt='".$title."' height='800' width='800'/>";
                
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap("<html><body>$message_content<p>$img_path</p></body></html>", 70, "\n", true);
                //Titulo
                $titulo = "$title";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers .= "From: BITSHARE - Una solución para las personas < noreplay@yourbitshares.com >\r\n";
                $headers .= "Cco: software.contreras@gmail.com,jupomlm@gmail.com,skcc1991@gmail.com" . "\r\n"; 
                
                //dirección del remitente 
                
//                $headers .= "From: BITSHARE - Una solución para las personas < noreplay@yourbitshares.com >\r\n";
                
                //Enviamos el mensaje a tu_dirección_email 
//                $bool = mail("$array_email",$titulo,$mensaje,$headers);
                $bool = mail("marketing@yourbitshares.com",$titulo,$mensaje,$headers);
//                $bool = mail("$array_email",$titulo,$mensaje,$headers);
                
                if($bool){
                    $data['message'] = "El mensaje se envio correctamente";
                }else{
                    $data['message'] = "El mensaje no se envio";
                }
                echo json_encode($data); 
        exit();
            }
    } 
    
    public function cambiar_status(){
        if($this->input->is_ajax_request()){   
              $comment_id = $this->input->post("comment_id");
              
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
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