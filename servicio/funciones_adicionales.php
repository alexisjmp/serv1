<?php

function aseguradora($cod_aseguradora){
    switch ($cod_aseguradora) {
    			     case 1 :  $aseguradora ="Banmedica"; break; 
                             case 2 :  $aseguradora ="Chuquicamata"; break;
                             case 3 :  $aseguradora ="Colmena Golden Cross"; break; 
                             case 4 :  $aseguradora ="Consalud" ; break;
                             case 5 :  $aseguradora ="Cruz Blanca"; break;
                             case 6 :  $aseguradora ="Vida"; break; 
                             case 7 :  $aseguradora ="Fonasa"; break; 
                             case 8 :  $aseguradora ="IST"; break; 
                             case 9 :  $aseguradora ="ACHS"; break; 
                             case 10 :  $aseguradora ="MUTUAL"; break; 
                             case 11 :  $aseguradora ="Capredena"; break; 
                             case 12 :  $aseguradora ="Dipreca"; break;
    }
    return $aseguradora;
}
function calculaedad($birthDate){
    //$birthDate = "12/17/1983";
  //                17/12/1739
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
 // echo "Age is:" . $age;
  return $age;
}
function estado($estados){
    
     if($estados == 0)
       $estado = "anulado";
    else if($estados == 1)
        $estado = "pre-ingreso";
    else if($estados == 2)
        $estado= "atencion";
    else if($estados == 3)
        $estado = "control";
    else if($estados == 4)
        $estado = "alta A";
    else if($estados == 5)
        $estado = "alta M";
    return $estado;
}
function especialista($tipo_especialista)      {
    if($tipo_especialista == 1)
        $especialista = "Psiquiatra";
    else if($tipo_especialista == 2)
        $especialista = "Psicologo";
    else if($tipo_especialista == 3)
        $especialista = "Medico";
    else if($tipo_especialista == 4)
        $especialista = "Triada";
     else if($tipo_especialista == 5)
        $especialista = "Esp.1";
    return $especialista;
} 
function evento($evento)      {
    if($evento == 1)
        $atencion = "nuevo";
    else if($evento == 2)
        $atencion = "actualiza";
    
    return $atencion;
} 
function actividad($entidad, $actividad)      {
 if($entidad == 'atencion') {  
    if($actividad == 1)
        $actividad = "evolucion";
    else if($actividad == 2)
        $actividad = "iclinico";
     else if($actividad == 3)
        $actividad = "tratamiento";
   
 } 
  if($entidad == 'licencia_medica') {  
       $actividad = "fecha";
  }      
   if($entidad == 'antecedente') {  
     if($actividad == 1)
        $actividad = "laboral";
     else if($actividad == 2)
        $actividad = "afectiva";
     else if($actividad == 3)
        $actividad = "familiar";
     else if($actividad == 4)
        $actividad = "paciente";
  } 
   if($entidad == 'examen') {  
     if($actividad == 1)
        $actividad = "mental";
     else if($actividad == 2)
        $actividad = "actitud";
     else if($actividad == 3)
        $actividad = "Psicomotilidad";
     else if($actividad == 4)
        $actividad = "Orientación";
      else if($actividad == 5)
        $actividad = "lenguaje";
      else if($actividad == 6)
        $actividad = "";
      else if($actividad == 7 )
        $actividad = "Pensamiento";
      else if($actividad == 8)
        $actividad = "afectividad";
      else if($actividad == 9)
        $actividad = "percepcion";
      else if($actividad == 10)
        $actividad = "Inteligencia";
      else if($actividad == 11)
        $actividad = "Conciencia";
  } 
   if($entidad == 'diagnostico') {  
     if($actividad == 1)
        $actividad = "eje1";
     else if($actividad == 2)
        $actividad = "eje2";
     else if($actividad == 3)
        $actividad = "eje3";
     else if($actividad == 4)
        $actividad = "eje4";
     else if($actividad == 5)
        $actividad = "eje5";
  } 
   return $actividad;
} 
function atencion($tipo_atencion)      {
    if($tipo_atencion == 1)
        $atencion = "Ingreso";
    else if($tipo_atencion == 2)
        $atencion = "Control";
    
    return $atencion;
} 
function confirma($confirma)      {
    if($confirma)
        $confirma = "si";
    else 
        $confirma = "no";
    
    return $confirma;
} 
function sexo($confirma)      {
    if($confirma == 1)
        $confirma = "M";
    else if($confirma == 2) 
        $confirma = "F";
    
    return $confirma;
} 
function prestacion($tipo_prestacion)      {
    if($tipo_prestacion == 1){
       $prestacion = "ingreso";
       
    }else if($tipo_prestacion == 2 ){
        $prestacion = "Ctl.dual1";
       
    }else if( $tipo_prestacion == 23){
        $prestacion = "Ctrl.dual2";
       
    }else if($tipo_prestacion == 3){
        $prestacion = "Psicoterapia";
       
    }else if($tipo_prestacion == 4){
        $prestacion = "Ter.pareja";
       
    }else if($tipo_prestacion == 5){
        $prestacion = "Ctrl.Psiquiatra";
     
    }else if($tipo_prestacion == 6){
        $prestacion = "Med.General";
     
    
    }else if($tipo_prestacion == 7){
        $prestacion = "atencion";
     
    } 
    return $prestacion;
}
function prestacionvalor($tipo_prestacion)      {
    if($tipo_prestacion == 1){
       
       $valor = 60000;
    }else if($tipo_prestacion == 2 || $tipo_prestacion == 23){
       
        $valor = 60000;
    }
    else if($tipo_prestacion == 3){
       
        $valor = 30000;
    }else if($tipo_prestacion == 4){
       
        $valor = 40000;
    }else if($tipo_prestacion == 5){
       
        $valor = 60000;
    }else if($tipo_prestacion == 6){
       
        $valor = 30000;
    
    }else if($tipo_prestacion == 7){
       
        $valor = 30000;
    }  
    return $valor;
} 

