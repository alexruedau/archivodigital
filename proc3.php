<script>
function Valida ()
{	
	if(document.frmproc3.lstlugar.value==''){
		alert('Seleccione el lugar donde se alojará la carpeta');
		document.frmproc3.lstlugar.focus();
		return false;
	}
	
	else
		return true
	}

</script>
<body>
<form name="frmproc3" onSubmit="return Valida()">
<?php
include 'conexion.php';

$q=$_POST['q'];
//$con=conexion();

$res="select * from lugar where ofi_id=".$q."";
$res2 = $link->query($res);

?>

<select name="lstlugar" onChange="myFunction2(this.value)">
<option></option>
<?php while($fila=mysqli_fetch_array($res2)){ ?>

<option value="<?php echo $fila['lug_id']; ?>"><?php echo $fila['lug_detalles']; ?></option>
<?php } ?>

</select><br>
</form>
</body>
