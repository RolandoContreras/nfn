<!DOCTYPE html>
<html lang="en">
<!--START HEAD-->
<?php $this->load->view("head");?>
<!--END HEAD-->
<body>
<div class="super_container">
	<!-- Header -->
	<header class="header d-flex flex-row justify-content-end align-items-center trans_200">
		<!-- Logo -->
		<div class="logo mr-auto">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="130">
		</div>
		<!-- Navigation -->
                <?php $this->load->view("nav2");?>
		<!-- Hamburger -->
		<div class="hamburger_container bez_1">
                    <i class="fa fa-bars trans_200"></i>
		</div>
	</header>
	<!-- Menu -->
	<div class="menu_container">
		<div class="menu menu_mm text-right">
			<div class="menu_close"><i class="fa fa-times-circle trans_200"></i></div>
                        <?php 
                            //INIT VAR
                            $active_home = "";
                            $active_buy = "";
                            $active_login = "";
                            $active_faq = "";

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
                                default:
                                    $active_home = "active";
                                    break;
                            }        
                            ?>
                           <ul>
                                <li class="<?php echo $active_home;?>"><a href="<?php echo site_url().'home'?>">Inicio</a></li>
                                <li><a href="<?php echo site_url().'home/#features'?>" >Características</a></li>
                                <li class="<?php echo $active_buy;?>"><a href="<?php echo site_url().'buy';?>">¡Comprar!</a></li>
                                <li><a href="<?php echo site_url().'home/#contact';?>">Contacto</a></li>
                                <li class="<?php echo $active_login;?>"><a href="<?php echo site_url().'login';?>">Login</a></li>
                                <li class="<?php echo $active_faq;?>"><a href="<?php echo site_url().'faq';?>">FAQ</a></li>
                                <li>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
                                    <a style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
                                </li>
                            </ul>
		</div>
	</div>
	<!-- Home -->
        <!--CRIPTOCURRENCY-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="icon_box_title">
                            <h1 class="title-currency margin-top100">PREGUNTAS FRECUENTES</h1>
                        </div>
                    </div>
                </div>
                        <section class="faq" id="faq">
                                <div class="row">
                                    <dl class="col-lg-6">
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Cómo consigo una cartera o monedero (Wallet)?</a></dt>
                                        <dd>
                                            <p>Nosotros te recomendamos el monedero Jaxx por su sencillez y rápidez. También tienes otros muchos, caso de Copay, Mycellium...</p>
                                            <p>Simplemente accede a su web, selecciona tu sistema operativo (Android, iOS, Windows) e instálalo.</p>
                                            <p>En el caso de Jaxx, tu dirección de Bitcoin la verás reflejada debajo del texto "Your Current Bitcoin Address" como puedes comprobar en la imagen que detallamos a continuación. Esta es la dirección que necesitas introducir en Bitnovo como tu monedero para que te enviemos los Bitcoins.</p>
                                            <p class="wysiwyg-text-align-center"><img src="<?php echo site_url().'static/page_front/images/jaxx.png';?>" alt="monedero"></p>
                                            <p>Una vez recibas los Bitcoins, verás reflejada la transacción bajo el apartado "Transaction History". </p>
                                            <p>Recuerda que es importante que realices una copia de seguridad del monedero. En Jaxx puedes hacerlo accediendo al "Menu", "Tools", "Display Backup Phrase". Aparecerán 12 palabras que debes anotar en un lugar seguro para restaurar tu monedero en caso de pérdida del dispositivo.</p>
                                            <p>Jaxx también soporta otras criptomonedas, no sólo Bitcoin, si deseas activar un monedero de otra criptomoneda deberemos de pulsar sobre el menú superior y pulsar sobre "Wallets" y seleccionar el deseado.</p>
                                            <p>Os dejamos a continuación algunos ejemplos de los Wallet que puedes usar para las criptomonedas soportadas en Bitnovo.com</p>
                                            <table style="border-collapse: collapse; width: 558.05px;" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr style="height: 16.0pt;">
                                                <td class="wysiwyg-text-align-center" style="height: 16pt; width: 115px;" height="16">&nbsp;</td>
                                                <td class="xl65 wysiwyg-text-align-center" style="width: 231px;"><strong>Wallet</strong></td>
                                                <td class="xl65 wysiwyg-text-align-center" style="width: 197.05px;"><strong>Hardware</strong></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Bitcoin</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Dash</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Bitcoin Cash</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Cardano</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://daedaluswallet.io/">Daedalus</a></td>
                                                <td class="wysiwyg-text-align-center" style="width: 197.05px;">-</td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Ethereum</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Ethereum Classic</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Litecoin</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Monero</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://getmonero.org/downloads/">Monero</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://www.ledgerwallet.com/">Ledger*</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Ripple</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://toastwallet.com/">Toast</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://www.ledgerwallet.com/">Ledger</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Verge</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://vergecurrency.com/wallets/">Verge Wallet Tor</a></td>
                                                <td class="wysiwyg-text-align-center" style="width: 197.05px;">-</td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Zcash</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>OmiseGO</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://jaxx.io/">Jaxx</a></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Siacoin</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://sia.tech/get-started">Sia</a></td>
                                                <td class="wysiwyg-text-align-center" style="width: 197.05px;">-</td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>NXT</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://nxtplatform.org/">Nxtplatform</a></td>
                                                <td class="wysiwyg-text-align-center" style="width: 197.05px;">-</td>
                                                </tr>
                                                <tr style="height: 16.0pt;">
                                                <td class="xl65 wysiwyg-text-align-left" style="height: 16pt; width: 115px;" height="16"><strong>Tron</strong></td>
                                                <td class="xl66 wysiwyg-text-align-center" style="width: 231px;"><a href="https://tronscan.org/#/">Tron</a></td>
                                                <td class="wysiwyg-text-align-center" style="width: 197.05px;"><a href="https://trezor.io/">Trezor</a></td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                <p>*El proceso de instalación requiere conocimientos avanzados.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Qué es y como funciona Bitcoin?</a></dt>
                                        <dd>
                                            <p>Bitcoin es una moneda digital y también es la primogénita de todas las criptomonedas. Está basada en el protocolo Blockchain (cadena de bloques) y es una criptomoneda descentralizada es decir que no esta controlada ni sustentada por ninguna entidad financiera, es la comunidad la que la mantiene.</p>
                                            <p>Uno de los grandes enigmas sobre el Bitcoin es quien es su creador o grupo de creadores. Se desconoce la respuesta, tan solo conocemos su seudónimo ... Satoshi Nakamoto.</p>
                                            <p>El Bitcoin es minable es decir, los ordenadores que sostienen la Blockchain, también llamados “mineros”, pueden conseguir más monedas a través de un sistema de prueba de trabajo (POW o Proof-Of-Work). Básicamente con este sistema los mineros son las maquinas que resuelven complejos algoritmos con los que se puede verificar la validez de las transacciones que se realizan en la red y por realizar estos procesos los mineros ganan una “recompensa”.</p>
                                            <p>El Bitcoin no es ni mucho menos infinito, las unidades máximas de Bitcoins que pueden existir en circulación no podrán superar los 21.000.000 de BTC.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿La compra es instantánea?</a></dt> 
                                        <dd>
                                            <p>Si seleccionas el pago mediante tarjeta bancaria, una vez finalizado en la pasarela de pago se recibe de forma instantánea.</p>
                                            <p>Este periodo puede variar dependiendo del país y del banco de emisión de la transacción, del día e incluso de la hora que se realice el pago. Por tanto, es posible que tu pago se reciba pasado un día, dos o varios.</p>
                                            <p>Te recordamos además que dependiendo de varios factores relacionados con tu seguridad y con nuestras medidas antifraude, será necesario solicitar información adicional sobre tu petición o sobre tus datos personales.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Puedo comprar criptomonedas en efectivo?</a></dt>
                                        <dd>
                                            <p>Sí, Easycripto te proporciona la opción de pagar por criptomonedas en efectivo. Puedes hacerlo a través de nuestro sistema web.</p>
                                            <p>Consulta aquí.</p>
                                        </dd>
                                        
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿En qué Wallet almaceno mis criptomonedas?</a></dt> 
                                        <dd>
                                            <p>Nosotros te recomendamos el monedero Jaxx por su sencillez, rápidez y, sobre todo, por la capacidad de poder gestionar varios tipos de criptomonedas junto con sus respectivos wallets.</p>
                                            <p>También tienes otros muchos gestores de monederos virtuales, caso de Copay, Mycellium... Basta con "googlear" un poco y encontrarás decenas de opciones. Si eliges uno, asegúrate de revisar los comentarios de los usuarios antes de descargar e instalarlo.</p>
                                            <p>Aunque básicamente casi todos los gestores de wallets funcionan de forma similar, vamos a profundizar un poco más en Jaxx....</p>
                                            <p>Simplemente accede a su web, selecciona tu sistema operativo (Android, iOS, Windows) e instálalo.</p>
                                            <p>En el caso de Jaxx, tu dirección de Bitcoin la verás reflejada debajo del texto "Your Current Bitcoin Address" como puedes comprobar en la imagen que detallamos a continuación. Esta es la dirección que necesitas introducir en Easycripto como tu monedero para que te enviemos los Bitcoins.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>La comisión de los mineros en la Blockchain</a></dt> 
                                        <dd>

                                            <p>Desde páginas como esta:https://estimatefee.com</p>
                                            <p>Podremos comprobar en tiempo real cuantos bitcoin se quedan los mineros por la validación de los pagos a través de la Blockchain.</p>
                                            <p>Es importante saber que la cifra es variable, NO es un porcentaje porque depende de los bytes transmitidos, y en los momentos de más tráfico es cuanto más sube de valor.</p>
                                            <p>Es cierto que podemos elegir la prioridad con la que enviar nuestros bitcoins y eso hará que pueda variar el precio a pagar por esta comisión. A mayor rapidez/urgencia, mayor será el precio de la comisión. Hay que tener especial cuidado al elegir una prioridad baja porque, aunque bajen las comisiones, puede retrasarse mucho tiempo el envío e incluso cancelarse.</p>
                                        </dd>
                                    </dl>
                                    <dl class="col-lg-6">
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>Conceptos Básicos</a></dt>
                                        <dd>
                                            <p>Dirección (Clave Pública)</p>
                                            <p>Viene a ser como el número de una cuenta bancaria y visualmente es un código compuesto por varias decenas de caracteres alfanuméricos, por ejemplo este: 1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfN4</p>
                                            <p>Es necesario tener al menos una dirección para poder enviar o recibir criptomonedas. Además, un tipo de dirección solo se puede usar para un solo tipo de criptomoneda.</p>
                                            <p>Clave privada</p>
                                            <p>Es similar a una contraseña o código secreto con el que se permite enviar criptomonedas de una dirección (Clave Pública) a otra.</p>
                                            <p>Transacción</p>
                                            <p>Es el envío de un determinado valor de criptomoneda entre dos direcciones.</p>
                                            <p>Hash</p>
                                            <p>Es una cadena de texto de longitud fija, por ejemplo así: 4a5e1e4baab89f3a32518a88c31bc87f618f76673e2cc77ab2127b7afdeda33b, que resume y garantiza la integridad de todo un conjunto de datos. Un ejemplo sería una transacción de criptomonedas que puede representarse por una cadena de texto (hash).</p>
                                            <p>Wallet / Monedero / Cartera</p>
                                            <p>Son aplicaciones que nos facilitan el envío o la recepción de criptomonedas, por ejemplo bitcoin. Estos programas se pueden usar todos los días del año, y a cualquier hora, porque no dependen de ninguna entidad o sociedad.</p>
                                            <p>Un monedero o wallet puede usarse desde ordenador con programas que nos instalamos o con navegadores web, también desde móvil o desde dispositivos autónomos (Hardware Wallet) e incluso pueden estar en papel.</p>
                                            <p>En todos estos casos los monederos almacenan varias direcciones, que se gestionan a través de sus claves privadas únicas con las que se controla el envío de criptomonedas a otras direcciones.</p>
                                            <p>Red Bitcoin</p>
                                            <p>Red de ordenadores conectados, a través de un protocolo p2p, para gestionar las transacciones entre las direcciones.</p>
                                            <p>Blockchain / Cadena de Bloques</p>
                                            <p>Es el registro de todas las transacciones a través de la Red de ordenadores y a las que da validez.</p>
                                            <p>Es por tanto un sistema de confianza que nos garantiza la veracidad de las transacciones hechas.</p>
                                            <p>Cuando una transacción se confirma pasa a formar parte de un bloque.</p>
                                            <p>La Blockchain se comparte entre los ordenadores de esta red, con nodos que mantienen copias integras de la cadena de bloques. </p>
                                            <p>Cada Bloque es un elemento de la BlockChain que agrupa transacciones y una referencia al bloque procesado inmediatamente antes de él.</p>
                                            <p>Transacción confirmada</p>
                                            <p>Una transacción se ha confirmado cuando se integra dentro de un bloque. Normalmente, para estar seguros, es recomendable esperar a tener varias confirmaciones por parte de los ordenadores que forman parte de la red.</p>
                                            <p>Transacción no confirmada</p>
                                            <p>Es una transacción que aún no forma parte la cadena de bloques.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Hay límites en las peticiones por compra de criptomonedas?</a></dt> 
                                        <dd>
                                            <p>Seguimos la normativa actual respecto a los límites en este tipo de servicios.</p>
                                            <p>Nuestro compromiso con las leyes vigentes nos obliga a cumplir la legislación, por lo que asumiremos siempre las normas y las directrices con el objetivo de colaborar con la orden vinculada al blanqueo de capitales.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Qué pasa con los impuestos relacionados con las criptomonedas?</a></dt> 
                                        <dd>
                                            <p>En principio las criptomonedas está sujeto a IVA pero el Tribunal Justicia de la Unión Europea lo consideran exento de IVA. El hecho de que a una operación se la declare sujeta pero exenta quiere decir que se le exime del pago del Impuesto, pese a que le sea de aplicación la normativa que lo regula.</p>
                                            <p>Por tanto aunque se le aplique una comisión o se obtenga un margen en la operación, es decir son prestaciones de servicios a título onerosos, las mismas están consideradas exentas de IVA.</p>
                                            <p>Por tanto, la transmisión de criptomonedas está exenta de IVA, en cambio si se utilizan criptomonedas para pagar por un producto o servicio, al ser una entrega de bienes si está sujeto, a efectos de facturación, y hay que hacer constar los impuestos.</p>
                                        </dd>
                                        <dt><a href="javascript:;" class="faq__dt_a"><span class="faq__link"><span></span></span>¿Cómo comprar en nuestra web?</a></dt> 
                                        <dd>
                                            <p>Desde <a href="<?php echo site_url().'buy';?>" target="_blank">aquí</a>, puedes introducir la cantidad de dólares que deseas usar y verás la conversión a criptomoneda seleccionada. A continuación pulsa el botón "COMPRAR CRIPTOMONEDAS".</p>
                                            <p>Ahora introduce los datos de tu cartera / monedero, datos de contacto y método de pago.</p>
                                            <p>Ya solo queda que revisemos los datos que hayas escritos, en algunos casos también podríamos solicitar más información, y confirmaremos la transacción.</p>
                                            <p>
                                                <img src="<?php echo site_url().'static/page_front/images/comprar_btc_faq.jpg';?>" alt="comprar imagen" />
                                            </p>
                                        </dd>
                                    </dl>
                                </div>
                        </section>
            </div>
        </header>
	<!-- Footer -->
	<?php $this->load->view("footer");?>
        <!--END FOOTER-->
    </div>
<script src="<?php echo site_url().'static/page_front/js/buy.js';?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo site_url().'static/page_front/js/jquery-3.2.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/popper.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/TweenMax.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/TimelineMax.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/ScrollMagic.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/animation.gsap.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/ScrollToPlugin.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/slick.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/owl.carousel.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/jquery.scrollTo.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/easing.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/custom.js';?>"></script>


<script src="https://www.ubex.com/js/script.js?8213" type="text/javascript"></script>

</body>
</html>