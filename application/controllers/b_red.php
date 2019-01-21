<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_red extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
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

         $obj_parents_id = $this->obj_customer->get_search_row($params);
         $patrocinador = $obj_parents_id->parents_id;
         
         $params = array(
                        "select" =>"customer.customer_id,
                                    customer.parents_id,
                                    customer.code,
                                    customer.email,
                                    customer.created_at,
                                    customer.phone,
                                    customer.password,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    customer.address,
                                    customer.date_start,
                                    customer.date_end,
                                    customer.city,
                                    customer.active,
                                    customer.status_value,
                                    paises.nombre as pais,
                                    regiones.nombre as region
                                    ",
                        "where" => "customer.customer_id = $patrocinador and paises.id_idioma = 7 and regiones.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'regiones, customer.region = regiones.id')
                                        );

         $obj_customer = $this->obj_customer->get_search_row($params); 
         
         //GET SPONSOR
         if($patrocinador == 0){
            $code = "0000000"; 
            $name = "Empresa"; 
         }else{
            $parent = $obj_customer->parents_id;
            $name = $obj_customer->first_name.' '.$obj_customer->last_name;
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
                                            <div class="user-name-info"><span>'.$code.'</span></div>
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
                                        <div class="media-left"><i class="fa fa-envelope fa-3x"></i></div>
                                        <div class="media-body">
                                            <div class="control-label">E-mail</div>
                                            <p class="form-control">
                                                <span>Email</span>
                                                <input type="hidden" id="customer_id" name="customer_id" disabled="" value="56">
                                            </p>
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
                                                                        <span class="percent">40%</span>

                                                                        <div class="progress" data-percent="40">
                                                                            <span class="title">1/3</span>
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
                                                                        <span class="percent">85%</span>

                                                                        <div class="progress" data-percent="40">
                                                                            <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
                                                                    <span class="percent">85%</span>

                                                                    <div class="progress" data-percent="40">
                                                                        <span class="title">1/3</span>
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
