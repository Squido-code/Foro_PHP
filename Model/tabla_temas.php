<?php
require('DAOs/temas_DAO.php');
/*Creamos los objetos necesarios para conectar y buscar en la base de datos*/
$Tema_dao = new Temas_DAO();

/*obtenemos la lista de temas*/
$listaTemas = $Tema_dao->listarTemas();
echo "<link href='/Actividad_aprendizaje/View/Style/contenido.css' rel='stylesheet' type='text/css'>";

echo '<div id="tablas">';
echo "<table>";
foreach ($listaTemas as $tema){
    //url personalizada para cada seccion
    //no pasamos variable para que te puedas meter en cada seccion directamente
    $url = "href=View/sections/".$tema['titulo'].".php";
    //pintamos la tabla con la lista obtenida

    echo '<tr>';
    echo '<td>'. "<a $url>".$tema['titulo']."</a>".'</td>';
    echo '</tr>';

}
echo"</table>";
echo '</div>';


