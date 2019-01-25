<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
				
	$hora = getdate(time());//función para obtener la hora actual
						if ($hora["seconds"]<10)
						{
							$horareal = ($hora["hours"] . ":" . $hora["minutes"] . ":" . "0" . $hora["seconds"] );				
						}
						elseif ($hora["minutes"]<10)
						{
							$horareal = ($hora["hours"] . ":" . "0" . $hora["minutes"] . ":"  . $hora["seconds"] );	
						}
						elseif ($hora["hours"]<10)
						{
							$horareal = ("0" .$hora["hours"] . ":" . $hora["minutes"] . ":"  . $hora["seconds"] ); 
						}
						elseif ($hora["hours"]<10 && $hora["minutes"]<10)
						{
							$horareal=("0" .$hora["hours"] . ":" . "0" . $hora["minutes"] . ":"  . $hora["seconds"] );	
						}
						elseif ($hora["hours"]<10 && $hora["seconds"]<10)
						{
							$horareal=("0" .$hora["hours"] . ":" . $hora["minutes"] . ":"  . "0" . $hora["seconds"] );
						}
						elseif ($hora["minutes"]<10 && $hora["seconds"]<10)
						{
							$horareal=($hora["hours"] . ":0" . $hora["minutes"] . ":"  . "0" . $hora["seconds"] );
						}
						elseif ($hora["hours"]<10 && $hora["minutes"]<10 && $hora["seconds"]<10)
						{
							$horareal=("0" . $hora["hours"] . ":" . "0" . $hora["minutes"] . ":"  . "0" . $hora["seconds"]);	 
						}
						else
						{
							$horareal = ($hora["hours"] . ":" . $hora["minutes"] . ":" . $hora["seconds"] );
						}


?>
</body>
</html>