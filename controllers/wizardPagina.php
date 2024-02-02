<?php

class WizardPagina{


    //metodo para desplegar el menu que no iniciaron sesion
    static public function mostrarMenuGral()
    {
        $resp = MenuModel::mostrarMenuGral();
        return $resp;
    }

    //metodo para mostrar las familias 
    static public  function mostrarFamilias(int $idMenu)
    {
        $resp = ArticuloModel::mostrarFamilia($idMenu);
        return $resp;
    }


     //desplegara la mision y vision en NOSOTROS
     static public function desplegarMisionYVision(int $idMenu)
     {
         $resp = MenuModel::mostrarMisionYVision($idMenu);
         return $resp;
     }


     //metodo para mostrar el Slide
    static public function mostrarSlide()
    {
        $resp = SlideModel::mostrarSlide();
        return $resp;
    }


    //Metodo para mostrar el catalogo 
    static public function mostrarCatalogo()
    {
        $resp = CatalogoModel::mostrarCatalogo();
        return $resp;
    }

    //metodo para mostrar el contenido de la pagina en el inicio como 
    // Nosotros,  Calculadora de corte, productos, contactos, etc.
    static public function mostrarContenido()
    {
        $resp = ContenidoModel::mostrarContenido();
        return $resp;
    }

    //Metodo para mostrar las sucursales en el footer para contactenos
    static public function mostrarSucursales()
    {
        $resp = ContactoSucursalesModel::mostrarSucursalesContacto();
        return $resp;
    }

    //Para revisar las rutas de las familias
    static public function verificarRutaFamilia(String $ruta)
    {
        $resp = ArticuloModel::verificarFamilia($ruta);
        return $resp;
    }

    //para listar los articulos por familia 
    /* static public function desplegarArticulosXFamilia(int $idGrpFamiliaSap)
    {
        $resp = ArticuloModel::mostrarArticulosXFamilia($idGrpFamiliaSap);
        return $resp;
    } */
    // para listar los articulos por cliente, lista de precio, ciudad y familia
    static public function desplegarArticulosXFamiliaXClienteYPrecio(int $idGrpFamiliaSap, int $codCiudad, int $listaPrecio)
    {
        $resp = ArticuloModel::mostrarArticulosXFamiliaXListaPrecioXCiudad($idGrpFamiliaSap, $codCiudad, $listaPrecio);
        return $resp;
    }

   //para cargar y actualizar los articulos 
   public function cargarArticulos(int $codCiudad, int $listaPrecio, int $idGrpFamiliaSap)
   {
       $resp = new ArticuloModel();
       $resp->cargarArticulos($codCiudad, $listaPrecio, $idGrpFamiliaSap);
       return $resp;
   }

   // para listar los articulos en general cuando un usuario no se ha logueado
   static public function listarArticulos(int $codCiudad, int $listaPrecio, int $idGrpFamiliaSap)
   {
       $resp = ArticuloModel::listarArticulos($codCiudad, $listaPrecio, $idGrpFamiliaSap);
       return $resp;
   }


}

?>