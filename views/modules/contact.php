	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="breadcrumb-text">
	                    <h1>Contáctanos</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end breadcrumb section -->

    <br>
    <br>

	<div class="container">
	    <div class="row">
	        <!--=========DATOS CONTACTENOS -->
	        <?php
            $contactoSuc = WizardPagina::mostrarSucursales();
            foreach ($contactoSuc as $key => $valueContactoSuc) {
                echo '<div class="col-md-3 col-sm-6 col-xs-12 text-left infoContacto">
				
                        <h3 class="tituloSuc">' . $valueContactoSuc["sucursal"] . '</h3>
                        <h5>
                            <i class="fa fa-phone-square" aria-hidden="true"></i> ' . $valueContactoSuc["telefono"] . '
        
                            <br><br>
        
                            <i class="fa fa-map-marker" aria-hidden="true"></i> ' . $valueContactoSuc["direccion"] . '
        
                            <br><br>
                            ' . $valueContactoSuc["pais"] . ' | ' . $valueContactoSuc["departamento"] . '
        
                        </h5>' . $valueContactoSuc["ubicacionMapa"] . '
                   	</div>';
            }
            ?>

	    </div>
	</div>