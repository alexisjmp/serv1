<?php
/* Call this file 'hello-world.php' */
require __DIR__ . '\..\libreriaImpresora\autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;


$connector = new FilePrintConnector("EPSON20");
$printer = new Printer($connector);
$printer -> text("Hello World!\n");
$printer -> cut();
$printer -> close();