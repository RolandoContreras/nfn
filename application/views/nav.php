<?php 
    //INIT VAR
    $active_home = "";
    $active_nosotros = "";
    $active_productos = "";
    $active_contacto = "";
    $active_noticias = "";
    $active_register = "";

    $url = explode("/",uri_string());
    $nav = $url[0];
    switch ($nav) {
        case 'inicio':
            $active_home = "active";
            break;
        case 'nosotros':
            $active_nosotros = "active";
            break;
        case 'productos':
            $active_productos = "active";
            break;
        case 'contacto':
            $active_contacto = "active";
            break;
        case 'noticias':
            $active_noticias = "active";
            break;  
        case 'register':
            $active_register = "active";
            break;  
        default:
            $active_home = "active";
            break;
    }        
?>
<nav id="main-nav-wrap" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
    <ul id="main-nav" class="main-nav menu-name-main-navigation">
        <li id='menu-item-135' class="<?php echo $active_home;?> menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'inicio';?>">Inicio</a></li>
        <li id='menu-item-135' class="<?php echo $active_nosotros;?> menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'nosotros';?>">Nosotros</a> </li>
        <li id='menu-item-136' class="<?php echo $active_productos;?> menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'productos';?>">Productos</a> </li>
        <li id='menu-item-139' class="<?php echo $active_contacto;?> menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'contacto';?>">Contacto</a></li>
        <li id='menu-item-139' class="<?php echo $active_noticias;?> menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'noticias';?>">Noticias</a></li>
        <li id='menu-item-139' class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo site_url().'login';?>">Login</a></li>
        <li id='menu-item-140' class="<?php echo $active_register;?> highlight-link menu-item menu-item-type-custom menu-item-object-custom">
          <a href="<?php echo site_url().'register';?>">Registro</a>
        </li>
        
    </ul>
</nav>