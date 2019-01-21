<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_red extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("matrix_model","obj_matrix");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        //VERIFIRY GET SESSION    
        $this->get_session();
        /// VISTA
        
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"parents_id",
                        "where" => "customer_id = $customer_id",);

         $obj_customer = $this->obj_customer->get_search_row($params);
         $patrocinador = $obj_customer->parents_id;
         
         $params = array(
                        "select" =>"customer.customer_id,
                                    customer.code,
                                    customer.first_name,
                                    customer.last_name
                                    ",
                        "where" => "customer.customer_id = $patrocinador",
                        );

         $obj_customer = $this->obj_customer->get_search_row($params); 
         
         //GET SPONSOR
         if($patrocinador == 0){
            $code = "0000000"; 
            $name = "Empresa"; 
         }else{
            $code = $obj_customer->code;
            $name = $obj_customer->first_name.' '.$obj_customer->last_name;
         }
         
         //GET SPONSOR DATA
                    $params = array(
                        "select" =>"nivel,
                                    position",
                        "where" => "customer_id = $customer_id and status_value = 1"
                    );
                //GET DATA FROM BONUS
                $obj_matrix = $this->obj_matrix->get_search_row($params);
                //SET DATA VAR
                $nivel = $obj_matrix->nivel;
                $position = $obj_matrix->position;
                $nivel_sec = 1;
                
                if($position == 0){
                    $new_position = 1;
                }else{
                    $new_position = (($position - 1) * 3) + 1;
                }
                
                //DECLARE VARIABLES
                $percent_n2 = 0;
                $count_2 = 0;
                $end_position_2 = 0;
                
                $percent_n3 = 0;
                $count_3 = 0;
                $end_position_3 = 0;
                
                $percent_n4 = 0;
                $count_4 = 0;
                $end_position_4 = 0;
                
                $percent_n5 = 0;
                $count_5 = 0;
                $end_position_5 = 0;
                
                $percent_n6 = 0;
                $count_6 = 0;
                $end_position_6 = 0;
                
                $percent_n7 = 0;
                $count_7 = 0;
                $end_position_7 = 0;
                
                $percent_n8 = 0;
                $count_8 = 0;
                $end_position_8 = 0;
                
                $percent_n9 = 0;
                $count_9 = 0;
                $end_position_9 = 0;
                
                $percent_n10 = 0;
                $count_10 = 0;
                $end_position_10 = 0;
                
                //CREATE NIVEL 1
                $new_nivel = $nivel + 1;
                $total_position = pow(3, $nivel_sec);
                $end_position =  ($new_position + $total_position) - 1;
                //CREATE IDENTIFICADOR
                    $params = array(
                        "select" =>"position",
                        "where" => "nivel = $new_nivel and position between $new_position and $end_position",
                        "order" => "position ASC"
                    );
                //GET DATA FROM BONUS
                $obj_position = $this->obj_matrix->search($params);
                $count = count($obj_position);
                $percent_n1 =  ceil(($count / $end_position) * 100 );
                
                if($count > 0){
                    //CREATE NIVEL 2
                    $new_position = (($new_position - 1) * 3) + 1;
                    $new_nivel = $new_nivel + 1;
                    $nivel_sec = $nivel_sec + 1;
                    $total_position = pow(3, $nivel_sec);
                    $end_position_2 =  ($new_position + $total_position) - 1;
                    //CREATE IDENTIFICADOR
                        $params = array(
                            "select" =>"position",
                            "where" => "nivel = $new_nivel and position between $new_position and $end_position_2",
                            "order" => "position ASC"
                        );
                    //GET DATA FROM BONUS
                    $obj_position = $this->obj_matrix->search($params);
                    
                    $count_2 = count($obj_position);
                    $percent_n2 =  ceil(($count_2 / $end_position_2) * 100);
                    
                    if($count_2 > 0){
                        //CREATE NIVEL 3
                        $new_position = (($new_position - 1) * 3) + 1;
                        $new_nivel = $new_nivel + 1;
                        $nivel_sec = $nivel_sec + 1;
                        $total_position = pow(3, $nivel_sec);
                        $end_position_3 =  ($new_position + $total_position) - 1;
                        //CREATE IDENTIFICADOR
                            $params = array(
                                "select" =>"position",
                                "where" => "nivel = $new_nivel and position between $new_position and $end_position_3",
                                "order" => "position ASC"
                            );
                        //GET DATA FROM BONUS
                        $obj_position = $this->obj_matrix->search($params);

                        $count_3 = count($obj_position);
                        $percent_n3 =  ceil(($count_3 / $end_position_2) * 100);
                        
                        if($count_3 > 0){
                            //CREATE NIVEL 4
                            $new_position = (($new_position - 1) * 3) + 1;
                            $new_nivel = $new_nivel + 1;
                            $nivel_sec = $nivel_sec + 1;
                            $total_position = pow(3, $nivel_sec);
                            $end_position_4 =  ($new_position + $total_position) - 1;
                            //CREATE IDENTIFICADOR
                                $params = array(
                                    "select" =>"position",
                                    "where" => "nivel = $new_nivel and position between $new_position and $end_position_4",
                                    "order" => "position ASC"
                                );
                            //GET DATA FROM BONUS
                            $obj_position = $this->obj_matrix->search($params);

                            $count_4 = count($obj_position);
                            $percent_n4 =  ceil(($count_4 / $end_position_4) * 100);
                            
                            if($count_4 > 0){
                                //CREATE NIVEL 5
                                $new_position = (($new_position - 1) * 3) + 1;
                                $new_nivel = $new_nivel + 1;
                                $nivel_sec = $nivel_sec + 1;
                                $total_position = pow(3, $nivel_sec);
                                $end_position_5 =  ($new_position + $total_position) - 1;
                                //CREATE IDENTIFICADOR
                                    $params = array(
                                        "select" =>"position",
                                        "where" => "nivel = $new_nivel and position between $new_position and $end_position_5",
                                        "order" => "position ASC"
                                    );
                                //GET DATA FROM BONUS
                                $obj_position = $this->obj_matrix->search($params);

                                $count_5 = count($obj_position);
                                $percent_n5 =  ceil(($count_5 / $end_position_5) * 100);
                                
                                if($count_5 > 0){
                                    //CREATE NIVEL 6
                                    $new_position = (($new_position - 1) * 3) + 1;
                                    $new_nivel = $new_nivel + 1;
                                    $nivel_sec = $nivel_sec + 1;
                                    $total_position = pow(3, $nivel_sec);
                                    $end_position_6 =  ($new_position + $total_position) - 1;
                                    //CREATE IDENTIFICADOR
                                        $params = array(
                                            "select" =>"position",
                                            "where" => "nivel = $new_nivel and position between $new_position and $end_position_6",
                                            "order" => "position ASC"
                                        );
                                    //GET DATA FROM BONUS
                                    $obj_position = $this->obj_matrix->search($params);

                                    $count_6 = count($obj_position);
                                    $percent_n6 =  ceil(($count_6 / $end_position_6) * 100);
                                    
                                    if($count_6 > 0){
                                        //CREATE NIVEL 7
                                        $new_position = (($new_position - 1) * 3) + 1;
                                        $new_nivel = $new_nivel + 1;
                                        $nivel_sec = $nivel_sec + 1;
                                        $total_position = pow(3, $nivel_sec);
                                        $end_position_7 =  ($new_position + $total_position) - 1;
                                        //CREATE IDENTIFICADOR
                                            $params = array(
                                                "select" =>"position",
                                                "where" => "nivel = $new_nivel and position between $new_position and $end_position_7",
                                                "order" => "position ASC"
                                            );
                                        //GET DATA FROM BONUS
                                        $obj_position = $this->obj_matrix->search($params);

                                        $count_7 = count($obj_position);
                                        $percent_n7 =  ceil(($count_7 / $end_position_7) * 100);
                                        
                                        if($count_7 > 0){
                                            //CREATE NIVEL 8
                                            $new_position = (($new_position - 1) * 3) + 1;
                                            $new_nivel = $new_nivel + 1;
                                            $nivel_sec = $nivel_sec + 1;
                                            $total_position = pow(3, $nivel_sec);
                                            $end_position_8 =  ($new_position + $total_position) - 1;
                                            //CREATE IDENTIFICADOR
                                                $params = array(
                                                    "select" =>"position",
                                                    "where" => "nivel = $new_nivel and position between $new_position and $end_position_8",
                                                    "order" => "position ASC"
                                                );
                                            //GET DATA FROM BONUS
                                            $obj_position = $this->obj_matrix->search($params);

                                            $count_8 = count($obj_position);
                                            $percent_n8 =  ceil(($count_8 / $end_position_8) * 100);
                                            
                                            if($count_8 > 0){
                                                //CREATE NIVEL 9
                                                $new_position = (($new_position - 1) * 3) + 1;
                                                $new_nivel = $new_nivel + 1;
                                                $nivel_sec = $nivel_sec + 1;
                                                $total_position = pow(3, $nivel_sec);
                                                $end_position_9 =  ($new_position + $total_position) - 1;
                                                //CREATE IDENTIFICADOR
                                                    $params = array(
                                                        "select" =>"position",
                                                        "where" => "nivel = $new_nivel and position between $new_position and $end_position_9",
                                                        "order" => "position ASC"
                                                    );
                                                //GET DATA FROM BONUS
                                                $obj_position = $this->obj_matrix->search($params);

                                                $count_9 = count($obj_position);
                                                $percent_n9 =  ceil(($count_9 / $end_position_9) * 100);
                                                
                                                if($count_9 > 0){
                                                    //CREATE NIVEL 10
                                                    $new_position = (($new_position - 1) * 3) + 1;
                                                    $new_nivel = $new_nivel + 1;
                                                    $nivel_sec = $nivel_sec + 1;
                                                    $total_position = pow(3, $nivel_sec);
                                                    $end_position_10 =  ($new_position + $total_position) - 1;
                                                    //CREATE IDENTIFICADOR
                                                        $params = array(
                                                            "select" =>"position",
                                                            "where" => "nivel = $new_nivel and position between $new_position and $end_position_10",
                                                            "order" => "position ASC"
                                                        );
                                                    //GET DATA FROM BONUS
                                                    $obj_position = $this->obj_matrix->search($params);

                                                    $count_10 = count($obj_position);
                                                    $percent_n10 =  ceil(($count_10 / $end_position_10) * 100);
                                                }
                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }
                }
         
         //SEND DATA TO VIEW  
         echo '
               <div id="principal" class="tabcontent" style="display: block;">
    <div class="row ml-custom">
        <div class="col-xs-12">
            <div class="profile-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-form" data-behaviour="container">
                            <div class="panel-heading text-uppercase clearfix">
                                <h3 class="class="title_back"">Mi Red</h3>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">         
                    <div data-behaviour="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-user-circle-o fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body">
                                        <b>PATROCINADOR</b>
                                            <div class="user-name-info"><span>'.$code.' (Código)</span></div>
                                                <p class="form-control">
                                                    <span>'.$name.'</span>
                                                </p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 border-left">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="form-group text-right">
                                                    <button title="" data-placement="top" data-toggle="tooltip" onclick="view_directos();" class="btn btn-primary" data-original-title="Referidos Directos"><i class="fa fa-street-view"></i> Ver Referidos Directos</button>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-form" data-behaviour="container">
                        <div class="panel-heading text-uppercase clearfix">
                            <h3 class="title_back">Equipo en Red</h3>
                        </div>
                       <hr class="style-2"> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                     <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 1</h2>
                                                    <a href="javascript:void(0);">
                                                        <div class="bar-chart">
                                                            <div class="chart clearfix">
                                                                <div class="item" id="item-1">
                                                                    <div class="bar">
                                                                        <span class="percent">'.$percent_n1.'%</span>

                                                                        <div class="progress" data-percent="'.$percent_n1.'">
                                                                            <span class="title">'.$count.'/'.$end_position.'</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 2</h2>
                                                    <a href="javascript:void(0);">
                                                        <div class="bar-chart">
                                                            <div class="chart clearfix">
                                                                <div class="item" id="item-2">
                                                                    <div class="bar">
                                                                        <span class="percent">'.$percent_n2.'%</span>

                                                                        <div class="progress" data-percent="'.$percent_n2.'">
                                                                            <span class="title">'.$count_2.'/'.$end_position_2.'</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </a>
                                        </div>
                                         <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 3</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-3">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n3.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n3.'">
                                                                        <span class="title">'.$count_3.'/'.$end_position_3.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 4</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-4">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n4.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n4.'">
                                                                        <span class="title">'.$count_4.'/'.$end_position_4.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 5</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-5">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n5.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n5.'">
                                                                        <span class="title">'.$count_5.'/'.$end_position_5.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-1"></div>
                                      </div>
                                    <hr class="style-2"/> 
                                        <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 6</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-6">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n6.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n6.'">
                                                                        <span class="title">'.$count_6.'/'.$end_position_6.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 7</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-7">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n7.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n7.'">
                                                                        <span class="title">'.$count_7.'/'.$end_position_7.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                         <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 8</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-8">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n8.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n8.'">
                                                                        <span class="title">'.$count_8.'/'.$end_position_8.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 9</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-9">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n9.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n9.'">
                                                                        <span class="title">'.$count_9.'/'.$end_position_9.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-2">
                                                    <h2 class="h2">NIVEL 10</h2>
                                                    <a href="javascript:void(0);">
                                                    <div class="bar-chart">
                                                        <div class="chart clearfix">
                                                            <div class="item" id="item-10">
                                                                <div class="bar">
                                                                    <span class="percent">'.$percent_n10.'%</span>

                                                                    <div class="progress" data-percent="'.$percent_n10.'">
                                                                        <span class="title">'.$count_10.'/'.$end_position_10.'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                        </div>
                                        <div class="col-sm-1"></div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                </div>
           
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
    '
         ;
         
	}
        
    public function directos(){
        //VERIFIRY GET SESSION    
        $this->get_session();
         /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.code,
                                    customer.email,
                                    customer.phone,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    customer.address,
                                    customer.date_start,
                                    customer.city,
                                    customer.active,
                                    paises.nombre as pais,
                                    ",
                        "where" => "customer.parents_id = $customer_id and paises.id_idioma = 7 and regiones.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'regiones, customer.region = regiones.id')
                                        );

         $obj_customer = $this->obj_customer->search($params); 
         
        //GET SPONSOR
         $url = site_url().'static/backoffice/images/user.png';
         $img = "<img src='$url' alt='perfil' width='25'/>";
        echo "
            


        <div id='payments' class='tabcontent' style='display: block;'>
    <div class='row ml-custom'>
        <div class='col-xs-12'>
            <div class='row'>
                <div class='col-md-12'>
                        <div class='panel panel-default panel-form'>
                            <div class='panel-heading text-uppercase'>
                                <h3>Mis referidos directos</h3>
                            </div>
                                    <div class='col-lg-12'>
                                      <div id='panelDemo14' class='panel panel-success'>
                                            <div class='panel-body'>
                                                <div id='archivos_subidos'>
                                                    <div class='row'>
                                                        <div class='col-lg-12'>
                                                            <div class='table-responsive'>
                                                                <table class='table table-hover'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th><b>Código</b></th>
                                                                            <th><b>Nombre</b></th>
                                                                            <th class='text-center'><b>Estado</b></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                                      foreach ($obj_customer as $value) {
                                                                                if($value->active == 1){
                                                                                    $style = "label-success";
                                                                                    $text = "activo";
                                                                                }else{
                                                                                    $style = "label-danger";
                                                                                    $text = "inactivo";
                                                                                }
                                                                            echo "<tr>
                                                                                <td style='padding: 25px'><b>$value->code<b></td>
                                                                                <td style='padding: 25px'>$img&nbsp;&nbsp;$value->first_name $value->last_name</td>";
                                                                                    if($value->active == 1){
                                                                                        $style = "label-success";
                                                                                        $value = "activo";
                                                                                    }else{
                                                                                        $style = "label-danger";
                                                                                        $value = "inactivo";
                                                                                    }    
                                                                             echo   "<td style='padding: 25px' class='text-center'>
                                                                                    <span class='label $style'>$text</span>
                                                                                </td>
                                                                            </tr>";
                                                                         }
                                                                 echo "        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div> 
</div>







       
        ";
        
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
