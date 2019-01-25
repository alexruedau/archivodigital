<body>
<form name="frmproc2" onSubmit="return Valida()">
<?php
include 'conexion.php';

$r=$_POST['r'];
//$con=conexion();

$res="select * from carpeta where lug_id=".$r."";
$res2 = $link->query($res);
$res3="select * from caja where lug_id=".$r."";
$res4 = $link->query($res3);

?>
<table>
<tr>
<td>
<select id="caja" name="lstcaja">
<option></option>
<?php while($fila2=mysqli_fetch_array($res4)){ ?>
 <option value="<?php echo $fila2['caj_id']; ?>"><?php echo $fila2['caj_nombre']; ?></option>
<?php } ?>

</select>
</td>
<td>
<select id="carpeta" name="lstcarpeta">

<option></option>
<?php while($fila=mysqli_fetch_array($res2)){ ?>
 <option value="<?php echo $fila['car_id']; ?>"><?php echo $fila['car_nombre']; ?></option>
<?php } ?>

</select>
</td>
</tr>
</table>
</form>
</body>