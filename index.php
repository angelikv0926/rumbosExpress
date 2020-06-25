<?php

include_once("clases/Funciones.php");
include_once("clases/_MySQL.class.php");

$funciones=new funciones();

$n = 6;
$arrayDePrueba = [20,11,11,15,15,60,65,7,7,7];
$p = 'punto3.php';

echo "Punto 1 <br><br>";
echo $funciones::punto1($n);

echo "<br><br> Punto 2 <br><br>";
echo $funciones::punto2($arrayDePrueba);

echo "<br><br> Punto 3 <br><br>";
echo "<a href=".$p."> Ver tabla </a>";

?>