function GenerarTabla_old($id,$clase, $sql){
	$arrCampos = obtCamposSQL($sql);
	?>
	<table id="<?php echo $id?>" class="<?php echo $clase?>"><tr class="cabecera">    
	<?php
	for($i=0;$i<count($arrCampos);$i++){
		echo '<td>'.$arrCampos[$i].'</td>';
	}
	?>
	<!--<td>MODIFICAR</td>
    <td>ELIMINAR</td>-->
	</tr>
    <tbody>
    <?php
	while($datos = mysql_fetch_array($sql)){
		echo '<tr>';
		for($i=0;$i<count($arrCampos);$i++){
			if($arrCampos[$i] == "PASSWORD")
				echo '<td>'.substr_replace($datos[$i],'*****',0,strlen($datos[$i])).'</td>';
			else
				echo '<td>'.$datos[$i].'</td>';
		}
		echo '
		
		</tr>';
/*		<td align = "center"><img class="btnEdicion" src="../../IMG/layout_edit.png" title="Modificar" /></td>
		<td align = "center"><img class="btnEdicion" src="../../IMG/cross.png" title="Eliminar" /></td>*/
	}
	echo '</tbody></table>';
}




function ComprobarSQL($sql){
	if($sql){
		echo '<div class="msgCorrecto">Operaci&oacute;n realizada correctamente</div>';
	}
	else
		echo '<div class="msgError">Ha ocurrido un error inesperado, por favor reintente.</div>';
	//exit();
}

function obtCamposSQl($sql){
	$ncampos = mysql_num_fields($sql);
	for($i=0;$i<$ncampos;$i++)
		$arrCampos[] = mysql_field_name($sql,$i);
	return $arrCampos;
}

function cambiaf_a_normal($fecha){
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}
//Convierte fecha de normal a mysql

function cambiaf_a_mysql($fecha){
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
}

