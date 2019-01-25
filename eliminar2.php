<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar - Archivo Digital</title>
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

<center>
<br><br>
<?php
$archivo = $_POST["hdid"];
$delete="DELETE FROM archivo WHERE arc_id='$archivo'";
$delete2 = $link->query($delete)
?>
<h class="style5">Archivo eliminado con éxito</h>

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