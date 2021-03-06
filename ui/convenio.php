<?
session_start();
require_once('../servicio/funciones_adicionales.php');
// Start the session

date_default_timezone_set('America/Santiago');
$fecha = date('d/m/Y');
if (!isset($_SESSION["usuario"])) {
$_SESSION["usuario"] = $_GET['nombre'];
$_SESSION["rut"] = $_GET['rut'];
$_SESSION["tipo_personal"] = $_GET['tipo_personal'];
$_SESSION["cod_tipo_especialista"] = $_GET['cod_tipo_especialista'];
} else {
$_SESSION["usuario"] = $_SESSION["usuario"];
$_SESSION["rut"] = $_SESSION["rut"];
$_SESSION["tipo_personal"] = $_SESSION["tipo_personal"];
$_SESSION["cod_tipo_especialista"] = $_SESSION["cod_tipo_especialista"];
}

//seguridad();
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>formulario especialista</title>
            <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <!-- elementos para datepicker jquery-1.12.4.js no compatible con bs-->
            <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>
            <link rel="stylesheet" href="/resources/demos/style.css"></link>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            <meta http-equiv="X-UA-Compatible" content="ie=edge"></meta>
            <link type="text/css" rel="stylesheet" href="css/cssagenda.css">   </link>   
            <link type="text/css" rel="stylesheet" href="css/style.css"></link>
            <link type="text/css" rel="stylesheet" href="css/eval.css"></link>
            <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"></link>
            <link type="text/css" rel="stylesheet" href="css/tablefiltercss.css"></link>

            <script type="text/javascript" src="js/opagenda.js"></script> 
            <script type="text/javascript" src="js/tablefilterjs.js"></script>
            <script type="text/javascript" src="../js/AjaxUpload.2.0.min.js"></script>
            <script type="text/javascript" src="../js/utilidades.js"></script>
            <script type="text/javascript" src="../js/jquery.Rut.js"></script>
            <script type="text/javascript" src="js/funcion_sistema.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
            <!--keypress-->
            <script>
                function cargar()
                {
                    data = "";
                    marco = "marcoespecialista";
                    ruta = '../funciones/listadoespecialista.php';
                    sendajax(marco, ruta, data)
                }

                function validar_solo_letras(inpObj) {
                    if (!inpObj.checkValidity()) {
                        return true;
                    } else {
                        return false;
                    }
                }

                function ingresar()
                {
                    msg = "Problemas encontrados: <br>";
                    bander = 0;
                    inpObj = document.getElementById("txtPat");
                    if (validar_solo_letras(inpObj))
                    {
                        bander = 1;
                        msg += "Patente: datos faltantes <br>"
                    }
                    if (bander == 0) {
                        $('#alert').hide();
//                        enviar();
                    } else {

                        showAlert(msg);
                    }
                }

                function limpiar()
                {
                    $('#txtPat').val('');
                    $('#selEst').val('');
                    $('#dateFecha').val('');
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
                function enviar() {
                    nombre = $('#txtnombre').val();
                    estado = $('#slestado').val();
                    codigo = $('#codigoesp').val();

                    data = 'nombre=' + nombre + '&estado=' + estado + '&codigo=' + codigo;
                    marco = 'marcoespecialista';
                    ruta = '';
                    sendajax(marco, ruta, data);
                }

            </script>
    </head>
    <body>

        <!--        <label >haqui va el id</label >-->

        <div class="container">
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">Formulario Convenios</div>        
                    <div class="panel-body  ">
                        <!--                        <div class="row">-->
                        <div class=" form-group row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                                <label class="col-lg-5 col-md-5 col-sm-3 col-xs-12 control-label" for="txtPat" >Patente:</label>
                                <div class="col-lg-6  col-md-7 col-sm-6 col-xs-12 ">
                                    <input type="text" id="txtPat" class="form-control " pattern="[A-Za-z0-9]{5,6}"  required >
                                </div>

                            </div>

                        </div>
                        <div class=" form-group row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <label class=" col-lg-5 col-md-5 col-sm-3 col-xs-12 control-label" for="selEst">Estado Vehiculo:</label>
                                <div class="col-lg-6  col-md-7 col-sm-6 col-xs-12">
                                    <select  class="form-control"id="selEst" name="slestado">
                                        <option value=""></option>
                                        <option value="0">1 </option>
                                        <option value="1">2 </option>
                                    </select>
                                </div>
                            </div>    
                        </div>
                        <div class=" form-group row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                                <label class="col-lg-5 col-md-5 col-sm-3 col-xs-12 control-label" for="dateFecha" >Fecha:</label>
                                <div class="col-lg-6  col-md-7 col-sm-6 col-xs-12">
                                    <input type="text" id="dateFecha" class="form-control " >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-xs-6  col-sm-2 col-md-offset-3 col-xs-offset-7 col-lg-offset-3 col-sm-offset-7">
                                <div class="form-group ">   
                                    <button type="button"  class="btn btn-success " id="btn_prestacion"  data-toggle="tooltip" data-placement="right" title="Aceptar" onclick="ingresar()"><span class="	glyphicon glyphicon-ok"></span></button>
                                    <button type="button"  class="btn btn-default" id="btn_prestacion"  data-toggle="tooltip" data-placement="right" title="Aceptar" onclick="limpiar()"><span class="glyphicon glyphicon-file"></span></button>
                                </div>           
                            </div>

                        </div>
                        <div id="alert" class="col-lg-8 col-md-8 col-xs-12"></div>
                        <!--                    </div>-->
                    </div>    
                </div>    
            </div>
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-12 col-xs-12">         
                        <div class="panel-body" runat="server"  style="height: 390px;  overflow-y: scroll;">
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </body>