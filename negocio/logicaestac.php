<?php

require_once('../clases/cls_detalle_venta.php');
require_once('../clases/cls_servicio.php');
require_once('../clases/cls_usuario.php');
require_once('../clases/cls_punto_venta.php');
require_once('../clases/cls_arqueo.php');
require_once('../servicio/funciones_adicionales.php');

if($_POST['funcion']== 'ingresoestac')
   ingresoestac();

if($_POST['funcion']== 'salidaestac')
   salidaestac();

if($_POST['funcion']== 'cargagrilla')
   cargagrilla();

if($_POST['funcion']== 'editaestac')
   editaestac();

if($_POST['funcion']== 'regpago')
   regpago();

if($_POST['funcion']== 'actestac')
   actestac();

if($_POST['funcion']== 'crearsesion')
   crearsesion();

if($_POST['funcion']== 'cerrarsesion')
   cerrarsesion();

if($_POST['funcion']== 'abrircaja')
   abrircaja();

if($_POST['funcion']== 'calculaventa')
   calculaventa();

if($_POST['funcion']== 'cierrecaja')
   cierrecaja();

if($_POST['funcion']== 'creaarqueo')
   creaarqueo();

if($_POST['funcion']== 'getarqueoxrut')
   getarqueoxrut();

if($_POST['funcion']== 'getarqueo')
   getarqueo();

if($_POST['funcion']== 'cierredia')
   cierredia();

function getusuario($rut){
     $me= new cls_usuario();
   $me->setrut_usuario($rut);
   $me->msoobtusuarioxrut();
   return $me->getnombre_usuario();
}
function getarqueoxrut($rut){
    $me = new cls_arqueo();
    $me->setusuario_arqueo($rut);
    $me->msogetarqueoxrut();
    return $me->getid_arqueo();
    //  $myArr[0] = array('estado' => $me->getestado_arqueo(), 'turno' => $me->getturno_arqueo() , 'usuario' => getusuario($me->getusuario_arqueo()) );
  
   // $myJSON = json_encode($myArr);
   // echo $myJSON;
    
    //crearsesionarqueo($me->getid_arqueo());
}
function getarqueoxrut2(){
    $me = new cls_arqueo();
    $me->setusuario_arqueo($rut);
    $me->msogetarqueoxrut();
   // return $me->getid_arqueo();
      $myArr[0] = array('estado' => $me->getestado_arqueo(), 'turno' => $me->getturno_arqueo() , 'usuario' => getusuario($me->getusuario_arqueo()) );
  
    $myJSON = json_encode($myArr);
    echo $myJSON;
    
   crearsesionarqueo($me->getid_arqueo());
}
//getarqueo();
function getarqueo(){
    
    
    
    if($_POST['id_arqueo']== ""){
        $fecha_venta= cambiaf_a_mysql($_POST['fecha']);
        //$fecha_venta = '2018-07-03';
        $id_venta = obtidcajaxfecha($fecha_venta);
        //echo $id_venta;
        if($id_venta == 0)
            $myArr[0] = array('estado' => '', 'turno' => '' , 'usuario' => '', 'estado_venta' => '2');
  
    $myJSON = json_encode($myArr);
    //echo "22";
    echo $myJSON;
    
    }else{
    $me = new cls_arqueo();
         
      $me->setid_arqueo($_POST['id_arqueo']);
   // $me->setid_arqueo(47);
    $me->msogetarqueoxid();
    $estado_venta = obtestadoventa($me->getid_venta());
    //echo $estado_venta;
    //echo $me->getid_venta();
      $myArr[0] = array('estado' => $me->getestado_arqueo(), 'turno' => $me->getturno_arqueo() , 'usuario' => getusuario($me->getusuario_arqueo()),
                        'estado_venta' => $estado_venta);
  
    $myJSON = json_encode($myArr);
    echo $myJSON;
    } 
}
//echo cambiaf_a_mysql('03/07/2018');
//creaarqueo();
function creaarqueo(){
    $fecha_venta= cambiaf_a_mysql($_POST['fecha']);
//    $fecha_venta = '2008-07-03';
    //echo obtidcajaxfecha($fecha_venta);
    $id_venta = obtidcajaxfecha($fecha_venta);
    //echo $id_venta;
    if($id_venta == 0){
       $myArr[0] = array('estado' => '0', 'turno' => $_POST['turno'] , 'usuario' => $_POST['rut_usuario'], 'id_arqueo' => '',
                         'estado_venta' => 2);
  
            $myJSON = json_encode($myArr);
         //   echo $myJSON;
    }else{
        
        if($id_venta == -1 )
            $id_venta =  crearpuntoventa($fecha_venta);
    
            $me= new cls_arqueo();
            $me->setid_venta($id_venta);
            $me->setturno_arqueo($_POST['turno']);
            $me->setusuario_arqueo($_POST['rut_usuario']);
   
            $me->setestado_arqueo(1);
    
            $me->insert();
            crearsesionarqueo($me->getid_arqueo());
            $myArr[0] = array('estado' => '1', 'turno' => $_POST['turno'] , 'usuario' => $_POST['rut_usuario'], 'id_arqueo' => $me->getid_arqueo());
  
            $myJSON = json_encode($myArr);
            echo $myJSON;
    }       
}

