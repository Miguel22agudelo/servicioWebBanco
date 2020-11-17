<?php 
//$NroTransac = $_REQUEST['NroTransac'];
$numeroCuentaOrigen = $_REQUEST['numeroCuentaOrigen'];
$numeroCuentaDestino = $_REQUEST['numeroCuentaDestino'];
$hora = $_REQUEST['hora'];
$fecha = $_REQUEST['fecha'];
$valor = $_REQUEST['valor'];
$cnx =  mysqli_connect("localhost","root","","bdbanco");
$result = mysqli_query($cnx,"select numeroCuenta from cuenta where numeroCuenta = '$numeroCuentaDestino'");
$rta = "";
if (mysqli_num_rows($result)==0)
{
	//echo "Transacción no permitida";
	$rta = "0";
}
else
{
	$saldo_destino = mysqli_fetch_array(mysqli_query($cnx, "select saldo from cuenta where numeroCuenta = '$numeroCuentaDestino'"));
	$saldo_origen = mysqli_fetch_array(mysqli_query($cnx, "select saldo from cuenta where numeroCuenta = '$numeroCuentaOrigen'"));
	$saldo_destino[0] = $saldo_destino[0] + $valor;
	$saldo_origen[0] = $saldo_origen[0] - $valor;
	mysqli_query($cnx,"INSERT INTO transaccion (numeroCuentaOrigen,numeroCuentaDestino,hora,fecha,valor) VALUES ('$numeroCuentaOrigen','$numeroCuentaDestino','$hora','$fecha','$valor')");
	mysqli_query($cnx, "UPDATE cuenta SET saldo = '$saldo_destino[0]' WHERE numeroCuenta = '$numeroCuentaDestino'");
	mysqli_query($cnx, "UPDATE cuenta SET saldo = '$saldo_origen[0]' WHERE numeroCuenta = '$numeroCuentaOrigen'");
	$rta = "1";
	
}
echo $rta;
mysqli_close($cnx);
?>