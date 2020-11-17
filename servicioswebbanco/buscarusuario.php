<?php 
	if (isset($_REQUEST['usuario']) && isset($_REQUEST['contraseña']))
	{
		$usr=$_REQUEST['usuario'];
		$clave=$_REQUEST['contraseña'];
		$cnx =  mysqli_connect("localhost","root","","bdbanco");
		mysqli_query($cnx,"SET NAMES 'utf8'");
        $res=$cnx->query("select usuario,nombre,ident from cliente where usuario = '$usr' and contraseña = '$clave'");
        
        $json = array();
        
		foreach ($res as $row) 
		{
			$json['usuarios'][]=$row;
		}
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		echo "El correo y la clave son obligatorios";
	}

 ?>