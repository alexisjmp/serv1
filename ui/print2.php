<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Javascript</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style type="text/css">
    ol.lower-alpha {
      list-style-type: lower-alpha;
    }
    @page {
size: 3in 2in;/* width height */
}
  </style>
  <script type="text/javascript" src="epos-print-x.x.x.js"></script>
  <script type="text/javascript" src="epos-2.7.0.js"></script>
<script type="text/javascript">

//  var address = 'http://192.168.192.168/cgi-bin/epos/service.cgi?devid=local_printer';
  var canvas = document.getElementById('area_impresion');
  var epos = new epson.CanvasPrint(address);
  epos.cut = true;
  
  epos.print(canvas);
</script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top: 50px">
        <form class="form-inline" method="post">
          <div class="form-group">
            <label for="nro">N° Preguntas a imprimir por Página</label>
            <input type="text" name="nro" id="nro" class="form-control" placeholder="5">
          </div>
          <button class="btn btn-primary" type="button" id="btnPrint"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
        </form>
      </div>
    </div>
    <di class="row" id="area_impresion">
      <div class="col-md-12" style="margin-top: 50px">
        <h2 class="text-center" style="margin-bottom: 20px">Cuestionario</h2>
      </div>
      <div class="col-md-12">
        <p> 01. Pregunta N° 01
          <ol class='lower-alpha'>
            <li>alternativa 01</li>
            <li>alternativa 02</li>
            <li>alternativa 03</li>
            <li>alternativa 04</li>
            <li>alternativa 05</li>
          </ol>
        </p>
        <p> 02. Pregunta N° 02
          <ol class='lower-alpha'>
            <li>alternativa 01</li>
            <li>alternativa 02</li>
            <li>alternativa 03</li>
            <li>alternativa 04</li>
            <li>alternativa 05</li>
          </ol>
        </p>
        <p> 03. Pregunta N° 03
          <ol class='lower-alpha'>
            <li>alternativa 01</li>
            <li>alternativa 02</li>
            <li>alternativa 03</li>
            <li>alternativa 04</li>
            <li>alternativa 05</li>
          </ol>
        </p>
    
  
     
      </div>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript">
 
    $(function() {

  $("#btnPrint").on('click', function() {

    var nro = $("#nro").val(); //Nro de Preguntas a imprimir por página

    var objeto = document.getElementById('area_impresion'); //obtenemos el objeto a imprimir
    var ventana = window.open('', '_blank'); //abrimos una ventana vacía nueva
    ventana.document.write(objeto.innerHTML); //imprimimos el HTML del objeto en la nueva ventana

    // si se ha escrito un número
    if (nro != "" && !isNaN(nro)) {
        // añadimos el estilo que pone un salto de página cada nro preguntas 
        ventana.document.write("<style>.lower-alpha:nth-of-type(" + nro + "n) { page-break-inside: avoid; }</style>");
    }

    ventana.document.close(); //cerramos el documento
    ventana.print(); //imprimimos la ventana
    ventana.close(); //cerramos la ventana

  });
});
  </script>
</body>

</html>