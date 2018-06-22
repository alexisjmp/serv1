/**
	ACTUALIZACIONES
	10/04/2012: en la funcion CambioTipoProveedor(obj) deshabilitar campo comuna

**/


var dis_btn2; dis_btn1,altoAlarmaOriginal;


function Cargando(cont, msg){
	$("#"+cont).html('<div class="load">'+msg+'</div>');
}
function Ajax1(url,type,parametros,id){
	//$("#"+id).html('<div class="msg-sistema"><div class="fnd"><div class="carga">Espere...</div></div></div>');
	//$("#msgLoad p").html("Por favor espere...");
//	$("#msgLoad").show();
	$.ajax({
		url: url,
		type: type,
		data: parametros,
		success: function(dat){
			$("#"+id).html(dat);
			setTimeout(function(){
			//	$("#msgLoad").hide();				
								},100);			
			//$("#msg-sistema").hide();
			//$("#"+id).hide().fadeIn(100);
		}
	});
}
function Ajax(url,type,parametros,id){
	//$("#"+id).html('<div class="msg-sistema"><div class="fnd"><div class="carga">Espere...</div></div></div>');
	$("#msgLoad p").html("Por favor espere...");
	$("#msgLoad").show();
	$.ajax({
		url: url,
		type: type,
		data: parametros,
		success: function(dat){
			$("#"+id).html(dat);
			setTimeout(function(){
				$("#msgLoad").hide();				
								},100);			
			//$("#msg-sistema").hide();
			//$("#"+id).hide().fadeIn(100);
		}
	});
}

function Ajax2(url,type,parametros,id, msg){
	//$("#"+id).html('<div class="msg-sistema"><div class="fnd"><div class="carga">Espere...</div></div></div>');
	$("#msgLoad p").html(msg);
	$("#msgLoad").show();
	$.ajax({
		url: url,
		type: type,
		data: parametros,
		success: function(dat){
			$("#"+id).html(dat);
			setTimeout(function(){
				$("#msgLoad").hide();				
								},100);			
			//$("#msg-sistema").hide();
			//$("#"+id).hide().fadeIn(100);
		}
	});
}

function AbrirVentana(pagina, parametros, nombre, pancho, palto){
	wancho = (screen.width - pancho)/2;
	walto = (screen.height - palto)/2;
	window.open(pagina+"?"+parametros,nombre,"height="+palto+",width="+pancho+",top="+walto+",left="+wancho+",toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1");
}

function ExportarExcel(){
	$("#datos_a_enviar").val( $("<div>").append( $("#tabRPT").eq(0).clone()).html()); 
	$("#FormularioExportacion").submit();
}

function SoloNumeros(campo){
	if($(campo).val() != "")
		$(campo).val($(campo).val().replace(/[^0-9\.]/g, ""));
}


function Load(msg){
	$("#msg-sistema .fnd").html('<div class="carga">'+msg+'</div>');
	$("#msg-sistema").fadeIn();
}

function AbrirPOPUP(ancho,alto,id, pagina, funcion, parametros){
	margin_left = -ancho /2;
	margin_top = -alto/2;
	altcontpopup = alto-20;
	$("body").append('<div id="opaco"></div><div id = "'+id+'" class="npopup"></div>');
	$("#"+id).css({'width': ancho+'px','height': alto+'px','margin-left': margin_left+'px', 'margin-top': margin_top+'px'}).append('<div id="contPOPUP"></div><div id="dvCerrar">x Cerrar</div>');
	$("#dvCerrar").attr("title","Cerrar").click(function(){
		CerrarPOPUP();
		return false;
	});
	Cargando("contPOPUP","");
	$("#contPOPUP").css({'height':altcontpopup+'px', 'overflow':'auto'});
	$.ajax({
		type: 'POST',
		url: pagina,
		data: 'funcion='+funcion+'&'+parametros,
		success: function(dat){
			$("#contPOPUP").html(dat);
		}
	});
	$("#opaco, #"+id).fadeIn();	
}
function CerrarPOPUP(){
	$("#opaco, .npopup").fadeOut(function(){$("#opaco").remove(); $(".npopup").remove()});
}

