<?php
//$item = "ruta";
$valor = $rutas[0];

//obtenemos el idendificador de la familia
$grupoFamilia = WizardPagina::verificarRutaFamilia($valor);



//por defecto solo mostrara los articulos 
//$articulos      = WizardPagina::desplegarArticulosXFamilia(  $grupoFamilia["idGrpFamiliaSap"] );


$articulos = WizardPagina::listarArticulos(-1, -1,  $grupoFamilia["idGrpFamiliaSap"]);
$msj = "INICIE SESÍON PARA VER PRECIOS Y STOCKS";

//verificamos si inicio sesion
if (isset($_SESSION["validarSesion"])) {
    //verificamos si la sesion es valida
    if ($_SESSION["validarSesion"] == "ok") {

        $cargarArticulo = new WizardPagina();
        $cargarArticulo->cargarArticulos($_SESSION["codCiudad"],  $_SESSION["listaPrecioCliente"], $grupoFamilia["idGrpFamiliaSap"]);

        //luego trae los 

        $articulos = WizardPagina::desplegarArticulosXFamiliaXClienteYPrecio($grupoFamilia["idGrpFamiliaSap"], $_SESSION["codCiudad"],  $_SESSION["listaPrecioCliente"]);
        $msj = null;
    }
}

?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1><?php echo $grupoFamilia["familia"] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->






<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">

                    <div class="coupon-form-wrap">
                        <form action="#">
                            <p>Escriba en el buscador para mostrar los articulos deseados en la lista inferior:</p>
                            <p><input type="text" id="myInput" placeholder="Buscar . . ." onkeypress="return event.keyCode != 13;"></p>
                           
                        </form>
                    </div>

                </div>
            </div>
        </div>

        
        
        <div class="row product-lists" id="myList">

            <?php
            $stockYPrecios = null;
            $style = null;

            
            foreach ($articulos as $key => $valueArt) {

                $datoArt = $valueArt["datoArt"] == null ? $valueArt["mbArt"]["datoArt"] : $valueArt["datoArt"];
                $style = !isset($valueArt["moneda"]) ? "single-product-item-without-price" : "single-product-item";
                echo '<div class="col-lg-4 col-md-6 text-center">
                        <div class="' . $style . '">

                            <h3>' . $valueArt["codArticulo"] . '</h3>

                            <p class="product-price"><span>' . $datoArt . '</span></p>';

                echo $stockYPrecios =  !isset($valueArt["moneda"]) ? $stockYPrecios : '<p> Precio: ' .  $valueArt["precio"] . ' ' . $valueArt["moneda"] . '</p><a href="#" class="cart-btn addCart" codArticulo="' . $valueArt["codArticulo"] . '" datoArt="' . $valueArt["datoArt"] . '" precio="' . $valueArt["precio"] . '" moneda="' . $valueArt["moneda"] . '" disponible="' . $valueArt["disponible"] . '" unidadMedida="' . $valueArt["unidadMedida"] . '" listaPrecio="' . $_SESSION["listaPrecioCliente"] . '" idCliente="' . $_SESSION["idClienteBosque"] . '""><i class="fas fa-shopping-cart"></i> Agregar al Carrito</a>';
                echo   '</div>
                    </div>';
            }

            if( count($articulos) == 0 ){
                
                echo '<div class="text-center">
                        <h2 class="product-price"> <span>NO SE ENCUENTRAN ARTICULOS PARA ESTA FAMILIA</span></h2>
                      </div>';
               
                
            }
            ?>

        </div>
    </div>
</div>