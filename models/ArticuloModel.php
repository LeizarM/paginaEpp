<?php


require_once 'Conexion.php';


class ArticuloModel
{


    //procedimiento para mostrar las familias
    static public function mostrarFamilia( $idMenu)
    {
        $stmt = Conexion::conectar()->prepare("CALL p_list_familia ('A', :idMenu, null);");
        $stmt->bindParam(":idMenu", $idMenu);
        $stmt->execute();
        return $stmt->fetchAll(); // esta devolviendo un conjunto de resultados
        $stmt = null;
    }

    // procedimiento para verificar las rutas de las familias
    static public function verificarFamilia( $ruta)
    {

        $stmt = Conexion::conectar()->prepare("CALL p_list_familia ('B', null, :ruta);");
        $stmt->bindParam(":ruta", $ruta );
        $stmt->execute();
        return $stmt->fetch(); //solo regresara una fila
        $stmt = null;
    }

    //procedimiento para mostrar los articulos por familia 
    /* static public function mostrarArticulosXFamilia(int $idGrpFamiliaSap)
    {

        $stmt = Conexion::conectar()->prepare("CALL p_list_articulo( 'C', :idGrpFamiliaSap, null, null, null);");
        $stmt->bindParam(":idGrpFamiliaSap", $idGrpFamiliaSap, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(); //regresara un conjunto de resultados
        $stmt = null;
    } */

    //procedimiento para mostrar los articulos por familia, lista de precio del cliente y ciudad 
    static public function mostrarArticulosXFamiliaXListaPrecioXCiudad( $idGrpFamiliaSap,  $codCiudad,  $listaPrecio)
    {

        $stmt = Conexion::conectar()->prepare("CALL p_list_articulo( 'B', :idGrpFamiliaSap, :codCiudad, :listaPrecio, null);");
        $stmt->bindParam(":idGrpFamiliaSap", $idGrpFamiliaSap);
        $stmt->bindParam(":codCiudad", $codCiudad);
        $stmt->bindParam(":listaPrecio", $listaPrecio);
        $stmt->execute();
        return $stmt->fetchAll(); //regresara un conjunto de resultados
        $stmt = null;
    }

    //procedimiento para listar datos del articulo por precio y lista de precio
    static public function mostrarArticuloXListaDePrecio(String $codArticulo, int $listaPrecio)
    {
        try {
            $stmt = Conexion::conectar()->prepare("CALL p_list_articulo( 'D', null, null, :listaPrecio, :codArticulo);");
            $stmt->bindParam(":listaPrecio", $listaPrecio);
            $stmt->bindParam(":codArticulo", $codArticulo);
            $stmt->execute();
            return $stmt->fetchAll(); //regresara un conjunto de resultados
        } catch (\Throwable $th) {
            echo "No se puedo recuperar los resultados para mostrar los articulos E067";
        }

        $stmt = null;
    }

    //Procedimiento para cargar y actualizar precios y stocks cuando un usuario se ha logueado
    public function cargarArticulos( $codCiudad,  $listaPrecio,  $idGrpFamiliaSap)
    {
        //url base
        $baseUrl = Conexion::baseURL();
        $url = $baseUrl . "pedidosCli/L";
        //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        $data = array(
            'codCiudad'         => $codCiudad,
            'listaPrecio'       => $listaPrecio,
            'mbArt'             => array(
                'idGrpFamiliaSap' => $idGrpFamiliaSap
            )
        );

        $articulos = json_encode($data);

        try {
            //adjunta la  cadena JSON codificada a los campos POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, $articulos);

            //establecer el tipo de contenido en application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            //retorna la  respuesta en lugar de generar
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //ejecuta la solicitud del servidor
            $result = curl_exec($ch);
        } catch (Exception $ecp) {
            echo 'Error al enviar el pedido. <br>' . $ecp->getMessage();
        }
        //cierra el recurso curl
        curl_close($ch);
        //aqui hacer el  update
        //var_dump($result);

