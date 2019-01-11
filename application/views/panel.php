<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<div class="row-fluid">
    <div class="span6">
        <div class="widget_container">
            <div class="well nomargin">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">Vista Rápida</a>
                                    </div>
                            </div>
                    </div>
                    <table id="quick_view" class="table">
                            <thead>
                                    <tr>
                                            <th>CMS</th>
                                            <th>Acciones</th>
                                    </tr>
                            </thead><!-- table heading -->
                            <tbody>
                                    <tr>
                                        <td><a href="<?php echo site_url().'dashboard/ventas_card';?>"><b>0</b><i class="fa fa-btc"></i> Ventas Box</a></td>
                                        <td><a href="<?php echo site_url().'dashboard/ventas_card';?>" class="pending"><b class="cmd">0</b><i class="fa fa-btc"></i> Por Procesar</a></td>
                                    </tr>
                                    <tr>
                                            <td><a href="<?php echo site_url().'dashboard/comentarios';?>"><b><?php echo $obj_total->total_comments;?></b><i class="fa fa-comments"></i> Comentarios</a></td>
                                            <td><a href="<?php echo site_url().'dashboard/comentarios';?>" class="pending"><b class="cmd"><?php echo $obj_pending->pending_comments;?></b><i class="fa fa-comments"></i> Por Leer</a></td>
                                    </tr>
                                    <tr>
                                            <td><a href="<?php echo site_url().'dashboard/soporte';?>"><b>0</b><i class="fa fa-question"></i> SAC</a></td>
                                            <td><a href="<?php echo site_url().'dashboard/soporte';?>" class="spam"><b class="cmd">0</b><i class="fa fa-question"></i> Por Solucionar</a></td>
                                    </tr>
                                    <tr>
                                            <td><a href="<?php echo site_url().'dashboard/box';?>"><b><?php echo $obj_total->total_box;?></b><i class="fa fa-users"></i> Box</a></td><td></td>
                                    </tr>
                                    <tr>
                                            <td><a href="<?php echo site_url().'dashboard/clientes';?>"><b><?php echo $obj_total->total_customer;?></b><i class="fa fa-users"></i> Asociados</a></td><td></td>
                                    </tr>
                                    <tr>
                                            <td><a href="<?php echo site_url().'dashboard/usuarios';?>"><b><?php echo $obj_total->total_users;?></b><i class="fa fa-user-secret"></i> Usuarios</a></td><td></td>
                                            <td class="blank">&nbsp;</td>
                                    </tr>

                            </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="span6">
        <div id="quick_comment_view" class="widget_container">
            <div class="well">							
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">Último Comentario</a>
                                    </div>
                            </div>
                    </div>
                <?php 
                if(count($obj_last_comment) > 0){ ?>
                    <div class="row-fluid">
                        <div class="comment_container span12" style="margin-left:auto;">
                            <div class="span2">
                                <img style="padding: 8px" src="<?php echo site_url('static/cms/images/mensaje.png');?>" alt="mensajes"/>
                            </div>
                            <div class="span10" style="margin-left:auto;">
                                <div class="comment_content">
                                    <p class="meta"><span class="comment_date"><?php echo formato_fecha($obj_last_comment->date_comment);?></span> | <a><?php echo $obj_last_comment->email;?></a></p>
                                        <p>
                                            <a class="comment_author"><?php echo $obj_last_comment->name;?></a> : <?php echo $obj_last_comment->comment;?><br/>
                                            <b>Estado</b> : <?php echo $obj_last_comment->active == 0? "Contestado":"No Contestado";?>
                                        </p>
                                        <p>
                                            <?php 
                                            if($obj_last_comment->active == 1){ ?>
                                                <a class="btn btn-mini btn-success" onclick="change_state('<?php echo $obj_last_comment->comment_id;?>');">Marcar Contestado</a> 
                                            <?php } ?>
                                            <a class="btn btn-mini btn-primary" href="<?php echo site_url("dashboard/comentarios");?>">Ver más</a>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                        <div class="row-fluid">
                            <div class="alert alert-success" style="text-align: center"><b>NO HAY MENSAJES</b></div>
                        </div>
                <?php }  ?>
            </div>
        </div>
    </div>
    <div class="span6">
        <div id="quick_comment_view" class="widget_container">
            <div class="well">							
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">Último Mensaje SAC</a>
                                    </div>
                            </div>
                    </div>
                        <div class="row-fluid">
                            <div class="alert alert-success" style="text-align: center"><b>NO HAY MENSAJES</b></div>
                        </div>
                
            </div>
        </div>
    </div>
</div>
<script src="static/cms/js/panel.js"></script>
<script src="static/cms/js/jobs.js"></script>