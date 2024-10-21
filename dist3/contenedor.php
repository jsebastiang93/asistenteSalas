<!DOCTYPE html>
<html lang="es">
	<!--begin::Head-->
	<head>
		<?php
		session_start();
		if ( !isset($_SESSION["id_usuario"]) || $_SESSION["id_usuario"]=="")
		{
			session_destroy();
			?>
			<script>
				alert("La sesión a caducado, por favor ingresar nuevamente");
				setTimeout (location.href=" ", 2000);
			</script>
			<a href=" " > << INGRESAR NUEVAMENTE >> </a>
			<?php
			exit();
		}
		include "head.php";

		include "seguridad/conexion.php";

		include "src/functions/main.php";

		include "src/functions/email.php";

		$dbm = conectar_mysql();

		$url_id = variable_exterior("url_id");

		include "float.php";

		?>
		<style type="text/css">
			.cmn-divfloat {
			    position: fixed !important;
			    bottom: 250px;
			    right: 0px;
			}
			.cmn-btncircle {
			    width: 40px !important;
			    height: 40px !important;
			    padding: 0px 0px;
			    border-radius: 45px;
			    font-size: 18px;
			    text-align: center;
			}

		
		</style>
		<link href="src/plugins/intro.js-master/introjs.css" rel="stylesheet">
		<script type="text/javascript">
			function startTour() {
				var tour = introJs()
				tour.setOption('tooltipPosition', 'auto');
				tour.setOption('positionPrecedence', ['left', 'right', 'top', 'bottom']);
				tour.setOptions({
					nextLabel: 'Siguiente',
					prevLabel: 'Atras',
					skipLabel: 'Cerrar',
					doneLabel: 'Ok'
				});
				tour.start();
			}

			(function() {
			    //a partir de que punto del scroll vertical de la ventana mostrará el botón
			    const ishow = 0
			    const $divtop = document.getElementById("div-totop")
			    window.addEventListener("scroll", function() {
			        if(document.documentElement.scrollTop > ishow){
			            $divtop.style.display = "inherit"
			        }
			        else {
			            $divtop.style.display = "none"
			        }
			    })
			})()
		</script>
		<script type="text/javascript" src="../../dist/src/plugins/intro.js-master/intro.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			
			<?php
			if($_SESSION["ayuda"] == 0)
			{
				?>startTour();<?php
				$_SESSION["ayuda"] = 1;
			}
			?>

			for (let step = 0; step < 100; step++)
			{
					temp = step * 1000;
					temp2 = (step + 2) * 1000;
					setTimeout(function() {
			        $(".div-totop").fadeOut(1000);
			    },temp);

			    setTimeout(function() {
			        $(".div-totop").fadeIn(1000);
			    },temp2);
			}


		});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {    
		    $('.button').on('click', function(){
		        //Añadimos la imagen de carga en el contenedor
		        $('#kt_body').html('<div class="loading"><img src="images/loader.gif"/><br/>Un momento, por favor...</div>');

		        $.ajax({
		        	data: {url_id: '<?php echo $url_id ?>'},
		            type: "POST",
		            url: "contenedor_ajax.php?url_id=inicio",
		            success: function(data) {
		                //Cargamos finalmente el contenido deseado
		                $('#kt_body').fadeIn(1000).html(data);
		            }
		        });
		        return false;
		    });              
		});    
		</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<?php //include "contenedor_ajax.php"; ?>
		<div class="row">
	        <div class="col-lg-12 text-center">
	            <a href="#" class="btn btn-secondary button">
	                <i class="fa fa-eye"></i> Ver efecto
	            </a>
	        </div>
	    </div>
	</body>
	<!--end::Body-->
</html>
