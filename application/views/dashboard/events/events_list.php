<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span11">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 100%;">
                                            <a class="brand">LISTADO DE EVENTOS</a>
                                            <button class="btn btn-small" onclick="add_events();"><i class="fa fa-plus"></i> Nuevo</button>
                                    </div>
                            </div>
                    </div>
                
                <div class="well nomargin" style="width: 100% !important;">
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>NOMBRE</th>
                                <th>EXPOSITOR</th>
                                <th>HORA</th>
                                <th>IMAGEN</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_events as $key  => $value): ?>
                            <tr>
                                <td align="center"><b><?php echo $value->event_id;?></b></td>
                                <td align="center" style="color:#fff;" class="label-info"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center" style="color:#fff;" class="label-warning"><?php echo $value->name;?></td>
                                <td align="center"><?php echo $value->expositor;?></td>
                                <td align="center" style="color:#fff;" class="label-success"><?php echo formato_hora($value->time);?></td>
                                <td align="center">
                                    <img id="<?php echo $key;?>" onclick="modal_img(<?php echo $key;?>);" src='<?php echo site_url()."static/cms/images/events/$value->img";?>' width="40" alt="imagen" />
                                </td>
                                <td align="center">
                                    <?php if ($value->status_value == 0) {
                                        $valor = "Inactivo";
                                        $stilo = "label label-important";
                                    }else{
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                        <div class="btn-group"> 
                                            <button class="btn btn-small" onclick="edit_events('<?php echo $value->event_id;?>');"><i class="fa fa-edit"></i>  Editar</button>
                                            <button class="btn btn-small" onclick="delete_events('<?php echo $value->event_id;?>');"><i class="fa fa-window-close-o"></i>  Desactivar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- The Modal -->
                   
                    
            </div>
        </div>
            <div id="myModal" class="modal" style="display:none">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
    </div>
</div><!-- main content -->
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="static/cms/js/events.js"></script>
<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 1;}
/* Caption of Modal Image */
/* Add Animation */
@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: black;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #aaa;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>