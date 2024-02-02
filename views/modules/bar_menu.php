<!-- header -->
<div class="top-header-area" id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center">
				<div class="main-menu-wrap">
					<!-- logo -->
					<div class="site-logo">
						<a href="index.php">
							<img src="assets/img/logoEPP.png" alt="logoEsppapel">
						</a>
					</div>
					<!-- logo -->
					<?php 
						$menu = WizardPagina::mostrarMenuGral();
						
					?>
					<!-- menu start -->
					<nav class="main-menu">
						<ul>
							
							<?php 
							
								foreach ( $menu as $key => $value ) {
									
									
									echo '<li>';
									echo	'<a href="'. $value["ruta"] .'">' . $value["menu"] . '</a>';
											if ($value["esMenuPadre"] > 0) {
												
												$familia = WizardPagina::mostrarFamilias( $value["idMenu"] ); //enviando el id del menu
												$nosotros = WizardPagina::desplegarMisionYVision( $value["idMenu"] );	

												echo '<ul class="sub-menu">';
												foreach ($familia as $key => $valueFamilia) {
													echo '<li>
															<a href="'.  $valueFamilia["ruta"]  .'">'. $valueFamilia["familia"] . '</a>
														 </li>';
												}

												foreach ($nosotros as $n => $valueN) {
													echo '<li>
															<a href="'. $valueN["ruta"]  .'">'. $valueN["opcion"] . '</a>
														 </li>';
												}

												echo '</ul>';

												
											}
									echo '</li>';
									
								}
							?>
						
							 <li>
								<div class="header-icons">
									<!--<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
									<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>-->
								</div>
							</li> 
						</ul>
					</nav>
					<!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
					<div class="mobile-menu"></div>
					<!-- menu end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end header -->


