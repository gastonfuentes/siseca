<?php 

class Conectar extends PDO
{
	
	public function __construct()
	{
		try {
		parent::__construct('sqlsrv:Server=servidoradelia.net;Database=rrhh_recibos','sa','local2006');
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "conexion correcta";
		} catch (Exception $e) {
		echo $e;
		die("error al conectar a la base de datos");
		}
	}
}


 ?>