function elimArchivo(img){
	tr = $(img).parents("tr");
	nombre = tr.children("td:nth-child(1)").children("a").text();
	if(!confirm("Desea eliminar el arhivo "+nombre+" ?"))
		return false;
	//ruta = tr.children("td:nth-child(1)").children("a").attr("href");
	ruta = tr.attr("ruta");
	if($("#resultadotemparchivo").length == 0)
		$("#tabArchivo").after('<div id="resultadotemparchivo"></div>');
	$("#resultadotemparchivo").load("funciones/archivo.php", {funcion: "Eliminar", ruta: ruta},
		function(dat){
			if(dat!=0)
				tr.remove();
			else
				$("#resultadotemparchivo").html('<div style="color: red">El archivo no se ha eliminado</div>');
		});
}

function AbrirDialog(alto, ancho, titulo, url, parametros){
	$("body").append('<div id="dialog">Cargando...</div>');
	$("#dialog").dialog({
		modal: true,
		height: alto,
		width: ancho,
		title: titulo,
		close: function(){$("#dialog").remove()}
	});
	$.ajax({
		url: url,
		type: "POST",
		data: parametros,
		success: function(data){
			$("#dialog").html(data);
		}
	});
}


function AbrirDialog2(titulo, url, parametros){
	var ancho = screen.width * 0.6;
	var alto = screen.height * 0.6;
	$("body").append('<div id="dialog">Cargando...</div>');
	$("#dialog").dialog({
		modal: true,
		height: alto,
		width: ancho,
		title: titulo,
		close: function(){$("#dialog").remove()}
	});
	$.ajax({
		url: url,
		type: "POST",
		data: parametros,
		success: function(data){
			$("#dialog").css("background-color","#F9F9F9").html(data);
		}
	});
}


function AbrirDialogNoModal(alto, ancho, titulo, url, parametros){
	if($("#dialog1").length > 0) return false;
	$("body").append('<div id="dialog1">Cargando...</div>');
	$("#dialog1").dialog({
		modal: false,
		height: alto,
		width: ancho,
		title: titulo,
		close: function(){$("#dialog1").remove()}
	});
	$.ajax({
		url: url,
		type: "POST",
		data: parametros,
		success: function(data){
			$("#dialog1").html(data);
		}
	});
}


function ValidarEmail(campo){
	var id = $(campo).attr("id");
	if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(campo).val())){
		return true;
	}
	else{
		alert("El Email ingresado no es valido");
		setTimeout('$("#'+id+'").focus()',75);
		return false;
	}
}

function verSOCOMAT(id_solicitud,id_empresa){
	AbrirVentana("Informes/socomat.php", "id_solicitud="+id_solicitud+"&id_empresa="+id_empresa, "SOCOMAT", 700, 500);
}

function VistaOC(codigo_oc, id_empresa){
	var parametros = 'codigo_oc='+codigo_oc+'&id_empresa='+id_empresa;
	AbrirVentana("Informes/oc.php", parametros, "Orden_de_Compra", 600, 500);
}

function Numero(num){
	var num = String(num);
    num = num.replace(/\./g,'');
    if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    //input.value = num;
	return num;
    }  
}

function Numero_(obj){
	var num = $(obj).val();
    num = num.replace(/\./g,'');
    if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    //input.value = num;
	$(obj).val(num);
    }  
}


function xNumero_(obj){
	var num = $(obj).val();
	num = num.replace(/\./g,'');
	$(obj).val(num);
}

/*function xNumero(num){
	var num = String(num);
	num = num.replace(/\./g,'');		
	return num;
}
*/

