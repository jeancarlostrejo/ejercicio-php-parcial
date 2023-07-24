<?php

require_once "vendor/autoload.php";
use parcialProgra1\ejecucion\Implementacion;

$execute = new Implementacion;

$execute->main();
$execute->listadoSensible();
$execute->listadoHormonal();
echo "Listo";
