<?php
require_once('factory_DAO.php');

class Usuarios_DAO extends Factory_DAO
{

    /**
     * usuarios_DAO constructor.
     */
    public function __construct()
    {
        parent::__construct(null,null);
        $this->conectar();
    }
    /*Devulve un array con todos los nick de los usuarios regitrados*/
    public function consulta_usuarios (){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT nick from usuario;");
            $stmt->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertar_usuario($nick,$pass,$email){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("INSERT INTO usuario (nick, password, email)
                                        VALUES (?, ?, ?);");
            $stmt->bindValue(1,$nick);
            $stmt->bindValue(2,$pass);
            $stmt->bindValue(3,$email);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
    public function verificacion_usuario(){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT nick, password FROM usuario;");
            $stmt->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function conseguirId($username){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT id_usuario FROM usuario WHERE nick = ?;");
            $stmt->bindValue(1,$username);
            $stmt->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->fetch();
    }
}
