<?php

class Database{
	
	private $conexion;
	private $host="localhost";
	private $usuario="root";
	private $pass="";
	private $nombre="prueba";
	private $matriz;
	private $nomColumnas;
	
	function __construct(){
		$this->connect_db();
	}
	
	//Conexion a la base de datos
	public function connect_db(){
		$this->con = mysqli_connect($this->host, $this->usuario, $this->pass, $this->nombre);
		if(mysqli_connect_error()){
			die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
		}
	}
	
	//cierra la conexion establecida en la variable conexion
	function CerrarConexion(){
		mysqli_close($this->conexion);
	}
	
	//Ejecucion consulta
	public function consultar(){
		$sql = "SELECT e.id, e.lastname, l.description FROM APPX_employee e
				INNER JOIN APPX_department d ON e.department_id = d.id
				INNER JOIN APPX_educationlevel l ON e.educationlevel_id = l.id
				GROUP BY e.department_id HAVING SUM(e.salary) > 300000
				ORDER BY e.lastname;";
		$resp = mysqli_query($this->con, $sql);
		return $resp;
	}
}
?>