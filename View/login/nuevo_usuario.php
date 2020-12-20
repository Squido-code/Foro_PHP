<?php
include('../common/header.php');
?>
    <body>
    <link href='/Actividad_aprendizaje/View/Style/formularios.css' rel='stylesheet' type='text/css'>
    <div id="topic">
        <p>Registro</p>
    </div>
    <div id="contenedor">
        <form action="" method="post">
            <form action="" method="post">
                <p class="campo">Nombre de usuario: *</p>
                <input type="text" name="user"/><br/>
                <p class="campo">Contraseña: *</p>
                <input type="password" name="password"/><br/>
                <p class="campo">Email: *</p>
                <input type="text" name="email"/><br/>
                <p>*Requerido</p>
                <input type='submit' name='submit' value='Registrarse'>
                <?php
                require_once('../../Model/clase_usuario.php');
                if (isset($_POST['submit'])) {
                    $usuario = new Clase_usuario($_POST['user'], $_POST['password'], $_POST['email']);
                    $passCifrada = $usuario->cifrar($_POST['password']);
                    $usuario->setContrasena($passCifrada);
                    if ($usuario->comprobar_usuario() !== false) {
                        $usuario->nuevoUsuario();
                        header("Location:/Actividad_aprendizaje/view/sections/index.php",true);
                    }
                }
                ?>
            </form>
            <div id="topic">
                <p><a href="login.php"">Volver a inicio de sesión</a></p>
            </div>

    </div>
    </body>
    </html>
<?php
include('../common/pie.php');

