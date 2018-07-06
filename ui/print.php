<HTML>
<HEAD>
    <link rel="stylesheet" href="pruebaTamanoHoja.css"></link>
    <style>.lower-alpha:nth-of-type() { page-break-inside: avoid; }</style>
<SCRIPT language="javascript">
    /*
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ;
}
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=s HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}*/
  function imprSelec(nombre)
 
  {
  
  ////////fdsafdsa
  var ficha = document.getElementById(nombre);
 
  var ventimp = window.open(' ', 'popimpr');
 
  ventimp.document.write( ficha.innerHTML );
 
  ventimp.document.close();
 
  ventimp.print( );
 
  ventimp.close();
 
  } 
</SCRIPT>
</HEAD>
<BODY>
    <li><button class="btn btn-default" onclick="imprSelec('Imprime');">cerrar sesion</button></li>
    <div id="Imprime" style="display:inline">
    <h1> Lavado MyM Ltda.</h1>
    <p>progesivo </p>
    <p>entadra </p>
    <p>salida </p>
    <p>placa </p>
    <p>importe </p>
    </div>  
</BODY>
</HTML>
