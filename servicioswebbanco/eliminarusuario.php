<?php 
if (isset($_REQUEST['usuario']))
{
	$usr=$_REQUEST['usuario'];
	$cnx =  mysqli_connect("localhost","root","","bdbanco") or die("Ha sucedido un error inexperado en la conexion de la base de datos");
	$result = mysqli_query($cnx,"select usuario from cliente where usuario = '$usr'");
	if (mysqli_num_rows($result)>0)
	{
		mysqli_query($cnx,"DELETE FROM cliente WHERE usuario = '$usr'");	
	}
	else
	{
		echo "Usuario No existe....";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar correo";
}
?>
