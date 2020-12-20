<?php
$titulo = "Dreamcast";
include_once('../common/header.php');
include_once('../../model/clase_hilos.php');
$hilo = new Hilos("dreamcast");
$hilo->tablaHilos();
include('../common/pie.php');