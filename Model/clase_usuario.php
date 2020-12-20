<?php
require_once("DAOs/usuarios_DAO.php");

class Clase_usuario
{
    private $nombre_usuario;
    private $contrasena;
    private $email;
    private $rol;
    private $usuariosDAO;

    /**
     * clase_usuario constructor.
     * @param $nombre_usuario
     * @param $contrasena
     * @param $email
     */
    public function __construct($nombre_usuario, $contrasena, $email)
    {
        $this->nombre_usuario = $nombre_usuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->usuariosDAO = new Usuarios_DAO();
    }
    //funcion para controlar que no haya usuarios repetidos y que se cumplen las condiciones
    public function comprobar_usuario(){
        //comprobamos que los campos no esten vacios
        if ($this->nombre_usuario == '' || $this->contrasena == '' || $this->email == '') {
            echo "<div id='msg'>Por favor, introduce todos los campos requeridos</div>";
            return false;
        }
        //Comprobamos que la dirección de correo sea válida
        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "<div id='msg'><br/>La dirección de correo electrónico <i>".$this->email."</i> es inválida. Por favor, introduzca una correcta.</div>";
            return false;
        }
        //comprobamos que no exista otro nick igual en la base de datos
        else {
            $listaUsuarios= $this->usuariosDAO->consulta_usuarios();
            foreach ($listaUsuarios as $usuario){
                if($usuario["nick"]=="$this->nombre_usuario"){
                    echo "<div id='msg'>Nombre de usuario ya registrado. Por favor elija otro.</div>";
                    return false;
                    break;
                }
            }
        }

    }
 //Función que registra los datos del usuario en la base de datos
    public function nuevoUsuario() {
            $this->usuariosDAO->insertar_usuario($this->nombre_usuario,$this->contrasena,$this->email);
            //Crea un objeto correo cuyos parámetros son el nombre de usuario y el email introducido para posteriormente llamar al método enviar() y mandarle el correo
            $this->enviar();
    }
    public function enviar() {
        $header = "To: ".$this->nombre_usuario ."<".$this->email."> \r \n";
        $header .= "From: admin <foro@retroJuegos.com> \r \n";
        $header .= "Content-Type: text/plain; charset = utf-8 \r \n";
        $contenido = "Su cuenta con nombre de usuario:".$this->nombre_usuario."se ha creado correctamente.";
        $asunto = "Alta nuevo susuario en retroJuegos";
        if (@mail ($this->email, $asunto, $contenido, $header)) {
            echo "Su correo se envió corectamente";
        }
        else {
            echo "Error al enviar correo";
        }
    }
    public function cifrar($contraseña){
        $pass = password_hash($contraseña, PASSWORD_DEFAULT);
        $this->contrasena=$pass;
        return $this->contrasena;
    }
    public function verificar($user,$pass){
            //Recogemos todas las filas con las columnas user y password y las almacenamos en el array $rw
        $listaUsuarios=$this->usuariosDAO->verificacion_usuario();
        foreach ($listaUsuarios as $usuario){
            if($user==$usuario["nick"] && password_verify($pass,$usuario["password"])){//TODO verificar por que no coge la contraseña.
                return true;
            }
        }
    }

    /**
     * @param false|string|null $contrasena
     * setter creado para modificarla la contraseña con una nueva cifrada
     */
    public function setContrasena($contrasena): void
    {
        $this->contrasena = $contrasena;
    }
    public function usuarioId($nick){
        $usuario = $this->usuariosDAO->conseguirId($nick);
        return $usuario['id_usuario'];
    }
}