<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        cls_usuario
* GENERATION DATE:  29.06.2018
* CLASS FILE:       /var/www/generator/generated_classes/class.cls_usuario.php
* FOR MYSQL TABLE:  usuario
* FOR MYSQL DB:     gservices
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.voegeli.li >> (download for free!)
* -------------------------------------------------------
*
*/

require_once("../conexion/Conexion.php");

// **********************
// CLASS DECLARATION
// **********************

class cls_usuario
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $rut_usuario;   // KEY ATTR. WITH AUTOINCREMENT

//var $rut_usuario;   // (normal Attribute)
var $dver_usuario;   // (normal Attribute)
var $nombre_usuario;   // (normal Attribute)
var $apelllido_usuario;   // (normal Attribute)
var $estado_usuario;   // (normal Attribute)
var $tipo_turno;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function cls_usuario()
{

$this->database = new MySQL();

}


// **********************
// GETTER METHODS
// **********************


function getrut_usuario()
{
return $this->rut_usuario;
}

function getdver_usuario()
{
return $this->dver_usuario;
}

function getnombre_usuario()
{
return $this->nombre_usuario;
}

function getapelllido_usuario()
{
return $this->apelllido_usuario;
}

function getestado_usuario()
{
return $this->estado_usuario;
}

function gettipo_turno()
{
return $this->tipo_turno;
}

// **********************
// SETTER METHODS
// **********************


function setrut_usuario($val)
{
$this->rut_usuario =  $val;
}

function setdver_usuario($val)
{
$this->dver_usuario =  $val;
}

function setnombre_usuario($val)
{
$this->nombre_usuario =  $val;
}

function setapelllido_usuario($val)
{
$this->apelllido_usuario =  $val;
}

function setestado_usuario($val)
{
$this->estado_usuario =  $val;
}

function settipo_turno($val)
{
$this->tipo_turno =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************
function msoobtusuarioxrut()
{
$rut_usario = $this->getrut_usuario();
$sql =  "SELECT * FROM usuario WHERE rut_usuario = '$rut_usario'";
$result =  $this->database->consulta($sql);

$row = $this->database->fetch_array($result);

$this->setnombre_usuario($row['nombre_usuario']);
$this->setapelllido_usuario($row['apellido_usuario']);
$this->settipo_turno($row['tipo_turno']);

}
function select($id)
{

$sql =  "SELECT * FROM usuario WHERE rut_usuario = $id;";
$result =  $this->database->consulta($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->rut_usuario = $row->rut_usuario;

$this->dver_usuario = $row->dver_usuario;

$this->nombre_usuario = $row->nombre_usuario;

$this->apelllido_usuario = $row->apelllido_usuario;

$this->estado_usuario = $row->estado_usuario;

$this->tipo_turno = $row->tipo_turno;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM usuario WHERE rut_usuario = $id;";
$result = $this->database->consulta($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->rut_usuario = ""; // clear key for autoincrement

$sql = "INSERT INTO usuario ( rut_usuario,dver_usuario,nombre_usuario,apelllido_usuario,estado_usuario,tipo_turno ) VALUES ( '$this->rut_usuario','$this->dver_usuario','$this->nombre_usuario','$this->apelllido_usuario','$this->estado_usuario','$this->tipo_turno' )";
$result = $this->database->consulta($sql);
$this->rut_usuario = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE usuario SET  rut_usuario = '$this->rut_usuario',dver_usuario = '$this->dver_usuario',nombre_usuario = '$this->nombre_usuario',apelllido_usuario = '$this->apelllido_usuario',estado_usuario = '$this->estado_usuario',tipo_turno = '$this->tipo_turno' WHERE rut_usuario = $id ";

$result = $this->database->consulta($sql);



}


}?>