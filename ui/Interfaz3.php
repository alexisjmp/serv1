<?php
session_start();
$_SESSION["usuario"] = '';

date_default_timezone_set('America/Santiago');
$fecha = date('d/m/Y');

function getRealIP() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"]))
        return $_SERVER["HTTP_CLIENT_IP"];

    if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        return $_SERVER["HTTP_X_FORWARDED_FOR"];

    return $_SERVER["REMOTE_ADDR"];
}
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="js/funcion_serv.js"></script> 
        <script type="text/javascript" src="js/funcion_sistema.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script type="text/javascript">


            function cargartablaArr()
            {
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        myArr = JSON.parse(this.responseText);
                        console.log(myArr);
//                        alert(myArr[1]);
//                        fecha = $("#fecha").text();
                        hora = myArr[5];
                        patente = myArr[1];
                        tipo = myArr[2];
                        servicio = myArr[3];
                        numero = myArr[4];
                        valor = myArr[6];
                        switch (tipo) {
                            case "1":
                                textTipo = "<div class=''><select id='selT" + (myArr[0]) + "' class=' form-control' disabled><option value='1' selected >Moto</option><option value='2'>Auto</option><option value='3'>Pesado</option></select></div>";
                                break;
                            case "2" :
                                textTipo = "<div class=''><select id='selT" + (myArr[0]) + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2' selected >Auto</option><option value='3'>Pesado</option></select></div>";
                                break;
                            case "3":
                                textTipo = "<div class=''><select id='selT" + (myArr[0]) + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2'>Auto</option><option value='3' selected >Pesado</option></select></div>";
                                break;
                            default:
                                textTipo = "hola";
                        }

                        switch (servicio) {
                            case "2":
                                textSer = "<div class=''><select id='selS" + (myArr[0]) + "' class=' form-control' disabled><option value='2' selected>Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";
                                break;
                            case "3":
                                textSer = "<div class=''><select id='selS" + (myArr[0]) + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'selected>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";

                                break;
                            case "4":
                                textSer = "<div class=''><select id='selS" + (myArr[0]) + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'selected>Noche</option><option value='5'>Lavado</option></select></div>";

                                break;
                            case "5":
                                textSer = "<div class=''><select id='selS" + (myArr[0]) + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'selected>Lavado</option></select></div>";
                                break;
                            default:
                                textSer = "hola";
                        }

                        $("#btabla").append("<tr id = '" + (myArr[0]) + "'> <td>" + (myArr[0]) + "</td> <td> <div> <input id='txtP" + (myArr[0]) + "' type='text' class=' form-control' value = '"
                                + patente + "' pattern='[A-Za-z0-9]{5,6}' disabled></input> </div> </td> <td>"
                                + textTipo + "</td> <td>" + textSer + "</td> <td>" + numero + "</td> <td>" + hora
                                + "</td> <td>" + valor + "</td> <td><div class= ''>" +
                                "<button id='btnM" + (myArr[0]) + "' class='btn btn-warning btn-xs' onclick='modificar(this)'>" +
                                "<span class='	glyphicon glyphicon-pencil'></span>" +
                                "</button>" +
                                "<button id='btnG" + (myArr[0]) + "' class='btn btn-success btn-xs' onclick='validacionSalida(this)' style='display: none;' >" +
                                "<span class='glyphicon glyphicon-floppy-saved'></span>" +
                                "</button>" +
                                "<button class='btn btn-danger btn-xs' onclick='eliminar(this)'>" +
                                "<span class='glyphicon glyphicon-remove'></span>" +
                                "</button>" +
                                "<button id='btnP" + (myArr[0]) + "' class='btn btn-primary btn-xs' onclick='cargarModal(this)' data-toggle='modal' data-target='#modalPagar' >" +
                                "<span class='	glyphicon glyphicon-usd' ></span>" +
                                "</button>" +
                                "</div></td> </tr>");

                    }
                };
                xmlhttp.open("GET", "enviaDatosArray.php", true);
                xmlhttp.send();






            }



            var fila = 1;

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
                $("#patente").val("");
                $("#servicio").val("2");
                $("#numero").val("");
            }

            function modificar(elemento)
            {
                fila_id = elemento.parentNode.parentNode.parentNode.id;
                $("#txtP" + fila_id).attr('disabled', false);
                $("#selS" + fila_id).attr('disabled', false);
                $("#selT" + fila_id).attr('disabled', false);
                $("#btnM" + fila_id).hide();
                $("#btnG" + fila_id).show();

            }

            function cargarModal(elemento)
            {
                alert("fdsaf");
                fila_id = elemento.parentNode.parentNode.parentNode.id;
                debe = ($("#" + fila_id).children("td:nth-child(7)").text());
                $("#debe").val(debe);

            }

            function calculo_salida() {
                fecha = $("#fecha").text();
                hora = $("#hora").val();
                patente = $("#patente").val();
                numero = $("#numero ").val();

                data = 'funcion=ingresa&fecha=' + fecha + '&hora=' + hora + '&patente=' + patente + '&tipo=' + tipo + '&numero=' + numero + '&servicio=' + servicio;
//                
                marco = "";
                ruta = "../negocio/logicaestac.php";
                sendajax(marco, ruta, data);
            }



            function guardar(elemento)
            {
                fila_id = elemento.parentNode.parentNode.parentNode.id;
                $("#txtP" + fila_id).attr('disabled', true);
                $("#selS" + fila_id).attr('disabled', true);
                $("#selT" + fila_id).attr('disabled', true);
                $("#btnM" + fila_id).show();
                $("#btnG" + fila_id).hide();
                patente = $("#txtP" + fila_id).val();
                servicio = $("#selS" + fila_id).val();
                vehiculo = $("#selT" + fila_id).val();

                alert(patente + vehiculo + servicio);
                //sendAjax
//                data = 'hora' + hora + '&patente=' + patente + '&tipo=' + tipo + '&servicio=' + servicio + '&numero =' + numero;
//                
//                marco = "";
//                ruta = "";
//                alert(data);
//                sendAjax(marco, ruta, data);
                //sendAjax

            }


            function eliminar(elemento)
            {
                fila_id = elemento.parentNode.parentNode.parentNode.id;
                $("#" + fila_id).remove();

            }

            function ingresar()//ingresa registro de estacionamiento
            {
                fecha = $("#fecha").text();
                hora = $("#hora").val();
                patente = $("#patente").val();
                tipo = $("#tipo").val();
                servicio = $("#servicio").val();
                numero = $("#numero ").val();
                switch (tipo) {
                    case "1":
                        textTipo = "<div class=''><select id='selT" + fila + "' class=' form-control' disabled><option value='1' selected >Moto</option><option value='2'>Auto</option><option value='3'>Pesado</option></select></div>";
                        break;
                    case "2" :
                        textTipo = "<div class=''><select id='selT" + fila + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2' selected >Auto</option><option value='3'>Pesado</option></select></div>";
                        break;
                    case "3":
                        textTipo = "<div class=''><select id='selT" + fila + "' class=' form-control' disabled><option value='1' >Moto</option><option value='2'>Auto</option><option value='3' selected >Pesado</option></select></div>";
                        break;
                    default:
                        textTipo = "hola";
                }

                switch (servicio) {
                    case "2":
                        textSer = "<div class=''><select id='selS" + fila + "' class=' form-control' disabled><option value='2' selected>Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";
                        break;
                    case "3":
                        textSer = "<div class=''><select id='selS" + fila + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'selected>dia</option><option value='4'>Noche</option><option value='5'>Lavado</option></select></div>";

                        break;
                    case "4":
                        textSer = "<div class=''><select id='selS" + fila + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'selected>Noche</option><option value='5'>Lavado</option></select></div>";

                        break;
                    case "5":
                        textSer = "<div class=''><select id='selS" + fila + "' class=' form-control' disabled><option value='2' >Minuto</option><option value='3'>dia</option><option value='4'>Noche</option><option value='5'selected>Lavado</option></select></div>";
                        break;
                    default:
                        textSer = "hola";
                }

                $("#btabla").append("<tr id = '" + (fila) + "'> <td>" + (fila) + "</td> <td> <div> <input id='txtP" + (fila) + "' type='text' class=' form-control' value = '"
                        + patente + "' pattern='[A-Za-z0-9]{5,6}' disabled></input> </div> </td> <td>"
                        + textTipo + "</td> <td>" + textSer + "</td> <td>" + numero + "</td> <td>" + hora
                        + "</td> <td>" + 100 + "</td> <td><div class= ''>" +
                        "<button id='btnM" + fila + "' class='btn btn-warning btn-xs' onclick='modificar(this)'>" +
                        "<span class='	glyphicon glyphicon-pencil'></span>" +
                        "</button>" +
                        "<button id='btnG" + (fila) + "' class='btn btn-success btn-xs' onclick='validacionSalida(this)' style='display: none;' >" +
                        "<span class='glyphicon glyphicon-floppy-saved'></span>" +
                        "</button>" +
                        "<button class='btn btn-danger btn-xs' onclick='eliminar(this)'>" +
                        "<span class='glyphicon glyphicon-remove'></span>" +
                        "</button>" +
                        "<button id='btnP" + (fila++) + "' class='btn btn-primary btn-xs' onclick='cargarModal(this)' data-toggle='modal' data-target='#modalPagar' >" +
                        "<span class='	glyphicon glyphicon-usd' ></span>" +
                        "</button>" +
                        "</div></td> </tr>");

                alert(hora);
                //sendAjax
                //data=       'funcion=actualizapaciente&id_paciente='+id_pacientepk+'&identificador=';
//                data = 'hora' + hora + '&patente=' + patente + '&tipo=' + tipo + '&servicio=' + servicio + '&numero =' + numero;
                data = 'funcion=ingresa&fecha=' + fecha + '&hora=' + hora + '&patente=' + patente + '&tipo=' + tipo + '&numero=' + numero + '&servicio=' + servicio;
//                
                marco = "";
                ruta = "../negocio/logicaestac.php";
                sendajax(marco, ruta, data);
                //sendAjax
            }

            function validacionbolean(inpObj) {
                if (!inpObj.checkValidity()) {
                    return true;
                } else {
                    return false;
                }
            }

            function validacionEntrada() {

                msg = "Entrada. <br>";
                bander = 0;
                inpObj = document.getElementById("patente");
                if (validacionbolean(inpObj))
                {
                    bander = 1;
                    msg += "Patente: No valida <br>";
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
                    ingresar();
                } else {
                    showAlert(msg);
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
                }

                if (bander == 0)
                {
                    $('#alert').hide();
                    guardar(elemento);
                } else {
                    showAlert(msg);
                }

            }

            function finPago() {


                msg = "Pago realixado con exito. <br>";

                showAlert2(msg);

            }

            function showAlert2(message) {
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
                $('#alert').html('<div class="alert alert-danger alert-dismissable ">' +
                        '<button type="button" class="close" ' +
                        'data-dismiss="alert" aria-hidden="true">' +
                        '&times;' +
                        '</button>' + '<strong>' +
                        message + '</strong>' +
                        '</div>');
                $('#alert').show();
            }

            function calculo(event) {
                if (event.keyCode === 13) {
                    debe = parseInt($("#debe").val());
                    paga = parseInt($("#paga").val());
                    calculo1 = paga - debe;
                    $("#vuelto").val(calculo1);
                }
            }

            function login()
            {
                marco = "marcoSesion";
                ruta = "login.php";
                data = "";
                sendajax_modal(marco, ruta, data);
            }

            function abrirCaja()
            {
                fecha = "<?php echo $fecha ?>";
                id_usuario = "";
                ip_usuario = "<?php print getRealIP() ?>";
                alert("fecha = " + fecha + "id usuario =" + id_usuario + "ip usuario = " + ip_usuario);
                data = "id_usuario=" + id_usuario + "&ip_usuario=" + ip_usuario + "&fecha=" + fecha;
//                marco="";
//                ruta="";
//                sendajax(marco, ruta, data);
            }

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

            function doSearch()
            {
                busqueda = $("#buscarPatente").val();
                $("#btabla tr").each(function () {
                    compara = $(this).children("td:nth-child(2)").children().children("input:text").val();

                    if (busqueda.length == 0 || busqueda.toLowerCase() == compara.toLowerCase())
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }

                });


                // Recorremos todas las filas con contenido de la tabla
