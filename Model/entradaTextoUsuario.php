<?php


class EntradaTextoUsuario
{
    public function entradaHilo($tituloTema)
    {

        require_once('../../model/clase_hilos.php');
        require_once('../../model/clase_usuario.php');
        require_once('DAOs/temas_DAO.php');

        if (isset($_POST['submit'])) {
            $userSesion = $_SESSION['nick'];
            $ususario = new clase_usuario(null,null,null);
            $usuarioId =$ususario->usuarioId($userSesion);
            $temas = new Temas_DAO();
            $idTema=$temas->obtenerCategoriaId($tituloTema);
            $titulo = $_POST['tema'];
            $contenido = $_POST['contenido'];
            $hilo = new hilos(null);
            $hilo->insertarHilo($idTema['id_tema'],$usuarioId,$titulo);
        }
    }
    public function entradaRespuesta($idHilo){
        if (isset($_POST['submit'])) {
            $userSesion = $_SESSION['nick'];
            $ususario = new clase_usuario(null,null,null);
            $usuarioId =$ususario->usuarioId($userSesion);


            $temas = new Temas_DAO();
            $idTema=$temas->obtenerCategoriaId($tituloTema);
            $titulo = $_POST['tema'];
            $contenido = $_POST['contenido'];
            $hilo = new hilos(null);
            $hilo->insertarHilo($idTema['id_tema'],$usuarioId,$titulo);
        }
    }
}

