<?php 

require_once "Conexion.php";


class ContenidoModel
{

        /**
     * A description of the entire PHP function.
     *
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    static  public function mostrarContenido()
        {
           $stmt = Conexion::conectar()->prepare("CALL p_list_contenido ('A');");
           $stmt ->execute();
           return $stmt ->fetchAll();
           $stmt = null;
        }   

}