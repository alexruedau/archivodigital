<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar - Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<!-- /Llamado a la hoja de estilos -->
<LINK href='estilos.css' type=text/css rel=stylesheet>
<!-- /Librerías necesarias para el calendario -->
<script src="../controlestadistico/js/jquery-1.5.2.js" type="text/javascript"></script>
<link rel="stylesheet" href="../controlestadistico/css/demos.css" type="text/css">
<link rel="stylesheet" href="../controlestadistico/css/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.datepicker.js"></script>
<!-- /Llamado a formulario AJAX para cargar selects dependientes -->
<script src="ajax.js"></script>
<script>

function myFunction(str)//Función para cargar el primer select dependiente
{
loadDoc("q="+str,"proc.php",function()//llamamos el formulario proc.php y le llevamos parámetro "q" que será el valor de lstoficina
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;//Carga el nuevo select en myDiv
    }
  });
}

function myFunction2(str)//Función para cargar el segundo select dependiente
{
loadDoc("r="+str,"proc7.php",function()//llamamos el formulario proc2.php y le llevamos parámetro "r" que será el valor de lstlugar
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;//Carga el nuevo select en myDiv2
    }
  });
}

</script>
</head>
<body class="body">

<?php 

include('conexion.php');//llamado a la base de datos
include("seguridad.php"); 
if ($_SESSION["usuarioactual"]=="")
{
	echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";
}
elseif($_SESSION["usu_cargo"]=="0")
{
	echo"<script>alert('No tiene los permisos para ingresar a éste formulario.');window.location.href=\"agregar.php\"</script>";
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
    		<label for="tab-1" class="tab-label-1"><h class="style1" >Archivo Digital </h><img src="imagenes/file_manager.png" width="25" height="25"></label>
                     
			<div class="content">
			<div class="content-1" >
            
			<script>//Script para seleccionar fecha
				$(function() 
				{
					$( "#fecha1" ).datepicker(
					{ 
						autoSize: true,
						ayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
						ayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
						firstDay: 1,
						onthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
						monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
						dateFormat: 'yy-mm-dd',
						changeMonth: true,
						changeYear: true,
						yearRange: "-90:+0",
					});
				});
			</script>
            
<?php
				//Consulta SQL para extraer los datos de sesión y mantener dicha sesión activa 
				$usuario = "SELECT * FROM usuario WHERE usu_nombre='".$_SESSION['usuarioactual']."'";
				$usuario2 = $link->query($usuario);
				while($fila=mysqli_fetch_array($usuario2))
				{
?>
					<!-- Primer formulario, en el que se realizan búsquedas.
                	 Redirige a la página de búsqueda -->
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
                    <br><br><br><br><br><br>
                    
                	<!-- Segundo formulario, en el que se ingresan las ubicaciones
                 	de los documentos digitalizados. Redirige a las validaciones, 
                 	y si todo está correcto a aplicacion2.php en donde se almacenará
                  	la información ingresada-->
                	<form method="post" name="frmperfil" action="editar2.php" onsubmit="return Valida()">
                    	<center>
                			<?php
                            $variable = $_REQUEST["id"];
							$file_edit="SELECT * 
								FROM archivo, ubicacion_digital, caja, carpeta, lugar, oficina, tipo_archivo
								WHERE  archivo.arc_id=ubicacion_digital.arc_id
								AND tipo_archivo.tip_id=archivo.tip_id
								AND archivo.car_id=carpeta.car_id
								AND archivo.caj_id=caja.caj_id
								AND archivo.ofi_id=oficina.ofi_id
								AND carpeta.lug_id=lugar.lug_id 
								AND arc_id='$variable'";
							$file_edit2 = $link->query($file_edit);
							while($row = mysqli_fetch_array($file_edit2))
							{
							?>
                            	<table>
                               		<tr>
                                   		<td class="td2">
                                       		<h class="style6">Palabras Clave</h>
                                       	</td>
                                       	<td class="td3">
<!-- Campo de texto grande para ingresar  las palaras claves del docuemnto digitalizado -->
                                       		<textarea cols="30" rows="5" name="txtkeywords"><?php echo $row["arc_palabrasclave"]?></textarea>
                                       	</td>
                                        <td class="td3"  rowspan="6">
                                           	<input type="image" src="imagenes/edit.png" title="Editar"  name="btnenviar" id="submit" width="18" height="18">
                            			</td>
                                   	</tr>
                                   	<tr>
                                   		<td class="td4">
                                       		<h class="style6">Fecha del Documento</h>
                                       	</td>
                                   		<td class="td">
<!-- Campo de texto en donde se selecciona la fecha de expedición del documento -->
                                        	<input name="txtfecha1" type="text"  id="fecha1" size="12"/>
                                            <?php echo $row["arc_fecha"]?>
                                        	</td>
                                            
                                    	</tr>
                                    	<tr>
                                    		<td class="td4">
            									<h class="style6">Tipo de Documento:</h>
            								</td>
            								<td class="td">
                                        		<!-- Lista desplegable en la que se cargan 
                                        		los tipos de documentos -->
<?php
            									$tipo = "SELECT * 
													FROM tipo_archivo 
													ORDER BY tip_nombre ASC";
													/*Consulta para cargar los tipos de documentos
													existentes en la base de datos*/
												$tipo2 = $link->query($tipo);
																		
?>
												<SELECT NAME="lsttipo">
													<option></option>
<?php
													while ($fila = mysqli_fetch_array($tipo2)) 
													{
														/*Llena la lista desplegable con los valores 
														existentes en la base de datos, en éste caso 
														carga los tipos de documentos.*/
?>
    												<option value="<?php echo $fila['tip_id']; ?>"> 
														<?php echo $fila['tip_nombre']; ?>
                                                	</option>
<?php
													}
?>
												</SELECT>
                                                <?php echo $row["tip_nombre"]?>
											</td>
                                        </tr>
                                    	<tr>
                                    		<td class="td4">
                                        		<h class="style6">Pertenece a:</h>
                                        	</td>
                                        	<td class="td">
                                            	<!-- Lista desplegable en la que se cargan 
                                        		las oficinas a la cual puede pertenecer el 
                                                documento a digitalizar -->
                                        		<SELECT name="lstpertenece">
                                            		<option></option>
<?php
													$oficina = "SELECT * FROM oficina";
													/*Consulta para cargar las oficina existentes 
													en la base de datos*/
													$oficina2 = $link->query($oficina);
													while ($fila = mysqli_fetch_array($oficina2)) 
													{
														/*Llena la lista desplegable con los valores 
														existentes en la base de datos, en éste caso
												 		carga las oficinas.*/
?>
    												<option value="<?php echo $fila['ofi_id']; ?>"> 
														<?php echo $fila['ofi_nombre']; ?>
                                                	</option>
<?php
													}
?>
												</SELECT>
                                                <?php echo $row["ofi_nombre"]?>
                                        	</td>
                                    	</tr>
                                    	<tr>
                                    		<td class="td4">
                                        		<h class="style6">Ubicación Física</h>
                                        	</td>
 <!-- Lista desplegable en la que se cargan las oficinas, en la cual se seleccionará en dónde estará el docuemento físico -->
                                        	<td class="td">
                                       
<?php
												$res="SELECT * FROM oficina";
												/*Consulta para cargar las oficina existentes 
												en la base de datos*/
												$res2 = $link->query($res);
?>
												<select id="cont" onchange="myFunction(this.value)"
                                                 		name="lstoficina">
													<option></option>
<?php
													while($fila=mysqli_fetch_array($res2))
													{
														/*Llena la lista desplegable con los valores 
														existentes en la base de datos, en éste caso
														carga las oficina, diferente a la lista desplegable 
														anterior ya que ésta llama a la función myFunction 
														para cargar una nueva lista*/
?>
													<option value="<?php echo $fila['ofi_id']; ?>">
														<?php echo $fila['ofi_nombre']; ?>
                                                	</option>
<?php
													}
?>
												</select> <?php echo $row["ofi_nombre"]?>
                                                <table>
                                                <tr>
                                                <td>
												<div id="myDiv"></div><!--div donde aparecen los lugares-->
                                                </td>
                                                <td>
                                                <?php echo $row['lug_detalles']; ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>                                	
                                                <div id="myDiv2"></div><!--div donde aparecen las cajas, carpetas-->
                                                </td>
                                                <td>
                                                <?php echo $row['caj_nombre']; 
												echo "<hr>";
												echo $row['car_nombre']; ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                Número de Hoja:
												</td>
                                                <td> 
<!-- Caja de texto para ingresar el número de hoja en la carpeta(no es obligatorio)  -->
												<input type="text" name="txtnumhoja" size="1" value="<?php echo $row["arc_numerohoja"];?>">
                                                </td>
                                                </tr>
                                                </table>
                                           	</td>
                                    	</tr>
                                    	<tr>
                                    		<td class="td4">
                                        		<h class="style6">Ubicación en la Nube</h>
                                        	</td>
                                            <!-- Lista desplegable en la que se cargan 
                                        		las oficinas, en donde se seleccionará 
                                                en cuál carpeta estará alojado el documento -->
                                        	<td class="td">
<?php
                                        		$res="SELECT * FROM oficina";
												/*Consulta para cargar las oficina existentes 
												en la base de datos*/
												$res2 = $link->query($res);
?>
                                        		<select id="cont" name="lstoficina2">
													<option></option>
<?php
													while($fila=mysqli_fetch_array($res2))
													{
														/*Llena la lista desplegable con los valores 
														existentes en la base de datos, en éste caso
														carga las oficinas*/
?>
													<option value="<?php echo $fila['ofi_id']; ?>">
														<?php echo $fila['ofi_nombre']; ?>
                                                	</option>
<?php
													}
?>
												</select> 
												<?php echo $row['ofi_nombre']; ?><br>
                                                <!-- Lista desplegable que carga el 
                                                año en el que fue expedido el documento -->
                                            	<select name="lstyear">
                                            		<option></option>
                                                	<option>2014</option>
                                                    <option>2013</option>
                                                    <option>2012</option>
                                                    <option>2011</option>
                                                    <option>2010</option>
                                            	</select><?php echo $row['ubi_year']; ?><br>
<?php
                                        		$res="SELECT * FROM tipo_archivo 
													ORDER BY tip_nombre ASC";
												/*Consulta para cargar los tipos de documentos 
												existentes en la base de datos */
												$res2 = $link->query($res);
?>
                                            	<select name="lsttipo2">
													<option></option>
<?php
													while($fila=mysqli_fetch_array($res2))
													{
														/*Llena la lista desplegable con los valores 
														existentes en la base de datos, en éste caso
														carga los tipos de documentos*/
?>
													<option value="<?php echo $fila['tip_id']; ?>">
														<?php echo $fila['tip_nombre']; ?>
                                                	</option>
<?php
													}
?>
												</select><?php echo $row['tip_nombre']; ?><br>
                                                <!-- Campo de texto para guardar el 
                                                nombre del archivo digitalizado -->
                                          		<input type="text" name="txtnombre" size="28" placeholder="Nombre del archivo digitalizado">
                                                <?php echo $row['ubi_docnombre']; ?>
                                        	</td>
                                    	</tr>                                        <?php
										}
										?>
                                    </table>
<?
					}
?>					
					</center>
                    <br><br><br>
					<center>
        			<table>
    					<tr>
            				<td>
    							<a href='carpeta.php'>
            						<img src="imagenes/folder_add.png">
                                </a>
							</td> 
                            <td width="50px">
                            </td>  
                            <td>
    							<a href='caja.php'>
            						<img src="imagenes/box_open.png">
                                </a>
							</td>      
						</tr>
					</table>     
				</center>   
                <input type="hidden" name="hdid" value="<?php echo $variable; ?>">			
        </div>       
    	</div>
	</div>             
          
<?php
include ('hora.php'); // llamado a formulario con función de hora actual
?>
	<!--campo oculto para mandar la información de la hora actual-->
	<input type="hidden" name="hdhora" value="<?php echo $horareal; ?>">
    <!--campo oculto para mandar la información de la fecha actual-->
    <input type="hidden" name="hdfecha" value="<?php echo date("Y-m-d"); ?>">

<?
}
?>
</form>
</body>