function VerOCNav(obj, codigo_oc, id_empresa, nombre_empresa, div_contenedor){
	var parametros = 'funcion=VerOC&codigo_oc='+codigo_oc+'&id_empresa='+id_empresa+'&nombre_empresa='+nombre_empresa+'&div_contenedor='+div_contenedor;
	Ajax("funciones/sis_oc.php","POST",parametros, div_contenedor);
}

function ReporteRecepcionItem(codigo_oc, id_empresa, id_tipo_documento, nro_documento){
	var parametros = 'funcion=GenerarReporte&codigo_oc='+codigo_oc+'&id_empresa='+id_empresa+'&nro_documento='+nro_documento+'&id_tipo_documento='+id_tipo_documento;
	AbrirVentana("Informes/rpt_recepcion.php", parametros, "Recepcion_OC", 600, 500);
}

function VerSolicitudNav(obj, id_solicitud,id_empresa,div_contenedor){
	var parametros = 'funcion=VerSolicitud&id_solicitud='+id_solicitud+'&id_empresa='+id_empresa+'&div_contenedor='+div_contenedor;
	Ajax("funciones/sistema.php","POST",parametros, div_contenedor);
}

function AbrirDocAdjunto(ruta){
	window.open(ruta);
}

function DeshabilitarRegistro(obj){
	var tr = $(obj).parents("tr");
	if($(obj).attr("checked") == 'checked'){
		tr.addClass("regDeshabilitado");
	}
	else
		tr.removeClass();
		
}

function CambioTipoProveedor(obj){
	if($(obj).val() == 2){
		$("#txtRut, #txtComuna").attr("obligatorio", "no").attr("disabled", "disabled");		
		
	}
	else{
		$("#txtRut, #txtComuna").attr("obligatorio", "si").removeAttr("disabled");
		$("#txtPais").val("Chile");
	}
}

function currency(value, decimals, separators) { //['.', "'", ',']
    decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
    separators = separators || ['.', ".", ','];
    var number = (parseFloat(value) || 0).toFixed(decimals);
    if (number.length <= (4 + decimals))
        return number.replace('.', separators[separators.length - 1]);
    var parts = number.split(/[-.]/);
    value = parts[parts.length > 1 ? parts.length - 2 : 0];
    var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
        separators[separators.length - 1] + parts[parts.length - 1] : '');
    var start = value.length - 6;
    var idx = 0;
    while (start > -3) {
        result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
            + separators[idx] + result;
        idx = (++idx) % 2;
        start -= 3;
    }
    return (parts.length == 3 ? '-' : '') + result;
}

function FormatoNumero(obj){ //formato precio unitario de OC y otros
	var valor = $(obj).val();
	var num = xNumero(valor);
	$(obj).val(currency(num,5,['.', ".", ',']));
}

