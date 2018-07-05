

function showResult(str, op, cat, cod) {

    data = '?funcion=listaservicios&nombre=' + str + '&opc=' + op + '&cat=' + parseInt(cat) + '&cod=' + parseInt(cod);
//  if (str.length==0) {
//	document.getElementById("marco_productos").innerHTML="";
//	document.getElementById("marco_productos").style.border="0px";
//	return;
//  }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("marco_productos").innerHTML = this.responseText;
            document.getElementById("marco_productos").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "../funciones/listservicios_1.php" + data, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function imprimir() {
    servicio = new Array();
    arr = new Array();
    i = 0;
    j = 0;
    $("#htabla tr").each(function () {

        nombre_servicio = $(this).children("td:nth-child(6)").text();
        id_servicio = $(this).children("td:nth-child(5)").text();
        categoria_servicio = $(this).children("td:nth-child(7)").text();
        cantidad_servicio = $(this).children("td:nth-child(4)").text();
        valor_servicio = $(this).children("td:nth-child(8)").text();
        servicio[i] = new Array(nombre_servicio, id_servicio, categoria_servicio, cantidad_servicio, valor_servicio);
        i++;


    });
    var myJSON1 = JSON.stringify(servicio);
    console.log(myJSON1);
    total_servicio = 0;
    $("#btabla tr").each(function () {
        nombre_servicio = $(this).children("td:nth-child(6)").text();
        id_servicio = $(this).children("td:nth-child(5)").text();
        categoria_servicio = $(this).children("td:nth-child(7)").text();
        cantidad_servicio = $(this).children("td:nth-child(4)").children("input:text").val();
        valor_servicio = $(this).children("td:nth-child(8)").children("input:text").val();
        total_servicio += parseInt(valor_servicio);
        servicio[i] = new Array(nombre_servicio, id_servicio, categoria_servicio, cantidad_servicio, valor_servicio);
        i++;

    });
    if (i > 1) {

        var myJSON1 = JSON.stringify(servicio);
        console.log(myJSON1);
        email = $("#txt_correo_pdf").val();
        alert(email);
        ruta = "../reporte/pdf_cotizacion.php";
        ruta2 = "../reporte/enviaremail.php?";
        marco = "";
        parametros = 'myJSON1=' + myJSON1 + '&total_servicio=' + total_servicio + '&email=' + email;
        loadDoc(ruta2, parametros);
        AbrirVentana(ruta, parametros, "", 600, 500);


    } else
        alert("ingresar a lo menos un servicio!");
}
function loadDoc(ruta2, data) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML =
                    this.responseText;
        }
    };
    xhttp.open("GET", ruta2 + data, true);
    xhttp.send();
}
function cargartablaArr() {
  data=  "funcion=cargagrilla&id_usuario=1";
                
     marco = "";
     ruta= "../negocio/logicaestac.php";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
              myArr = jQuery.parseJSON(this.responseText);
                console.log(myArr);
             i=0;   
             while(i < myArr.length){
                id_dventa = myArr[i]['id_dventa'];
                patente = myArr[i]['patente'];
                correlativo_venta = myArr[i]['correlativo_venta'];
                tipo_servicio = myArr[i]['tipo_servicio'];
                tipo_catvehiculo = myArr[i]['tipo_catvehiculo'];
                venta = myArr[i]['venta'];
                time_llegada = myArr[i]['time_llegada'];
                time_salida = myArr[i]['time_salida'];
                time_cantidad = myArr[i]['time_cantidad'];
                estado_detalle = myArr[i]['estado_detalle'];
                estado_pagado = myArr[i]['estado_pagado'];
                observacion_detalle = myArr[i]['observacion_detalle'];
                ubic_tablero = myArr[i]['ubic_tablero'];
                saldo_venta = myArr[i]['saldo_venta'];
                turno_venta = myArr[i]['turno_venta'];
                desc_venta = myArr[i]['desc_venta'];
          
                     
                if(estado_detalle == 0) // 
                    ecolor = "danger";
                else 
                    ecolor = "";
                i++;
                //$("#"+id_dventa).children("td:nth-child(8)").addClass("info");
                switch (tipo_catvehiculo) {
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

                switch (tipo_servicio) {
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
                        + textTipo + "</td> <td>" + textSer + "</td>  <td>" + time_llegada
                        + "</td> <td id='"+"sal" + (id_dventa) + "' >" + time_salida + "</td><td id='"+"min" + (id_dventa) + "'>"+ time_cantidad + "</td><td  id='"+"pag" + (id_dventa) + "'>" + venta + "</td> <td><div class= ''>" +
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
                if(estado_pagado == 2){ // pagado
                    color = "info";
                    $("#btnd" + id_dventa).attr('disabled', true);
                    $("#btnM" + id_dventa).attr('disabled', true);
                    $("#btnP" + id_dventa).attr('disabled', true);
                }else if(estado_pagado == 3) // en deuda
                    color = "danger";
                else 
                    color = "";
             $("#"+id_dventa).children("td:nth-child(1)").addClass(ecolor);      
             $("#"+id_dventa).children("td:nth-child(8)").addClass(color);   
             }   
             
           
        }
        
      
    }; 
    xhttp.open("POST", ruta, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
  
} 
function sendajax(marco, ruta, data, opcion) {
    opc = opcion;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
       id = this.responseText;
          //alert(opc);
           if(opc == 1){  //calcula pago
            valor = this.responseText;   
            document.getElementById(marco).innerHTML = "";
            document.getElementById(marco).innerHTML = valor;
            document.getElementById("debe").innerHTML = valor;
            //$("#debe").val(valor);
            
            
           }else if(opc == 2){ //ingresar registro
            document.getElementById(marco).innerHTML = "";
            document.getElementById(marco).innerHTML = this.responseText;
                ingresar();
           }else  if(opc == 3){ //editar registro
                //alert(id);
                guardado(id);
           }else  if(opc == 4){ //genera el pago
                 document.getElementById(marco).innerHTML = "";
            document.getElementById(marco).innerHTML = this.responseText;
            
           }else  if(opc == 5){ //actualiza estado
            //  document.getElementById(marco).innerHTML = "";
          //  document.getElementById(marco).innerHTML = this.responseText;
             myArr = jQuery.parseJSON(this.responseText);
                        console.log(myArr);
            rut_usuario=  myArr[0]['rut'];
            nombre_usuario =myArr[0]['nombre'];
            id_arqueo =myArr[0]['id_arqueo'];
           // tipo_turno = myArr[0]['turno'];         
            //alert(nombre_usuario);
            $("#lblusuario").text(nombre_usuario);
            $("#lblrut_usuario").text(rut_usuario);
            $("#lblid_arqueo").text(id_arqueo);
           }else  if(opc == 6){ //actualiza estado
            
            myArr = jQuery.parseJSON(this.responseText);
                    console.log(myArr);
           estado_arqueo=  myArr[0]['estado'];
           turno_arqueo=  myArr[0]['turno'];
           usuario_arqueo=  myArr[0]['usuario'];
              id_arqueo =myArr[0]['id_arqueo'];
             estado_venta =myArr[0]['estado_venta'];
          //alert(estado_venta);
         //   alert(usuario_arqueo);
          
           $("#lblid_arqueo").text(id_arqueo);
           $("#estado_arqueo").text(estado_arqueo);
          $("#turno_arqueo").text(turno_arqueo);
           $("#usuario_arqueo").text(usuario_arqueo);
           //alert(estado_venta);
           if(estado_venta == 2){
             msg = "Cierre de actividades";
             showAlert(msg);
             $("#ultimo").attr('checked',true);
             
           }else if(estado_venta == 1)
               $("#ultimo").attr('checked',false);
           
           }else  if(opc == 7){ 
                myArr = jQuery.parseJSON(this.responseText);
                console.log(myArr);
                precio=  myArr[0]['precio'];
                tiempo =myArr[0]['tiempo'];
                dias =myArr[0]['dias'];
                descuento =myArr[0]['descuento'];
                id_dventa =myArr[0]['id_dventa'];
                $("#aux").text(precio);
                $("#" + id_dventa).children("td:nth-child(7)").text(tiempo);
                $("#" + id_dventa).children("td:nth-child(8)").text(precio);
           }else  if(opc == 8){ 
                // alert("dsaf");
                myArr = jQuery.parseJSON(this.responseText);
                console.log(myArr);
               
           }
            
           
        }
        
      
    }; 
    xhttp.open("POST", ruta, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
  
} 
///////////////////////////----------------op caja
  function confirmar() {
                var r = confirm("Esta Seguro/a");
                if (r == true) {
                    id_venta = "";
                    data = "id_venta=" + id_venta;
//                marco="";
//                ruta
//                
//                sendajax(marco, ruta, data);
                } else {
                    alert("Caja No Cerrada");
                }
}
function acceso(user, pwd){
    usuario = user;
    pass = pwd;
    bandera = false;
    if(usuario == 1 && $.md5(pass) == '2b2e7e3883424a8ba08a3794ebaaf43e')
      bandera = true;
  
    
      if(usuario == 2 && $.md5(pass) == '1d4d7f00014b8fc58782bbf39461cebb')
      bandera = true;
   
  return bandera;
      
}

