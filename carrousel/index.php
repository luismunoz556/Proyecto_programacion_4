<?php 
	require('conexion/conexion.php');
	
	$producto = "SELECT * FROM productos ORDER BY id DESC";
		
	$productos=$mysqli->query($producto);

	function recortar_texto($texto, $limite=100){  
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }  
    return $resultado;
	}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Productos</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/style.css" media="screen">
<link rel="stylesheet" href="css/grid.css" media="screen">
<link rel="stylesheet" href="font/fonts.css" media="screen">
<!-- Owl Carousel Assets -->
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">
<script src="js/jquery-1.7.1.min.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
</head>

<body>
<div class="slider">
    <div class="productos">
        <div class="container">
            <div class="grid_12">
            <div>
            <h1><php echo $not['nombre'] ?></h1>
            <h1><strong>productos</strong></h1>
            </div>
            </div>
            <div class="grid_12">
                <div id="owl-demo" class="owl-carousel">
                <?php
                while ($not=$productos->fetch_assoc()) {  $cadena= $not['contenido']; $titulo= $not['nombre'];?>
                
                    <div class="item">
                        <div class="img_productos" style="background-image:url(images/productos/<?php echo $not['imagen'];?>);">
                        </div>
                        <div class="text_productos">
                        	<!-- Secciones de Carousel !-->
                            <div class="span"><?php echo $not['fecha'];?></div>
                            <h3><?php echo recortar_texto($titulo, 54);?></h3>
                            <p><?php echo recortar_texto($cadena, 150);?></p>
                            <a  class="fancybox" href="#inline<?php echo $not['id'];?>" >Ver más >></a>
                            <!-- LigthBox De productos !-->
                            <div id="inline<?php echo $not['id'];?>" style="width:500px;display: none;">
                            <h3 style="margin-bottom:2px;"><?php echo $not['nombre'];?></h3>
                            <div class="span"><?php echo $not['fecha'];?></div><br>
                            <img src="images/productos/<?php echo $not['imagen'];?>" style="width:100%; margin-bottom:10px;">
                            <?php echo $not['contenido'];?>         
                        </div>			
                    </div>  
                    </div>
                <?php } ?>
                
                </div>
            </div>
        
        <script src="js/owl.carousel.js"></script>
        <!-- Control de Responsive Design !-->
        <script>
        $(document).ready(function() {
        $("#owl-demo").owlCarousel({
        autoPlay: 7000,
        items : 2,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,1],
        itemsTablet: [768,1],
        itemsTabletSmall: [568,1],
        itemsMobile: [0,1], 
        });
        });
        </script>
        
        </div>

</body>
</html>