<?php
require_once('factory_DAO.php');

class Hilos_DAO extends Factory_DAO
{
    public function __construct()
    {
        parent::__construct(null,null);
        $this->conectar();
    }
    public function listarHilos($id_hilo){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM tema 
                                     LEFT JOIN hilo 
                                     ON tema.id_tema = hilo.id_tema
                                     where tema.titulo = ?;");
            $stmt->bindParam(1,$id_hilo);
            $stmt->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function numero_hilos(){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT id_hilo FROM `hilo` ");
            $stmt->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->rowCount();
    }
    public function insertarHilo($idTema,$userid,$titulo){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("INSERT INTO hilo (id_tema,id_usuario, titulo_hilo)
                                        VALUES (?,?,?);");
            $stmt->bindValue(1,$idTema);
            $stmt->bindValue(2,$userid);
            $stmt->bindValue(3,$titulo);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
