<?php
require_once('factory_DAO.php');

class Temas_DAO extends Factory_DAO

{
    /**
     * Temas_DAO constructor.
     * al construir nos conectamos a la base de datos
     */
    public function __construct()
    {
        parent::__construct(null, null);
        $this->conectar();
    }

    public function listarTemas()
    {
        try {
            $stmt = $this->dbh->prepare("SELECT titulo FROM tema");
            $stmt->execute();
            return $titulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registrarTema($user,$titulo,$contenido){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM hilo 
                                     LEFT JOIN respuestas 
                                     ON hilo.id_hilo = respuestas.id_hilo
                                     where hilo.id_hilo = ?;");
            $stmt->bindParam(1,$user);
            $stmt->bindParam(2,$titulo);
            $stmt->bindParam(3,$contenido);

            $stmt->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function obtenerCategoriaId($nombreCategoria){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT id_tema FROM tema WHERE titulo = ?;");
            $stmt->bindValue(1,$nombreCategoria);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
}
