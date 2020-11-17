<?php
    $usuario = $_REQUEST['usuario1'];
    if (isset($_REQUEST['usuario1']))
    {        
        $cnx =  mysqli_connect("localhost","root","","bdbanco");//(dir IP servidor, usuario, clave, nombre de la bd)
        mysqli_query($cnx,"SET NAMES 'utf8'");
        $Cta = mysqli_fetch_array(mysqli_query($cnx, "SELECT numeroCuenta from cuenta where usuario1 = '$usuario'"));        
        $numeroCuentaOrigen = $Cta[0];
        $res = $cnx->query("SELECT numeroCuentaDestino, valor, fecha, hora from transaccion where numeroCuentaOrigen = '$numeroCuentaOrigen'");
        //si existen usuarios la variable res queda en 1 y si no en 0
        //En este arreglo se guardará la informacion para pasarla a formato JSON
        $json = array();
        foreach ($res as $row) 
        {
            $json['transacciones'][]=$row;
        }
        //pasar los datos del array a JSON con informacion o vacío
        //echo json_encode($json);
        echo json_encode($json,JSON_UNESCAPED_UNICODE);
    }
    else
    {
        echo "Campo Cuenta Origen es obligatorio";
    }
    
	
?>