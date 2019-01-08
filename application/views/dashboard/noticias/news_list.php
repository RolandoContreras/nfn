<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">NOTICIAS</a>
                                            <button class="btn btn-small" onclick="add_news();"><i class="fa fa-plus"></i> Nuevo</button>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>FECHA</th>
                                <th>TÍTULO</th>
                                <th>IMAGES</th>
                                <th>ESTADO</th> 
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($obj_news as $value): ?>
                                <td align="center"><?php echo $value->news_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td class="post_title" align="center"><b><?php echo $value->title;?></b></td>
                                <td align="center"><img src="<?php echo site_url()."static/backoffice/images/new/$value->img";?>" alt="<?php echo $value->title;?>"/></td>
                                <td align="center">
                                    <?php if ($value->active == 1) {
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    }elseif($value->active == 0){
                                        $valor = "Inactivo";
                                        $stilo = "label label-important";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                <button class="btn btn-small" onclick="edit_news('<?php echo $value->news_id;?>');"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn btn-small" onclick="delete_news('<?php echo $value->news_id;?>');"><i class="fa fa-trash-o"></i> Eliminar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
           <!--</form>-->         
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
<script src="static/cms/js/news.js"></script>