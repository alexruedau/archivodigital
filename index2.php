<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Iniciar sesión</title>
<link rel="shortcut icon" href="../controlestadistico/imagenes/AE.ico">
<LINK href='../controlestadistico/estilos.css' type=text/css rel=stylesheet>


</head>
<body class="body"> <br><br><br><br>
<form action="control.php" method="post" id="form"> 
<div id="contenedor" class="content" style="background-color:#FFF" align="center">
<h1 align="center"><span class="style1">INICIAR SESIÓN</span></h1>

        <center>
          	<table>
   				<tr> 
                	<td width="90px">
                    	<span class="style2">Usuario:</span>
                    </td>
      				<td width="170px" align="right">
            			<input type="text" name="usuario" id="usuario" />
                    </td>
            	</tr>
    			<tr>
      				<td>
                    	<span class="style2">Contraseña</span>:
                    </td>
      				<td width="170px" align="right">
           				<input type="password" name="clave" id="clave" />
                    </td>
    			</tr>
  			</table>
		</center><br>
            <input type="submit" name="enviar" value="Ingresar" id="submit"/>
          

</div>                  
</form>
</body>
</html>