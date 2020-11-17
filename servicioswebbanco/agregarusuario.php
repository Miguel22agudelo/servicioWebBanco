<?php 
$usr = $_REQUEST['usuario'];
$contra = $_REQUEST['contraseña'];
$nombre = $_REQUEST['nombre'];
$id = $_REQUEST['ident'];
$cnx =  mysqli_connect("localhost","root","","bdbanco");
$result = mysqli_query($cnx,"select usuario from cliente where usuario = '$usr'");
$rta="";
if (mysqli_num_rows($result)==0)//No encontró el correo
{
	mysqli_query($cnx,"INSERT INTO cliente (usuario,ident,nombre,contraseña) VALUES ('$usr','$id','$nombre','$contra')");	
	$rta="1";
}
else
{
	echo "Usuario ya existe....";
	$rta="0";
}
echo $rta;
mysqli_close($cnx);
