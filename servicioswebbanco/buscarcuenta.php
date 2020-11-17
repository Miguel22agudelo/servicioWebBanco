<?php 
	if (isset($_REQUEST['usuario1']))
	{
		$usuario=$_REQUEST['usuario1'];
		
		
		$cnx =  mysqli_connect("localhost","root","","bdbanco");
		mysqli_query($cnx,"SET NAMES 'utf8'");
		$res=$cnx->query("select numeroCuenta,saldo from cuenta where usuario1 = '$usuario'");
		$json = array();
		foreach ($res as $row) 
		{
			$json['cuenta'][]=$row;
		}
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		echo "Se requiere número de cuenta";
	}

 ?>