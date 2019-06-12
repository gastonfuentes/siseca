<?php 

@session_start();
error_reporting(E_ALL ^ E_NOTICE);
//llamamos a los sig archivos
require '../clases/conexionCapit.php';

require '../clases/dbacciones.php';

//recibimos mediante post la variable fecha y le borramos los guiones para ser mandada a la funcion correspondiente 
$fecha = $_POST['fecha'];
$strfecha = str_replace("-","",$fecha);
//echo $strfecha;

//instanciamos un objeto de la clase Dbacciones
$objAccion = new Dbacciones();
//llamamos al metodo verempleado y lo guardamos en una variable
$resul = $objAccion->ConsultaVencTitulo($strfecha);

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
				<a href="../index.php" class="mx-auto h-100"><img src="../img/logo_muni.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(../../imagenes/bgbienvenido.jpg); background-size: cover;">

				<h3 class="text-white text-center mt-5 mb-4">USUARIO: <?php echo $_SESSION['nombre'] ?></h3>
				<div class="col-10 col-md-6 mx-auto pb-3">
					<h3 class="text-white text-center">VENC. CONSTANCIA DE TITULOS</h3>
				</div>


				<table class="display table table-light table-bordered table-striped col-12 col-xl-10 mx-auto" id="example" style="width:100%">
					<thead class="thead-light">
						<tr>
							<th>APELLIDO</th>
							<th>NOMBRE</th>
							<th class="d-none d-md-table-cell">DNI</th>
							<th class="d-none d-md-table-cell">LEGAJO</th>
							<th class="d-none d-md-table-cell">FECHA_VENC</th>								
						</tr>
					</thead>
					<tbody>
						<?php foreach ($resul as $datos): ?>
						<tr>
							<td><?php echo $datos['apellido']; ?></td>
							<td><?php echo $datos['nombre']; ?></td>
							<td class="d-none d-md-table-cell"><?php echo $datos['nro_documento']; ?></td>
							<td class="d-none d-md-table-cell"><?php echo $datos['NUMERO_LEGAJO']; ?></td>
							<td class="d-none d-md-table-cell"><?php echo $datos['fecha_hasta']; ?></td>	
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
							
				<!-- BOTON PARA CERRAR SESION -->
				<form action="consultaSalario.php" method="post" class="col-12 text-center mt-5 mb-5">
					<button class="d-flex justify-content-center align-items-center btn btn-light mx-auto">
						<i class="iconopeque fas fa-sign-out-alt"></i><small>CONSULTAR OTRA FECHA</small>
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