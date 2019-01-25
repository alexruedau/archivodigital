<!-- Formulario en que se carga la lista desplegable dependiendo de la selección en proc.php que trae como parámetro "r" y carga cajas y carpetas asociadas al lugar seleccionado -->

<!-- Validaciones para que se seleccione obligatoriamente una carpeta  -->
<script>
function Valida ()
{	
	if(document.frmproc2.lstcarpeta.value==''){
		alert('Seleccione la carpeta donde se alojará el documento');
		document.frmproc2.lstcarpeta.focus();
		return false;
	}
	
	else
		return true
	}

</script>

<body>
<form name="frmproc2" onSubmit="return Valida()">
<?php
include 'conexion.php';//Llamado a la base de datos

$r=$_POST['r'];//Recibiendo valor de "r" que será el valor del lugar seleccionado

$res="SELECT * FROM carpeta 
	WHERE lug_id=".$r."";//Consulta para cargar las carpetas asociadas al lugar seleccionado
$res2 = $link->query($res);
$res3="SELECT * FROM caja 
	WHERE lug_id=".$r."";//Consulta para cargar las cajas asociadas al lugar seleccionado
$res4 = $link->query($res3);

?>
<!-- Lista desplegable para las cajas (no es obligatorio realizar selección) -->
<select id="caja" name="lstcaja">
	<option></option>
<?php 
	while($fila2=mysqli_fetch_array($res4))
	{ 
?>
 		<option value="<?php echo $fila2['caj_id']; ?>">
			<?php echo $fila2['caj_nombre']; ?>
        </option>
<?php 
	} 
?>

</select><br>
<!-- Lista desplegable para las carpetas (selección obligatoria) -->
<select id="carpeta" name="lstcarpeta">
	<option></option>
<?php 
	while($fila=mysqli_fetch_array($res2))
	{ 
?>
 		<option value="<?php echo $fila['car_id']; ?>">
			<?php echo $fila['car_nombre']; ?>
      	</option>
<?php 
	} 
?>

</select><br>
<!-- Caja de texto para ingresar el número de hoja en la carpeta(no es obligatorio)  -->
<input type="text" name="txtnumhoja" placeholder="Número de Hoja">
</form>
</body>