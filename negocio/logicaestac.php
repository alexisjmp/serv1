<?php

require_once('../clases/cls_detalle_venta.php');

//if($_POST['funcion']== 'ingresoestac')
   miiInsertaestac();

function miiInsertaestac(){
  $me = new cls_detalle_venta();
  $me->setpatente('k');
  $me->setid_venta(1);
  //$me->setcorrelativo_venta(1);
  //$me->settipo_servicio(1);
  //$me->settipo_catvehiculo(1);
 // $me->setventa(1);
  //$me->settime_llegada($val);
  //$me->settime_salida(0);
  //$me->settime_registro(0);
 // $me->settime_cantidad(0);
  //$me->setestado_detalle(1);
  //$me->setestado_pagado(1);
 // $me->setobservacion_detalle("");
 // $me->setubic_tablero(1);
  
  $me->insert();
  
    
}