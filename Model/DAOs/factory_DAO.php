<?php

class Factory_DAO
{
/*definimos como constante la conexion ala base de datos ya que esta no debe ser manipulada*/



private $user='root';
private $password='';

protected $dbh= null;
    /**
     * factory_DAO constructor.
     */
    public function __construct($user,$pass)
    {
        if (isset($user)){
        $this->user = $user;
        }
        if (isset($pass)){
        $this->password = $pass;
        }

    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function conectar(){
        try {
            $dbname = 'foro';
            $server ='localhost';
            $dns = "mysql:host=$server;dbname=$dbname;charset=UTF8";
            $this->dbh = new PDO($dns,$this->user,$this->password,array(
                PDO::ATTR_PERSISTENT=>true
            ));
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}