<script>
function Valida ()
{	
	if(document.frmcaja.lstlugar.value==''){
		alert('Seleccione el lugar donde se alojará el documento');
		document.frmcaja.lstlugar.focus();
		return false;
	}
	
	else
		return true
	}

</script>
<body>
<form name="frmproc4" onSubmit="return Valida()">
<?php
include 'conexion.php';

$q=$_POST['q'];
//$con=conexion();

$res="select * from lugar where ofi_id=".$q."";
$res2 = $link->query($res);

?>

<select name="lstlugar">
<option></option>
<?php while($fila=mysqli_fetch_array($res2)){ ?>

<option value="<?php echo $fila['lug_id']; ?>"><?php echo $fila['lug_detalles']; ?></option>
<?php } ?>

</select><br>
</form>
</body>
