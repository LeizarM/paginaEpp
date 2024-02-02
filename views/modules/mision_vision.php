	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="breadcrumb-text">
	                    <h1>Misión y Visión</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end breadcrumb section -->


	<!-- featured section -->
	<div class="feature-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-7">
	                <div class="featured-text">
	                    <h2 class="pb-3">Sobre <span class="orange-text">Nosotros</span></h2>
	                    <div class="row">

	                        <?php
                            $contenido = WizardPagina::mostrarContenido();
                            foreach ($contenido as $key => $valueContenido) {
                                
                                if ( $valueContenido["orden"] == 1 ) { // seccion mostrara la vision y mision primero

                                    echo '<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                            <div class="list-box d-flex">
                                                <div class="list-icon">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                                <div class="content">
                                                    <h3>'. $valueContenido["titulo"] .'</h3>
                                                    <p>' . $valueContenido["contenido"]  . '</p>
                                                </div>
                                            </div>
                                        </div>';

                                }
                            }
                            ?>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end featured section -->