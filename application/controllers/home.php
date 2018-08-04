<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
     parent::__construct();
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
}
