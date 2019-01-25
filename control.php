<?
include "conexion.php";

/* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función htmlentities para evitar inyecciones SQL. */
$myusuario = "select usu_nombre from usuario
	where usu_nickname='".htmlentities($_POST["usuario"])."'"
	or die ("Error in the consult.." . mysqli_error($link));
$result = $link->query($myusuario);
$sentencia = mysqli_prepare($link, $myusuario);
	
/* ejecutar la consulta */
mysqli_stmt_execute($sentencia);

/* almacenar el resultado */
mysqli_stmt_store_result($sentencia);

//Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
if(mysqli_stmt_num_rows($sentencia) != 0)
{
	$sql = "select * from usuario
    	where usu_estado = 1
        and usu_nickname = '".htmlentities($_POST["usuario"])."' 
        and usu_password = '".htmlentities($_POST["clave"])."'";
 	$myclave = $link->query($sql);
	$sentencia2 = mysqli_prepare($link, $sql);
	$row = mysqli_fetch_array($myclave);
	
	/* ejecutar la consulta */
    mysqli_stmt_execute($sentencia2);

    /* almacenar el resultado */
    mysqli_stmt_store_result($sentencia2);
	
    //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
    if(mysqli_stmt_num_rows($sentencia2) != 0)
	{
    	session_start();
        //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
        $_SESSION["autentica"] = "SI";
        $_SESSION["usuarioactual"] = $row["usu_nombre"]; //nombre del usuario logueado.
		$_SESSION["usuarioid"] = $row["usu_id"];
		//$_SESSION["cargo"] = $row["usu_cargo"];
     	//Direccionamos a nuestra página principal del sistema.
        header ("Location: aplicacion.php");
 	}
    else
	{
    	echo"<script>alert('La contraseña del usuario no es correcta.');
        window.location.href=\"index.php\"</script>"; 
  	}
	/* cerrar la sentencia */
    mysqli_stmt_close($sentencia2);
}
else
{
	echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";
}
/* cerrar la sentencia */
mysqli_stmt_close($sentencia);
?>
s