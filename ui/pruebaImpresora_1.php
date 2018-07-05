<HTML>
<HEAD>
    <link rel="stylesheet" href="pruebaTamanoHoja.css"></link>
<SCRIPT language="javascript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ;
}
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=s HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</SCRIPT>
</HEAD>
<BODY onload="imprimir();">
    <h1> Lavado MyM Ltda.</h1>
    <p>progesivo </p>
    <p>entadra </p>
    <p>salida </p>
    <p>placa </p>
    <p>importe </p>
</BODY>
</HTML>
