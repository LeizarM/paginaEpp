<div class="product-section mt-150 mb-150">
    
    
    <?php
    $contenido = WizardPagina::mostrarContenido();

    //var_dump($contenido);
    foreach ($contenido as $key => $valueContenido) {


        if ( $valueContenido["orden"] == 3 ) { // seccion about
           
            echo $valueContenido["contenido"];

        }
		
		

		if ( $valueContenido["orden"] == 4 ) { // seccion proveedores
        
            echo $valueContenido["titulo"];
            echo $valueContenido["contenido"];

        }

    }
    
    ?>



</div>