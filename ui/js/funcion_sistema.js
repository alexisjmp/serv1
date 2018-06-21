//function guardarcompra() {
//    //txtexamen1 -11
//    exam = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
//    txtexam = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
//    var servicios = new Array();
//    i = 0;
//    id_evaluacion = $("#lblid_evaluacion").text();
//    rut_especialista = $("#rut_usuario").val();
//    if ($('#btabla').children().length != 0) {
//
//        $("#btabla tr").each(function () {
//
//            id_servicio = $(this).children("td:nth-child(5)").text();
//            nombre = $(this).children("td:nth-child(6)").text();
//            categoria = $(this).children("td:nth-child(7)").text();
//            cantidad = $(this).children("td:nth-child(4)").children("input:text").val();
//            valor = $(this).children("td:nth-child(8)").children("input:text").val();
//            servicios[i] = new Array(id_servicio, nombre, categoria, cantidad, valor);
//            i++;
//        });
////     	if($("#txtexamen1").val().length > 0 ){
////     	exam[0]= 1;  txtexam[0]= $("#txtexamen1").val();
////     	}
////     	if($("#txtexamen2").val().length > 0 ){   
////     	exam[1]= 1;   txtexam[1]= $("#txtexamen2").val();
////     	}
////     	if($("#txtexamen3").val().length > 0 ){   
////     	exam[2]= 1;txtexam[2]= $("#txtexamen3").val();
////     	}
////     	if($("#txtexamen4").val().length > 0 ){   
////     	exam[3]= 1;txtexam[3]= $("#txtexamen4").val();
////     	}
////     	if($("#txtexamen5").val().length > 0 ){   
////     	exam[4]= 1;txtexam[4]= $("#txtexamen5").val();
////     	}
////     	if($("#txtexamen6").val().length > 0 ){   
////     	exam[5]= 1;txtexam[5]= $("#txtexamen6").val();
////     	}
////     	if($("#txtexamen7").val().length > 0 ){   
////     	exam[6]= 1;txtexam[6]= $("#txtexamen7").val();
////     	}
////     	if($("#txtexamen8").val().length > 0 ){   
////     	exam[7]= 1;txtexam[7]= $("#txtexamen8").val();
////     	}
////     	if($("#txtexamen9").val().length > 0 ){   
////     	exam[8]= 1;txtexam[8]= $("#txtexamen9").val();
////     	}
////     	if($("#txtexamen10").val().length > 0 ){   
////     	exam[9]= 1;txtexam[9]= $("#txtexamen10").val();
////     	}
////     	if($("#txtexamen11").val().length > 0 ){   
////     	exam[10]= 1;txtexam[10]= $("#txtexamen11").val();
////     	}
//// 	 
//        var myJSON1 = JSON.stringify(servicios);
//        console.log(myJSON1);
////    	var  myJSON2 = JSON.stringify(txtexam);
//        ruta = "../negocio/reglasdatos.php";
//        marco = "";
//        data = 'funcion=miipedido&myJSON1=' + myJSON1;
//        sendajax(marco, ruta, data);
//        //alert("hola");
//    } else
//        alert("Seleccionar una servicio");
//
//    // else
//    //  alert("Seleccionar un atencion");
//}
////
////function buscar(op)
////{
////    opc = op;
////    nombre = '';
////    categoria = '';
////    codigo = '';
////    if (opc == 1)
////    {
////        nombre = $('#nombre_service').val();
////    } else if (opc == 2)
////    {
////        categoria = $('#sel_service').val();
////    } else
////    {
////        codigo = $('#cod_service').val();
////    }
////
////    ruta = "../negocio/reglasdatos.php";
////    marco = "";
////    data = 'funcion=buscaservicios&nombre_servicio=' + nombre+'&categoria_servicio='+categoria+'&codigo_servicio='+codigo;
////    sendajax(marco, ruta, data);
////}

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

function sendajax(marco, ruta, data) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {


            document.getElementById(marco).innerHTML = "";
            document.getElementById(marco).innerHTML = this.responseText;


        } else
            ;
    };
    xhttp.open("POST", ruta, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}
function cotizar() {
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

function limpiar() {
    $("#txt_rut").val('');
    $("#txt_verificador").val('');
    $("#txt_razon_social").val('');
    $("#txt_giro").val('');

    $("#txt_fono").val('');
    $("#txt_email").val('');

    $("#txt_nombref").val('');



}

function limpiar_2() {
    $("#txt_rut_2").val('');
    $("#txt_verificador_2").val('');
    $("#txt_razon_social_2").val('');
    $("#txt_giro_2").val('');

    $("#txt_fono_2").val('');
    $("#txt_email_2").val('');

    $("#txt_nombref_2").val('');



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

function registro_menu() {

    ruta = "clientes_2.php";
    marco = "marco_registro_menu";
    parametros = "";
    sendajax_modal(marco, ruta, data);
}

function login_menu() {

    ruta = "login_1.php";
    marco = "marco_login_menu";
    parametros = "";
    sendajax_modal(marco, ruta, data);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


