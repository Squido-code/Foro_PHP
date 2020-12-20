<?php
$titulo = "Playstation";
include_once('../common/header.php');
include_once('../../model/clase_hilos.php');
//escribimos directamente el tema para poder entrar en playstation directamente
$hilo = new Hilos("Playstation");
$hilo->tablaHilos();
include('../common/pie.php');
