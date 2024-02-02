<?php 
    require_once "Conexion.php";

    class MenuModel{
        //mostrara el menu de forma general para usuario que no iniciaron sesion
        static public function mostrarMenuGral(){

            $stmt = Conexion::conectar()->prepare("CALL p_list_menu('A');");

            $stmt -> execute();
            return $stmt -> fetchAll();
            
            $stmt ->closeCursor();

            $stmt = null;

        }

        // mostrara el menu pero con otras opciones para usuarios que iniciarion sesion

        static public function mostrarMenu(){

            $stmt = Conexion::conectar()->prepare("CALL p_list_menu('B');");

            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt ->closeCursor();

            $stmt = null;

        }

        // mostrar el nosotros (mision y vision)

        static function mostrarMisionYVision(int $idMenu){
            $stmt = Conexion::conectar()->prepare("CALL p_list_nosotros('A',:idMenu);");

            $stmt -> bindParam(":idMenu", $idMenu, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetchAll(); // esta devolviendo un conjunto de resultados
            $stmt = null;

        }
     
    }

?>