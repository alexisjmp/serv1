<?php
//require_once '../funciones/listservicios_1.php';
session_start();


print_r($_SESSION);

//$_SESSION["usuario"] = '';
require_once('../servicio/funciones_adicionales.php');
//// Start the session
//
date_default_timezone_set('America/Santiago');
$fecha = date('d/m/Y');
//if (!isset($_SESSION["usuario"])) {
   $_SESSION["usuario"] = $_SESSION["usuario"];
   $_SESSION["rut_usuario"] = $_SESSION["rut_usuario"];
   $_SESSION["id_arqueo"] = $_SESSION["id_arqueo"];
//    $_SESSION["rut"] = $_GET['rut'];
//    $_SESSION["tipo_personal"] = $_GET['tipo_personal'];
//    $_SESSION["cod_tipo_especialista"] = $_GET['cod_tipo_especialista'];
//} else {
  //  $_SESSION["usuario"] = $_SESSION["usuario"];
//    $_SESSION["rut"] = $_SESSION["rut"];
//    $_SESSION["tipo_personal"] = $_SESSION["tipo_personal"];
//    $_SESSION["cod_tipo_especialista"] = $_SESSION["cod_tipo_especialista"];
//}
//seguridad();
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <title>Entrada</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- elementos para datepicker jquery-1.12.4.js no compatible con bs-->
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <!-- <script type="text/javascript" src="js/funcion_serv.js"></script> -->
        <script type="text/javascript" src="js/funcion_sistema.js"></script> 
        <script type="text/javascript" src="js/jquery.md5.js"></script> 
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
        <script type="text/javascript">

            var fila = 1;

