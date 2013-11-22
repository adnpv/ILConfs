<?php
session_start();

$parte1=$_POST['1'];
$parte2=$_POST['2'];
$parte3=$_POST['3'];
$parte4=$_POST['4'];
$id=$_SESSION['id'];

$titular = $_POST['titular'];
$numero= $parte1.$parte2.$parte3.$parte4;

function validar_tarjeta ($numero) {
$suma = 0;
for ($i = 0; $i < 16; $i++) {
if ($i % 2) {
$suma += $numero[$i]; //par
}else{ //impar
if ($numero[$i] != 9) {
$suma += 2 * $numero[$i] % 9;
}else{
$suma += 9;
}
}
}

if ($suma % 10 == 0 && $suma < 150) {
return true;
}else{
return false;
}
}

$_SESSION ['nombres'] = $nombre;
$_SESSION ['titular'] = $titular;
$valido = validar_tarjeta($numero);

if($valido==true){

$url= "compra_entradas.php?idevento=$id&correo=true";

//header ('Location: home.php');
echo '<h3>Procesando...</h3>';
print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";
}
else{
$url= "compra_entradas.php?idevento=$id&error=1";
echo '<h3>Procesando...</h3>';
//header ("Location: $url");
print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";
}
?>