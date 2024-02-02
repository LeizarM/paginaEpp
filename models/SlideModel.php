<?php
require_once "Conexion.php";
class SlideModel {

    //metodo para mostrar el slide desde la bd
    static public function mostrarSlide (){
        $stmt = Conexion::conectar()->prepare("CALL p_list_slide('A');");
        $stmt -> execute();
        return $stmt->fetchAll();

        $stmt->closeCursor();
        $stmt = null;
    }

}



?>