//            $("#paga").keypress(function (event) {
//                var keycode = event.keyCode || event.which;
//                if (keycode == '13') {
//                    debe = parseInt($("#debe").val());
//                    paga = parseInt($("#paga").val());
//                    calculo = paga - debe;
//                    $("#vuelto").val(calculo);
//                }
//            });
////------------------------------- INGRESAR REGISTRO
function validacionEntrada() {

                msg = "Entrada. <br>";
                bander = 0;
                inpObj = document.getElementById("patente");
                if (validacionbolean(inpObj))
                {
                    bander = 1;
                    msg += "Patente: No valida <br>";
                    //'<div class="alert alert-success alert-dismissable" ><h3> que paso aqui</h3></div>';
                }
                inpObj = document.getElementById("numero");
                if (validacionbolean(inpObj))
                {
                    bander = 1;
                    msg += "Numero: No valido<br>";
                }
                
                if (bander == 0)
                {
                    $('#alert').hide();
                     guardarreg();
                     //alert($("#lblid_dventa").text());
                   //ingresar();
                } else {
                    showAlert(msg);
                }

            }
            function ingresar()//ingresa registro de estacionamiento
            {  
     
                fecha = $("#fecha").text();
                hora = $("#hora").val();
//                rut = $("#rut").val();
//                telefono = $("#telefono").val();
                patente = $("#patente").val();
                tipo = $("#tipo").val();
                servicio = $("#servicio").val();
//                tipo = $("#tipo :selected").text();
//                servicio = $("#servicio :selected").text();
                numero = $("#numero ").val();
                id_dventa = $("#lblid_dventa").text();
                //alert(id_dventa);
//                $("#btabla").append("<tr> <td>" + 1 + "</td> <td>" + patente + "</td> <td>"
//                        + tipo + "</td> <td>" + servicio + "</td> <td>" + numero + "</td> <td>" + hora
//                        + "</td> <td>" + 1 + "</td> <td>" + 1 + "</td> </tr>");
                
                switch (tipo) {
                    case "1":
                        textTipo = "<div class=''><select id='selT" + id_dventa + "' class=' form-control' disabled><option value='1' selected >Moto</option><option value='2'>Auto</option><option value='3'>Pesado</option></select></div>";
                        break;
                    case "2" :
                        textTipo = "<div class=''><select id='selT" + id_dventa + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2' selected >Auto</option><option value='3'>Pesado</option></select></div>";
                        break;
                    case "3":
                        textTipo = "<div class=''><select id='selT" + id_dventa + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2'>Auto</option><option value='3' selected >Pesado</option></select></div>";
                        break;
                    default:
                        textTipo = "hola";
                }

                switch (servicio) {
                    case "2":
                        textSer = "<div class=''><select id='selS" + id_dventa + "' class=' form-control' disabled><option value='2' selected>Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";
                        break;
                    case "3":
                        textSer = "<div class=''><select id='selS" + id_dventa + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'selected>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";

                        break;
                    case "4":
                        textSer = "<div class=''><select id='selS" + id_dventa + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'selected>Noche</option><option value='5'>Lavado</option></select></div>";

                        break;
                    case "5":
                        textSer = "<div class=''><select id='selS" + id_dventa + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'selected>Lavado</option></select></div>";
                        break;
                    default:
                        textSer = "hola";
                }

                $("#btabla").append(" <tr id = '" + (id_dventa) + "'> <td>" + (id_dventa) + "</td> <td> <div> <input id='txtP" + (id_dventa) + "' type='text' size='4' class=' form-control' value = '"
                        + patente + "' pattern='[A-Za-z0-9]{5,6}' disabled></input> </div> </td> <td>"
                        + textTipo + "</td> <td>" + textSer + "</td>  <td>" + hora
                        + "</td> <td id='"+"sal" + (id_dventa) + "'>" + '' + "</td><td id='"+"min" + (id_dventa) + "'>"+ '' + "</td><td id='"+"pag" + (id_dventa) + "'>" + '' + "</td> <td><div class= ''>" +
                        "<button id='btnM" + id_dventa + "' class='btn btn-warning btn-xs' onclick='modificar(this)'>" +
                        "<span class='	glyphicon glyphicon-pencil'></span>" +
                        "</button>" +
                        "<button id='btnG" + (id_dventa) + "' class='btn btn-success btn-xs' onclick='validacionSalida(this)' style='display: none;' >" +
                        "<span class='glyphicon glyphicon-floppy-saved'></span>" +
                        "</button>" +
                        "<button id='btnd" + id_dventa + "' class='btn btn-danger btn-xs' onclick='eliminar(this)'>" +
                        "<span class='glyphicon glyphicon-remove'></span>" +
                        "</button>" +
                        "<button id='btnP" + (id_dventa) + "' class='btn btn-success btn-xs' onclick='cargarModal(this)'  >" +
                        "<span class='	glyphicon glyphicon-usd' data-toggle='modal' data-target='#modalPagar'></span>" +
                        "</button>" +
                        "</div></td> </tr>");

                limpiar();
             
            }
            
            
            function guardarreg(){ //ingresa registro
            id_arqueo = $("#lblid_arqueo").text();
            rut = $("#lblrut_usuario").text();
            operacion = "Ingreso vehiculo:";
            if(rut == '' && id_arqueo == ''){
                msg = "Debe loguearse y abrir caja";
                showAlert(operacion+msg);
                document.getElementById("btnlogin").focus();
            }else if(rut != '' && id_arqueo == ''){
                msg = "Debe abrir caja";
                 showAlert(operacion+msg);
                 document.getElementById("btncaja").focus();
            }else{
                fecha = $("#fecha").text();
                hora = $("#hora").val();
//                rut = $("#rut").val();
//                telefono = $("#telefono").val();
                patente = $("#patente").val();
                tipo = $("#tipo").val();
                servicio = $("#servicio").val();
//                tipo = $("#tipo :selected").text();
//                servicio = $("#servicio :selected").text();
                numero = $("#numero ").val();
                
                 data=  'funcion=ingresoestac&fecha='+fecha+'&hora='+hora+'&patente='+patente+'&tipo='+tipo+'&numero='+numero+'&servicio='+servicio+'&id_arqueo='+id_arqueo;
//                
                 marco = "lblid_dventa";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
                sendajax(marco, ruta, data,2);
                showAlert2(msg);
              } 
                
  //ingresar();
                
            }

            function horaActual() {
                var fecha = new Date();
                var min;
                var hrs;


                if (parseInt(fecha.getMinutes() / 10) == 0)
                    min = "0" + fecha.getMinutes();
                else
                    min = fecha.getMinutes();
                if (parseInt(fecha.getHours() / 10) == 0)
                    hrs = "0" + fecha.getHours();
                else
                    hrs = fecha.getHours();
                document.getElementById("hora").value = hrs + ":" + min;
            }

            function limpiar()
            {
                horaActual();
//                $("#rut").val("");
//                $("#telefono").val("");
                $("#patente").val("");
                $("#tipo").val("1");
                $("#servicio").val("2");
                $("#numero").val("");
                $("#lblid_dventa").text("");
                 limpiarReg();
                   msg = "";
                showAlert2(msg);
                $('#alert').hide();
                
            }
