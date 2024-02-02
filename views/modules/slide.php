<!-- home page slider -->
<div class="homepage-slider">


    <?php

    $slide = WizardPagina::mostrarSlide(); //obtener la informacion del slide

    foreach ($slide as $key => $valueSlide) {


        echo '<div class="single-homepage-slider ' .  $valueSlide["imgFondo"] . '">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <p class="subtitle">' . $valueSlide["titulo2"] . '</p>
                                    <h1>' . $valueSlide["titulo1"] . '</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }

    ?>

</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Distribuición sin Costo</h3>
                        <p>Prioridad a compras grandes</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>Atención Al Cliente</h3>
                        <p>Atención Personalizada</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Disponibilidad</h3>
                        <p>Disponible a Nivel Nacional</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end features list section -->