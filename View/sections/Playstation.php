<?php
$titulo = "Playstation";
include_once('../common/header.php');
require_once('../../model/clase_hilos.php');
require_once('../../model/entradaTextoUsuario.php');

//escribimos directamente el tema para poder entrar en playstation directamente
$hilo = new Hilos("Playstation");
$hilo->tablaHilos();
$nuevoHilo = new EntradaTextoUsuario();
if (isset($_SESSION) && isset($_SESSION['nick'])){
    echo'<link href="/Actividad_aprendizaje/View/Style/formulario.css" rel="stylesheet" type="text/css">';
    echo'<form id="form" action="" method="post">';
    echo'<p>Título</p>';
    echo'<input type="text" name="tema"/><br/>';
    echo '<p><input type="submit" name="submit" value="Nuevo Tema"/></p>';
    echo'</form>';
    $nuevoHilo->entradaHilo($titulo);
}

include('../common/pie.php');