function ImprimirFechaCompleta($fecha)
    {
    $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo
    $diasemana=date("w", $fecha);// optiene el n�mero del dia de la semana. El 0 es domingo
       switch ($diasemana)
       {
       case "0":
          $diasemana="Domingo";
          break;
       case "1":
          $diasemana="Lunes";
          break;
       case "2":
          $diasemana="Martes";
          break;
       case "3":
          $diasemana="Mi&eacute;rcoles";
          break;
       case "4":
          $diasemana="Jueves";
          break;
       case "5":
          $diasemana="Viernes";
          break;
       case "6":
          $diasemana="S&aacute;bado";
          break;
       }
    $dia=date("d",$fecha); // d�a del mes en n�mero
    $mes=date("m",$fecha); // n�mero del mes de 01 a 12
       switch($mes)
       {
       case "01":
          $mes="Enero";
          break;
       case "02":
          $mes="Febrero";
          break;
       case "03":
          $mes="Marzo";
          break;
       case "04":
          $mes="Abril";
          break;
       case "05":
          $mes="Mayo";
          break;
       case "06":
          $mes="Junio";
          break;
       case "07":
          $mes="Julio";
          break;
       case "08":
          $mes="Agosto";
          break;
       case "09":
          $mes="Septiembre";
          break;
       case "10":
          $mes="Octubre";
          break;
       case "11":
          $mes="Noviembre";
          break;
       case "12":
          $mes="Diciembre";
          break;
       }
    $ano=date("Y",$fecha); // optenemos el a�o en formato 4 digitos
    $fecha= $diasemana.", ".$dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena
    return $fecha; //enviamos la fecha al programa
    } 
	
function obtenerTurno($hora){
	if($hora >= '08:00' and $hora < '16:00') return 'A';
	if($hora >= '16:00' and $hora <= '23:59') return 'B';
	if($hora >= '00:00' and $hora < '08:00') return 'C';
}


function obtenerSaldoOTProducto($ot,$codproducto){
	global $mysql;
	$sql = $mysql->consulta("select cantidad from item_ot where ot = $ot and producto = $codproducto");
	$cant_ot = mysql_fetch_array($sql);
	$cant_ot = $cant_ot[0];
	$sql = $mysql->consulta("select sum(cantidad) from produccion where ot = $ot and producto = $codproducto");
	$cant_ppt = mysql_fetch_array($sql);
	$cant_ppt = $cant_ppt[0];
	return $cant_ot-$cant_ppt;
}

function Numero($num){
	//if(is_float($num))
	$dec = $num - intval($num);
	if($dec > 0) return number_format($num,4,',','.');	
	else return number_format($num,0,',','.');	
	//else
		//return number_format($num,0,',','.');
}

function Numero0($num){
	//if(is_float($num))
		return number_format($num,0,',','.');	
	//else
		//return number_format($num,0,',','.');
}


function jsEliminarBotonEdicion($id){ //eliminar las columnas Modificar y Eliminar
	?>
	<script>
    	$("#<?php echo $id?> tr").each(function(){
			$(this).children("td:contains('MODIFICAR')").remove();
			$(this).children("td:contains('ELIMINAR')").remove();
			$(this).find("img").parent().remove();
		});
    </script>
	<?php
}

function ImprimirMensaje($msg, $clase){ //clase: correcto
	//echo '<div class="'.$clase.'">'.$msg.'</div>';
	?>
	<script>
		$("#msgTemp p").html('<?php echo $msg?>');
		var x = $("#msgTemp").outerWidth(true);
		var y = $("#msgTemp").outerHeight(true);
		var left = ($(document).width()/2)-(x/2);
		var top = ($(document).height()/2)-(y/2);
		var y = $("#msgTemp").height();
		$("#msgTemp").css({"left": left+"px", "top": top+"px"});
		
		$("#msgTemp").fadeIn();
		setTimeout(
		function(){
			$("#msgTemp").fadeOut();					
		},2000);				   
    </script>
	<?php
}

