<?php 
require_once "controllers/plantillaController.php";
require_once "controllers/wizardPagina.php";

    
require_once "models/Rutas.php";
//require_once "models/PlantillaModel.php";
require_once "models/MenuModel.php";
require_once "models/ArticuloModel.php";
require_once "models/SlideModel.php";
require_once "models/CatalogoModel.php";
require_once "models/ContenidoModel.php";
require_once "models/ContactoSucursalesModel.php";

$plantilla = new ControladorPlantilla();//instanciamos 
$plantilla->plantilla();


?>