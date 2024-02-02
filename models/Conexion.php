<?php
class Conexion {
    
    var $link = null;
    var $api  = null;
    //funcion conectar
    static public function conectar(){ 
        try {
            $link = new PDO("mysql:host=localhost;dbname=webesppapel",
						"root",
						"",
                        /*	"impe720_root",
						"20papirus", */
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						); 
                        
       
            return $link;
        } catch (Exception $ecp) {
            
            echo 'Error al conectarse con  Impexpap S.A. <br>'.$ecp->getMessage(); 
            
        }                
    }

    // direccion url  Servidor Bosque
    static public function baseURL(){
        try {
            $api="http://200.105.169.35:7001/Bosque/restPrueba/";
            return $api;
        } catch (Exception $ecp) {
            echo 'Error al conectarse con los servicios de Impexpap S.A. <br>'.$ecp->getMessage(); 
        }
        //$api="http://200.105.169.35:7000/Bosque/rest";
        
    }

    
}

?>