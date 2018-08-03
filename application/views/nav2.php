<?php 
    //INIT VAR
    $active_home = "";
    $active_buy = "";
    $active_login = "";
    $active_faq = "";
    $active_contact = "";

    $url = explode("/",uri_string());
    $nav = $url[0];
    switch ($nav) {
        case 'home':
            $active_home = "active";
            break;
        case 'buy':
            $active_buy = "active";
            break;
        case 'login':
            $active_login = "active";
            break;
        case 'faq':
            $active_faq = "active";
            break;
        case 'contact':
            $active_contact = "active";
            break;
        default:
            $active_home = "active";
            break;
    }        
?>
<nav class="main_nav justify-self-end text-left">
    <ul>
        <li class="<?php echo $active_home;?>"><a href="<?php echo site_url().'home'?>">Inicio</a></li>
        <li><a href="<?php echo site_url().'home/#features'?>" >Características</a></li>
        <li class="<?php echo $active_buy;?>"><a href="<?php echo site_url().'buy';?>">¡Comprar!</a></li>
        <li class="<?php echo $active_contact;?>"><a href="<?php echo site_url().'home/#contact';?>">Contacto</a></li>
        <li class="<?php echo $active_login;?>"><a href="<?php echo site_url().'login';?>">Login</a></li>
        <li class="<?php echo $active_faq;?>"><a href="<?php echo site_url().'faq';?>">FAQ</a></li>
        <li>
            <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
            <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
        </li>
    </ul>
</nav>