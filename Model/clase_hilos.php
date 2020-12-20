<?php
require_once('DAOs/hilos_DAO.php');


class Hilos
{
    private $tema=null;
    private $hilos_dao;

    /**
     * hilos constructor.
     * @param null $tema
     * le pasamos el tema para construir los hilos bajo ese tema
     */
    public function __construct($tema)
    {
        $this->tema = $tema;
        $this->hilos_dao = new Hilos_DAO();
    }
    //obtenemos una tabla escrita en htlm con todos los hilo y como cabecera la seccio
    public function tablaHilos(){

        /*obtenemos la lista de hilos*/
        $listaHilos = $this->hilos_dao->listarHilos($this->tema);
        echo "<link href='/Actividad_aprendizaje/View/Style/contenido.css' rel='stylesheet' type='text/css'>";
        echo "<div id='topic'>";
        echo "<p >" .$this->tema."</p>";
        echo "</div>";
        echo '<div id="tablas">';
        echo "<table>";
        echo "<tr>";
        foreach ($listaHilos as $hilo){
            //quitamos espacios para mostrar la url bien del titulo del hilo
            $str = str_replace(" ", "_", $hilo['titulo_hilo']);
            //url personalizada para cada seccion
            $url = "href=".$this->tema."_respuesta.php?id=".$hilo['id_hilo']."?titulo_hilo=".$str;

            //pintamos la tabla con la lista obtenida
            echo '<tr>';
            echo '<td>'."<a $url>".$hilo['titulo_hilo'].'</a>'.'</td>';
            echo '</tr>';
        }
        echo"</table>";
        echo "</div>";
    }
    public function insertarHilo($idtema,$iduser,$titulo){

        $isRegistrado=$this->hilos_dao->insertarHilo($idtema,$iduser,$titulo);
    if ($isRegistrado){
        //TODO redirigir a la pagina del hilo
        header("Refresh:0");
            }
        }

}
