<?php
require_once('factory_DAO.php');

class Respuestas_DAO extends Factory_DAO
{
    public function __construct()
    {
        parent::__construct(null,null);
        $this->conectar();
    }
    function listarRespuestas($hilo_id){
        $stmt=null;
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM hilo 
                                     LEFT JOIN respuestas 
                                     ON hilo.id_hilo = respuestas.id_hilo
                                     where hilo.id_hilo = ?;");
            $stmt->bindParam(1,$hilo_id);
            $stmt->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}