function crearpuntoventa($fecha_venta){
    // $fecha =   cambiaf_a_mysql($_POST['fecha']);
    $me= new cls_punto_venta();
    //$me->setrut_usuario($_POST['rut_usuario']);
    $me->setcaja_final(0);
    $me->setfecha_venta($fecha_venta);
    $me->setturno(0);//eleminar post
    $me->setestado_venta(1);
    $me->setventa_total(0);
    $me->setcaja_final(0);
    $me->setobservacion_venta("");
    //$me->settime_abrecaja($val);
    $me->setip_caja($_POST['ip_usuario']);
    $me->insert();
    
    return $me->getid_venta();
}



function abrircaja(){
    $fecha =   cambiaf_a_mysql($_POST['fecha']);
    $me= new cls_punto_venta();
    //$me->setrut_usuario($_POST['rut_usuario']);
    $me->setcaja_final(0);
    $me->setfecha_venta($fecha);
    $me->setturno(0);//eleminar post
    $me->setestado_venta(1);
    $me->setventa_total(0);
    $me->setcaja_final(0);
    $me->setobservacion_venta("");
    //$me->settime_abrecaja($val);
    $me->setip_caja($_POST['ip_usuario']);
    $me->insert();
    
    echo $fecha;
}

function cerrarsesion(){
 session_start();
unset($_SESSION["usuario"]);
unset($_SESSION["rut_usuario"]);
unset($_SESSION["id_arqueo"]);
 
  session_unset();session_destroy();
   $myArr[0] = array('rut' => '', 'nombre' => '', 'turno' => '', 'id_arqueo' => '');
  
    $myJSON = json_encode($myArr);
    echo $myJSON;
 
}

function crearsesionarqueo($id_arqueo){
   session_start(); 
  
   
   if(!isset($_SESSION["id_arqueo"])){
        $_SESSION["id_arqueo"] = $id_arqueo;
      //  $_SESSION["rut_usuario"] = $me->getrut_usuario();

    }else{
        $_SESSION["id_arqueo"] = $id_arqueo;
     //   $_SESSION["rut_usuario"] = $_SESSION["rut_usuario"];
    }
  //   $myArr[0] = array('rut' => $me->getrut_usuario(), 'nombre' => $me->getnombre_usuario(), 'turno' => $me->gettipo_turno());
  
//$myJSON = json_encode($myArr);
  //  echo $myJSON;
//echo $me->getnombre_usuario();
}


function crearsesion(){
   session_start(); 
   $me= new cls_usuario();
   $me->setrut_usuario($_POST['id_usuario']);
   $me->msoobtusuarioxrut();
   $id_arqueo=getarqueoxrut($_POST['id_usuario']);
   if(!isset($_SESSION["usuario"])){
        $_SESSION["usuario"] = $me->getnombre_usuario();
        $_SESSION["rut_usuario"] = $me->getrut_usuario();
        $_SESSION["id_arqueo"] = $id_arqueo;

    }else{
        $_SESSION["usuario"] = $_SESSION["usuario"];
        $_SESSION["rut_usuario"] = $_SESSION["rut_usuario"];
        $_SESSION["id_arqueo"] = $_SESSION["id_arqueo"];
    }
     $myArr[0] = array('rut' => $me->getrut_usuario(), 'nombre' => $me->getnombre_usuario(), 'turno' => $me->gettipo_turno(), 'id_arqueo' => $id_arqueo);
  
$myJSON = json_encode($myArr);
    echo $myJSON;
//echo $me->getnombre_usuario();
}

function actestac(){ //anular
    $me = new cls_detalle_venta();
    $me->setid_dventa($_POST['id_dventa']);
    $me->setestado_detalle(0);// 0 anula
    //$me->setestado_pagado(0);// 0 anula
    $me->setturno_venta($_POST['id_arqueo']);
    
    $me->updateestado();
    echo $me->getid_dventa();
}
function regpago(){
    $me = new cls_detalle_venta();
    $me->setid_dventa($_POST['id_dventa']);
    $me->setventa($_POST['paga']);
    $me->setestado_detalle(2);// 2 retirado
    $me->setestado_pagado(2);// 2 pagado 2 sin pagar
    $me->settime_cantidad($_POST['tiempo_cantidad']); //tiempo consumido segun el servicio min/dia
    $me->setturno_venta($_POST['id_arqueo']);
    
    
  $fecha_salida =   cambiaf_a_mysql($_POST['fecha_salida']);
   $hora_salida = $_POST['hora_salida'];
    $fecha_salida = date('y-m-d H:i:s', strtotime($fecha_salida." ".$hora_salida))  ;
    $me->settime_salida($fecha_salida);
    $me->updatepago();
    echo $me->getid_dventa();
    
}

