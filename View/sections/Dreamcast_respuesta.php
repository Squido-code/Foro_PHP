<?php
require_once('../../model/clase_respuestas.php');
$titulo = "Foro retro Jugadores";
include_once('../common/header.php');
include_once('../../model/clase_hilos.php');
include_once('../../model/entradaTextoUsuario.php');
//cogemos la id con get para invocar todas las respuesta del hilo
$respuestas = new Respuestas($_GET['id']);
$respuestas->tablaRespuestas();
$nuevaRespuesta = new EntradaTextoUsuario();
if (isset($_SESSION) && isset($_SESSION['nick'])) {
    echo '<link href="/Actividad_aprendizaje/View/Style/formulario.css" rel="stylesheet" type="text/css">';
    echo '<form id="form" action="" method="post">';
    echo '<p>Contenido</p>';
    echo '<textarea id="w3review" name="contenido" rows="4" cols="50"></textarea><br/>';
    echo '<p><input type="submit" name="submit" value="Nuevo Comentario"/></p>';
    echo '</form>';
    $nuevaRespuesta->entradaRespuesta($_GET['id']);
}
include('../common/pie.php');
