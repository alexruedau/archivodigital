<!-- Formulario para realizar búsquedas de las ubicaciones de los archivos. Las búsquedas se realizan desde éste formulario o llegan parámetros (palabras clave) desde cualquier otro formulario -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Búsqueda - Archivo Digital</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='estilos.css' type=text/css rel=stylesheet><!-- Hoja de estilos -->
<!-- /Librerías necesarias para el calendario -->
<script src="../controlestadistico/js/jquery-1.5.2.js" type="text/javascript"></script>
<link rel="stylesheet" href="../controlestadistico/css/demos.css" type="text/css">
<link rel="stylesheet" href="../controlestadistico/css/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../controlestadistico/js/jquery.ui.datepicker.js"></script>
<!-- /Llamado a formulario AJAX para cargar selects dependientes -->
<script src="ajax4.js"></script>
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
loadDoc("r="+str,"proc6.php",function()//llamamos el formulario proc6.php y le llevamos parámetro "r" que será el valor de lstlugar
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
<form method="post" action="busqueda.php">
<?php
include "conexion.php";//Llamado a la BD
/*Recibo variables de éste mismo formulario al hacer submit */
$fecha = $_POST["txtfecha1"];//Recibo la fecha seleccionada para realizar la búsqueda
$oficina = $_POST["lstoficina"];//Recibo la oficina seleccionada para realizar la búsqueda
$lugar = $_POST["lstlugar"];//Recibo el lugar seleccionado para realizar la búsqueda
$caja = $_POST["lstcaja"];//Recibo la caja seleccionada para realizar la búsqueda
$carpeta = $_POST["lstcarpeta"];//Recibo la carpeta seleccionada para realizar la búsqueda

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
    		<label for="tab-1" class="tab-label-1"><h class="style1" >Archivo Digital </h><img src="imagenes/file_manager.png" width="25" height="25"></label>
    
    <div class="content">
    <div class="content-1" style="background-color:#FFF">
    	<!-- Buscador ubicado en la parte superior derecha -->
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
  		</table><br>
        
        <h class="style6">Resultados para la búsqueda: 
        <!-- Imprime la palabra que se introdujo para realizar la búsqueda -->
		<?php echo $buscar = $_POST["txtbuscar"]; echo"<br>"; ?></h><br><br>
<?php
			/* Consultas para imprimir datos seleccionados en pantalla e impedir 
			que se repitan al mostrar en las tablas de resultados */
			$datos="SELECT * 
				FROM archivo, oficina, carpeta, caja, lugar
				WHERE carpeta.car_id='$carpeta'
				AND caja.caj_id='$caja'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'
				AND archivo.arc_fechadocumento='$fecha'";
			$datos2 = $link->query($datos);
			$datos3="SELECT * 
				FROM archivo, oficina, carpeta, caja, lugar
				WHERE caja.caj_id='$caja'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'
				AND archivo.arc_fechadocumento='$fecha'";
			$datos4 = $link->query($datos3);
			$datos5="SELECT * 
				FROM archivo, oficina, lugar
				WHERE lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'
				AND archivo.arc_fechadocumento='$fecha'";
			$datos6 = $link->query($datos5);
			$datos7="SELECT * 
				FROM archivo, oficina
				WHERE oficina.ofi_id='$oficina'
				AND archivo.arc_fechadocumento='$fecha'";
			$datos8 = $link->query($datos7);
			$datos9="SELECT * 
				FROM archivo
				WHERE arc_fechadocumento='$fecha' ORDER BY arc_id";
			$datos10 = $link->query($datos9);
			$datos11="SELECT * 
				FROM archivo, oficina, carpeta, caja, lugar
				WHERE carpeta.car_id='$carpeta'
				AND caja.caj_id='$caja'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'";
			$datos12 = $link->query($datos11);
			$datos13="SELECT * 
				FROM archivo, oficina, carpeta, caja, lugar
				WHERE caja.caj_id='$caja'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'";
			$datos14 = $link->query($datos13);
			$datos15="SELECT * 
				FROM archivo, oficina, carpeta, caja, lugar
				WHERE lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'";
			$datos16 = $link->query($datos15);
			$datos17="SELECT * 
				FROM oficina
				WHERE oficina.ofi_id='$oficina'";
			$datos18 = $link->query($datos17);
			$datos19="SELECT * 
				FROM archivo, oficina, carpeta, lugar
				WHERE carpeta.car_id='$carpeta'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'
				AND archivo.arc_fechadocumento='$fecha'";
			$datos20 = $link->query($datos19);
			$datos21="SELECT * 
				FROM archivo, oficina, carpeta, lugar
				WHERE carpeta.car_id='$carpeta'
				AND lugar.lug_id='$lugar'
				AND oficina.ofi_id='$oficina'";
			$datos22 = $link->query($datos21);
			$res="SELECT * FROM oficina";
			$res2 = $link->query($res);

?>
        	<h class="style6">Búsqueda Avanzada: <br>
				<!-- Sección de búsqueda avanzada, en la que a medida que 
                se realizan las selecciones, se carga la información necesaria -->
                <table >
            		<tr>
                		<td valign="top">
                       		<input name="txtfecha1" type="text"  id="fecha1" size="12"/>
                    	</td>
            			<td valign="top">
        					<select id="cont" onchange="myFunction(this.value)" name="lstoficina">
								<option></option>
<?php
								while($fila=mysqli_fetch_array($res2))
								{
?>
								<option value="<?php echo $fila['ofi_id']; ?>">
									<?php echo $fila['ofi_nombre']; ?>
                 				</option>
<?php
								}
?>
							</select>
            			</td>
            			<td valign="top">
							<div id="myDiv"></div>
            			</td>
            			<td valign="top">
        					<div id="myDiv2"></div>
            			</td>
                    	<td valign="top">
                    		<input type="image" src="imagenes/Search_16x16.png" 
                                title="Buscar"  name="btnbuscar" id="submit" width="11px" height="11px">
                    	</td>
            		</tr>
            	</table><br>

<script>//Script para fechas
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
			$sql = "SELECT * 
				FROM archivo, usuario, carpeta, lugar, oficina, 
				ubicacion_digital, tipo_archivo
				WHERE usuario.usu_id=archivo.usu_id
				AND carpeta.car_id=archivo.car_id
				AND carpeta.lug_id=lugar.lug_id
				AND oficina.ofi_id=lugar.ofi_id
				AND archivo.ubi_id=ubicacion_digital.ubi_id
				AND tipo_archivo.tip_id=ubicacion_digital.tip_id
				AND arc_palabrasclave like '%$buscar%'";
			$result = $link->query($sql);
			$sentencia = mysqli_prepare($link, $sql);
	
			/* ejecutar la consulta */
			mysqli_stmt_execute($sentencia);

			/* almacenar el resultado */
			mysqli_stmt_store_result($sentencia);
			//$sql_num = mysql_num_rows($sql);
			if (mysqli_stmt_num_rows($sentencia) == 0)
			{
?>
				No se encontraron resultados para: <u><?php echo $buscar; ?></u>
<?php
	
			}
			else
			{
				if($fecha=="" && $oficina=="" && $lugar=="" && $caja=="" && $carpeta=="")
				{
						include "busqueda3.php";   
				}
				else
				{
				if($fecha!="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta!="")
				{
					$filadatos=mysqli_fetch_array($datos2);
					echo $filadatos['arc_fechadocumento']; echo " > "; echo $filadatos['ofi_nombre']; echo " > ";
					echo $filadatos['lug_detalles']; echo " > Caja: "; 
					echo $filadatos['caj_nombre']; echo " > Carpeta: "; echo $filadatos['car_nombre'];

					$sql = "SELECT * 
						FROM archivo, carpeta, lugar, oficina, caja, usuario, ubicacion_digital, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND carpeta.car_id=archivo.car_id
						AND lugar.lug_id=carpeta.lug_id
						AND carpeta.car_id='$carpeta'
						AND caja.caj_id=archivo.caj_id
						AND lugar.lug_id=caja.lug_id
						AND caja.caj_id='$caja'
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.arc_fechadocumento='$fecha'";
					$result = $link->query($sql);
						
					include "busqueda2.php";
				}
				elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta=="")
				{
					$filadatos2=mysqli_fetch_array($datos4);
					echo $filadatos2['arc_fechadocumento']; echo " > "; 
					echo $filadatos2['ofi_nombre']; echo " > ";
					echo $filadatos2['lug_detalles']; echo " > Caja: "; 
					echo $filadatos2['caj_nombre'];
					$sql = "SELECT * 
						FROM archivo, lugar, oficina, caja, usuario, ubicacion_digital, carpeta, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND caja.caj_id=archivo.caj_id
						AND lugar.lug_id=caja.lug_id
						AND caja.caj_id='$caja'
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.arc_fechadocumento='$fecha'
						AND archivo.car_id=carpeta.car_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				
				elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta!="")
				{
					$filadatos10=mysqli_fetch_array($datos20);
					echo $filadatos10['arc_fechadocumento']; echo " > "; 
					echo $filadatos10['ofi_nombre']; echo " > ";
					echo $filadatos10['lug_detalles']; echo " > Carpeta: "; echo $filadatos10['car_nombre'];
					$sql = "SELECT * 
						FROM archivo, lugar, oficina, usuario, ubicacion_digital, carpeta, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.arc_fechadocumento='$fecha'
						AND archivo.car_id=carpeta.car_id
						AND archivo.caj_id=''";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				
				elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta=="")
				{
					$filadatos3=mysqli_fetch_array($datos6);
					echo $filadatos3['arc_fechadocumento']; 
					echo " > "; echo $filadatos3['ofi_nombre']; echo " > ";
					echo $filadatos3['lug_detalles'];
					$sql = "SELECT * 
						FROM archivo, oficina, usuario, ubicacion_digital, carpeta, caja, lugar, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.car_id=carpeta.car_id
						AND caja.caj_id=archivo.caj_id
						AND lugar.ofi_id=oficina.ofi_id
						AND lugar.lug_id='$lugar'
						AND carpeta.lug_id=lugar.lug_id
						AND arc_fechadocumento='$fecha'";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				elseif($fecha!="" && $oficina!="" && $lugar=="" && $caja=="" && $carpeta=="")
				{
					$filadatos4=mysqli_fetch_array($datos8);
					echo $filadatos4['arc_fechadocumento']; echo " > "; echo $filadatos4['ofi_nombre'];
					$sql = "SELECT * 
						FROM archivo, oficina, usuario, ubicacion_digital, carpeta, lugar, tipo-archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.arc_fechadocumento='$fecha'
						AND archivo.car_id=carpeta.car_id
						AND lugar.ofi_id=oficina.ofi_id
						AND carpeta.lug_id=lugar.lug_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				elseif($fecha!="" && $oficina=="" && $lugar=="" && $caja=="" && $carpeta=="")
				{
					$filadatos5=mysqli_fetch_array($datos10);
					echo $filadatos5['arc_fechadocumento']; 
					$sql = "SELECT * 
						FROM archivo, ubicacion_digital, caja, carpeta, lugar, oficina, tipo_archivo
						WHERE  archivo.arc_id=ubicacion_digital.arc_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.arc_fechadocumento='$fecha'
						AND archivo.car_id=carpeta.car_id
						AND archivo.caj_id=caja.caj_id
						AND lugar.ofi_id=oficina.ofi_id
						AND carpeta.lug_id=lugar.lug_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta!="")
				{
					$filadatos6=mysqli_fetch_array($datos12);
					echo $filadatos6['ofi_nombre']; echo " > ";
					echo $filadatos6['lug_detalles']; echo " > Caja: "; 
					echo $filadatos6['caj_nombre']; echo " > Carpeta: "; echo $filadatos6['car_nombre'];
					$sql = "SELECT * 
						FROM archivo, carpeta, lugar, oficina, caja, usuario, ubicacion_digital, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND carpeta.car_id=archivo.car_id
						AND lugar.lug_id=carpeta.lug_id
						AND carpeta.car_id='$carpeta'
						AND caja.caj_id=archivo.caj_id
						AND lugar.lug_id=caja.lug_id
						AND caja.caj_id='$caja'
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta=="")
				{
					$filadatos7=mysqli_fetch_array($datos14);
					echo $filadatos7['ofi_nombre']; echo " > ";
					echo $filadatos7['lug_detalles']; echo " > Caja: "; echo $filadatos7['caj_nombre'];
					$sql = "SELECT * 
						FROM archivo, lugar, oficina, caja, usuario, ubicacion_digital, carpeta, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND caja.caj_id=archivo.caj_id
						AND lugar.lug_id=caja.lug_id
						AND caja.caj_id='$caja'
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.car_id=carpeta.car_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				
				
				elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta!="")
				{
					$filadatos11=mysqli_fetch_array($datos22);
					echo $filadatos11['ofi_nombre']; echo " > ";
					echo $filadatos11['lug_detalles']; echo " > Carpeta: "; echo $filadatos11['car_nombre'];
					$sql = "SELECT * 
						FROM archivo, lugar, oficina, usuario, ubicacion_digital, carpeta, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND lugar.lug_id='$lugar'
						AND lugar.ofi_id=oficina.ofi_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.car_id=carpeta.car_id
						AND archivo.caj_id=''";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				
				
				
				elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta=="")
				{
					$filadatos8=mysqli_fetch_array($datos16);
					echo $filadatos8['ofi_nombre']; echo " > ";
					echo $filadatos8['lug_detalles'];
					$sql = "SELECT * 
						FROM archivo, oficina, usuario, ubicacion_digital, carpeta, lugar, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.car_id=carpeta.car_id
						AND lugar.ofi_id=oficina.ofi_id
						AND lugar.lug_id='$lugar'
						AND carpeta.lug_id=lugar.lug_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				elseif($fecha=="" && $oficina!="" && $lugar=="" && $caja=="" && $carpeta=="")
				{
					$filadatos9=mysqli_fetch_array($datos18);
					echo $filadatos9['ofi_nombre'];
					$sql = "SELECT * 
						FROM archivo, oficina, usuario, ubicacion_digital, carpeta, lugar, tipo_archivo
						WHERE usuario.usu_id=archivo.usu_id
						AND oficina.ofi_id='$oficina'
						AND archivo.ubi_id=ubicacion_digital.ubi_id
						AND tipo_archivo.tip_id=ubicacion_digital.tip_id
						AND archivo.car_id=carpeta.car_id
						AND lugar.ofi_id=oficina.ofi_id
						AND carpeta.lug_id=lugar.lug_id";
					$result = $link->query($sql);
					include "busqueda2.php";
				}
				}
			}



?> 
			</table> 
            </center>    

</div><br><br><br>
				<center>
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
<?
}
?>
</form>
</body>
</html>