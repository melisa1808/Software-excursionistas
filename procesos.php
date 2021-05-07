
<?php session_start();
 /** agregar risco   */
   include("./conexion.php");

   if (isset($_POST['guardar'])){
   $nombreRisco = $_POST['nombreRisco'];
   $pesoMax =$_POST['pesoMax'];
   $unidadMasa= $_POST["unidadMasa"];
   $caloriaMin= $_POST["caloriaMin"];
   $sql ="INSERT INTO riscos (NombreRisco,PesoMaximo,unidadMasa,MinCalorias) VALUES (?,?,?,?)";
   $resultado= $conex->prepare($sql);
   $resultado->execute([ $nombreRisco,$pesoMax,$unidadMasa,$caloriaMin]);

   
  header('location:index.php');
  }

 
   /** editar risco   */

include('./conexion.php');
if(isset($_POST['editar'])){
    $IdRiscos = $_GET['Id'];
    $NombreRisco	 =  $_POST['NombreRisco'];
    $PesoMaximo = $_POST['PesoMaximo'];
    $UnidadMasa = $_POST['UnidadMasa'];
    $MinCalorias = $_POST['MinCalorias'];
   $consulta = $conex->prepare("UPDATE riscos SET NombreRisco=:NombreRisco, PesoMaximo=:PesoMaximo, UnidadMasa=:UnidadMasa, MinCalorias=:MinCalorias WHERE 	IdRiscos = '$IdRiscos'");
   $consulta->bindparam(":NombreRisco",$NombreRisco);
   $consulta->bindparam(":PesoMaximo",$PesoMaximo);
   $consulta->bindparam(":UnidadMasa",$UnidadMasa);
   $consulta->bindparam(":MinCalorias",$MinCalorias);
   $consulta->execute();
   
   header("location:index.php");
}
/** Eliminar Riscos   */
include('./conexion.php');
if(!empty($_GET['Idriscos'])){
  $IdRiscos = $_GET['Idriscos'];
  $sql = "DELETE FROM riscos WHERE IdRiscos = $IdRiscos";
  $resultado=$conex->query($sql); 
  
  if (!$resultado){
      die ("error");
  }

 header("location:index.php");
}

/** agregar Usuario   */
include("./conexion.php");

if (isset($_POST['guardarU'])){
$NombreUsuario = $_POST['NombreUsuario'];
$CedulaUsuario = $_POST['CedulaUsuario'];
$query = "SELECT  CedulaUsuario FROM usuario WHERE CedulaUsuario=$CedulaUsuario ";
$resultado = $conex->query($query);
if ($row = $resultado->rowCount()==0 ) {
$sql ="INSERT INTO usuario (NombreUsuario,CedulaUsuario) VALUES (?,?)";
$resultado= $conex->prepare($sql);
$resultado->execute([$NombreUsuario,$CedulaUsuario]);
if (!$resultado){
    die ("error");
}
header("location:index.php");
}else{
    echo  "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>USUARIO</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> Este Usuario ya se encuentra registrado en la base de datos</p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";
}

}
 /** editar Usuario   */

 include('./conexion.php');
 if(isset($_POST['editarU'])){
     $IdUsuario = $_GET['Id'];
     $NombreUsuario	 =  $_POST['NombreUsuario'];
     $CedulaUsuario = $_POST['CedulaUsuario'];
    $consulta = $conex->prepare("UPDATE usuario SET NombreUsuario=:NombreUsuario, CedulaUsuario=:CedulaUsuario WHERE 	IdUsuario = '$IdUsuario'");
    $consulta->bindparam(":NombreUsuario",$NombreUsuario);
    $consulta->bindparam(":CedulaUsuario",$CedulaUsuario);
    $consulta->execute();
    
    header("location:index.php");
 }

 /** Eliminar Usuario  */

