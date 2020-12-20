<?php

require_once('clase_hilos.php');
require_once('clase_usuario.php');
require_once('clase_respuestas.php');
require_once('DAOs/temas_DAO.php');

class EntradaTextoUsuario
{


    public function entradaHilo($tituloTema)
    {


        if (isset($_POST['submit'])) {
            $userSesion = $_SESSION['nick'];
            $ususario = new clase_usuario(null,null,null);
            $usuarioId =$ususario->usuarioId($userSesion);
            $temas = new Temas_DAO();
            $idTema=$temas->obtenerCategoriaId($tituloTema);
            $titulo = $_POST['tema'];
            $hilo = new hilos(null);
            $hilo->insertarHilo($idTema['id_tema'],$usuarioId,$titulo);
        }
    }
    public function entradaRespuesta($idHilo){
        if (isset($_POST['submit'])) {
            $userSesion = $_SESSION['nick'];
            $ususario = new clase_usuario(null,null,null);
            $usuarioId =$ususario->usuarioId($userSesion);
            $contenido = $_POST['contenido'];
            $respuesta = new Respuestas($idHilo);
            $respuesta->insertarRespuesta($usuarioId,$contenido);
        }
    }
}

