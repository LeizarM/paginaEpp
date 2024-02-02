<?php 

    require_once "Conexion.php";

    class CatalogoModel{
    
        //procedimiento para desplegar los catalogos

        static public function mostrarCatalogo(){

           $stmt = Conexion::conectar()->prepare("CALL p_list_catalogo ('A');");
           $stmt ->execute();
           return $stmt ->fetchAll();
           $stmt = null;
        }

    }

?>