<?php  	


class Dbacciones 
{
	public $ObjConec;
	public $idcodi;
	public $nombre;
	public $tipo;
	public $desc;

	
	public function __construct()
	{
		$this->ObjConec = new Conectar();
	}

	public function Insertar(){
		try {

			$preparamos = $this->ObjConec->prepare('INSERT INTO codigos VALUES (:idcodi, :nombre, :tipo, :des)');

			$this->idcodi = $_POST["codi"];
			$this->nombre = $_POST["nomb"];
			$this->tipo = $_POST["tipo"];
			$this->desc = $_POST["desc"];
		
		

			//reemplazamos los parametros
			$preparamos->bindParam(':idcodi', $this->idcodi);
			$preparamos->bindParam(':nombre', $this->nombre);
			$preparamos->bindParam(':tipo', $this->tipo);
			$preparamos->bindParam(':des', $this->desc);

			$preparamos->execute();

			header('location: ../usuario/admin/admin.php?ok=1');
			
		} catch (Exception $e) {
			header('location: ../usuario/admin/agrega.php?error=1');
		}


		

	}

	public function VerSituacion($docum){

			@session_start();

		try {
			//preparamos la sentencia sql
			//$preparamos = $this->ObjConec->prepare('SELECT * FROM interfaz_cert WHERE docu=:docu');
			$preparamos = $this->ObjConec->prepare('exec sp_reporte_cert :docu');
			//guardamos la variable de sesion[docu] en una variable
			//$docu = $_SESSION['docu'];
			$docu = $docum;
			//reemplazamos los parametros
			$preparamos->bindParam(':docu', $docu);
			//ejecutamos la sentencia
			$preparamos->execute();
			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();
			//devolvemos el resultado
			return $resultado;

						
		} catch (Exception $e) {
			header('location: ../index.php?$e');
		}
	}

	public function ConsultaVencTitulo($fecha){

		try {
			//preparamos la sentencia sql
			$preparamos = $this->ObjConec->prepare("exec sp_reporte_venctitulo :fechavenc");
		
			$fechavenc = $fecha;
			//reemplazamos los parametros
			$preparamos->bindParam(':fechavenc', $fechavenc);
			//ejecutamos la sentencia
			$preparamos->execute();
			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();
			//devolvemos el resultado
			return $resultado;

			
		} catch (Exception $e) {
			//header('location: usuario/admin/agrega.php?error=1');
		}
	}

	public function VerEmbargo($dni){

			@session_start();

		try {
			//preparamos la sentencia sql
			//$preparamos = $this->ObjConec->prepare('SELECT * FROM interfaz_cert WHERE docu=:docu');
			$preparamos = $this->ObjConec->prepare('SELECT impo FROM desglose_cert WHERE docu=:docu AND codi=226');
			//guardamos la variable de sesion[docu] en una variable
			//$docu = $_SESSION['docu'];
			$docu = $dni;
			//reemplazamos los parametros
			$preparamos->bindParam(':docu', $docu);
			//ejecutamos la sentencia
			$preparamos->execute();
			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();
			//devolvemos el resultado
			return $resultado;

						
		} catch (Exception $e) {
			header('location: ../index.php?$e');
		}
	
	}

	public function Leerdesc($cod_rec){

			@session_start();

		try {
			//preparamos la sentencia sql
			$preparamos = $this->ObjConec->prepare("SELECT desc_codigo FROM codigos WHERE cod=:cod_rec");
		
			//reemplazamos los parametros
			$preparamos->bindParam(':cod_rec', $cod_rec);
		
			//ejecutamos la sentencia
			$preparamos->execute();

			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();

			//devolvemos el resultado
			return $resultado;

			
		} catch (Exception $e) {
			//header('location: usuario/admin/agrega.php?error=1');
		}
	}

	public function Vercodigos(){

		try {
			//preparamos la sentencia sql
			$preparamos = $this->ObjConec->prepare("SELECT * FROM codigos");
					
			//ejecutamos la sentencia
			$preparamos->execute();

			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();

			//devolvemos el resultado
			return $resultado;
			
		} catch (Exception $e) {
			//header('location: usuario/admin/agrega.php?error=1');
		}
	}

	public function Vercodigoparticular($codigo){

		try {
			//preparamos la sentencia sql
			$preparamos = $this->ObjConec->prepare(" SELECT * FROM codigos WHERE cod=:idcod ");
		
			//reemplazamos los parametros
			$preparamos->bindParam(':idcod', $codigo);
		
			//ejecutamos la sentencia
			$preparamos->execute();

			//guardamos el resultado en una variable
			$resultado = $preparamos->fetchall();

			//devolvemos el resultado
			return $resultado;

			
		} catch (Exception $e) {
			//header('location: usuario/admin/agrega.php?error=1');
		}
	}

	


}

 ?>
