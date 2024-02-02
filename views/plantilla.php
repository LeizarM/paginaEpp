<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Esppapel S.R.L. | Papel Bolivia">
    <meta name="keywords" content="Esppapel S.R.L., unica, creativa, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esppapel S.R.L.</title>

    <?php

    echo '<link rel="icon" href="#">';

    //Mantener la ruta fija del proyecto
    $url = Ruta::obtenerRuta();


    ?>
    <!-- SHEET STYLES -->
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $url; ?>assets/img/iconoEPP.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/main.css?v=<?php echo time(); ?>">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/responsive.css">
    <!-- sweetalter -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/sweetalert.css">
    <!-- cut calc -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/calc/style.css?v=<?php echo time(); ?>">



</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <?php
    //================= HEADER ======================

    include "modules/bar_menu.php";

    $rutas           = array();
    $index           = null;
    $ruta            = null;
    $articulosUrl    = null;
    $cart            = null;
    $accountBalance  = null;
    $order           = null;


    if (isset($_GET["ruta"])) {

        $rutas = explode("/", $_GET["ruta"]);
        $valor = $rutas[0];



        //para la calculadora de corte
        if ($rutas[0] == "ccorte") {
            $ruta = "cut_calc";
        }

        //para mostrar los contactos y lugares
        if ($rutas[0] == "contacto") {
            $ruta = "contact";
        }

        //para mostrar la mision y vision
        if ($rutas[0] == "visionymision") {
            $ruta = "mision_vision";
        }


        //para mostrar la mision y vision
        if ($rutas[0] == "qr") {
            $ruta = "qr";
        }


        // url valida para familias
		$rutaFamilia = WizardPagina::verificarRutaFamilia($valor);
		if ($rutaFamilia != null) {
		    	if ($rutas[0] == $rutaFamilia["ruta"]) {

			    $articulosUrl = $rutas[0];
		    }
		}

        if ($articulosUrl != null) {
			/*$articulo = new WizardPagina();
			$articulo->cargarArticulos( 1,4, ); */
			include "modules/articule.php";
		} elseif ($ruta != null) {
			include "modules/" . $ruta . ".php";
		} elseif ($index != null) {
			echo '<script>
		  		 		window.location.assign("' . $index . '")   
				 </script>';
		} else {
			include "modules/error404.php";
		}
    } else {

        //============= SLIDE ===========================
        include "modules/slide.php";

        // ============= CATALOGO =======================
        include "modules/catalog.php";

        // ============= CONTENT =======================

        include "modules/content.php";

        // ============ FOOTER =========================

        include "modules/footer.php";
    }

    // =========== COPYRIGHT =======================

    include "modules/copyright.php";


    ?>


    <!-- jquery -->
    <script src="<?php echo $url; ?>assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo $url; ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="<?php echo $url; ?>assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="<?php echo $url; ?>assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="<?php echo $url; ?>assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="<?php echo $url; ?>assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="<?php echo $url; ?>assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="<?php echo $url; ?>assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="<?php echo $url; ?>assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="<?php echo $url; ?>assets/js/main.js"></script>
    <!-- calc js -->
    <script src="<?php echo $url; ?>assets/js/calc/logica.js"></script>
    <!-- notificaciones -->
    <script src="<?php echo $url; ?>assets/js/sweetalert.min.js"></script>
    <!-- Articule JS -->
    <script src="<?php echo $url; ?>assets/js/articule.js"></script>

</body>

</html>