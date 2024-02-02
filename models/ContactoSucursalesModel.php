<?php

require_once "Conexion.php";

    /**
    * A static function that retrieves and returns the list of contact information for all branches.
    *
    * @throws Some_Exception_Class description of exception
    * @return array Returns an array containing the contact information of all branches.
    */
    class ContactoSucursalesModel {

        static public function mostrarSucursalesContacto(){
        
        $stmt = Conexion::conectar()->prepare("CALL p_list_contactoSucursal ('A')");
           $stmt ->execute();
           return $stmt ->fetchAll();
           $stmt = null;
        }

    }

?>