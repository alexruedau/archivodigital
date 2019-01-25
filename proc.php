<!-- Formulario en el que dependiendo de la selección de oficina en aplicacion.php y mediante parámetro "q" recibido se cargará el select dependiente de lugares -->

<!-- Validación para que se seleccione obligatoriamente un lugar -->
<script>
	function Valida ()
	{	
		if(document.frmcarpeta.lstlugar.value==''){
			alert('Seleccione el lugar donde se alojará el documento');
			document.frmcarpeta.lstlugar.focus();
			return false;
		}
		else
			return true
		}
</script>
<body>
<form name="frmproc" onSubmit="return Valida()">
<?php
include 'conexion.php';//Llamado a la base de datos

$q=$_POST['q'];//Recibiendo valor de "q" que será el valor de la oficina seleccionada

$res="SELECT * FROM lugar
	 WHERE ofi_id='".$q."'";//Consulta para extraer todos los lugares vinculados a la oficina seleccionada
$res2 = $link->query($res);

?>
<!--cuando se selecciona una oficina se ejecuta la funcion myFunction2() ubicada en el archivo aplicacion.php-->
<select  id="lugar" onChange="myFunction2(this.value)" name="lstlugar">
	<option></option>
<?php 
	while($fila=mysqli_fetch_array($res2))
	{ 
?>
	<option value="<?php echo $fila['lug_id']; ?>"><?php echo $fila['lug_detalles']; ?>
    </option>
<?php
	} 
?>

</select>
</form>
</body>