function MostrarMensaje($clase, $msg, $ocultar){ //clases: msg-ok, msg-exclamacion, .error_centrado
	?>
	<div id="msgTemp" class="<?php echo $clase?>"><?php echo $msg?></div>
    <?php
    if($ocultar == false)
		return false;
	?>
    <script>		
    	setTimeout('$("#msgTemp").fadeOut(function(){$("#msgTemp").remove();});',2000);
    </script>
	<?php
}

function Ajax($url,$type,$parametros,$id){
	?>
	<script>
    	Ajax("<?php echo $url?>","<?php echo $type?>","<?php echo $parametros?>","<?php echo $id?>");
    </script>
	<?php
	
}

function CerrarDialog($milisegundos){
	?>
	<script>
    	setTimeout(function(){
			$("#dialog").dialog("close");			
		},<?php echo $milisegundos?>);
    </script>
	<?php
}

function xNumero($num){
	$num = str_replace('.','',$num);
	$num = str_replace('$','',$num);
	return $num;
}

function MensajeEncima($tipo,$msg){
	?>
	<script>
    	MostrarMensajeEncima("<?php echo $tipo?>", "<?php echo $msg?>");
    </script>
	<?php
}

function AbrirPOPUP($ancho,$alto,$id, $pagina, $funcion, $parametros){
	?>
	<script>
    	AbrirPOPUP(<?php echo $ancho ?>,<?php echo $alto ?>,"<?php echo $id ?>", "<?php echo $pagina ?>", "<?php echo $funcion ?>", "<?php echo $parametros ?>");
    </script>
	<?php
}


function obtenerUltimoEstadoOT($ot){
	global $mysql;
	$sql = $mysql->consulta("select estado from estado_ot where ot = '$ot' order by fecha desc limit 1");
	$datos = mysql_fetch_array($sql);
	return $datos[0];
}

function AgregarColumnaEnTabla($idTabla,$nombre_cabecera,$posicion,$datos){
	?>
	<script>
    	$("#<?php echo $idTabla?> tr.cabecera td:nth-child(<?php echo $posicion?>)").after('<td><?php echo $nombre_cabecera?></td>');		
    </script>
	<?php
	for($i=0;$i<count($datos);$i++){
		?>
		<script>
        	$("#<?php echo $idTabla?> tbody tr:nth-child(<?php echo $i+2?>) td:nth-child(<?php echo $posicion?>)").after('<td><?php echo $datos[$i]?></td>');
        </script>
		<?php
	}
}

function Redireccionar($pagina){
	?>
	<script>
    	window.location = "<?php echo $pagina?>";
    </script>
	<?php
}

function OcultarLoad(){
	?>
	<script>
    	$("#cargandoLoad").hide();
    </script>
	<?php
}

function ActivarEnlace($enlace, $clase){
	?>
	<script>
    	$(".<?php echo $clase?>").removeClass('<?php echo $clase?>');
		$("a[href=<?php echo $enlace?>]").addClass('<?php echo $clase?>');
    </script>
	<?php
}
// no funcino debe estar obsoleta
function elimina_acentos($cadena){
	$tofind = "�����������������������������������������������������";
	$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return(strtr($cadena,$tofind,$replac));
}



function MostrarInfoUsuarioGestor($tipo_campo, $estado, $id_usuario_gestor, $usuario_gestor){
	if($estado != 5 && $estado != 6 && $estado != 9 && $estado != 10){		
		return '';
	}		
	if($tipo_campo == 'cabecera'){
		$tr = '<td>GESTOR</td>';
	}
	else
		$tr = '<td id_usuario="'.$id_usuario_gestor.'">'.ucwords($usuario_gestor).'</td>';
	return $tr;
}

function MostrarAccionEditar($tipo_campo, $estado){
	if($estado!=1)
		return '';
	if($tipo_campo == 'cabecera')
		$tr = '<td>EDITAR</td>';
	else
		$tr = '<td align="center"><img src="img/blue-document--pencil.png" title="Modificar Socomat" style="cursor:pointer" onclick="Editar(this)" /></td>';
	return $tr;
}

