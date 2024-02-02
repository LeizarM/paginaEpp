	<!-- footer -->
	<div class="footer-area">

	    <div class="container">
	        <div class="row">

	            <?php

                $sucursales = WizardPagina::mostrarSucursales();

                foreach ($sucursales as $key => $valueSucursal) {

                    echo '<div class="col-lg-3 col-md-6">
                                <div class="footer-box about-widget">
                                    <h2 class="widget-title">' . $valueSucursal["sucursal"] . '</h2>
                                    <p>' . $valueSucursal["telefono"] . '</p>
                                    <p>' . $valueSucursal["direccion"] . '</p>
                                    <p>' . $valueSucursal["departamento"] . '</p>
                                </div>
                         </div>';
                }
                ?>

	        </div>
	    </div>
	</div>
	<!-- end footer -->
