<?php
require_once ('Actividad_aprendizaje/model/clase_sesion.php');

$sesion = new Sesion();
if (isset($_SESSION))
{
$sesion->borrar_sesion();
} else {

}

