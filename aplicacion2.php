<!-- Formulario que procesa y guarda l información de los documentos digitalizados -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='estilos.css' type=text/css rel=stylesheet>

</head>

<body class="body">
				
<form action="busqueda.php" method="post">
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
		<!-- Divs con diseño de pestañas  -->
		<div id="contenedor">
    		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" 
            style="visibility:hidden"/>
    		<label for="tab-1" class="tab-label-1">
            	<h class="style1" >
                	Archivo Digital 
                </h>
                <img src="imagenes/file_manager.png" width="25" height="25">
            </label>
    	<div class="content">
        <div class="content-1" style="background-color:#FFF">
			<table align="right">
           		<tr>
                   	<td valign="top">
                        <input type="text" name="txtbuscar" placeholder="Buscar en Archivo">
                        <!-- Campo para realizar búsqueda por palabras claves  -->
                    </td>
                    <td>
          				<input type="image" src="imagenes/Search_16x16.png" 
                        title="Buscar"  name="btnbuscar" id="submit" width="11px" height="11px">
                    </td>
          		</tr>
        	</table><br>
<?php
//Recibiendo variables para almacenarlas en la base de datos.
$palabras_clave=$_POST["txtkeywords"];//Recibo palabras claves desde aplicacion.php
$fecha = $_POST["hdfecha"];//Recbo la fecha oculta desde aplicacion.php
$hora = $_POST["hdhora"];//Recibo la hora oculta desde aplicacion.php
$fechahora = $fecha.' '.$hora;//Concateno fecha y hora para darle formato al día actual en variable 
$fecha_documento=$_POST["txtfecha1"];//Recibo fecha seleccionada para el documento desde aplicacion.php
$tipo_documento = $_POST["lsttipo"];//Recibo tipo del documento seleccionado desde aplicacion.php
$pertenece = $_POST["lstpertenece"];//Recibo la oficina selaccionada a la que pertenecerá el documento desde aplicacion.php
$oficina = $_POST["lstoficina"];//Recibo la oficina seleccionada desde aplicacion.php en donde se alojará el documento físico 
$caja = $_POST["lstcaja"];//Recibo la caja seleccionada desde aplicacion.php en la cual estará alojado el documento 
$carpeta = $_POST["lstcarpeta"];//Recibo la carpeta seleccionada desde aplicacion.php en la cual estará alojado el documento
$numero_hoja = $_POST["txtnumhoja"];//Recibo el número de hoja ingresado desde aplicacion.php
$year = $_POST["lstyear"];//Recibo el año seleccionado para la ubicación en la nube desde aplicacion.php
$nombre = $_POST["txtnombre"];//Recibo el nombre del documento digital desde aplicacion.php

$last_file = "SELECT MAX(arc_id) AS id 
		FROM archivo";
$last_file2 = $link->query($last_file);
$last_file3=mysqli_fetch_array($last_file2);
$archivo=$last_file3['id']+1;
$ubi_digital = "SELECT * FROM oficina, tipo_archivo 
	WHERE ofi_id='".$oficina."' AND tip_id='".$tipo_documento."'";
	/*Consulta para extraer los datos de la oficina y el tipo de archivo que 
	tengan los mismos códigos de las variables $oficina y $tipo_documento*/
$ubi_digital2 = $link->query($ubi_digital);
	while($fila=mysqli_fetch_array($ubi_digital2))
	{
		
		//$ubi_digital3 = $fila['ofi_nombre'].'/ '.$year.'/ '.$fila['tip_nombre'].'/ '.$nombre;
		/*Consulta SQL para almacenar la ubicación digital del documento 
		en la base de datos*/
		$guardar2="INSERT INTO ubicacion_digital
			(ubi_year, ubi_docnombre, ofi_id, tip_id, arc_id) 
			VALUES ('$year', '$nombre', '$oficina', '$tipo_documento', '$archivo')";
		$guardar3 = $link->query($guardar2);
	}
	/*Consulta para extraer el nombre de la caja que coincide con el código
	que llega desde aplicacion.php $caja*/
	$box_name = "SELECT caj_nombre AS caja 
		FROM caja WHERE caj_id='$caja'";
	$box_name2 = $link->query($box_name);
	/*Consulta para extraer el código del último registro agregado en la 
	base de datos de ubicación digital*/
	$ultimo = "SELECT MAX(ubi_id) AS id 
		FROM ubicacion_digital";
	$ultimo2 = $link->query($ultimo);
	$resp=mysqli_fetch_array($ultimo2);/* array asociativo al ultimo registro en 
		la base de datos en la tabla ubicación digital*/
	$resp2=mysqli_fetch_array($box_name2);/* array asociativo a la caja que tiene 
		el mismo código en la base de datos en la caja*/
	$ubicacion=$resp['id'];//Apuntador igualándolo con $ubicacion
	$nombre_caja=$resp2['caja'];//Apuntador igualándolo a $nombre_caja
	/*Consulta SQL para guardar en la base de datos las ubicaciones física y 
	digital del archivo */
	$usuario = "SELECT * FROM usuario 
		WHERE usu_nombre='".$_SESSION['usuarioactual']."'";
	$usuario2 = $link->query($usuario);
	$fila=mysqli_fetch_array($usuario2);
	$id=$fila["usu_id"];
	$guardar = "INSERT INTO archivo 
		(arc_palabrasclave, arc_fecha, arc_fechadocumento, 
		arc_numerohoja, tip_id, car_id, caj_id, ofi_id, ubi_id, arc_caja, usu_id) 
		values ('$palabras_clave', '$fechahora', '$fecha_documento', '$numero_hoja',
		'$tipo_documento', '$carpeta', '$caja', '$pertenece', '$ubicacion', '$nombre_caja', '$id')";
	$save = $link->query($guardar);
?> 
<center>
<br><br>
<h class="style5">Archivo agregado con éxito</h>

</center>
</div>
				<!-- Íconos que llevan a los demás formularios -->
				<center><br><br>
        			<table>
    					<tr>
                        	<td>
    							<a href='aplicacion.php'>
            						<img src="imagenes/page_save.png">
                                </a>
							</td>  
                            <td width="50px">
            				<td>
    							<a href='carpeta.php'>
            						<img src="imagenes/folder_add.png">
                                </a>
							</td>   
                            <td width="50px">
                            <td>
    							<a href='caja.php'>
            						<img src="imagenes/box_open.png">
                                </a>
							</td>      
						</tr>
					</table>     
				</center>

	</div>
	</div>
       
        </div>
	</div>
	</div>
<?
}
?>
</form>
</body>
</html>