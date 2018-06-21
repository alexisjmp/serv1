<?php

class MySQL
{
	private $conexion;
	
	public function MySQL(){
	  if(!isset($this->conexion)){
	//    $this->conexion = (mysql_connect('hoysalud.cl','hoysalud_us','@root123')) or die(mysql_error());
	//	mysql_select_db('hoysalud_bd', $this->conexion) or die(mysql_error());
            $this->conexion = (mysql_connect('localhost','root','root123')) or die(mysql_error());
		mysql_select_db('gservices', $this->conexion) or die(mysql_error());      
		mysql_query ("SET NAMES 'utf8'");
	  }
	}
	
	public function consulta($consulta){
		$resultado = mysql_query($consulta, $this->conexion);
		if(!$resultado){
		  echo 'Error en la Base de datos: '. mysql_error();
		  exit;
		}		
		return $resultado;
	}
	
	public function fetch_array($consulta){
		return mysql_fetch_array($consulta);
	}
	
	public function num_rows($consulta){
		return mysql_num_rows($consulta);
	}
	
	public function cerrar(){
		mysql_close();
	}
	
}

?>
