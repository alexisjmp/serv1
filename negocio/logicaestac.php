<?php

require_once('../clases/cls_detalle_venta.php');
require_once('../clases/cls_servicio.php');
require_once('../servicio/funciones_adicionales.php');

if($_POST['funcion']== 'ingresoestac')
   ingresoestac();

if($_POST['funcion']== 'salidaestac')
   salidaestac();

if($_POST['funcion']== 'cargagrilla')
   cargagrilla();

if($_POST['funcion']== 'editaestac')
   editaestac();

function editaestac(){
    $me = new cls_detalle_venta();
    $me->setid_dventa($_POST['id_dventa']);
    $me->setpatente($_POST['patente']);
    $me->settipo_servicio($_POST['servicio']);
    $me->settipo_catvehiculo($_POST['tipo']);
    
    $me->updateingreso();
    echo $me->getid_dventa();
}

function cargagrilla(){
    $me = new cls_detalle_venta();
    $me->msolistdetventa();
    echo $me->arrdventa;
}

function salidaestac(){
  $fecha_salida =   cambiaf_a_mysql($_POST['fecha']);
  $hora_salida = $_POST['hora'];
  $fecha_salida = date('y-m-d H:i:s', strtotime($fecha_salida." ".$hora_salida))  ;
   //$fecha_salida = date('y-m-d', strtotime($fecha_salida." ".$hora_salida))  ;
  
  $me = new cls_detalle_venta();
  $me->setid_dventa($_POST['id_dventa']);
  $me->msoobtenerregistroxid();
  $fecha_llegada = $me->gettime_llegada();
  $tipo_servicio = $me->gettipo_servicio();
  $tipo_catvehiculo = $me->gettipo_catvehiculo();
  
  //echo date('y-m-d H:i:s',(strtotime($fecha_salida) - strtotime($fecha_llegada)) );
  $fechai= date('y-m-d', strtotime($fecha_llegada) );
  $fechas= date('y-m-d', strtotime($fecha_salida) );
  
  $fecha1 = new DateTime($fecha_llegada);
    $fecha2 = new DateTime($fecha_salida);
    $resultado = $fecha1->diff($fecha2);
    //echo $resultado->format('%R%a');
    $hora_min = $resultado->format('%H')*60;
    $dia_min = $resultado->format('%d')*1440;
    $min =  $resultado->format('%i');
    $total_min = $hora_min + $dia_min + $min;
    
    $precio = calculo_total($tipo_catvehiculo,$tipo_servicio,$total_min);
    echo $precio;
    //echo $resultado->format('%a %d %y %H %i');
    
  //echo date('y-m-d', strtotime($fecha_salida)- strtotime($fecha_llegada) );
  //echo date_diff(date_create($fechas),date_create($fechai));
  //echo $fechai-$fechas;
  //echo date('y-m-d',(strtotime($fecha_salida) - strtotime($fecha_llegada)) );
    
}
function calculo_total($tipo_catvehiculo,$tipo_servicio,$total_min){
    $me= new cls_servicio();
    $me->settipo_vechiculo($tipo_catvehiculo);
    $me->msogetvalorservicioxvehiculo();
    $valor =0;
    if($tipo_servicio == 2){
        $valor = $me->getprecio() ;
        $valor = $valor * $total_min;
    }else if($tipo_servicio == 3){
        $valor = $me->getprecio_dia();
    }else if($tipo_servicio == 4){
        $valor = $me->getprecio_noche();
    }else if($tipo_servicio == 5){
        $valor = 0;
    }
   
    
    return $valor ;
}

function ingresoestac(){
  $fecha =   cambiaf_a_mysql($_POST['fecha']);
  $hora = $_POST['hora'];
  //date('d/m/y h:m:s', strtotime($me->arratencion[$i]['fecha_atencion']))  
    //$fecha = date('y-m-d H:i:s', strtotime("2018-02-13 17:33:22"))  ;
  $fecha = date('y-m-d H:i:s', strtotime($fecha." ".$hora))  ;
  $me = new cls_detalle_venta();
  $me->setpatente($_POST['patente']);
  $me->setid_venta(1); //por sesion
  $me->setcorrelativo_venta(1); // por calculo
  $me->settipo_servicio($_POST['servicio']);
  $me->settipo_catvehiculo($_POST['tipo']);
 // $me->setventa(1);
  $me->settime_llegada($fecha); // unir hora y fecha
  //$me->settime_salida(0);
  //$me->settime_registro(0);
  //$me->settime_cantidad(0);
  $me->setestado_detalle(1); // estado ingreso
  $me->setestado_pagado(1);// estado ingreso por caculo
  $me->setobservacion_detalle("");
  $me->setubic_tablero(0);//pendiente
  
  $me->insert();
  echo $me->getid_dventa();
  
    
}