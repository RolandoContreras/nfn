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
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7 and regiones.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'regiones, customer.region = regiones.id')
                                        );

         $obj_customer = $this->obj_customer->get_search_row($params); 
         //GET SPONSOR
         $parent = $obj_customer->parents_id;
         $name = $obj_customer->first_name.' '.$obj_customer->last_name;
         
         
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
                                <h3 class="class="title_back"">Información</h3>
                            </div>
                            <hr class="style-2">
                            <div class="panel-body">         
                    <div data-behaviour="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-male fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="user-name-info"><span>'.$obj_customer->code.'</span></div>
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
                                                <span>'.$obj_customer->email.'</span>
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
                            <h3 class="title_back">Activación</h3>
                        </div>
                       <hr class="style-2"> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar-check-o fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Fecha de Creación :</label>
                                                    <p class="form-control"><span>'.$obj_customer->created_at.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-calendar-check-o fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Fecha de Activación :</label>
                                                    <p class="form-control">
                                                    <span>---</span>
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
            <div class="row">
                 <div class="col-md-6">
                    <div class="panel panel-default panel-form fix-info">
                        <div class="panel-heading text-uppercase">
                            <div class="clearfix">
                                <h3 class="title_back">Teléfono</h3>
                            </div>
                        </div>
                        <hr class="style-1">
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-mobile fa-4x" aria-hidden="true"></i></div>
                                        <div class="media-body">
                                             <div class="control-label">Teléfono</div>
                                             <p class="form-control"><span>'.$obj_customer->phone.'</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               


                    
                <div class="col-md-6">
                    <div class="panel panel-default panel-form fix-info">
                        <div class="panel-heading text-uppercase">
                            <div class="clearfix">
                                <h3 class="title_back">Identificación</h3>
                            </div>
                        </div>
                        <hr class="style-1">
                        <div class="panel-body">
                            <div data-behaviour="content">
                                <div class="form-group has-feedback" data-behaviour="element-content">
                                    <div class="media">
                                        <div class="media-left"><i class="fa fa-id-card fa-3x"></i></div>
                                        <div class="media-body">
                                             <label class="control-label">Pasaporte / Numero de Identidad</label>
                                             <p class="form-control"><span>'.$obj_customer->dni.'</span></p>
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
                    <div class="panel panel-default panel-form" data-behaviour="container">
                        <div class="panel-heading text-uppercase clearfix">
                            <h3 class="title_back">Dirección</h3>
                        </div>
                       <hr class="style-2"> 
                        <div class="panel-body">
                                <div data-behaviour="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">País :</label>
                                                    <p class="form-control"><span>'.$obj_customer->pais.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><i class="fa fa-globe fa-3x"></i></div>
                                                <div class="media-body">
                                                     <label class="control-label">Región :</label>
                                                     <p class="form-control"><span>'.$obj_customer->region.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr class="style-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Dirección :</label>
                                                    <p class="form-control"><span>Av. Tomas Guzman 513 - SJM</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Ciudad :</label>
                                                <p class="form-control"><span>'.$obj_customer->city.'</span></p>
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
