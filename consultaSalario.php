<?php 

@session_start();
//llamamos al archivo para generar la conexion a la base de datos
include_once 'clases/conexionCapit.php';

//linea para evitar los mensaje de NOTICE Error
error_reporting(E_ALL ^ E_NOTICE);

$hoy = getdate();
//print_r($hoy);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>MiRecibo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script defer src="js/all.js"></script> 
	<style>  
		.icono{
			color: #58595D;
			font-size: 2rem;
			margin-right: 1rem;   
		}
		.iconopeque{
			color: #58595D;
			font-size: 1rem;
			margin-right: 0.5rem;
			
		}
	</style>
</head>
<body>


	<div class="container-fluid" style="background-color: #8d377f;">

		<div class="row bg-white p-3" style="height: 100px;">
			
				<a href="index.php" class="mx-auto h-100"><img src="img/logo_muni.png" class="img-fluid h-100" ></a>	
							
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(imagenes/bghome.jpg); background-size: cover;">
				<h3 class="text-white text-center mt-2 mb-2">Usuario: <?php print_r($_SESSION['nombre']) ?></h3>
				<h2 class="text-white text-center mt-5 mb-4">SECCION SALARIO</h2>				

				<!-- FORMULARIO DE LOGUEO QUE SE DIRIGE AL ARCHIVO ... -->
				<form class="col-10 mx-auto text-center needs-validation" action="salario/venctitulo.php" method="post" >
					<div class="row align-items-center border border-white p-1">							
						<div class="form-group col-lg-2 col-md-12">
							<h4 class="text-white mb-0">BAJAS DE TITULOS</h4>
						</div>	
						<div class="form-group col-lg-8 col-md-12">
							<label class="col-12 text-left text-white">Ingrese fecha que desea consultar vencimiento de titulo</label>									
							<input class="form-control" type="date" value="" id="example-date-input" name="fecha">	
						</div>	
						<div class="col">
							<button type="submit" class="btn btn-light"><small>CONSULTAR</small></button>
						</div>
					</div>
				</form>
				<form class="col-10 mt-2 mx-auto text-center needs-validation" action="salario/venctitulo.php" method="post" >
					<div class="row align-items-center border border-white p-1">							
						<div class="form-group col-lg-2 col-md-12">
							<h4 class="text-white mb-0">BAJAS DE PRENATAL</h4>
						</div>	
						<div class="form-group col-lg-8 col-md-12">
							<label class="col-12 text-left text-white">Ingrese fecha que desea consultar vencimiento de pre natal</label>									
							<input class="form-control" type="date" value="" id="example-date-input" name="fecha">	
						</div>	
						<div class="col">
							<button type="submit" class="btn btn-light"><small>CONSULTAR</small></button>		
						</div>


					</div>
				</form>

				<!-- CUADRO DE ALERTA - MENSAJE -->
				<?php 

				if ($_GET["error"]) {	 

				?>
				<div class="alert alert-danger col-12 col-md-8 mx-auto">
										
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span>&times;</span></button>
						<strong>Error!</strong> Verifique su <strong>Dni</strong> o <strong>Contraseña</strong> ingresada. Deben ser los mismos que ha generado en el sitio web www.municipiolarioja.gob.ar. Si no los recuerda, concurra nuevamente al sitio web indicado y solicite una nueva clave.
										
				</div>

				<?php } ?>
				

			</div>	

		<!-- FOOTER -->	
		<footer class="row bg-white text-center p-4">
			<h4 class="mx-auto col-12 mb-3">CONTACTO</h4>
			<div class="d-flex justify-content-center align-items-center col-12 mx-auto">
				<i class="iconopeque fas fa-phone"></i><small> 380-4587795 // 380-4742444</small>
			</div>
			<div class="d-flex justify-content-center align-items-center col-12 mx-auto mt-2">
				<i class="iconopeque fas fa-envelope"></i><small> mirecibo@municipiolr.com</small>
			</div>
		</footer>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

