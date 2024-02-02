	<!-- product section -->
	<a name="catag"></a>
    <div class="product-section mt-150 mb-150">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="section-title">
	                    <h3><span class="orange-text">Nuestro</span> Catálogo de Productos</h3>
	                    <p>Ofrecemos diferentes tipos de familias de papel para nuestro consumidor.</p>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            
				<?php

					$catalogo = WizardPagina::mostrarCatalogo();

					foreach ( $catalogo as $key => $valueCatalogo ) {
						
						echo '<div class="col-lg-4 col-md-6 text-center">
								<div class="single-product-item">
									<div class="product-image">
										<a href="single-product.html"><img src="'. $valueCatalogo["imagen"] . '" alt=""></a>
									</div>
                                    <p class="product-price">'.  $valueCatalogo["descripcion2"] .'</p>
									<p class="product-price"><span>'. $valueCatalogo["descripcion"] .'</span></p>

								</div>
							</div>';
					}

				?>

	        </div>
	    </div>
	</div>
	<!-- end product section -->