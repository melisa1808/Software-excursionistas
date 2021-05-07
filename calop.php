<?php
    include('conexion.php');
	$IdProducto = $_POST['IdProducto'];
	$queryC = "SELECT Calorias FROM productos WHERE IdProducto = $IdProducto ";
    $resultadoC = $conex->query($queryC);
	while($rowC = $resultadoC->fetch())
	{
	$html.= "<option value=''>".$rowC['Calorias']."</option>";
	}
	echo $html;
   
?>		