function editaestac(){
    $me = new cls_detalle_venta();
    $me->setid_dventa($_POST['id_dventa']);
    $me->setpatente($_POST['patente']);
    $me->settipo_servicio($_POST['servicio']);
    $me->settipo_catvehiculo($_POST['tipo']);
    
    $me->updateingreso();
    echo $me->getid_dventa();
}
//cargagrilla();
function cargagrilla(){
    $me = new cls_detalle_venta();
    $me->msolistdetventa();
    //$me->arrdventa;
    $i=0;
    while($i< count($me->arrdventa)){
     $arreglo[$i] = array('id_dventa' => $me->arrdventa[$i]['id_dventa'],'patente' => $me->arrdventa[$i]['patente'],
    'correlativo_venta' => $me->arrdventa[$i]['correlativo_venta'],'tipo_servicio' => $me->arrdventa[$i]['tipo_servicio'],
    'tipo_catvehiculo' => $me->arrdventa[$i]['tipo_catvehiculo'],'venta' =>$me->arrdventa[$i]['venta'] ,
     'time_llegada' => date('H:i', strtotime($me->arrdventa[$i]['time_llegada']) ) ,'fecha_llegada' => date('d-m-y', strtotime($me->arrdventa[$i]['time_llegada']) ) ,
    'time_salida' => date('H:i', strtotime($me->arrdventa[$i]['time_salida']) ),'fecha_salida' => date('d-m-y', strtotime($me->arrdventa[$i]['time_salida']) ) ,
     'time_cantidad' => $me->arrdventa[$i]['time_cantidad'],'estado_pagado' => $me->arrdventa[$i]['estado_pagado'],
    'estado_detalle' => $me->arrdventa[$i]['estado_detalle'],'observacion_detalle' => $me->arrdventa[$i]['observacion_detalle'],
    'ubic_tablero' => $me->arrdventa[$i]['ubic_tablero'],'saldo_venta' => $me->arrdventa[$i]['saldo_venta'],'turno_venta' =>  $me->arrdventa[$i]['turno_venta'],
    'desc_venta' => $me->arrdventa[$i]['desc_venta']);
     $i++;
    }
    //print_r($me->arrdventa);
    $myJSON = json_encode($arreglo);
    //$myArr[0] = array('id_dventa' => '1');
    //$myJSON = json_encode($myArr);    
    echo $myJSON;
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
    //echo $precio;
    
    $myArr[0] = array('id_dventa' => $_POST['id_dventa'],'precio' => $precio, 'tiempo' => $total_min , 'dias' => $resultado->format('%d'), 'descuento' => '');
  
    $myJSON = json_encode($myArr);
    echo $myJSON;
  
    
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
 // $me->setid_venta(obtidcaja()); //por sesion
  $me->setid_arqueo($_POST['id_arqueo']);
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
//calculaventa();
function calculaventa(){
    $me = new cls_detalle_venta();
    //$me->setid_venta(obtidcaja()); //por sesion
    $me->setid_arqueo($_POST['id_arqueo']);
    //$me->setid_arqueo(51);
    $me->msoobtsumaventaxid();
    echo $me->gettotal_venta();
    //echo "1";
}

function cierredia(){
   
    $me= new cls_punto_venta();
    
    if($_POST['id_arqueo'] == '')
      $id_venta=   obtidcaja();
    else
        $id_venta = obtidcajaxarqueo($_POST['id_arqueo']);
   
    $me->setid_venta($id_venta);
    $me->setestado_venta($_POST['estado']);
  
    $me->updatecierre();
    //return $me->getid_venta();
    
    //echo $fecha;
}
function cierrecaja(){
    $me= new cls_arqueo();
    $me->setestado_arqueo(2);//cierre arqueo x turno
    $me->setid_arqueo($_POST['id_arqueo']);
    $me->updateestado();
    crearsesionarqueo("");
    echo "";
}


function obtidcajaxfecha($fecha_venta){
   
    $me= new cls_punto_venta();
    $me->setfecha_venta($fecha_venta);
    $me->msoobpuntoventaxestadoyfecha();
    if($me->getestado_venta() == 1)
        return $me->getid_venta();
    else if($me->getestado_venta() == 2)
        return 0;
    else if($me->getestado_venta() == '')
        return -1;
    
    //echo $fecha;
}
function obtestadoventa($id_venta){
   
    $me= new cls_punto_venta();
    $me->setid_venta($id_venta);
    $me->msoobpuntoventaxid();
    return $me->getestado_venta();
    
    //echo $fecha;
}
function obtidcaja(){
   
    $me= new cls_punto_venta();
    $me->msoobpuntoventaxestado();
    return $me->getid_venta();
    
    //echo $fecha;
}
function obtidcajaxarqueo($id_arqueo){
   
    $me= new cls_arqueo();
    $me->setid_arqueo($id_arqueo);
    $me->msogetarqueoxid();
    return $me->getid_venta();
    
 //   echo $me->getid_venta();
}
//obtidcajaxarqueo($id_arqueo);