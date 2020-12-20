<?php
$titulo = "Login";
include('../common/header.php');
?>
    <body>
    <link href='/Actividad_aprendizaje/View/Style/formularios.css' rel='stylesheet' type='text/css'>
    <div id="topic">
        <p>Inicio de sesión</p>
    </div>
    <div id="contenedor">
        <form action="" method="post">
            <p>Nombre de usuario:</p>
            <input type="text" name="nick"/><br/><br/>
            <p>Contraseña:</p>
            <input type="password" name="password"/>
            <p><input type="submit" name="submit" value="Iniciar sesión"/></p>
            <?php
            require_once('../../model/clase_sesion.php');
            require_once('../../model/clase_usuario.php');
            if (isset($_POST['submit'])) {
                $usuario = new Clase_usuario($_POST['nick'], $_POST['password'], null);
                //Verificamos que el nombre de usuario y la contraseña son correctos y, en ese caso, creamos la sesión y redirigimos
                if ($usuario->verificar($_POST['nick'], $_POST['password'])) {
                    $sesion = new Sesion();

                    $sesion->set('nick', ($_POST['nick']));
                    echo "<div id='msg'>Sesion iniciada</div>";
                    header("Location:/Actividad_aprendizaje/View/common/header.php",true);
                } else {
                    echo "<div id='msg'>Nombre de usuario o contraseña incorrectos.</div>";
                }
            }
            ?>
        </form>
        <div id="topic">
            <p id="topic"><a href="nuevo_usuario.php">Regístrate aquí</a></p>
        </div>
    </div>
    </body>
<?php
include('../common/pie.php');