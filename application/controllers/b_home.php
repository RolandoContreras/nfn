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
        //GET DATE
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET NEWS
        $obj_news = $this->get_news();
        
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"currency_id,
                                    name,
                                    img,
                                    percent,
                                    active",
                        "where" => "status_value = 1",
                        );

        $obj_currency = $this->obj_currency->search($params);

        //GET PRICE CURRENCY
        $btc = $this->btc_price();
        $obj_btc = $btc;
        $obj_btc_10 = $btc * 1.10;
        
        $eth = $this->eth_price();
        $obj_eth = $eth;
        $obj_eth_10 = $eth * 1.10;
        
        $bch = $this->bch_price();
        $obj_bch = $bch;
        $obj_bch_10 = $bch * 1.10;
        
        $dash = $this->dash_price();
        $obj_dash = $dash;
        $obj_dash_10 = $dash * 1.10;
        
        $ripple = $this->ripple_price();
        $obj_ripple = $ripple;
        $obj_ripple_10 = $ripple * 1.10;
        
        $litecoin = $this->litecoin_price();
        $obj_litecoin = $litecoin;
        $obj_litecoin_10 = $litecoin * 1.10;
        
        $cardano = $this->cardano_price();
        $obj_cardano = $cardano;
        $obj_cardano_10 = $cardano * 1.10;
        
        $tron = $this->tron_price();
        $obj_tron = $tron;
        $obj_tron_10 = $tron * 1.10;
        
        $monero = $this->monero_price();
        $obj_monero = $monero;
        $obj_monero_10 = $monero * 1.10;
        
        $omisego = $this->omisego_price();
        $obj_omisego = $omisego;
        $obj_omisego_10 = $omisego * 1.10;
        
        $zcash = $this->zcash_price();
        $obj_zcash = $zcash;
        $obj_zcash_10 = $zcash * 1.10;
        
        $siacoin = $this->siacoin_price();
        $obj_siacoin = $siacoin;
        $obj_siacoin_10 = $siacoin * 1.10;
        
        $verge = $this->verge_price();
        $obj_verge = $verge;
        $obj_verge_10 = $verge * 1.10;
        
        $nxt = $this->nxt_price();
        $obj_nxt = $nxt;
        $obj_nxt_10 = $nxt * 1.10;
        
            //RENDER DATA PRICE
            $this->tmp_backoffice->set("obj_nxt_10",$obj_nxt_10);
            $this->tmp_backoffice->set("obj_nxt",$obj_nxt);
            
            $this->tmp_backoffice->set("obj_verge_10",$obj_verge_10);
            $this->tmp_backoffice->set("obj_verge",$obj_verge);
            
            $this->tmp_backoffice->set("obj_siacoin_10",$obj_siacoin_10);
            $this->tmp_backoffice->set("obj_siacoin",$obj_siacoin);
            
            
            $this->tmp_backoffice->set("obj_zcash_10",$obj_zcash_10);
            $this->tmp_backoffice->set("obj_zcash",$obj_zcash);
            
            $this->tmp_backoffice->set("obj_omisego_10",$obj_omisego_10);
            $this->tmp_backoffice->set("obj_omisego",$obj_omisego);
            
            $this->tmp_backoffice->set("obj_monero_10",$obj_monero_10);
            $this->tmp_backoffice->set("obj_monero",$obj_monero);
            
            $this->tmp_backoffice->set("obj_tron_10",$obj_tron_10);
            $this->tmp_backoffice->set("obj_tron",$obj_tron);
            
            $this->tmp_backoffice->set("obj_ripple_10",$obj_ripple_10);
            $this->tmp_backoffice->set("obj_ripple",$obj_ripple);
            
            $this->tmp_backoffice->set("obj_litecoin_10",$obj_litecoin_10);
            $this->tmp_backoffice->set("obj_litecoin",$obj_litecoin);
            
            $this->tmp_backoffice->set("obj_cardano_10",$obj_cardano_10);
            $this->tmp_backoffice->set("obj_cardano",$obj_cardano);
            
            $this->tmp_backoffice->set("obj_dash_10",$obj_dash_10);
            $this->tmp_backoffice->set("obj_dash",$obj_dash);
            
            $this->tmp_backoffice->set("obj_bch_10",$obj_bch_10);
            $this->tmp_backoffice->set("obj_bch",$obj_bch);
            
            $this->tmp_backoffice->set("obj_eth_10",$obj_eth_10);
            $this->tmp_backoffice->set("obj_eth",$obj_eth);
            
            $this->tmp_backoffice->set("obj_btc_10",$obj_btc_10);
            $this->tmp_backoffice->set("obj_btc",$obj_btc);
        
            $this->tmp_backoffice->set("price_btc",$obj_btc);
            $this->tmp_backoffice->set("obj_currency",$obj_currency);
            $this->tmp_backoffice->set("messages_informative",$messages_informative);
            $this->tmp_backoffice->set("obj_news",$obj_news);
            $this->tmp_backoffice->render("backoffice/b_home");
    }
    
    public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "active = 1 and status_value = 1 and support = 0",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_messages->search($params); 
            return $messages_informative;
    }
    
    public function get_news(){
            $params = array(
                            "select" =>"news_id,
                                        img",
                             "where" => "active = 1 and status_value = 1");
                
           $news = $this->obj_news->search($params); 
           return $news;
    }
    
    public function btc_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function eth_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1027/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function bch_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1831/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }     
    
    public function dash_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/131/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }

    public function ripple_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/52/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function litecoin_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/2/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function cardano_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/2010/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function tron_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1958/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function monero_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/328/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function omisego_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1808/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function zcash_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1437/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function siacoin_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/1042/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function verge_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/693/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function nxt_price(){
             $url =  "https://api.coinmarketcap.com/v2/ticker/66/?convert=EUR";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price = $json['data']['quotes']['EUR']['price'];
             return $price;
    }
    
    public function validate_usd() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $value = trim($this->input->post('value'));
            $price = trim($this->input->post('price'));
            
            //MULTIPLE BY THE VALUE
            $new_data =  $value / $price;
            echo $new_data;
            }
    }
        
    public function validate_btc() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $value = trim($this->input->post('value'));
            $price = trim($this->input->post('price'));
            //MULTIPLE BY THE VALUE
            $new_data =  $value * $price;
            echo json_encode($new_data);
            }
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


    