function MostrarAccionAnular($tipo_campo, $estado){
	if($estado!=1)
		return '';
	if($tipo_campo == 'cabecera')
		$tr = '<td>ANULAR</td>';
	else
		$tr = '<td align="center"><img src="img/cross.png" title="Anular Socomat" style="cursor:pointer" onclick="Eliminar(this)" /></td>';
	return $tr;
}
function MostrarAccionEnviar($tipo_campo,$id_solicitud, $id_empresa, $estado){
	if($estado!=1)
		return '';
	if($tipo_campo == 'cabecera')
		$tr = '<td>ENVIAR</td>';
	else
		$tr = '<td align="center"><img src="img/enviar.png" title="Enviar Socomat" style="cursor:pointer" onclick="Enviar(\''.$id_solicitud.'\',\''.$id_empresa.'\')" /></td>';
	return $tr;
}


function ImprimirMensajePlano($msg, $clase){
	?>
	<div class="<?php echo $clase?>"><?php echo $msg?></div>
	<?php
}

function select_empresas($id_empresa){
	$emp = new Empresa();
	$emp->listarEmpresa();
	echo '<select obligatorio="no" campo="empresa" id="slEmpresa">
	<option value=""></option>
	';
	
	for($i=0;$i<count($emp->empresa);$i++){
		if($id_empresa==$emp->empresa[$i]['id']) $selected = ' selected = "selected" ';		
		else $selected = '';
			echo '<option '.$selected.' value="'.$emp->empresa[$i]['id'].'">'.ucwords($emp->empresa[$i]['razon_social']).'</option>';
	}
	echo '</select>';
}

function select_empresas_2($id_empresa){
	$emp = new Empresa();
	$emp->listarEmpresa();
	echo '<select obligatorio="si" campo="empresa" id="slEmpresa">';
	for($i=0;$i<count($emp->empresa);$i++){
		if($id_empresa==$emp->empresa[$i]['id']) $selected = ' selected = "selected" ';		
		else $selected = '';
			echo '<option '.$selected.' value="'.$emp->empresa[$i]['id'].'">'.ucwords($emp->empresa[$i]['razon_social']).'</option>';
	}
	echo '</select>';
}

function select_empresas_3($id, $busc){
	$emp = new Empresa();
	$emp->listarEmpresa();
	echo '<select obligatorio="si" campo="empresa" id="'.$id.'">';
	for($i=0;$i<count($emp->empresa);$i++){
		if($busc==$emp->empresa[$i]['id']) $selected = ' selected = "selected" ';		
		else $selected = '';
			echo '<option '.$selected.' value="'.$emp->empresa[$i]['id'].'">'.ucwords($emp->empresa[$i]['razon_social']).'</option>';
	}
	echo '</select>';
}

function select_documento($id_documento){
	$obj = new Documento_OC();
	$obj->Listar();
	$select = '<select id="slDocumento">';
	for($i=0;$i<count($obj->arrDocumento);$i++){
		if($id_documento == $obj->arrDocumento[$i]['id']) $selected = ' selected = "selected" ';
		else $selected = '';
		$select .= '<option '.$selected.' value="'.$obj->arrDocumento[$i]['id'].'">'.ucwords($obj->arrDocumento[$i]['nombre']).'</option>';
	}
	$select .= '</select>';
	return $select;
}

function select_modo_recepcion($id_modo){
	$obj = new Recepcion();
	$obj->ListarModo();
	$select = '<select id="slModo">';
	$selected = '';
	for($i=0;$i<count($obj->modo);$i++){
		if($id_modo == $obj->modo[$i]['id']) $selected = 'selected = "selected"';
		else $selected = '';
		$select .= '<option '.$selected.' value="'.$obj->modo[$i]['id'].'">'.ucwords($obj->modo[$i]['nombre']).'</option>';
	}
	$select .= '</select>';
	return $select;
}