////------------------------------- EDITAR REGISTRO
            function modificar(elemento)
            {   id_arqueo = $("#lblid_arqueo").text();
                rut = $("#lblrut_usuario").text();
                operacion = "Editar:";
                if(rut == '' && id_arqueo == ''){
                    msg = "Debe loguearse y abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btnlogin").focus();
                }else if(rut != '' && id_arqueo == ''){
                    msg = "Debe abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btncaja").focus();
                }else{
                    msg = "Habilitado para editar registro";
                fila_id = elemento.parentNode.parentNode.parentNode.id;
                $("#txtP" + fila_id).attr('disabled', false);
                $("#selS" + fila_id).attr('disabled', false);
                $("#selT" + fila_id).attr('disabled', false);
                $("#btnM" + fila_id).hide();
                $("#btnG" + fila_id).show();
                showAlert2(msg);
                 }
                 

            }
            function guardar(elemento)
            {
                fila_id = elemento.parentNode.parentNode.parentNode.id;
            
                patente = $("#txtP" + fila_id).val();
                servicio = $("#selS" + fila_id).val();
                vehiculo = $("#selT" + fila_id).val();
                  data=  'funcion=editaestac&id_dventa='+fila_id+'&patente='+patente+'&tipo='+vehiculo+'&servicio='+servicio ;

                 marco = "";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
                sendajax(marco, ruta, data,3);
              

            }


            function eliminar(elemento)
            {   
                id_arqueo = $("#lblid_arqueo").text();
                rut = $("#lblrut_usuario").text();
                operacion = "Anular:";
                if(rut == '' && id_arqueo == ''){
                    msg = "Debe loguearse y abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btnlogin").focus();
                    
                }else if(rut != '' && id_arqueo == ''){
                    msg = "Debe abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btncaja").focus();
                }else{
                    
                    fila_id = elemento.parentNode.parentNode.parentNode.id;
                    $("#"+fila_id).children("td:nth-child(1)").addClass("danger");  
                //$("#" + fila_id).remove();
                    actualiza(fila_id);
                    msg ="Registro anulado:"+fila_id;
                     showAlert2(msg);
                }
                

            }
            function actualiza(id){ //validar la anulacion con criterio de tiempo
                fila_id = id;
                 id_arqueo = $("#lblid_arqueo").text();
                 data=  'funcion=actestac&id_dventa='+fila_id+'&id_arqueo='+id_arqueo;

                 marco = "";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
                sendajax(marco, ruta, data,5);
            }
            
             function guardado(id){
                fila_id = id;
                $("#txtP" + fila_id).attr('disabled', true);
                $("#selS" + fila_id).attr('disabled', true);
                $("#selT" + fila_id).attr('disabled', true);
                $("#btnM" + fila_id).show();
                $("#btnG" + fila_id).hide();
              //    alert(fila_id);

            }