include('./conexion.php');
if(!empty($_GET['IdUsuario'])){
   $IdUsuario = $_GET['IdUsuario'];

  $query = "SELECT IdUsuario FROM registro WHERE IdUsuario=$IdUsuario ";
  $resultado = $conex->query($query);
  if ($row = $resultado->rowCount()==0 ) {

  $sql = "DELETE FROM usuario WHERE	IdUsuario = $IdUsuario";
  $resultado=$conex->query($sql); 
  
  if (!$resultado){
      die ("error");
  }
  header("location:index.php");
  } else{
    echo  "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>USUARIOS</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> Este Usuario se encuentra en la tabla registro no se puede eliminar</p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";
  }
 
}


/** agregar Producto   */
include("./conexion.php");

if (isset($_POST['guardarP'])){
$NombreProducto = $_POST['NombreProducto'];
$Peso =$_POST['Peso'];
$unidadMasa = $_POST['unidadMasa'];
$Calorias =$_POST['Calorias'];
$sql ="INSERT INTO productos (NombreProducto,Peso,unidadMasa,Calorias) VALUES (?,?,?,?)";
$resultado= $conex->prepare($sql);
$resultado->execute([$NombreProducto,$Peso,$unidadMasa,$Calorias]);


header('location:index.php');
}
 /** editar producto   */

 include('./conexion.php');
 if(isset($_POST['editarP'])){
     $IdProducto = $_GET['Id'];
     $NombreProducto	 =  $_POST['NombreProducto'];
     $Peso = $_POST['Peso'];
     $unidadMasa	 =  $_POST['unidadMasa'];
     $Calorias = $_POST['Calorias'];
    $consulta = $conex->prepare("UPDATE productos SET NombreProducto=:NombreProducto, Peso=:Peso, unidadMasa=:unidadMasa, 	Calorias=:Calorias WHERE 	IdProducto = '$IdProducto'");
    $consulta->bindparam(":NombreProducto",$NombreProducto);
    $consulta->bindparam(":Peso",$Peso);
    $consulta->bindparam(":unidadMasa",$unidadMasa);
    $consulta->bindparam(":Calorias",$Calorias);
    $consulta->execute();
    
    header("location:index.php");
 }

 /** Eliminar producto  */
include('./conexion.php');
if(!empty($_GET['IdProducto'])){
  $IdProducto = $_GET['IdProducto'];

  $query = "SELECT IdProducto FROM registro WHERE IdProducto=$IdProducto ";
  $resultado = $conex->query($query);
  if ($row = $resultado->rowCount()==0 ) {

  $sql = "DELETE FROM productos WHERE	IdProducto = $IdProducto";
  $resultado=$conex->query($sql); 
  
  if (!$resultado){
      die ("error");
  }
  header("location:index.php");
  } else{
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>PRODUCTOS</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> Este Producto se encuentra en la tabla registro no se puede eliminar</p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";
  }
 
}