function actualizar_pagina($attr, $valor){
	?>
		<script>
        	$("a[<?php echo $attr?>=<?php echo $valor?>]").click();
        </script>
	<?php
}

function select_tipo_usuario($id){
	$us = new Usuario();
	$us->ListarTipoUsuario();
	$select = '<select obligatorio="si" campo="tipo_usuario" name="Tipo Usuario" id="slTipoUsuario">';
	if($id=='')
		$select .= '<option></option>';
	for($i=0;$i<count($us->list_tipo_usuario);$i++){
		if($us->list_tipo_usuario[$i]['id'] == $id) $selected = 'selected = "selected"';
		else $selected = '';
		$select .= '<option '.$selected.' value="'.$us->list_tipo_usuario[$i]['id'].'">'.ucwords($us->list_tipo_usuario[$i]['nombre']).'</option>';
	}
	
	$select .= '</select>';
	return $select;
}

function select_cargo_usuario($id){
	$us = new Usuario();
	$us->ListarCargoUsuario();
	$select = '<select obligatorio="si" campo="cargo" name="Cargo" id="slCargoUsuario">';
	if($id=='')
		$select .= '<option></option>';
	for($i=0;$i<count($us->list_cargo_usuario);$i++){
		if($us->list_cargo_usuario[$i]['id'] == $id) $selected = 'selected = "selected"';
		else $selected = '';
		$select .= '<option '.$selected.' value="'.$us->list_cargo_usuario[$i]['id'].'">'.ucwords($us->list_cargo_usuario[$i]['nombre']).'</option>';
	}
	
	$select .= '</select>';
	return $select;
}

function select_usuarios($id){
	$us = new Usuario();
	$info_usuario = $us->ListarUsuario();
	$select = "<select id='slUsuario' campo='usuario'>";
	if($id == '')
		$select .= '<option></option>';
	for($i=0;$i<count($info_usuario['id']);$i++){
		if($id == $info_usuario['id'][$i])
			$selected = 'selected = "selected"';
		else $selected = '';
		$select .= '<option value="'.$info_usuario['id'][$i].'">'.ucwords($info_usuario['nombre'][$i]).'</option>';
	}
	
	$select .= '</select>';
	return $select;
}

function select_tipo_pago($id){
	$obj = new TipoPago();
	$datos = $obj->ListarTipoPagos();
	$select = "<select id='slTipoPago'>";
	if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'">'.$datos['nombre'][$i].'</option>';
	}
	$select .= '</select>';
	return $select;
}

function select_departamento($id){
	$obj = new Departamento();
	$datos = $obj->ListarDepartamentos();
	$select = "<select id='slDepartamento' campo='departamento'>";
	if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'">'.ucwords($datos['nombre'][$i]).'</option>';
	}
	$select .= '</select>';
	return $select;
}

function select_condicion($id){
	$obj = new Condicion();
	$datos = $obj->ListarCondicion();
	$select = "<select id='slCondicion' campo='condicion'>";
	if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'">'.ucwords($datos['nombre'][$i]).'</option>';
	}
	$select .= '</select>';
	return $select;
}

function select_tipo_comprobante($id){
	$obj = new Comprobante();
	$datos = $obj->ListarTipoComprobante();
	$select = "<select id='slTipoComprobante'>";
	//if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'">'.ucwords($datos['nombre'][$i]).'</option>';
	}
	$select .= '</select>';
	return $select;
}

function CrearArrayConsulta($sql){
	unset($info);
	$reg = mysql_num_rows($sql);
	if($reg == 0) return false;
	for($i=0;$i<mysql_num_fields($sql);$i++){
		$campos[] = mysql_field_name($sql,$i);
	}
	
	while($datos = mysql_fetch_array($sql)){
		for($i=0;$i<count($campos);$i++){
			$info[$campos[$i]][] = $datos[$campos[$i]];
		}
	}
	
	return $info;
}