////////////------------------------------GENERAR EL PAGO
            function cargarModal(elemento)
            {
            id_arqueo = $("#lblid_arqueo").text();
            rut = $("#lblrut_usuario").text();
            operacion = "Pago:";
            if(rut == '' && id_arqueo == ''){
                    msg = "Debe loguearse y abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btnlogin").focus();
            }else if(rut != '' && id_arqueo == ''){
                    msg = "Debe abrir caja";
                    showAlert(operacion+msg);
                    document.getElementById("btncaja").focus();
            }else{   
                limpiamodal();
                fila_id = elemento.parentNode.parentNode.parentNode.id;
               calculo_salida(fila_id);
               
               $("#modalPagar").modal("show");
          
               $("#modalPagar").on('shown.bs.modal', function () {
                   debe =  $("#aux").text();
                $("#debe").val(debe);
                $("#registro").text(fila_id);
               
                }); 
                showAlert2(operacion+msg);  
            }  
               
       
            }
            function limpiamodal(){
                $("#debe").val("");
                $("#vuelto").val("");
                $("#paga").val("");
                $("#registro").text("");
            }
            
            function calculo_salida(id){
                id_dventa = id;
                $("#ticket").text(id_dventa);
                fecha = $("#fecha").text();
                //hora = $("#hora").val();
                var tiempo = new Date();
                hora = tiempo.getHours()+':'+tiempo.getMinutes();
                $("#" + id_dventa).children("td:nth-child(6)").text(hora);
             //   $("#btnd" + fila_id).attr('disabled', true);
              //  $("#btnM" + fila_id).attr('disabled', true);
                ////                rut = $("#rut").val();
//                telefono = $("#telefono").val();
               patente = $("#patente").val();
               // tipo = $("#tipo").val();
               // servicio = $("#servicio").val();
//                tipo = $("#tipo :selected").text();
//                servicio = $("#servicio :selected").text();
                numero = $("#numero ").val();
                
                 data=  'funcion=salidaestac&fecha='+fecha+'&hora='+hora+'&patente='+patente+'&tipo='+tipo+
                         '&numero='+numero+'&servicio='+servicio+'&id_dventa='+id_dventa;
//                
                 marco = "aux";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
                sendajax(marco, ruta, data,7);
            }

            function validacionbolean(inpObj) {
                if (!inpObj.checkValidity()) {
                    return true;
                } else {
                    return false;
                }
            }

            

            function validacionSalida(elemento) {

                fila_id = elemento.parentNode.parentNode.parentNode.id;
                msg = "Salida. <br>";
                bander = 0;
                inpObj = document.getElementById("txtP" + fila_id);
                if (validacionbolean(inpObj))
                {
                    bander = 1;
                    msg += "Patente: No valida <br>";
                    //'<div class="alert alert-success alert-dismissable" ><h3> que paso aqui</h3></div>';
                }

                if (bander == 0)
                {
                    $('#alert').hide();
                    guardar(elemento);
                } else {
                    showAlert(msg);
                }

            }
            function calculo(event) {
                if (event.keyCode === 13) {
                    debe = parseInt($("#debe").val());
                    paga = parseInt($("#paga").val());
                    calculo1 = paga - debe;
                    $("#vuelto").val(calculo1);
                }
            }
            function finPago() {
             
                debe = $("#debe").val();
                paga = $("#paga").val();
                //if(paga >= debe && paga > 0){
                if(paga >= debe){
                    fila_id = $("#registro").text();
                $("#btnd" + fila_id).attr('disabled', true);
                $("#btnM" + fila_id).attr('disabled', true);
                $("#btnP" + fila_id).attr('disabled', true);
                msg = "Pago realizado con exito. <br>";
                
                $("#" + fila_id).children("td:nth-child(8)").text(debe);
                $("#" + fila_id).children("td:nth-child(8)").addClass("info");
                regpago(fila_id);
                showAlert2(msg);
                limpiarReg();
                //data-dismiss="modal";
                $("#modalPagar").modal("hide");
                }else {
                    msg = "Pago NO efectuado. <br>";
                    showAlert(msg);
                    $("#paga").focus();
                }    
              

            }
            function regpago(elemento)
            {
                 id_arqueo = $("#lblid_arqueo").text();
                fila_id = elemento;
                debe =  $("#debe").val();
                hora_salida= $("#" + fila_id).children("td:nth-child(6)").text();
                tiempo_cantidad = $("#" + fila_id).children("td:nth-child(7)").text();
                fecha_salida=  $("#fecha").text();
                data=  'funcion=regpago&id_dventa='+fila_id+'&paga='+debe+'&hora_salida='+hora_salida+
                        '&fecha_salida='+fecha_salida+'&tiempo_cantidad='+tiempo_cantidad+'&id_arqueo='+id_arqueo ;

                 marco = "";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
                sendajax(marco, ruta, data,4);
              

            }
 //---------------------notificaciones           
            function limpiarReg(){
                $("#ticket").text("");
                $("#aux").text("");
            }
            function cancelar() {
                limpiarReg();
                id_venta = $("#registro").text();
                $("#" + id_dventa).children("td:nth-child(6)").text("");
                $("#" + id_dventa).children("td:nth-child(7)").text("");
                $("#" + id_dventa).children("td:nth-child(8)").text("");
                msg = "";
                
                showAlert2(msg);
                $("#alert").hide();

            }

            function showAlert2(message) {
                //alert(message);
                $('#alert').html('<div class="alert alert-success alert-dismissable ">' +
                        '<button type="button" class="close" ' +
                        'data-dismiss="alert" aria-hidden="true">' +
                        '&times;' +
                        '</button>' + '<strong>' +
                        message + '</strong>' +
                        '</div>');
                $('#alert').show();
            }


            function showAlert(message) {
                //alert(message);
                $('#alert').html('<div class="alert alert-danger alert-dismissable ">' +
                        '<button type="button" class="close" ' +
                        'data-dismiss="alert" aria-hidden="true">' +
                        '&times;' +
                        '</button>' + '<strong>' +
                        message + '</strong>' +
                        '</div>');
                $('#alert').show();
            }
