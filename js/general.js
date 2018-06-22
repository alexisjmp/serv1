
function Cargando(cont, msg){
	$("#"+cont).html('<div class="load">'+msg+'</div>');
}

function CargandoLeft(cont, msg){
	$("#"+cont).removeClass().addClass("loadLeft").html(msg).fadeIn();
}

function Nuevo(sel){
	if($(sel).children("option:selected").html() == "Nuevo"){
		entidad = $(sel).val();
		$(sel).after('<div id="dialog"></div>');
		Cargando("dialog","Cargando formulario....");
		$("#dialog").dialog({
			modal: true,
			title: entidad,
			height: 300,
			width: 700,
			close: function(){$("#dialog").remove()}
		}).load("../"+entidad+"/index.php", {funcion: "Administracion"});
		
	}
}

function crearPopUp(entidad, funcion, codigo){
	Cargando("dialog","Cargando formulario....");
		$("#dialog").dialog({
			modal: true,
			title: entidad,
			height: 300,
			width: 700,
			close: function(){$("#dialog").remove()}
		}).load(entidad+".php", {funcion: funcion, codigo: codigo});
}

function MostrarMensajeEncima(tipo, msg){
	$("body").append('<div class="msgEncima'+tipo+'"></div>');
	ob = $(".msgEncima"+tipo);
	ob.html(msg).fadeIn(200);
	setTimeout('ob.fadeOut(200,function(){ob.remove()})',3000);
}

function MostrarLoadEncima(){
	$("body").append('<div class="imgLoad"></div>');
	$(".imgLoad").fadeIn();
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


function SoloNumeros(campo){
	if($(campo).val() != "")
		$(campo).val($(campo).val().replace(/[^0-9\.]/g, ""));
}

function Ajax(url,type,parametros,id){
	Cargando(id,"");
	$.ajax({
		url: url,
		type: type,
		data: parametros,
		success: function(dat){
			$("#"+id).html(dat);
		}
	});
}

function AbrirVentana(pagina,parametros, nombre, pancho, palto){
	wancho = (screen.width - pancho)/2;
	walto = (screen.height - palto)/2;
	window.open(pagina+"?"+parametros,nombre,"height="+palto+",width="+pancho+",top="+walto+",left="+wancho+",toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1");
}

function campoFecha(campo){
	$(campo).datepicker({dateFormat: "yy-mm-dd"});
}