<?PHP
//require_once ('../../model/clase_sesion.php');
//$sesion = new Sesion();
//$sesion->iniciar_sesion();
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
<div  class="menu">
<ul>
    <li><a href="/Actividad_aprendizaje/index.php">Inicio</a></li>
    <li><a href="/Actividad_aprendizaje/View/login/login.php">login</a></li>
    <li><a href="/Actividad_aprendizaje/View/login/nuevo_usuario.php">registro</a></li>
<?php
//  require_once ('../../model/clase_sesion.php');
//     $sesion = new Sesion();
//     if (isset($_SESSION) && isset($_SESSION['nick'])){
//         $sesion->borrar_sesion();
//     echo    '<li><a href="/Actividad_aprendizaje/index.php">log out</a></li>';
//     }
//     ?>
</ul>
<br>
</div>
</body>
</html>
