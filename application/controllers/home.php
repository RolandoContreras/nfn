<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model("comments_model","obj_comments");
    } 

    public function index()
	{
        $this->load->view('home');
	}
    public function send_messages(){
     //GET DATA BY POST
     if($this->input->is_ajax_request()){   
            $name = $this->input->post("name");
            $phone = $this->input->post("phone");
            $email = $this->input->post("email");
            $subject = $this->input->post("subject");
            $comments = $this->input->post("comments");
            
            //SAVE MESSAGES BD
            //status_value 0 means (not read)
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'subject' => $subject,
                        'comment' => $comments,
                        'date_comment' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                    );
                    $this->obj_comments->insert($data);
            
            //SEND MESSAGES
            $mensaje = wordwrap("<html><body>"
                    . "<h1>Hay una pregunta por responder</h1><br/>"
                    . "<h3>Datos del Solicitante</h3><br/>"
                    . "Nombre: <em>$name</em><br/>"
                    . "Telefono: <em>$phone</em><br/>"
                    . "Email: <em>$email</em><br/>"
                    . "<p>$comments<p></body></html>", 70, "\n", true);
            $titulo = $subject;
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $headers .= "From: Red NFN: Red de Consumo Inteligente < noreplay@newfuturenetwork.com >\r\n";
            $bool = mail("contacto@newfuturenetwork.com",$titulo,$mensaje,$headers); 
            $data = true;
            echo json_encode($data);            
            exit();
        }
    }
    public function product(){
        $url = explode("/",uri_string());
        $nav = $url[1];
        switch ($nav) {
            case 'basico':
                $this->load->view('basico');
                break;
            case 'jumbo':
                $this->load->view('jumbo');
                break;
            case 'completo':
                $this->load->view('completo');
                break;
            case 'limpieza':
                $this->load->view('limpieza');
                break;
        } 
        
        
    }
}
