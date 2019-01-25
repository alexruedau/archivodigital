
<br><br>
<?php
if($fecha!="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta!="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta!="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php	
}
elseif($fecha!="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php	
}
elseif($fecha!="" && $oficina!="" && $lugar=="" && $caja=="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Lugar
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['lug_detalles']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['caj_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php	
}
elseif($fecha!="" && $oficina=="" && $lugar=="" && $caja=="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Oficina
                    </td>
                    <td class="td3">
                    	Lugar
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['ofi_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['lug_detalles']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php	
}
elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta!="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Fecha
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_fechadocumento']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja!="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Fecha
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['arc_fechadocumento']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta!="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha=="" && $oficina!="" && $lugar!="" && $caja=="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Fecha
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php

	
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_fechadocumento']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php
}
elseif($fecha=="" && $oficina!="" && $lugar=="" && $caja=="" && $carpeta=="")
{
?>
            <table>
            	<tr class="style5">
                	<td class="td2">
                    	Palabras Clave
                    </td>
                    <td class="td3">
                    	Fecha
                    </td>
                    <td class="td3">
                    	Lugar
                    </td>
                    <td class="td3">
                    	Caja
                    </td>
                    <td class="td3">
                    	Carpeta
                    </td>
                    <td class="td3">
                    	Ubicación Digital
                    </td>
				</tr>		
<?php
while($fila = mysqli_fetch_array($result))
{
?>
				<tr>
                	<td class="td4 style7">
                    	<? echo $fila['arc_palabrasclave']; ?>
                    </td>
                     <td class="td style7">
                    	<? echo $fila['arc_fechadocumento']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['lug_detalles']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['arc_caja']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['car_nombre']; ?>
                    </td>
                    <td class="td style7">
                    	<? echo $fila['ofi_nombre']; 
						echo " / ";echo $fila["ubi_year"];
						echo " / ";echo $fila["tip_nombre"];
						echo " / ";echo $fila["ubi_docnombre"];
						?>
                    </td>
                    <td class="td5">
                 		<a href="editar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/edit.png" width="20" height="20" title="Editar">
                    	</a>
                 	</td>
                    <td class="td5">
                 		<a href="eliminar.php?id=<?=$fila['arc_id'];?>">
                    		<img src="imagenes/minus.png" width="20" height="20" title="Eliminar">
                    	</a>
                 	</td>
                    
                </tr>
	
<?	
}
?> 
			</table> 
<?php		
}
?>