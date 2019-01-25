<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpeta - Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='estilos.css' type=text/css rel=stylesheet>

</head>

<body class="body">
<form method="post">
<?php
include "conexion.php";
include("seguridad.php"); 
if ($_SESSION["usuarioactual"]=="")
{
	echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";
}
else
{	
?>
	<p align="right">
		<a href="salir.php" class="style2">Cerrar Sesión</a> 
	</p>

	<div id="contenedor">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" 
            style="visibility:hidden"/>
    		<label for="tab-1" class="tab-label-1"><h class="style1" >Archivo Digital </h><img src="imagenes/file_manager.png" width="25" height="25"></label>
    
    
                            
    <div class="content">
        <div class="content-1" style="background-color:#FFF">
<?php

$nombre = $_POST['txtnombre'];
$fecha = $_POST['hdfecha'];
$hora = $_POST['hdhora'];
$fechahora = $fecha.' '.$hora;
$creador = $_POST['hdid'];
$lugar = $_POST['lstlugar'];
$caja = $_POST["lstcaja"];

$guardar = "INSERT INTO carpeta 
				(car_nombre, car_creacion, car_creador, lug_id, caj_id) 
						values ('$nombre', '$fechahora', '$creador', '$lugar', '$caja')";
$guardar2 = $link->query($guardar);

?> 
        
<center>
<br><br>
<h class="style5">Carpeta agregada con éxito</h>

</center>
</div>
				<center>
        			<table>
    					<tr>
                        	<td width="200px">
    							<a href='aplicacion.php'>
            						<img src="imagenes/page_save.png">
                                </a>
							</td>  
            				<td width="200px">
    							<a href='carpeta.php'>
            						<img src="imagenes/folder_add.png">
                                </a>
							</td>   
                            <td width="200px">
    							<a href='caja.php'>
            						<img src="imagenes/box_open.png">
                                </a>
							</td>      
						</tr>
					</table>     
				</center>   

	</div>
	</div>
<?
}
?>
</form>
</body>
</html>