function leertablaui() {
    usuario = $('#lblusuario').text();
    if (usuario != '') {
        alert("guardado para el usuario= " + usuario);
        servicio = new Array();
        arr = new Array();
        i = 0;



        $("#btabla tr").each(function () {
            nombre_servicio = $(this).children("td:nth-child(6)").text();
            id_servicio = $(this).children("td:nth-child(5)").text();
            categoria_servicio = $(this).children("td:nth-child(7)").text();
            cantidad_servicio = $(this).children("td:nth-child(4)").children("input:text").val();
            valor_servicio = $(this).children("td:nth-child(8)").children("input:text").val();
            servicio[i] = new Array(nombre_servicio, id_servicio, categoria_servicio, cantidad_servicio, valor_servicio);
            i++;

        });

        var myJSON1 = JSON.stringify(servicio);
        console.log(myJSON1);

        ruta = "";
        marco = "";
        parametros = 'myJSON1=' + myJSON1;
//    sendajax(marco,ruta,parametros);
    } else
    {
        ruta = "login.php";
        marco = "marco_login_2";
        parametros = "";
        sendajax_modal(marco, ruta, parametros);

        alert("porfavor inicie sesion o registrese");

        $('#MyModallogin2').modal('show');

    }
}

function registro() {
    ruta = "clientes_2.php";
    marco = "marco_login_2";
    parametros = "";
    sendajax_modal(marco, ruta, parametros);
    $('#MyModallogin2').modal('show');
}


