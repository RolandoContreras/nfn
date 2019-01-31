<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model("events_model","obj_events");
    } 

    public function index()
	{
        $this->load->view('news');
	}
        
    public function events(){
        //get data events
        $params = array(
                        "select" =>"name,
                                    date,
                                    expositor,
                                    img,
                                    time
                                    ",
                        "where" => "status_value = 1",
                        "order" => "event_id DESC",
                                    );

        $data['obj_events'] = $this->obj_events->search($params); 
        //SEND DATA
        $this->load->view('events',$data);
        
        
        
    }   
}
