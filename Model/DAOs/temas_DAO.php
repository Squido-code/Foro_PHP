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
        parent::__construct(null,null);
        $this->conectar();
    }

    function listarTemas(){
        try {
            $stmt = $this->dbh->prepare("SELECT titulo FROM tema");
            $stmt->execute();
            return $titulos =$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
}

}
