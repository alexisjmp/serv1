<?php
//require_once '../funciones/listservicios_1.php';
session_start();
$_SESSION["usuario"] = '';
////require_once('../servicio/funciones_adicionales.php');
//// Start the session
//
date_default_timezone_set('America/Santiago');
$fecha = date('d/m/Y');
//if (!isset($_SESSION["usuario"])) {
//    $_SESSION["usuario"] = $_GET['nombre'];
//    $_SESSION["rut"] = $_GET['rut'];
//    $_SESSION["tipo_personal"] = $_GET['tipo_personal'];
//    $_SESSION["cod_tipo_especialista"] = $_GET['cod_tipo_especialista'];
//} else {
//    $_SESSION["usuario"] = $_SESSION["usuario"];
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
        <script type="text/javascript" src="js/funcion_serv.js"></script> 
        <script type="text/javascript" src="js/funcion_sistema.js"></script> 
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
//                $("#tipo").val("1");
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
                calculo_salida();
                 alert("fdsaf");
                fila_id = elemento.parentNode.parentNode.parentNode.id;
               debe = ($("#" + fila_id).children("td:nth-child(7)").text());
               $("#debe").val(debe);
              
            }
            
            function calculo_salida(){
                fecha = $("#fecha").text();
                //hora = $("#hora").val();
                var tiempo = new Date();
                hora = tiempo.getHours()+':'+tiempo.getMinutes();
                ////                rut = $("#rut").val();
//                telefono = $("#telefono").val();
               patente = $("#patente").val();
               // tipo = $("#tipo").val();
               // servicio = $("#servicio").val();
//                tipo = $("#tipo :selected").text();
//                servicio = $("#servicio :selected").text();
                numero = $("#numero ").val();
                
                 data=  'funcion=salidaestac&fecha='+fecha+'&hora='+hora+'&patente='+patente+'&tipo='+tipo+'&numero='+numero+'&servicio='+servicio;
//                
                 marco = "aux";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
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
//                rut = $("#rut").val();
//                telefono = $("#telefono").val();
                patente = $("#patente").val();
                tipo = $("#tipo").val();
                servicio = $("#servicio").val();
//                tipo = $("#tipo :selected").text();
//                servicio = $("#servicio :selected").text();
                numero = $("#numero ").val();
//                $("#btabla").append("<tr> <td>" + 1 + "</td> <td>" + patente + "</td> <td>"
//                        + tipo + "</td> <td>" + servicio + "</td> <td>" + numero + "</td> <td>" + hora
//                        + "</td> <td>" + 1 + "</td> <td>" + 1 + "</td> </tr>");
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
                        "<button id='btnP" + (fila++) + "' class='btn btn-primary btn-xs' onclick='cargarModal(this)'  >" +
                        "<span class='	glyphicon glyphicon-usd' data-toggle='modal' data-target='#modalPagar'></span>" +
                        "</button>" +
                        "</div></td> </tr>");

           //     alert(fecha + hora + patente + tipo + numero + servicio);
alert(hora);
                //sendAjax
                //data=       'funcion=actualizapaciente&id_paciente='+id_pacientepk+'&identificador=';
//                data = 'hora' + hora + '&patente=' + patente + '&tipo=' + tipo + '&servicio=' + servicio + '&numero =' + numero;
                 data=  'funcion=ingresoestac&fecha='+fecha+'&hora='+hora+'&patente='+patente+'&tipo='+tipo+'&numero='+numero+'&servicio='+servicio;
//                
                 marco = "";
                 ruta= "../negocio/logicaestac.php";
//                alert(data);
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

            function finPago() {


                msg = "Pago realixado con exito. <br>";

                showAlert2(msg);

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

            function calculo(event) {
                if (event.keyCode === 13) {
                    debe = parseInt($("#debe").val());
                    paga = parseInt($("#paga").val());
                    calculo1 = paga - debe;
                    $("#vuelto").val(calculo1);
                }
            }
        </script>
        
    </head>
    <body onload="horaActual()">
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

                                <!--                                <div class=" form-group col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                
                                                                    <label class="col-md-1 col-lg-1 col-xs-12 col-sm-2">Rut:</label>
                                                                    <div class="col-md-2 col-lg-2 col-xs-12 col-sm-4">
                                                                        <input type="text" id ="rut" class=" form-control" ></input>
                                                                    </div>
                                
                                                                    <label class="col-md-1 col-lg-1 col-xs-12 col-sm-2">Telefono:</label>
                                                                    <div class="col-md-2 col-lg-2 col-xs-12 col-sm-4">
                                                                        <input type="text" id="telefono" class=" form-control" required=""></input>
                                                                    </div>
                                
                                                                </div>-->

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
                                        <input type="text" id="patente" class=" form-control" ></input>
                                    </div>
<label id="aux" ></label>  
                                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                                        <button class="btn btn-primary" onclick="">
                                            <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#myModal"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12 form-group table-responsive" style="height: 500px; overflow-y: scroll;" >
                                    <table class="table table-bordered table-condensed ">
                                        <thead id="htabla" class="">
                                            <tr>
                                                <td>Id</td>
                                                <td>Patente</td>
                                                <td>Tipo de Vehiculo</td>
                                                <td>Servicio</td>
                                                <td>Numero</td>
                                                <td>Hora</td>
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



        </div>

    </body>