        if($result!=null){
            foreach (json_decode($result, true) as $key => $value) { //realizamos las actualizaciones de precios

             /*    var_dump( $value["codArticulo"] );
              var_dump( $value["mbArt"]["datoArt"] );
              var_dump( "listaPrecio= ".$value["listaPrecio"]);
              var_dump( "precio= ".$value["precio"]);
              var_dump( "moneda= ".$value["moneda"]);
              var_dump( "disponible= ".$value["disponible"]);
              var_dump( "gramajeSap= ".$value["mbArt"]["gramajeSap"]);
              var_dump( "unidadMedida= ".$value["mbArt"]["unidadMedida"]);
              var_dump( "codCiudad= ".$value["codCiudad"]);
              var_dump( "idGrpFamiliaSap= ".$value["mbArt"]["idGrpFamiliaSap"]);*/
               
    
                $stmt = Conexion::conectar()->prepare("CALL p_abm_articulo ( 'A', :codArticulo, :datoArt, :listaPrecio, :precio, :moneda, :disponible, :gramajeSap, :unidadMedida, :codCiudad, :idGrpFamiliaSap ); ");
    
                $stmt->bindParam(":codArticulo", $value["codArticulo"], PDO::PARAM_STR);
                $stmt->bindParam(":datoArt", $value["mbArt"]["datoArt"], PDO::PARAM_STR);
                $stmt->bindParam(":listaPrecio", $value["listaPrecio"], PDO::PARAM_INT);
                $stmt->bindParam(":precio", $value["precio"], PDO::PARAM_STR);
                $stmt->bindParam(":moneda", $value["moneda"], PDO::PARAM_STR);
                $stmt->bindParam(":disponible", $value["disponible"], PDO::PARAM_STR);
                $stmt->bindParam(":gramajeSap", $value["mbArt"]["gramajeSap"], PDO::PARAM_STR);
                $stmt->bindParam(":unidadMedida", $value["mbArt"]["unidadMedida"], PDO::PARAM_STR);
                $stmt->bindParam(":codCiudad", $value["codCiudad"], PDO::PARAM_INT);
                $stmt->bindParam(":idGrpFamiliaSap", $value["mbArt"]["idGrpFamiliaSap"], PDO::PARAM_INT);
    
                try {
                    $stmt->execute();
                } catch (Exception $th) {
                    echo "no se pudo ejecutar la sentencia " . $th->getMessage();
                }
    
                $stmt = null;
            }
        }
        
        
        return json_decode($result, true);
        $result = null;
    }
    //procedimiento para listar los articulos en general 
    static public function listarArticulos( $codCiudad,  $listaPrecio,  $idGrpFamiliaSap)
    {
        
        try {
            $stmt = Conexion::conectar()->prepare("CALL p_list_articulo( 'C', :idGrpFamiliaSap, null, null, null);");
            $stmt->bindParam(":idGrpFamiliaSap", $idGrpFamiliaSap);
           
            $stmt->execute();
            return $stmt->fetchAll(); //regresara un conjunto de resultados
        } catch (\Throwable $th) {
            echo "No se puedo recuperar los resultados para mostrar los articulos E068";
        }

        $stmt = null;
        
        /*//url base
        $baseUrl = Conexion::baseURL();
        $url = $baseUrl . "pedidosCli/L";
         //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        $data = array(
            'codCiudad'         => $codCiudad,
            'listaPrecio'       => $listaPrecio,
            'mbArt'             => array(
                'idGrpFamiliaSap' => $idGrpFamiliaSap
            )
        );

        $articulos = json_encode($data);
        //echo $url. "<br>";
        //echo "para traer los articulos <br>";
        //var_dump($data);
        try {

            //retorna la  respuesta en lugar de generar
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $articulos);
            //establecer el tipo de contenido en application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Content-Length: ' . strlen($articulos)));
            //ejecuta la solicitud del servidor
            $result = curl_exec($ch);
        } catch (Exception $ecp) {
            echo 'Error al enviar el pedido. <br>' . $ecp->getMessage;
        }
        //cierra el recurso curl
        
        //var_dump(json_decode($result, true));
        return json_decode($result, true);
        curl_close($ch);
        $result = null; */


    }
}