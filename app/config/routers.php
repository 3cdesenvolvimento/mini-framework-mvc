<?php

use app\core\Routers;

$routers = new Routers();

$routers->get('/', function(){ echo "TESTE"; });

$routers->put('/teste/home', function(){ echo "TESTE HOME"; });

$routers->patch('/teste/ramos/{pagina}', function(){ echo "TESTE 2"; });