/** Guardar Registro**/ 
if (isset($_POST['guardarRegistro'])){
include("./conexion.php");
$IdUsuario = $_POST['usuario'];
$IdRiscos = $_POST['riscos1'];
$IdProducto = $_POST['producto1'];
$Cantidad = intval($_POST['Cantidad']);


$caloriasTotal=0;
$caloriasp=0;
$pesoTotal=0;
$IdUsuarioRegistro=0;
$IdRiscosRegistro=0; 
$IdProductoRegistro=0;
$PesoRegistro=0;
$CantidadRegistro=0;
$Calorias=0;
$pesoproducto=0;
$query = "SELECT  PesoMaximo,UnidadMasa,MinCalorias FROM riscos WHERE IdRiscos=$IdRiscos ";
$resultado = $conex->query($query);
while ($row = $resultado->fetch()) { 
    $PesoMaximo=intval($row['PesoMaximo']);
    $UnidadMasa= $row['UnidadMasa']; 
    $MinCalorias=intval($row['MinCalorias']);
}
$query = "SELECT IdUsuario,IdRisco,IdProducto, Peso ,UnidadMasa, MinCalorias as Calorias, Cantidad FROM registro WHERE IdUsuario=$IdUsuario and IdRisco = $IdRiscos";
$resultado = $conex->query($query);
while ($row = $resultado->fetch()) { 
     $PesoRegistro=$PesoRegistro+intval($row['Peso']);
    $UnidadMasa= $row['UnidadMasa']; 
    $Calorias=intval($row['Calorias']);
    $CantidadRegistro=intval($row['Cantidad']);
    $IdUsuarioRegistro=intval($row['IdUsuario']);
    $IdRiscosRegistro=intval($row['IdRisco']);
    $IdProductoRegistro=intval($row['IdProducto']);
}

$query = "SELECT  Peso ,UnidadMasa, Calorias FROM productos WHERE IdProducto=$IdProducto ";
$resultado = $conex->query($query);
while ($row = $resultado->fetch()) { 
    $Peso =($row['Peso']);
    $unidadMasa= $row['UnidadMasa']; 
    $MinCaloria=($row['Calorias']);   
} 

 $pesoproducto=($Peso*$Cantidad);
 $pesoTotal =  $PesoRegistro+$pesoproducto;
 $caloriasp =$Calorias+($MinCaloria*$Cantidad);
 $caloriasTotal =($MinCaloria*$Cantidad);
 $cantidadTotal=$CantidadRegistro+$Cantidad;
if($pesoTotal <= 999){
     $unidadMasa='gramo';

}
if($pesoTotal >= 1000){
    $unidadMasa='kilogramo';
}

if ($pesoTotal > $PesoMaximo ){
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>ALERTA</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> El peso sobre pasa el limite asignado verifique sus productos  </p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";
}

if ($caloriasp <= $MinCalorias ){
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>ALERTA</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> Las calorias  son insuficientes  verifique sus productos </p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";

}

if ($pesoTotal > $PesoMaximo){
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>ALERTA</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
    <!-- modal de boostrap -->
    <div class='modal' tabindex='-1' role='dialog' id='myModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>ALERTA</h5>
            </div>
            <div class='modal-body'>
                <p> Las calorias  son insuficientes  verifique sus productos </p>
            </div>
            <div class='modal-footer'>
                <a href='index.php'><button type='button' class='btn btn-secondary'>Cerrar</button></a>
            </div>
            </div>
        </div>
        </div>
    ";

}

if ($IdUsuario==$IdUsuarioRegistro && $IdRiscos== $IdRiscosRegistro && $IdProducto==$IdProductoRegistro && $pesoTotal <= $PesoMaximo ) {
  $consulta = $conex->prepare("UPDATE registro SET   Peso=:Peso,Cantidad=:Cantidad,MinCalorias=:MinCalorias   WHERE 	IdProducto = $IdProducto and IdUsuario=$IdUsuario and  IdRisco=$IdRiscos");
    $consulta->bindparam(":Peso",$pesoTotal);
    $consulta->bindparam(":Cantidad",$cantidadTotal);
    $consulta->bindparam(":MinCalorias",$caloriasp);
    $consulta->execute();
    header('location:index.php'); 
 
} else{ 
    if ($pesoTotal <= $PesoMaximo ){
         
        
        if ($row = $resultado->rowCount()>0){
        $sql ="INSERT INTO registro (IdUsuario,IdRisco,IdProducto,Peso,Cantidad,unidadMasa,MinCalorias) VALUES (?,?,?,?,?,?,?)";
        $resultado1= $conex->prepare($sql);
        $resultado1->execute([$IdUsuario,$IdRiscos,$IdProducto,$pesoproducto,$Cantidad,$unidadMasa,$caloriasTotal]);
        header('location:index.php'); 
        }
    }


}   


}
 
 /** Eliminar registro  */
include('./conexion.php');
if(!empty($_GET['IdRegistro'])){
  $IdRegistro = $_GET['IdRegistro'];
  $sql = "DELETE FROM registro WHERE IdRegistro = $IdRegistro";
  $resultado=$conex->query($sql); 
  
  if (!$resultado){
      die ("error");
  }

 header("location:index.php");
 
}


?>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- mostrar el modal al cargar la página-->
<script type="text/javascript">
        $(window).on('load',function(){
        $('#myModal').modal('show');
        });
</script>


 
