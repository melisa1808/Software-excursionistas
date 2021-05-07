
<?php
    include('conexion.php');
	$IdRiscos = $_POST['IdRiscos'];
	$queryC = "SELECT MinCalorias FROM riscos WHERE IdRiscos = $IdRiscos ";
    $resultadoC = $conex->query($queryC);
	while($rowC = $resultadoC->fetch())
	{
	$html.= "<option value=''>".$rowC['MinCalorias']."</option>";
	}
	echo $html;
   
?>		
