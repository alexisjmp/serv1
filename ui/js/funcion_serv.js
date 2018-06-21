function sendajax(marco, ruta, data) {

    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
        }
    };
    
    xhttp.open("POST", ruta, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    
}

function AbrirVentana(pagina, parametros, nombre, pancho, palto){
	wancho = (screen.width - pancho)/2;
	walto = (screen.height - palto)/2;
	window.open(pagina+"?"+parametros,nombre,"height="+palto+",width="+pancho+",top="+walto+",left="+wancho+",toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1");
}


  function sendajax_modal(marco,ruta,data){
      
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       
      
            document.getElementById(marco).innerHTML = "";  
            document.getElementById(marco).innerHTML = this.responseText;
        }
     };
     xhttp.open("POST",ruta , true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(data); 
  }/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


