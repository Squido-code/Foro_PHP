<?php
require_once('../../model/clase_respuestas.php');
$titulo = "Foro retro Jugadores";
include('../common/header.php');
include('../../model/clase_hilos.php');
//cogemos la id con get para invocar todas las respuesta del hilo
$hilo = new Respuestas($_GET['id']);
$hilo->tablaRespuestas();
include('../common/pie.php');
