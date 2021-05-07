<?php
	
    include('conexion.php');
	$IdProducto = $_POST['IdProducto'];
	$queryM = "SELECT Peso FROM productos WHERE IdProducto = $IdProducto ";
    $resultado = $conex->query($queryM);
	while($rowM = $resultado->fetch())
	{
	$html.= "<option value=''>".$rowM['Peso']."</option>";
	}
	echo $html;
   
?>		