function xNumero(num){
	var num = String(num);
	num = num.replace(/\./g,"");
	num = num.replace(/\'/g,"");
	num = num.replace(/\,/g,".");
	return num;
}
function replaceAll1( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}
function xNumero_(obj){
	var num = $(obj).val();
	$(obj).val(xNumero(num));
}

function EnviarNotificaciones(funcion, parametros){
	$("#notify_email").show();
	$.ajax({
		url: "funciones/email.php",
		type: "POST",
		data: "funcion="+funcion+"&"+parametros,
		success: function(dat){
			//$("#notify_email").html(dat);
			$("#notify_email").hide();
		}
	});
}

function Imprimir(id_contenido){
	var vent = window.open('','rpt');
	vent.document.write($("#"+id_contenido).html());
	vent.print();
	vent.close();
}

function CentrarOBJ(obj,h,v){ //obj = # o . (id o clase)
	if(h == 'H'){
		var margin_left = -Number($(obj).width()/2);
		$(obj).css({"left":"50%", "margin-left": margin_left+"px"});
	}
	if(v == 'V'){
		var margin_top = -Number(-$(obj).outerHeight(true)/2);
		$(obj).css({"top":"50%", "margin-top:": margin_top+"px"});
	}
}

function OcultarAlarma(obj){
	var sp = $(obj).parents('div');		
	dis_btn2 = 'inline-block';
	dis_btn1 = 'none';
	altoAlarmaOriginal = sp.height();
	sp.animate({ height: '12px'}, 500, function(){
									$("#btnOM1").hide();
									$("#btnOM2").show();
												});
}

function MostrarAlarma(obj){
	var sp = $(obj).parents('div');		
	dis_btn1 = 'inline-block';
	dis_btn2 = 'none';
	sp.animate({ height: altoAlarmaOriginal+'px'}, 500, function(){
									$("#btnOM1").show();
									$("#btnOM2").hide();
												});
}

function addslashes(str) 
{
	str=str.replace(/\\/g,'\\\\');
	str=str.replace(/\'/g,'\\\'');
	str=str.replace(/\"/g,'\"');
	str=str.replace(/\0/g,'\\0');
	return str;
}

function stripslashes(str) 
{
	str=str.replace(/\\'/g,'\'');
	str=str.replace(/\\"/g,'"');
	str=str.replace(/\\0/g,'\0');
	str=str.replace(/\\\\/g,'\\');
	return str;
}

function ActualizarTotales(obj, moneda, tipo_oc){
	FormatoNumero(obj);
	var ssubtotal = 0;
	var i=0;
	$("#tabItemOC tbody tr").each(function(){
		if(i>0){
			cantidad = xNumero($(this).children("td:nth-child(3)").find("span").text());
			//cantidad = xNumero($(this).children("td:nth-child(3)").find("input:text").val());
			pprecio = xNumero($(this).children("td:nth-child(5)").find("input:text").val());
			subtotal = cantidad * pprecio;	
			ssubtotal += subtotal;	
			if(moneda == 1)
				$(this).children("td:nth-child(6)").text(currency(subtotal,0));		
			else
				$(this).children("td:nth-child(6)").text(currency(subtotal,2));		
		}
		i++;
	});
	if(moneda == 1)
		$("#tdSubtotal").text(currency(ssubtotal,0));
	else
		$("#tdSubtotal").text(currency(ssubtotal,2));
		
	if($("#tdDescuento").length > 0){	
		var dscto = new String;
		dscto = $("#tdDescuento").text();
		dscto = dscto.replace("%","");		
		dscto = xNumero(dscto);
	}
	else dscto = 0;
	
	
	
	neto = ssubtotal-(ssubtotal*(dscto/100));
	if(moneda == 1)
		$("#tdNeto").text(currency(neto,0));
	else
		$("#tdNeto").text(currency(neto,2));
	impuesto = neto*0.19;
	if(tipo_oc == 1){
		if(moneda == 1)
			$("#tdImpuesto").text(currency(impuesto, 0));
		else	
			$("#tdImpuesto").text(currency(impuesto, 2));
	}
	else
	impuesto = 0;
	total = neto+impuesto;
	if(moneda == 1)
		$("#tdTotal").text(currency(total,0));
	else
		$("#tdTotal").text(currency(total,2));
}

function AbrirDetalleCostoSocomat(codigo_solicitud, id_empresa){
	AbrirDialog2("Detalle costo Socomat N&deg;: "+codigo_solicitud, "funciones/sistema.php", "funcion=DetalleSocomat&codigo_solicitud="+codigo_solicitud+"&id_empresa="+id_empresa);
}


function VerOCF(codigo_oc, id_empresa){
	var w = $(document).width()*0.9;
	var h = $(document).height()*0.9;
	$("#big_dialog").dialog({
		"width": w,
		"height": h,
		"modal": true,
		"title": "OC: "+codigo_oc
	}).css("background-color", "rgba(255,255,255,1)").load("funciones/sis_oc.php", {funcion: "VerOC", codigo_oc: codigo_oc, id_empresa: id_empresa});
}

