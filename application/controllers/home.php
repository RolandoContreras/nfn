<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model('comments_model','obj_comments');
    } 

    public function index()
	{
        //GET DATA COMMENTS
        $data['btc'] = $this->btc_price();
        $data['bch'] = $this->bch_price();
        $data['eth'] = $this->eth_price();
        $data['dash'] = $this->dash_price();
        $this->load->view('home2',$data);
	}
    public function send_messages(){
     //GET DATA BY POST
     if($this->input->is_ajax_request()){   
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $subject = $this->input->post("subject");
            $comments = $this->input->post("comments");

            //status_value 0 means (not read)
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'subject' => $subject,
                        'comment' => $comments,
                        'big_investor' => 0,
                        'date_comment' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                    );
                    $this->obj_comments->insert($data);
                    echo json_encode($data);            
                    exit();
        }
            }
    public function btc_price(){
             $url =  "https://api.coinmarketcap.com/v1/ticker/bitcoin";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json[0]['price_usd'];
             return $price;
    }
    public function eth_price(){
             $url = "https://api.coinmarketcap.com/v1/ticker/ethereum";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json[0]['price_usd'];
             return $price;
    }
    public function bch_price(){
             $url = "https://api.coinmarketcap.com/v1/ticker/bitcoin-cash";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json[0]['price_usd'];
             return $price;
    }     
    public function dash_price(){
             $url = "https://api.coinmarketcap.com/v1/ticker/dash/";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json[0]['price_usd'];
             return $price;
    }
}
