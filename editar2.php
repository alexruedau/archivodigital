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
$oficina2 = $_POST["lstoficina2"];
$tipo_documento2 = $_POST["lsttipo2"];
$caja = $_POST["lstcaja"];//Recibo la caja seleccionada desde aplicacion.php en la cual estará alojado el documento 
$carpeta = $_POST["lstcarpeta"];//Recibo la carpeta seleccionada desde aplicacion.php en la cual estará alojado el documento
$numero_hoja = $_POST["txtnumhoja"];//Recibo el número de hoja ingresado desde aplicacion.php
$year = $_POST["lstyear"];//Recibo el año seleccionado para la ubicación en la nube desde aplicacion.php
$nombre = $_POST["txtnombre"];//Recibo el nombre del documento digital desde aplicacion.php
$id = $_POST["hdid"];
if($palabras_clave<>"")
{
	$keywords="UPDATE archivo 
		SET arc_palabrasclave='$palabras_clave' 
		WHERE arc_id='$id'";
	$keywords2 = $link->query($keywords);
}
if($fecha<>"")
{
	$docdate="UPDATE archivo 
		SET arc_fechadocumento='$fecha_documento' 
		WHERE arc_id='$id'";
	$docdate2 = $link->query($docdate);
	$date="UPDATE archivo 
		SET arc_fecha='$fechahora' 
		WHERE arc_id='$id'";
	$date2 = $link->query($date);
}
if($tipo_documento<>"")
{
	$dockind="UPDATE archivo 
		SET tip_id='$tipo_documento' 
		WHERE arc_id='$id'";
	$dockind2 = $link->query($dockind);
}
if($pertenece<>"")
{
	$a="UPDATE archivo 
		SET ofi_id='$pertenece' 
		WHERE arc_id='$id'";
	$a2 = $link->query($a);
}
if($caja<>"")
{
	$box="UPDATE archivo 
		SET caj_id='$caja' 
		WHERE arc_id='$id'";
	$box2 = $link->query($box);
}
if($carpeta<>"")
{
	$folder="UPDATE archivo 
		SET car_id='$carpeta' 
		WHERE arc_id='$id'";
	$folder2 = $link->query($folder);
}
if($numero_hoja<>"")
{
	$number="UPDATE archivo 
		SET arc_numerohoja='$numero_hoja' 
		WHERE arc_id='$id'";
	$number2 = $link->query($number);
}
if($oficina2<>"")
{
	$office="UPDATE ubicacion_digital 
		SET ofi_id='$oficina2' 
		WHERE arc_id='$id'";
	$office2 = $link->query($office);
}
if($year<>"")
{
	$year2="UPDATE ubicacion_digital, archivo
		SET ubi_year='$year' 
		WHERE archivo.ubi_id=ubicacion_digital.ubi_id 
		AND arc_id='$id'";
	$year3 = $link->query($year2);
}
if($tipo_documento2<>"")
{
	$tipo_documento3="UPDATE ubicacion_digital 
		SET tip_id='$tipo_documento2' 
		WHERE arc_id='$id'";
	$tipo_documento4 = $link->query($tipo_documento3);
}
if($nombre<>"")
{
	$name="UPDATE ubicacion_digital 
		SET ubi_docnombre='$nombre' 
		WHERE arc_id='$id'";
	$name2 = $link->query($name);
}
?>

	<center>
		<br><br>
		<h class="style5">Actualizaciones realizadas con éxito</h>
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