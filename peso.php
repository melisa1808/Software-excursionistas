
<?php
	
    include('conexion.php');
	$IdRiscos = $_POST['IdRiscos'];
	$queryM = "SELECT PesoMaximo FROM riscos WHERE IdRiscos = $IdRiscos ";
    $resultado = $conex->query($queryM);
	while($rowM = $resultado->fetch())
	{
	$html.= "<option value=''>".$rowM['PesoMaximo']."</option>";
	}
	echo $html;
   
?>		
