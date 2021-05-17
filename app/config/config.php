<?php

// INFORMO O PREFIXO A SER DESCARTADO DA URI
// POR EXEMPLO:
// * URL => http://host.com/public/classe/metodo/parametros/
// * REQUEST_URI => /public/classe/metodo/parametros/
// * define('URI_PREFIX', '/public/');
// * URI considerada => classe/metodo/parametros/
define('URI_PREFIX', '');

require_once('routers.php');