<?php
require_once ('DAOs/Respuestas_DAO.php');
require_once('DAOs/hilos_DAO.php');

class Respuestas
{
    private $id=null;
    private $respuestas_dao;
    /*
     * hilos constructor.
     * @param null $tema
     * le pasamos el id del hilo para construir todas las respuestas basadas en ese hilo
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->respuestas_dao = new respuestas_DAO();
    }
    //creamos una tabla con todas las respuestas al hilo como cabecera el titulo del hilo
    public function tablaRespuestas(){
        /*obtenemos la lista de hilos*/
        $listaRespuestas = $this->respuestas_dao->listarRespuestas($this->id);
        /*obtenemos el titulo del hilo*/

        echo "<link href='/Actividad_aprendizaje/View/Style/contenido.css' rel='stylesheet' type='text/css'>";
        echo "<div id='topic'>";
        echo "<p >" .$listaRespuestas[0]["titulo_hilo"]."</p>";
        echo "</div>";
        echo '<div id="tablas">';
        echo "<table>";
        echo "<tr>";
        foreach ($listaRespuestas as $respuestas){
            //pintamos la tabla con la lista obtenida
            echo '<tr>';
            echo '<td>'.$respuestas['contenido'].'</td>';
            echo '</tr>';
        }
        echo"</table>";
        echo "</div>";
    }
    public function insertarRespuesta($idHilo,$idUser,$contenido){
        //$isRegistrado=$this->hilos_dao->insertarHilo($idtema,$iduser,$titulo);
        $isRegistrado=$this->$this->respuestas_dao->insertarRespuesta($idHilo,$idUser,$contenido);
        if ($isRegistrado){
            header("Refresh:0");
        }
    }
}