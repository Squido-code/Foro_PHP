<?PHP
require_once ('../../Model/clase_sesion.php');
$sesion = new Sesion();
$sesion->iniciar_sesion();
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <link href="/Actividad_aprendizaje/View/Style/header.css" rel="stylesheet" type="text/css">
    <title><?PHP echo $titulo ?></title>
</head>
<body>
<div>
    <img id="titulo_web" src="/Actividad_aprendizaje/Resources/Titulo_logo.png" alt="Título web">
</div>
<?php
//echo'<div  class="menu">';
//echo'<ul>';
//    echo'<li><a href="/Actividad_aprendizaje/View/sections/index.php">Inicio</a></li>';
//
//    if (isset($_SESSION) && isset($_SESSION['nick'])){
//        echo'<li id="lista"><a href="/Actividad_aprendizaje/view/sections/index.php"'.$sesion->borrar_sesion().'>log out </a></li>';
//    }else{
//        echo'<li ><a href="/Actividad_aprendizaje/View/login/login.php">login</a></li>';
//        echo'<li ><a href="/Actividad_aprendizaje/View/login/nuevo_usuario.php">registro</a></li>';
//    }
//    ?>
<div  class="menu">
    <ul>
        <li><a href="/Actividad_aprendizaje/View/sections/index.php">Inicio</a></li>
        <li ><a href="/Actividad_aprendizaje/View/login/login.php">login</a></li>
        <li ><a href="/Actividad_aprendizaje/View/login/nuevo_usuario.php">registro</a></li>
</ul>
<br>
</div>
</body>
</html>
