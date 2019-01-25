<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar - Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='estilos.css' type=text/css rel=stylesheet>

</head>

<body class="body">
				
<form action="eliminar2.php" method="post">
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
$variable = $_REQUEST["id"];
$file_edit="SELECT * 
	FROM archivo, ubicacion_digital, caja, carpeta, lugar, oficina
	WHERE  archivo.ubi_id=ubicacion_digital.ubi_id
	AND archivo.car_id=carpeta.car_id
	AND archivo.caj_id=caja.caj_id
	AND lugar.ofi_id=oficina.ofi_id
	AND carpeta.lug_id=lugar.lug_id 
	AND arc_id='$variable'";
$file_edit2 = $link->query($file_edit);

?>
<table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Fecha
                    </td>
                    <td class="td3">
                    	Oficina
                    </td>
                    <td class="td3">
                    	Lugar
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($file_edit2))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['arc_fecha']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['ofi_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['lug_detalles']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ubi_detalles']; ?>
                    </td>
<?php
}
?>
               	<tr>
            </table>

<center>
<br><br>
<h class="style5">¿Desea eliminar el archivo?</h>

<input type="submit" name="enviar" value="SI" id="submit"/>
<input type="hidden" name="hdid" value="<?php echo $variable; ?>">

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