///-----------------Modal caja---------------------------------------------------------
 function abrirCaja()
 {
      //id_arqueo = $("#lblid_arqueo").text();
       rut = $("#lblrut_usuario").text();
       operacion = "Abrir caja:";
        if(rut == '' ){
            msg = "Debe loguearse";
            showAlert(operacion+msg);
            document.getElementById("btnlogin").focus();
        
        }else{
                fecha= $("#fecha").text();
                alert(fecha);
                rut_usuario = $("#lblrut_usuario").text();
                ip_usuario = "127.0.0.1";
             //   alert("fecha = " + fecha + "id usuario =" + rut_usuario);
                 data = "funcion=creaarqueo&rut_usuario=" + rut_usuario + "&ip_usuario=" + ip_usuario + "&fecha=" + fecha+ "&turno=" + rut_usuario;
                 // data = "funcion=abrircaja&rut_usuario=" + rut_usuario + "&ip_usuario=" + ip_usuario + "&fecha=" + fecha+ "&turno=" + rut_usuario;
                marco="";
                ruta= "../negocio/logicaestac.php";
                sendajax(marco, ruta, data,6);
         }        
  }  
  function obtarqueo(){
      usuario = $("#lblrut_usuario").text();
       fecha= $("#fecha").text();
       id_arqueo = $("#lblid_arqueo").text();
       data = 'funcion=getarqueo&id_arqueo=' + id_arqueo+'&fecha='+fecha+'&usuario='+usuario;
                 // data = "funcion=abrircaja&rut_usuario=" + rut_usuario + "&ip_usuario=" + ip_usuario + "&fecha=" + fecha+ "&turno=" + rut_usuario;
       marco="";
       ruta= "../negocio/logicaestac.php";
       sendajax(marco, ruta, data,6);
  }
    function obtarqueoxrut(){
       usuario = $("#lblrut_usuario").text();
       data = "funcion=getarqueoxrut&usuario=" + usuario ;
                 // data = "funcion=abrircaja&rut_usuario=" + rut_usuario + "&ip_usuario=" + ip_usuario + "&fecha=" + fecha+ "&turno=" + rut_usuario;
       marco="lblid_arqueo";
       ruta= "../negocio/logicaestac.php";
       sendajax(marco, ruta, data,4);
  }
  function calculaventa(){//calcula el total vendido turno
      id_arqueo = $("#lblid_arqueo").text();
      rut = $("#lblrut_usuario").text();
      operacion = "Calcula venta Turno:";
        if(rut == '' && id_arqueo == ''){
            msg = "Debe loguearse y abrir caja";
            showAlert(operacion+msg);
            document.getElementById("btnlogin").focus();
        }else if(rut != '' && id_arqueo == ''){
            msg = "Debe abrir caja";
            showAlert(operacion+msg);
            document.getElementById("btnabrircaja").focus();
        }else{
           
       data = "funcion=calculaventa&id_arqueo="+id_arqueo;
       marco="lbltotal_venta";
       ruta= "../negocio/logicaestac.php";
       sendajax(marco, ruta, data,4);
       showAlert2(msg);
       }
        
  }
  
  function estadoarqueo(){
      data = "funcion=estadoarqueo&rut_usuario=1";
       marco="";
       ruta= "../negocio/logicaestac.php";
       sendajax(marco, ruta, data,6);
  }
  
  function cierrecaja(){
      id_arqueo = $("#lblid_arqueo").text();
      rut = $("#lblrut_usuario").text();
      operacion = "Cierre de caja:";
        if(rut == '' && id_arqueo == ''){
            msg = "Debe loguearse y abrir caja";
            showAlert(operacion+msg);
            document.getElementById("btnlogin").focus();
        }else if(rut != '' && id_arqueo == ''){
            msg = "Debe abrir caja";
            showAlert(operacion+msg);
            //document.getElementById("btncaja").focus();
        }else{
      //  alert($("#ultimo").val()) ;
          msg = "Caja cerrada";
        id_arqueo = $("#lblid_arqueo").text();

        data = "funcion=cierrecaja&id_arqueo="+id_arqueo;
        marco="lblid_arqueo";
        ruta= "../negocio/logicaestac.php";
        sendajax(marco, ruta, data,4);
        showAlert2(operacion+msg);
      }   
       
  }
  function ultimoturno(obj){
     confirma = obj.checked;
     
     id_arqueo = $("#lblid_arqueo").text();
     msg = "";
     if(confirma){
        estado = 2; 
        
          msg = "Cierre de activides. <br>";
        showAlert2(msg);
       
    }else {
         estado = 1; 
         confirma = 0;
         msg = "Re apertura de activides. <br>";
        showAlert2(msg);
     }
     
     data = "funcion=cierredia&id_arqueo="+id_arqueo+'&estado='+estado;
        marco="";
        ruta= "../negocio/logicaestac.php";
          sendajax(marco, ruta, data,4);
  }

       function login()
            {
                $("#modalSesion").modal("show");
                marco = "marcoSesion";
                ruta = "login.php";
                data = "";
             //   sendajax(marco, ruta, data,5);
            }  
    function entrar(){
    if($("#lblusuario").text() != ''){
            //alert("");
            msg ="Acceso:debe cerrar sesion <br>";
            showAlert(msg);
            document.getElementById("btn_cerrar").focus();
    }else{      
        pass = $("#pwd_login").val();
       user = $("#rut_login").val();
       if(bandera = acceso(user, pass)){
           
           crearsesion(user);
           msg ="Acceso:Incio de sesión exitoso <br>";
           showAlert2(msg);
           $("#pwd_login").val("");
           $("#modalSesion").modal("hide");
       }else{ 
           msg ="Acceso:Clave no valida <br>";
           showAlert(msg);
       }  
  }  
       
    }    
    function crearsesion(user){
        
        
          id_usuario = user;
          data = "funcion=crearsesion&id_usuario=" + id_usuario;
      //marco="lblusuario";
          marco="";
          ruta= "../negocio/logicaestac.php";
          sendajax(marco, ruta, data,5);
        
    }
    function cambiar(){
         
        var r = confirm("Confirma cerrar session de: "+$("#lblusuario").text());
        if (r == true) {
            data = "funcion=cerrarsesion";
            marco="lblusuario";
            ruta= "../negocio/logicaestac.php";
            sendajax(marco, ruta, data,5);
            msg ="Acceso:Su sesión ha finalizado <br>";
            showAlert2(msg);
            limpiarcaja();
        }
    }
    
    function limpiarcaja(){
        $("#lbltotal_venta").text("0");
        $("#lblpagado").text("0");
        $("#lbldebe").text("0");
        
    }
     function cerrar(){
  
    var r = confirm("Confirma cerrar session de: "+$("#lblusuario").text());
    if (r == true) {
       uri = "cerrar.php"
      window.location= encodeURI(uri);
    }  
    
 }
 function test(){
    
       data=  "funcion=cargagrilla&id_usuario=1";
                
     marco = "";
     ruta= "../negocio/logicaestac.php";
      sendajax(marco, ruta, data,8);
 }
     $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
        </script>
        
    </head>
    <body onload="horaActual();cargartablaArr();">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav nav-pills navbar-right ">
                    <li><a href="#" class="navbar-link">id:<label id="lblid_arqueo"><?php  echo $_SESSION["id_arqueo"]; ?></label></a></li>
                    <li><a href="#" class="navbar-link">rut:<label id="lblrut_usuario"><?php  echo $_SESSION["rut_usuario"]; ?></label></a></li>
                       <li><a href="#" class="navbar-link">Usuario:<label id="lblusuario"><?php  echo $_SESSION["usuario"]; ?></label></a></li>
                       <li><button id="btncaja" class="btn btn-warning navbar-btn"  data-toggle='modal' data-target='#modalCaja' onclick="obtarqueo()" title="Para iniciar sus ventas">Caja</button></li>
                    <li><button id="btnlogin" class="btn btn-primary navbar-btn"  onclick="login()"   title="Para iniciar sesion de usuario">Iniciar Sesion</button></li>
                    <li><button class="btn btn-default" onclick="cargartablaArr()">cerrar sesion</button></li>

                </ul>
            </div>
        </nav>

        <div class="container">

            <!--inicio panel-->
            <div class="panel-group">
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">

                    <!--inicio panel de entrada-->
                    <div class=" panel panel-primary">    
                        <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">Entrada</a>
                            </h4></div>    
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class=" form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-2 col-md-3 col-sm-2 col-xs-3">Fecha:</label>
                                    <div  class="col-lg-6 col-md-6 col-sm-3 col-xs-7">
                                        <label id="fecha" class="col-lg-2 col-md-3 col-sm-2 col-xs-3"><? echo $fecha; ?></label>
                                    </div>
                                     
                                </div>
                                <div class=" form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-2 col-md-3 col-sm-2 col-xs-3">Time:</label>
                                     <div class= " col-lg-2 col-md-3 col-sm-2 col-xs-2">
                                        <button class="btn btn-primary" onclick="horaActual()" title="Actualiza la hora">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </button>
                                    </div>
                                     
                                </div>
                                <div class=" form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-2 col-md-3 col-sm-2 col-xs-3">Hora:</label>
                                    <div  class="col-lg-6 col-md-6 col-sm-3 col-xs-7">
                                        <input class="form-control" id="hora" type="time" >
                                    </div>
                                  
                                </div>

                               

                                <div class=" form-group col-md-12 col-lg-12">

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12">Patente:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <input type="text" id="patente" class=" form-control" required="" pattern="[A-Za-z0-9]{5,6}"> </input>
                                    </div>

                                    <div class="clearfix visible-lg visible-md "></div>

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12 ">Tipo Vehiculo:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <select id ="tipo" class=" form-control" >
                                            <option value="1">Moto</option>
                                            <option value="2" selected>Auto</option>
                                            <option value="3">Pesado</option>
                                        </select>
                                    </div>

                                    <div class="clearfix visible-lg visible-md visible-sm"></div>

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12">Servicio:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <select id="servicio" class=" form-control" >
                                            <option value="2">Minuto</option>
                                            <option value="3">dia</option>
                                            <option value="4">Noche</option>
                                            <option value="5">Lavado</option>
                                        </select>
                                    </div>

                                    <div class="clearfix visible-lg visible-md "></div>

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12" hidden>Numero:</label >
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <input type="hidden" id="numero" value="1" class=" form-control" required="" min="1" max="100" ></input >
                                    </div>
                                    <label id="lblid_dventa" ></label>  

                                </div>

                                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                                <div class=" form-group col-md-12 col-lg-12">
                                    <div class="col-md-6 col-lg-4 col-sm-2 col-xs-6">
                                        <button class="btn btn-primary" onclick="validacionEntrada()" title="Ingresa nuevo vehiculo">Ingresar</button>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-sm-2 col-xs-6">
                                        <button class="btn btn-primary" onclick="limpiar()" title="limpiar campos">Limpiar</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--fin panel de entrada-->

                    <div class="">
                        <div id="alert" class="">  </div>
                    </div> 
                </div>

                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">

                    <!--                    inicio panel de salida -->        
                    <div class=" panel panel-primary">    
                        <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2">Salida</a>
                            </h4></div>    
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">


                                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 form-group">

                                    <label class="col-md-2 col-lg-2 col-sm-2 col-xs-12">Patente:</label>
                                    <div class="col-md-4 col-lg-3 col-sm-3 col-xs-12">
                                        <input type="text" id="patente" class=" form-control"  disabled ></input>
                                    </div>
                                   
                                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                                        <button class="btn btn-primary" onclick=""  disabled >
                                            <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#myModal"></span>
                                        </button>
                                    </div>
                                     <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                         <label id="" >ticket:</label><label id="ticket" >000</label>  
                                          <label id="" >total:</label><label id="aux" ></label>  
                                    </div>
                                </div>
                               
                                <div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12 form-group table-responsive" style="height: 450px;" >
                                    <table class="table table-bordered table-condensed "  >
                                        <thead id="htabla" class="">
                                            <tr>
                                                <td>Id</td>
                                                <td>Patente</td>
                                                <td>Tipo</td>
                                                <td>Servicio</td>
                                              
                                                <td>Inicio</td>
                                                <td>Salida</td>
                                                <td>tiempo</td>
                                                <td>Pagar($)</td>
                                                <td>Operacion</td>
                                            </tr>
                                        </thead>
                                       
                                        <tbody id="btabla" style=" overflow-y: auto;overflow-x: auto;" >

                                        </tbody>
                                          
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin panel de salida-->

                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalPagar" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pagar</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row"  >
                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">ticket:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label id="registro"></label>
                            </div>
                            </div>
                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">Paga:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="number" id="paga" class=" form-control"  onkeypress="calculo(event)"> </input>
                            </div>

                            <div class="clearfix visible-lg visible-md visible-sm"></div>

                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">Debe:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="text" id="debe" class=" form-control" readonly > </input>
                            </div>

                            <div class="clearfix visible-lg visible-md visible-sm"></div>

                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">Vuelto:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="text" id="vuelto" class=" form-control"  disabled=""> </input>
                            </div>

                            <div class="clearfix visible-lg visible-md visible-sm"></div>

                        </div>
                        <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelar()">Close</button>
                            <button type="button" class="btn btn-primary"  onclick="finPago()">Pagado</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal caja -->
            <div class="modal fade" id="modalCaja" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Caja</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row"   >
                            <div class=" form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div>
                            
                                </div>                        
                            </div>
                                <div class=" form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">estado</label>
                                </div>                        
                                 <div>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">turno</label>
                                </div>    
                                 <div>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">Usuario</label>
                                </div>        
                            </div>
                            </div> 
                            <div class="row"   >
                            <div class=" form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <button id="btnabrircaja"class="btn btn-success" onclick="abrirCaja()" title="Para iniciar su turno" >Abrir Caja</button>
                                </div>                        
                            </div>
                                <div class=" form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6" id="estado_arqueo"></label>
                                </div>                        
                                 <div>
                                     <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6" id="turno_arqueo"></label>
                                </div>    
                                 <div>
                                     <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6" id="usuario_arqueo"></label>
                                </div>        
                            </div>
                            </div>        
                            <div class=" form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-2 col-md-3 col-sm-2 col-xs-3">calcula:</label>
                                     <div class= " col-lg-2 col-md-3 col-sm-2 col-xs-2">
                                        <button class="btn btn-primary" onclick="calculaventa()" title="Para calcular sus ventas de su turno">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </button>
                                    </div>
                                     
                                </div>
                            <div class="form-group col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">Total Venta:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6" id="lbltotal_venta">0</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">Pagado:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6" id="lblpagado">0</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">Debe:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6"id="lbldebe">0</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button id="btn_cerrar" class="btn btn-danger "  onclick="cierrecaja()" title="Para terminar su turno">Cerrar Caja</button>  
                                <input type="checkbox" id="ultimo" name="ultimo" onclick="ultimoturno(this)"  > cierre día<br>
                            </div>
                        </div>

                        <div class="clearfix visible-lg visible-md visible-sm visible-xs" data-toggle='modal' data-target='#modalConfirm'></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar la venta">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Modal sesion -->
            <div class="modal fade" id="modalSesion" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sesion</h4>
                        </div>
                        <div id="marcoSesion" class="modal-body">

                            <div class="form-group">
      <label for="user"><h4>Usuario</h4></label>
    <select class="form-control" id="rut_login"  >
        <option value=""></option 
      <option value="2">turno2</option>
           <option value="2">turno2</option>
             <option value="1">turno1</option>

        <option value="6"></option>
    </select>
</div>

<div class="form-group">
    <label for="pwd"><h4>contraseña</h4></label>
    <input type="password" class="form-control" size="3" id="pwd_login">
</div>

<div class="checkbox">
    <label><input type="checkbox">Recuerdeme</label>
</div>

<button type="button"  onclick="entrar()" class="btn btn-info">Entrar</button>
<button type="button"  onclick="cambiar()" class="btn btn-info">Cerrar sesion</button>
                            
                            
                        </div>

                        <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </body>