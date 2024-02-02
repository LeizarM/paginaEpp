	<!-- breadcrumb-section -->
	<div class="calc-section">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="calc-text">
	                    <h1>CALCULADORA DE CORTE</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end breadcrumb section -->

	<!-- calc form -->
	<div class=" mt-25 mb-150 breadcrumb-bg">
	    <div class="container">
	        <div class="row">
	            <?php

                $contenido = WizardPagina::mostrarContenido();
                foreach ($contenido as $key => $valueContenido) {

                    if ($valueContenido["orden"] == 2) { // seccion calculadora de corte
                        //Calculadora de Corte
                        echo '<div class="container-fluid">
                                <center>
                                  ' . $valueContenido["contenido"] . '
                                </center>
                              </div>';
                    }
                }

                ?>

	        </div>
	    </div>
	</div>
	<!-- end calc form -->