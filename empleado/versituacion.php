<?php 

@session_start();
error_reporting(E_ALL ^ E_NOTICE);
//llamamos a los sig archivos
require '../clases/conexion.php';

require '../clases/usuarios.php';

require '../clases/dbacciones.php';

require '../clases/sesiones.php';

//print_r( $_SESSION );  
$dni = $_POST['dni'];
//echo $dni;

//instanciamos un objeto de la clase Dbacciones
$objAccion = new Dbacciones();
//llamamos al metodo verempleado y lo guardamos en una variable
$resul = $objAccion->VerSituacion($dni);
$emb = $objAccion->VerEmbargo($dni);

//echo "<pre>";
//var_dump($resul);
//var_dump($emb);
//die();

?> 


<!DOCTYPE html>
<html>
<head>
	<title>MiRecibo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script defer src="../../js/all.js"></script> 
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
				<a href="../../index.php" class="mx-auto h-100"><img src="../img/logo_muni.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(../../imagenes/bgbienvenido.jpg); background-size: cover;">

				<h3 class="text-white text-center mt-5 mb-4">USUARIO: <?php echo $_SESSION['nombre'] ?></h3>
				<div class="col-10 col-md-6 mx-auto pb-3">
					<p class="text-white text-center">CERTIFICADO DE TRABAJO</p>
				</div>

				<div class="bg-white p-2">
					<p class="text-left">Apellido y Nombre: <?php echo $resul[0]['nomb'] ?></p>
					<p class="text-left">DNI: <?php echo $resul[0]['docu'] ?></p>
					<p class="text-left">Cargo que desempeña: <?php echo $resul[0]['cat'] ." ". $resul[0]['cargo']?></p>
					<p class="text-left">Fecha de Ingreso: <?php echo $resul[0]['fecha_ingreso'] ?></p>
					<p class="text-left">Antiguedad: <?php echo $resul[0]['anti'] ?></p>
					<p class="text-left">Reparticion: <?php echo $resul[0]['reparticion'] ?></p>
					<p class="text-left">Sueldo Mensual Bruto: $<?php echo $resul[0]['brut'] ?></p>
					<p class="text-left">Personal Planta: <?php echo $resul[0]['planta'] ?></p>
					<?php if ($emb) { ?>
					<p class="text-left">Posee Embargo: SI</p>					
					<?php } else { ?>
					<p class="text-left">Posee Embargo: NO</p>					
					<?php } ?>
				</div>	


				<form action="../pdf/pdf_blanco.php" method="post">
					<input type="submit" name="pdf" value="generapdf">
				</form>






				
				<!-- BOTON PARA CERRAR SESION -->
				<form action="../consulta.php" method="post" class="col-12 text-center mt-5 mb-5">
					<button class="d-flex justify-content-center align-items-center btn btn-light mx-auto">
						<i class="iconopeque fas fa-sign-out-alt"></i><small>CONSULTAR OTRO AGENTE</small>
					</button>
				</form>


			</div>	

		
		
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

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>