function validacionbolean(inpObj) {
    if (!inpObj.checkValidity()) {
        return true;
    } else {
        return false;
    }
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

function validacion() {

    msg = "Falta. \n";
    bander = 0;

    inpObj = document.getElementById("txt_rut");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "Rut: No valido <br>";
        //'<div class="alert alert-success alert-dismissable" ><h3> que paso aqui</h3></div>';
    }
    inpObj = document.getElementById("txt_verificador");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "Rut: No valido y verificador novalido <br>";
    }
    inpObj = document.getElementById("txt_razon_social");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "razon social: No valida <br>";
    }
    inpObj = document.getElementById("txt_giro");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "Giro: No valido <br>";
    }


    inpObj = document.getElementById("txt_fono");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "Telefono: No valido <br>";
    }
    inpObj = document.getElementById("txt_email");
    if (validacionbolean(inpObj))
    {

        bander = 1;
        msg += "Correo: No valido <br>";
    }
    if (bander == 0)
    {
        $('#alert').hide();
        registrar_cliente();
    } else {
        showAlert(msg);
    }

}



function numeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}


function valida_correo() {
    inpObj = document.getElementById("txt_correo_pdf");
    if (validacionbolean(inpObj))
    {

        alert("no hay correo");
    } else {
        imprimir();
    }
}

function entrar()
{
    user = $('#rut_login').val();
    pwd = $('#pwd_login').val();
    alert(user + pwd);

//    ruta = "";
//    marco="";
//    parametros="rut="+user+"&pwd="+pwd;
//    sendajax(marco,ruta,data);
//    
}

function entrar_2()
{
    user = $('#rut_login_2').val();
    pwd = $('#pwd_login_2').val();
    alert(user + pwd);

//    ruta = "";
//    marco="";
//    parametros="rut="+user+"&pwd="+pwd;
//    sendajax(marco,ruta,data);
//    
}


function registrar_cliente() {

    rut = $('#txt_rut').val();
    verificador = $('#txt_verificador').val();
    razon = $('#txt_razon_social').val();
    giro = $('#txt_giro').val();
    telefono = $('#txt_fono').val();
    email = $('#txt_email').val();
    nombre_fan = $('#txt_nombref').val();
    alert(rut + verificador + razon + giro + telefono + email + nombre_fan);
//    ruta = "";
//    marco = "";
//    parametros = "rut=" + rut + "&verificador=" + verificador + "&razon=" + razon + "&giro=" + giro + "&telefono="
//            + telefono + "&email=" + email + "&nombre_fan=" + nombre_fan;
//    sendajax(marco, ruta, data);

}

function registrar_cliente() {

    rut = $('#txt_rut_2').val();
    verificador = $('#txt_verificador_2').val();
    razon = $('#txt_razon_social_2').val();
    giro = $('#txt_giro_2').val();
    telefono = $('#txt_fono_2').val();
    email = $('#txt_email_2').val();
    nombre_fan = $('#txt_nombref_2').val();
    alert(rut + verificador + razon + giro + telefono + email + nombre_fan);
//    ruta = "";
//    marco = "";
//    parametros = "rut=" + rut + "&verificador=" + verificador + "&razon=" + razon + "&giro=" + giro + "&telefono="
//            + telefono + "&email=" + email + "&nombre_fan=" + nombre_fan;
//    sendajax(marco, ruta, data);

}



function login_menu() {

    ruta = "login_1.php";
    marco = "marco_login_menu";
    parametros = "";
    sendajax_modal(marco, ruta, data);
}
$( function() {
    // alert("fdsafdsf");
  $( "#datepicker_inicio" ).datepicker();
  } ); 
  $( function() {
    $( "#datepicker_fin" ).datepicker();
  } );
  $( function() {
    // alert("fdsafdsf");
  $( "#datepicker_rpinicio" ).datepicker();
  
  $( "#datepicker_rpfin" ).datepicker();
  } );//23-12-2017 hecho por el pana 
  
   $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sab'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