//                for (var i = 1; i < tableReg.rows.length; i++)
//                {
//                    cellsOfRow = tableReg.rows[i].getElementsByid('td').;
//                    found = false;
//                    // Recorremos todas las celdas
//
//                    compareWith = cellsOfRow[1].;
//                    // Buscamos el texto en el contenido de la celda
//                    if (searchText.length == 0 || compareWith == searchText)
//                    {
//                        found = true;
//                    }
//                    if (found)
//                    {
//                        tableReg.rows[i].style.display = '';
//                    } else {
//                        // si no ha encontrado ninguna coincidencia, esconde la
//                        // fila de la tabla
//                        tableReg.rows[i].style.display = 'none';
//                    }
//                }
            }


        </script>

    </head>
    <body onload="cargartablaArr()">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav nav-pills navbar-right ">

                    <li><button class="btn btn-warning navbar-btn" data-toggle='modal' data-target='#modalCaja' onclick="">Caja</button></li>
                    <li><button class="btn btn-primary navbar-btn" data-toggle='modal' data-target='#modalSesion' onclick="login()">Iniciar Sesion</button></li>

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
                                        <label id="fecha" class="col-lg-2 col-md-3 col-sm-2 col-xs-3"><?php echo $fecha; ?></label>
                                    </div>

                                </div>
                                <div class=" form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-2 col-md-3 col-sm-2 col-xs-3">Hora:</label>
                                    <div  class="col-lg-6 col-md-6 col-sm-3 col-xs-7">
                                        <input class="form-control" id="hora" type="time" >
                                    </div>
                                    <div class= " col-lg-2 col-md-3 col-sm-2 col-xs-2">
                                        <button class="btn btn-warning" onclick="horaActual()">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </button>
                                    </div>
                                </div>


                                <div class=" form-group col-md-12 col-lg-12">

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12">Patente:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <input type="text" id="patente" class=" form-control" required="" pattern="[A-Za-z0-9]{5,6}" > </input>
                                    </div>

                                    <div class="clearfix visible-lg visible-md "></div>

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12 ">Tipo Vehiculo:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <select id ="tipo" class=" form-control" >
                                            <option value="1">Moto</option>
                                            <option value="2">Auto</option>
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

                                    <label class="col-md-4 col-lg-3 col-sm-2 col-xs-12">Numero:</label>
                                    <div class="col-md-8 col-lg-6 col-sm-3 col-xs-12">
                                        <input type="number" id="numero" class=" form-control" required="" min="1" max="100"></input>
                                    </div>

                                </div>

                                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                                <div class=" form-group col-md-12 col-lg-12">
                                    <div class="col-md-6 col-lg-4 col-sm-2 col-xs-6">
                                        <button class="btn btn-success" onclick="validacionEntrada()">Ingresar</button>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-sm-2 col-xs-6">
                                        <button class="btn btn-danger" onclick="limpiar()">Limpiar</button>
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
                                        <input type="text" id="buscarPatente" class=" form-control" ></input>
                                    </div>

                                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                                        <button class="btn btn-primary" onclick="doSearch()">
                                            <span class="glyphicon glyphicon-search" ></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12 form-group table-responsive" style="height: 500px; overflow-y: scroll;" >
                                    <table class="table table-bordered table-condensed " id="ingresos">
                                        <thead id="htabla" class="">
                                            <tr>
                                                <td>Id</td>
                                                <td>Patente</td>
                                                <td>Tipo de Vehiculo</td>
                                                <td>Servicio</td>
                                                <td>Numero</td>
                                                <td>Hora Entrada</td>
                                                <td>Valor</td>
                                                <td>Opciones</td>
                                            </tr>
                                        </thead>

                                        <tbody id="btabla">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fin panel de salida-->
                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse13">Informe Turno Actual</a>
                                </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse ">
                                <div class="panel-body embed-responsive embed-responsive-16by9 " style="height: 300px; ">
                                    <!--                                        <embed class="embed-responsive-item" name="plugin" id="plugin" src="http://localhost/serv1/ui/reporteTurno.php" type="application/pdf" >-->
                                    <iframe class="embed-responsive-item" src="http://localhost/serv1/ui/reporteTurno.php" ></iframe> <!--note: no width/height in the iframe -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse14">Informe Dia</a>
                                </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse ">
                                <div class="panel-body embed-responsive embed-responsive-16by9 " style="height: 300px; ">
                                    <!--                                        <embed class="embed-responsive-item" name="plugin" id="plugin" src="http://localhost/serv1/ui/reporteTurno.php" type="application/pdf" >-->
                                    <iframe class="embed-responsive-item" src="http://localhost/serv1/ui/reporteDia.php" ></iframe> <!--note: no width/height in the iframe -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9">
                            <embed name="plugin" id="plugin" src="http://localhost/serv1/ui/reporteTurno.php" type="application/pdf" internalinstanceid="6">
            
                        </div>-->




            <!-- Modal -->
            <div class="modal fade" id="modalPagar" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pagar</h4>
                        </div>
                        <div class="modal-body">
                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">Paga:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="number" id="paga" class=" form-control"  onkeypress="calculo(event)"> </input>
                            </div>

                            <div class="clearfix visible-lg visible-md visible-sm"></div>

                            <label class="col-md-3 col-lg-3 col-sm-3 col-xs-12">Debe:</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="text" id="debe" class=" form-control" disabled="" > </input>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="finPago()">Pagado</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalSesion" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sesion</h4>
                        </div>
                        <div id="marcoSesion" class="modal-body">

                        </div>

                        <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCaja" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Caja</h4>
                        </div>
                        <div class="modal-body">
                            <div class=" form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <button class="btn btn-success" onclick="abrirCaja()" >Abrir Caja</button>
                                </div>                        
                            </div>
                            <div class="form-group col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">Total Venta:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">0</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">Pagado:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">0</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">Debe:</label>
                                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6">0</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-danger " onclick="confirmar()">Cerrar Caja</button>                  
                            </div>
                        </div>

                        <div class="clearfix visible-lg visible-md visible-sm visible-xs" data-toggle='modal' data-target='#modalConfirm'></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </body>