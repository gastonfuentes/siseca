<!DOCTYPE html>
<html>
<head>
	<title>SISTEMA DE CONSULTAS SERVICIOS CIVILES DE CARRERA</title>
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

		<div class="row bg-white p-3" style="height: 150px;">	
				<a href="index.php" class="mx-auto h-100"><img src="img/logo_muni.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(imagenes/bghome.jpg); background-size: cover;">

				<h1 class="text-white text-center mt-2 mb-4">BIENVENIDO AL SISTEMA DE CONSULTAS SECICA</h1>	<h4 class="text-white text-center mt-5 mb-4">INGRESE A SU AREA CORRESPONDIENTE</h4>

				<form class="col-10 mx-auto text-center" action="sesionArea.php" method="get">
					<a href="seccionCiviles.php" class="btn-block btn-lg btn-warning" role="button" aria-pressed="true">CIVILES DE CARRERA</a>	
					<a href="seccionSalario.php" class="btn-block btn-lg btn-warning" role="button" aria-pressed="true">SALARIO</a>
					<a href="seccionLiquidacion.php" class="btn-block btn-lg btn-warning" role="button" aria-pressed="true">LIQUIDACION</a>					
				</form>				

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
