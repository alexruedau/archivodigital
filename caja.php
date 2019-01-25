<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Caja - Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='estilos.css' type=text/css rel=stylesheet>
<script src="ajax3.js"></script>
<script>
function Valida ()
{
	if(document.frmcaja.txtnombre.value==''){
		alert('Debe ingresar el nombre de la caja');
		document.frmcaja.txtnombre.focus();
		return false;
	}
	if(document.frmcaja.lstoficina.value==''){
		alert('Debe seleccionar la oficina donde se alojará la caja');
		document.frmcaja.lstoficina.focus();
		return false;
	}
	if(document.frmcaja.lstlugar.value==''){
		alert('Debe seleccionar el lugar donde se alojará la caja');
		document.frmcaja.lstlugar.focus();
		return false;
	}	
	
	else
		return true
	}

</script>
</head>

<body class="body">

<?php
include ("conexion.php");
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
			<div class="content-1" >
			
<?php
				$usuario = "SELECT * FROM usuario WHERE usu_nombre='".$_SESSION['usuarioactual']."'";
				$usuario3 = $link->query($usuario);
				while($usuario2=mysqli_fetch_array($usuario3))
				{
?>				
				
				<form name="frmbusqueda" action="busqueda.php" method="post">
				<table align="right">
                	<tr>
                        <td valign="top">
                        	<input type="text" name="txtbuscar" placeholder="Buscar en Archivo">
                        </td>
                        <td>
                        	
                        	<input type="image" src="imagenes/Search_16x16.png" 
                                title="Buscar"  name="btnbuscar" id="submit" width="11px" height="11px">
                        </td>
                   	</tr>
                </table>
                </form>
                <form action="caja2.php" method="post" name="frmcaja" onsubmit="return Valida()">
				<table class="content">
                <tr>
                <td width="40%">
                	<table>      
						<tr>
							<td>
								<h class="style4" >
									Agregar Nueva Caja
                                </h>
                            		
							</td>
						</tr>
                		<tr>
                        <tr>
                        	<td>
                            	<table>
                                	<tr>
                                    	<td class="td2">
                                        	<h class="style6">Nombre</h>
                                        </td>
                                        <td class="td3">
                                        	<input name="txtnombre" type="text" size="30"/>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td class="td4">
                                        	<h class="style6">Oficina:</h>
                                        </td>
                                        <td class="td">
                                        	<?php
            								$oficina = "SELECT * FROM oficina";
											//Consulta para cargar los tipos de campaña
											$oficina2 = $link->query($oficina);
?>
											<SELECT NAME="lstoficina" onchange="load(this.value)">
											<option></option>
<?php
											while ($fila = mysqli_fetch_array($oficina2)) 
											{//Llena la lista desplegable con los valores existentes en la base de datos, en éste caso carga las incidencias.
?>
    											<option value="<?php echo $fila['ofi_id']; ?>"> 
													<?php echo $fila['ofi_nombre']; ?>
                                                </option>
<?php
											}
?>
											</SELECT>
											
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td class="td4">
            								<h class="style6">Lugar:</h>
            							</td>
            							<td class="td">
            								<div id="myDiv3"></div>
            							</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                	</table>
                </td>
                <td width="30%">
                	<center>
                	<table>
                    	<tr>
                        	<td><br><br>
<?php
								include ('hora.php');
?>
								<input type="hidden" name="hdhora" value="<?php echo $horareal; ?>">
   								<input type="hidden" name="hdfecha" value="<?php echo date("Y-m-d"); ?>">
                            	<input type="image" src="imagenes/Save_32x32.png" 
                                title="Guardar"  name="btnenviar" id="submit">
                            </td>
                        </tr>
                    </table>
                    </center>
                </td>
                <td width="30%">
                	
                </td>
				</table>

<?
				}
?>					
                		
                 <center>
        			<table>
    					<tr>
                        	<td>
    							<a href='aplicacion.php'>
            						<img src="imagenes/page_save.png">
                                </a>
							</td>  
            				<td>
    							<a href='carpeta.php'>
            						<img src="imagenes/folder_add.png">
                                </a>
							</td>    
						</tr>
					</table>     
				</center> 			
        </div>       
    	</div>
	</div>
<?
}
?>
</form>
</body>
</html>