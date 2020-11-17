<?php 
if (isset($_REQUEST['usuario']) && isset($_REQUEST['contraseña']) && isset($_REQUEST['nombre']) && isset($_REQUEST['identificacion']))
{
	$usr=$_REQUEST['usuario'];
	$clave=$_REQUEST['contraseña'];
	$nombre=$_REQUEST['nombre'];
	$id=$_REQUEST['identificacion'];
	$cnx =  mysqli_connect("localhost","root","","bdbanco") or die("Ha sucedido un error inexperado en la conexion de la base de datos");
	$result = mysqli_query($cnx,"select usuario from cliente where usuario = '$usr'");
	if (mysqli_num_rows($result)>0)
	{
		mysqli_query($cnx,"UPDATE cliente SET nombre='$nombre',identificacion='$id',contraseña='$clave' WHERE usuario = '$usr'");	
	}
	else
	{
		echo "Usuario No existe....";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar usr, clave, nombre e identificación";
}
?>
