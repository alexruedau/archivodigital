
<body>
<form name="frmproc5" onSubmit="return Valida()">
<?php
include 'conexion.php';

$r=$_POST['r'];
//$con=conexion();


$res="select * from caja where lug_id=".$r."";
$res2 = $link->query($res);

?>
<select id="caja" name="lstcaja">
<option></option>
<?php while($fila2=mysqli_fetch_array($res2)){ ?>
 <option value="<?php echo $fila2['caj_id']; ?>"><?php echo $fila2['caj_nombre']; ?></option>
<?php } ?>

</select><br>

</form>
</body>