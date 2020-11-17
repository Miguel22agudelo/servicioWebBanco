<?php 
		//conexión a la base de datos
		$cnx =  mysqli_connect("localhost","root","","bdbanco");
		//Instrucción para acentos en PHP
		mysqli_query($cnx,"SET NAMES 'utf8'");
		//Ejecutar una sentencia SELECT y recibir una respuesta
		$res = $cnx->query("select * from cliente");
		//si existen usuarios la variable res queda en 1 y sino en 0
		//En este arreglo se guardará la informacion para pasarla a formato JSON
		$json = array();
		foreach ($res as $row) 
		{
			$json['clientes'][]=$row;
		}
		//pasar los datos del array a JSON con informacion o vacío
		//echo json_encode($json);
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	
 ?>