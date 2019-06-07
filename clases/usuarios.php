<?php 

class Usuarios{

	public $objConec;
	public $objDba;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	public $tipo_usuario;
	
	public function __construct(){   

		$this->objConec = new Conectar();
		$this->objSe = new Sesion();
		
	}

	public function loguearse(){
		$preparamos = $this->objConec->prepare('SELECT * FROM usuarios_capit_certificado WHERE usuario = :usuario and pass = :pass');

		//reemplazamos los parametros
		$preparamos->bindParam(':usuario', $_POST["usuario"]);
		$preparamos->bindParam(':pass', $_POST["pass"]);

		//ejecutamos la sentencia query
		$preparamos->execute();

		//traemos el resultado
		$resultado = $preparamos->fetchAll();

		//preguntamos si la variable resultado encontro algo. si es asi verificamos que tipo de usuario es y lo redireccionamos de acuerdo a su valor. si resultado no trae ningun valor es que los datos estan incorrectos o el usuario no existe por lo tanto devolvemos un error.
		
		if ($resultado) {
						
			$tipo_usuario = $resultado[0]["tipo"];

			switch ($tipo_usuario) {
				case 'salario':
					$this->objSe->ini_sesion();
					$this->objSe->set_sesion('nombre',$resultado[0]["usuario"]);
					//$this->objSe->set_sesion('apell',$resultado[0]["apellido"]);
					//$this->objSe->set_sesion('docu',$resultado[0]["documento"]);					
					header('location: consultaSalario.php');
					break;
				
				case 'liqui':
					$this->objSe->ini_sesion();
					$this->objSe->set_sesion('nombre',$resultado[0]["usuario"]);
					//$this->objSe->set_sesion('apell',$resultado[0]["apellido"]);
					//$this->objSe->set_sesion('docu',$resultado[0]["documento"]);
					//header('location: veremp.php');
					header('location: consultaLiquidacion.php');
					break;
			}

		}else{
			header('location: index.php?error=1');
		}

	}

}


?>