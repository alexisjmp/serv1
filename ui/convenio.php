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

                function ingresar_prestacion()
                {
                    msg = "Problemas encontrados: <br>";
                    bander = 0;
                    inpObj = document.getElementById("nombreesp");
                    if (validar_solo_letras(inpObj))
                    {
                        bander = 1;
                        msg += "Nombre: Debe contener solo letras <br>"
                    }
                    inpObj = document.getElementById("codigoesp");
                    if (validar_solo_letras(inpObj))
                    {
                        bander = 1;
                        msg += "Codigo: Ingrese de forma correcta  <br>";
                    }

                    if (bander == 0){
                        $('#alert').hide();
                        enviar();
                    }
                    else {

                        showAlert(msg);
                    }
                }

                function limpiar()
                {
                    $('#nombresesp').val('');
                    $('#codigoesp').val('');
                    $('#slestado').val('');
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
                function enviar(){
                    nombre = $('#txtnombre').val();
                    estado = $('#slestado').val();
                    codigo = $('#codigoesp').val();
                    
                    data ='nombre='+nombre+'&estado='+estado+'&codigo='+codigo;
                    marco ='marcoespecialista';
                    ruta ='';
                    sendajax(marco, ruta, data);
                }

            </script>
    </head>
    <body>
        
<!--        <label >haqui va el id</label >-->

        <div class="container">
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">Formulario tipo especialista</div>        
                    <div class="panel-body  ">
<!--                        <div class="row">-->
                            <div class=" form-group row">
                            <div class="col-md-4  col-xs-12 row ">
                                <label class="col-md-5 col-xs-5 control-label" for="nombre_especialista" >Nombre:</label>
                                    <div class="col-md-6 col-xs-6 row">
                                    <input type="text" id="nombreesp" class="form-control " pattern="[A-Za-z]{0,25}"  required >
                                </div>
                                <div class="col-lg-2 col-md-1 col-xs-1">
                                        <button type="button"  class="btn btn-info " data-toggle="modal" data-target="#myModal"
                                                onclick="cargar()"> <span class="glyphicon glyphicon-search small"></span></button>
                                    </div>
                            </div>
                                
                        </div>
                        <div class=" form-group row">
                        <div class="col-md-4  col-xs-12 row ">
                                    <label class=" col-md-5 col-xs-5 control-label" for="estado_especialista">Estado especialista:</label>
                                    <div class="col-md-6 col-xs-6 row">
                                        <select  class="form-control"id="slestado" name="slestado">
                                        <option value=""></option>
                                        <option value="0">1 </option>
                                        <option value="1">2 </option>
                                    </select>
                                    </div>
                        </div>    
                        </div>
                        <div class=" form-group row">
                             <div class="col-md-4  col-xs-12 row ">
                                 <label class="col-md-5 col-xs-5 control-label" for="codigo_especialista" >Codigo:</label>
                                <div class="col-md-6 col-xs-6 row">
                                    <input type="text" id="codigoesp" class="form-control " pattern="[A-Za-z0-9. _-]{0,50}"  required >
                                </div>
                             </div>
                         </div>
                        
                            <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-5  col-md-offset-4 col-xs-12">
                                <div class="form-group ">   
                                    <button type="button"  class="btn btn-success " id="btn_prestacion"  data-toggle="tooltip" data-placement="right" title="Aceptar" onclick="ingresar_prestacion()"><span class="	glyphicon glyphicon-ok"></span></button>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Listado especialista</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-lg-9 col-md-10 col-sm-9">
                                    <div  id="marcoespecialista">

                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>