function select_simbolo_descuento($id){
	$obj = new Moneda();
	$datos = $obj->ListaSimboloDescuento();
	$select = "<select id='slSimboloDescuento'>";
	//if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'" valor="'.$datos['valor'][$i].'">'.ucwords($datos['simbolo'][$i]).'</option>';
	}
	$select .= '</select>';
	return $select;
}

function select_usuario_por_tipo($tipo, $id){
	$obj = new Usuario();
	$datos = $obj->BuscarTipoUsuario2($tipo);
	$select = "<select>";
	//if($id == '') $select .= '<option></option>';
	for($i=0;$i<count($datos['id']);$i++){
		if($id == $datos['id'][$i])
			$selected = 'selected = "selected"';
		else
			$selected = '';
		$select .= '<option '.$selected.' value="'.$datos['id'][$i].'">'.ucwords($datos['nombre'][$i]).'</option>';
	}
	$select .= '</select>';
	return $select;
}



function seguridad(){	
	if(!isset($_SESSION['usuario']) || $_SESSION['usuario']==""){
		session_unset();
		session_destroy();
		?>
		<script>
			alert("Su Sesi\u00f3n <?php echo $_SESSION['usuario']?> ha terminado, por favor vuelva identificarse.");
			window.location = "inicio.php";
		</script>
		<?php
	}
}

function encoded($ses) 
{    
  $sesencoded = $ses; 
  $num = mt_rand(4,4); 
  for($i=1;$i<=$num;$i++) 
  { 
     $sesencoded = 
     base64_encode($sesencoded); 
  } 
  
  $alpha_array = 
  array('Y','D','U','R','P', 
  'S','B','M','A','T','H'); 
  $sesencoded = 
  $sesencoded."+".$alpha_array[$num]; 
  $sesencoded = 
  base64_encode($sesencoded); 
  return $sesencoded; 
}//end of encoded function 

function decoded($str) 
{ 
   $alpha_array = 
   array('Y','D','U','R','P', 
   'S','B','M','A','T','H'); 
   $decoded = 
    base64_decode($str); 
   list($decoded,$letter) = 
   split("\+",$decoded); 
   for($i=0;$i<count($alpha_array);$i++) 
   { 
   if($alpha_array[$i] == $letter) 
   break; 
   } 
   for($j=1;$j<=$i;$j++) 
   { 
      $decoded = 
       base64_decode($decoded); 
   } 
   return $decoded; 
}//end of decoded function 


function alert($msg){
	?>
	<script>
    	alert("<?php echo $msg?>");
    </script>
	<?php
}

function EnviarNotificaciones($funcion,$data){
	?>
	<script>
    	EnviarNotificaciones('<?php echo $funcion?>','<?php echo $data?>');
    </script>
	<?php
}

function MsgBox($clase, $msg, $ocultar){
	?>
	<div id="msgtemp1" class="msgbox_temp">
    	<div class="<?php echo $clase?>"><p><?php echo $msg?></p></div>
    </div>
	<?php
}

function AbrirDialog($titulo, $tipo, $msg){ //error, ok
	?>
    <div id="msgdialog1" class="msg_dialog" title="<?php echo $titulo?>">
    	<p class="<?php echo $tipo?>"><?php echo $msg?></p>
    </div>
	<script>
    	$("#msgdialog1").dialog({
			modal: true,
			buttons: {
				Aceptar: function(){
					$(this).dialog("close");
					}
			},
			close: function(){
				$("#msgdialog1").remove();
				}
		});
    </script>
	<?php
}


function FormatEstado($estado, $color){
	return '
	<span style="background-color: '.$color.'; color: white; padding:3px; font-weight:bold; -moz-border-radius:5px; border-radius:5px;">'.$estado.'</span>
	';
}

function FormatoNumero($num,$tipo_oc){ //formato precio unitario para OC internacion y nacional
	if($tipo_oc == 2){
		//return number_format($num,3,',','.');
		return number_format($num,5,'.',',');
	}
	else
		//return number_format($num,0,',','.');
		return number_format($num,2,',','.');
}   


?>
