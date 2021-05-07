<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script languje="javascript" src="js/jQuery.js"></script>
 
    
    <title>Excurcionista</title>
</head>
<body>

  <!--HOME START-->
  <section class="cont1">
      <div class="container">
          <h1 class="center">Excursionistas</h1>
          <div class="tabs-1">
        <button class="btn-r" onclick="openRisco('Registros')">Registros</button>
        <button class="btn-r" onclick="openRisco('Tablas')">Riscos</button>
        <button class="btn-r" onclick="openRisco('Usuario')">Usuarios</button>
        <button class="btn-r" onclick="openRisco('Producto')">Productos</button>
        </div>

        <div id="Registros" class="risco">

      <div class="container">
     <div class="row">
     <div class="col-md-12">
       <table class="table tb1">
  <thead>
    <tr>
      <th scope="col">Registro</th>
      <th scope="col">Usuario</th>
      <th scope="col">Riscos</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad </th>
      <th scope="col">Peso </th>
      <th scope="col">Unidad Masa</th>
      <th scope="col">Calorias </th>
      <th scope="col">Acciones </th>
    </tr>
  </thead>
  <tbody>
  <?php  
              include("./conexion.php");
              $query="SELECT a.IdRegistro, b.NombreUsuario,d.NombreRisco,c.Nombreproducto,a.Peso,a.Cantidad,c.UnidadMasa,a.MinCalorias 
              FROM registro  a  
              inner join usuario b  on a.IdUsuario=b.IdUsuario
              inner join  productos c on  a.IdProducto=c.IdProducto
              inner join  riscos d on d.IdRiscos=a.IdRisco ORDER BY b.IdUsuario, d.IdRiscos ";
              $resultado = $conex->query($query);

              while ($row = $resultado->fetch()) { 
                
                ?>
                <tr>
                <th scope="row"><?php echo $row['IdRegistro'] ?></th>
                <td><?php echo $row['NombreUsuario'] ?></td>
                <td><?php echo $row['NombreRisco'] ?></td>
                <td><?php echo $row['Nombreproducto'] ?></td>
                <td><?php echo $row['Cantidad'] ?></td>
                <td><?php echo $row['Peso'] ?></td>
                <td><?php echo $row['UnidadMasa'] ?></td>
                <td><?php echo $row['MinCalorias'] ?></td>
                <?php 
                   
                   echo  " 
                   <td><a href='?IdRegistro=".$row['IdRegistro']."' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteRegistro".$row['IdRegistro']."'> 
                   <i class='fas fa-trash-alt'></i>
                   </a>  
                   </td>
                <!-- Modal eliminar registro-->
               <div class='modal fade' id='deleteRegistro".$row['IdRegistro']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
               <div class='modal-dialog'>
                   <div class='modal-content'>
                   <div class='modal-header'>
                       <h5 class='modal-title' id='exampleModalLabel'>Deseas Eliminar</h5>
                       <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                   </div>
                   <div class='modal-body'>
                
                   Estas seguro que deseas eliminar el registro de la fila   ".$row['IdRegistro']."
                       <div class='modal-footer'>
                       <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                       <a href='procesos.php?IdRegistro=".$row['IdRegistro']." &&boton=deleteRegistro'><button type='submit' class='btn btn-primary' name='deleteRegistro'>Eliminar</button></a>
                   </div>
   
                   </div>
                  
                   </div>
               </div>
               </div>
               <!-- Modal eliminar registro -->
                   "; ?>

                </tr>
                
                <?php } ?>  
    
            </tbody>
          </table>
          <!-- Button  modal   registro -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registro">
                     Registrar
                      </button>
                </div><!---fin col-->


     </div><!--fin row-->



    </div><!--FIN CONTAINER-->
        

        </div>
        <!-------inicio de tablas------>
        <div id="Tablas" class="risco" style="display:none">
           <div class="">
           <div class="row">
               <!--tabla riscos-->
               <div class="col-md-12">
               <h1>Riscos</h1>
               <table class="table tb1">
               <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Risco</th>
                <th scope="col">Peso Max</th>
                <th scope="col">Unidad Masa</th>
                <th scope="col">Calorias Min</th>
                <th scope="col">Acciones</th>
                </tr>
                </thead>
               <tbody>
               <?php  
              include("./conexion.php");
              $query="SELECT * FROM riscos ";
              $resultado = $conex->query($query);

              while ($row = $resultado->fetch()) { ?>
                <tr>
                <th scope="row"><?php echo $row['IdRiscos'] ?></th>
                <td><?php echo $row['NombreRisco'] ?></td>
                <td><?php echo $row['PesoMaximo'] ?></td>
                <td><?php echo $row['UnidadMasa'] ?></td>
                <td><?php echo $row['MinCalorias'] ?></td>
                <?php 
                   
                echo  "  <td >
                <a href='?IdRiscos= ".$row['IdRiscos']."' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editar".$row['IdRiscos']."'> 
                <i class='fas fa-edit'></i>
                </a>   </td>
                <td><a href='?IdRiscos=".$row['IdRiscos']."' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete".$row['IdRiscos']."'> 
                <i class='fas fa-trash-alt'></i>
                </a>  
                </td>
                                            
                <!---modal editar riscos-->
                <div class='modal fade' id='editar".$row['IdRiscos']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Tabla Risco</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form action='procesos.php?Id=".$row['IdRiscos']."' method='POST'>
                   
                    <input type='text' name='IdRiscos' class='form-control' value='" .$row['IdRiscos']."' disabled >
                    <input type='text' name='NombreRisco' class='form-control' value='" .$row['NombreRisco']."' autofocus>
                    <label for=''>Peso Max</label>
                    <input type='text' name='PesoMaximo' class='form-control' value='" .$row['PesoMaximo']. "' autofocus>
                    <select name='UnidadMasa' id='' class='form-control form-control-sm'>
                        <option value='gramo'>Gramo</option>
                        <option value='kilogramo'>Kilogramo</option>
                    </select>
                    <label for=''>Calorias min</label>
                    <input type='number' name='MinCalorias' class='form-control' value='".$row['MinCalorias']. "' autofocus>

                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                    <button type='submit' class='btn btn-primary' name='editar'>Guardar Cambios</button>
                </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>
         <!--modal editar riscos--->

         <!-- Modal eliminar riscos-->
            <div class='modal fade' id='delete".$row['IdRiscos']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Deseas Eliminar</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
             
                Estas seguro que deseas eliminar el Risco de la fila   ".$row['IdRiscos']."
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <a href='procesos.php?Idriscos=".$row['IdRiscos']."'><button type='submit' class='btn btn-primary' >Eliminar</button></a>
                </div>

                </div>
               
                </div>
            </div>
            </div>
            <!-- Modal eliminar riscos -->
                "; ?>
                </tr>
    
                <?php } ?>
               
            </tbody>
            </table>
           <!-- Button  modal agregar  riscos -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Agregar risco
            </button>
          
    
               </div><!--fin tabla riscos-->
               </div><!-----fin row------>
              </div>
                </div><!----fin tabs risco --->
            
        <div id="Usuario" class="risco" style="display:none">
        <div class="tableone">
                <!--tabla usuarios-->
                <div class="row">
               <div class="col-md-12">
               <h1>Usuarios</h1>
               <table class="table tb1">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Cedula</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php  
              include("./conexion.php");
              $query="SELECT * FROM usuario ";
              $resultado = $conex->query($query);

              while ($row = $resultado->fetch()) { ?>
                <tr>
                <th scope="row"><?php echo $row['IdUsuario'] ?></th>
                <td><?php echo $row['NombreUsuario'] ?></td>
                <td><?php echo $row['CedulaUsuario'] ?></td>
            
                <?php 
                   
                echo  "  <td >
                <a href='?IdUsuario= ".$row['IdUsuario']."' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarU".$row['IdUsuario']."'> 
                <i class='fas fa-edit'></i>
                </a>   </td>
                <td><a href='?IdUsuario=".$row['IdUsuario']."' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteU".$row['IdUsuario']."'> 
                <i class='fas fa-trash-alt'></i>
                </a>  
                </td>
                                            
                <!---modal editar usuario-->
                <div class='modal fade' id='editarU".$row['IdUsuario']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Tabla Risco</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form action='procesos.php?Id=".$row['IdUsuario']."' method='POST'>
                   
                    <input type='text' name='IdUsuario' class='form-control' value='" .$row['IdUsuario']."' disabled >
                    <input type='text' name='NombreUsuario' class='form-control' value='" .$row['NombreUsuario']."' autofocus>
                    <label for=''>Cedula</label>
                    <input type='text' name='CedulaUsuario' class='form-control' value='" .$row['CedulaUsuario']. "' autofocus>
                  
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                    <button type='submit' class='btn btn-primary' name='editarU'>Guardar Cambios</button>
                </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>
         <!--modal editar usuario fin--->

         <!-- Modal eliminar usuario-->
            <div class='modal fade' id='deleteU".$row['IdUsuario']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Deseas Eliminar</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                Estas seguro que deseas eliminar el Usuario de la fila   ".$row['IdUsuario']."
        
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <a href='procesos.php?IdUsuario=".$row['IdUsuario']."'><button type='submit' class='btn btn-primary' >Eliminar</button></a>
                </div>

                </div>
               
                </div>
            </div>
            </div>
            <!-- Modal eliminar usuario -->
                "; ?>
                </tr>
    
                <?php } ?>

            </tbody>
            </table>
            <!----boton agregar usuario---->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usuario">
             Agregar usuario
            </button>
               </div>
               <!--tabla usuarios fin-->
           </div>

              </div>
        </div><!-----fin tabs usuario---->
        <div id="Producto" class="risco" style="display:none">
        <div class="tableE">
             <div class="row py-5">
                <h1>Productos</h1>
                   <!--tabla productos -->
               <div class="col-md-12">
               <table class="table tb1">
               <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Producto</th>
                <th scope="col">Peso </th>
                <th scope="col">Unidad Masa</th>
                <th scope="col">Calorias</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php  
              include("./conexion.php");
              $query="SELECT * FROM productos ";
              $resultado = $conex->query($query);

              while ($row = $resultado->fetch()) { ?>
                <tr>
                <th scope="row"><?php echo $row['IdProducto'] ?></th>
                <td><?php echo $row['NombreProducto'] ?></td>
                <td><?php echo $row['Peso'] ?></td>
                <td><?php echo $row['UnidadMasa'] ?></td>
                <td><?php echo $row['Calorias'] ?></td>
            
                <?php 
                   
                echo  "  <td >
                <a href='?IdProducto= ".$row['IdProducto']."' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarP".$row['IdProducto']."'> 
                <i class='fas fa-edit'></i>
                </a>   </td>
                <td><a href='?IdProducto=".$row['IdProducto']."' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteP".$row['IdProducto']."'> 
                <i class='fas fa-trash-alt'></i>
                </a>  
                </td>
                                            
                <!---modal editar Producto-->

                <div class='modal fade' id='editarP".$row['IdProducto']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
               <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Tabla Producto</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form action='procesos.php?Id=".$row['IdProducto']."' method='POST'>
                   
                    <input type='text' name='IdProducto' class='form-control' value='" .$row['IdProducto']."' disabled >
                    <input type='text' name='NombreProducto' class='form-control' value='" .$row['NombreProducto']."' autofocus>
                    <label for=''>Peso</label>
                    <input type='text' name='Peso' class='form-control' value='" .$row['Peso']. "' autofocus>

                    <select name='unidadMasa' id='' class='form-control form-control-sm'>
                        <option value='gramo'>Gramos</option>
                        <option value='kilogramo'>Kilogramo</option>
                    </select>

                    <label for=''>Calorias</label>
                    <input type='number' name='Calorias' class='form-control' value='" .$row['Calorias']. "' autofocus>
                 
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                    <button type='submit' class='btn btn-primary' name='editarP'>Guardar Cambios</button>
                </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>

         <!--modal editar Producto fin--->

         <!-- Modal eliminar Producto-->
            <div class='modal fade' id='deleteP".$row['IdProducto']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Tabla Productos</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    Estas seguro que deseas eliminar el producto de la fila   ".$row['IdProducto']."
        
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <a href='procesos.php?IdProducto=".$row['IdProducto']."'><button type='submit' class='btn btn-primary' >Eliminar</button></a>
                </div>

                </div>
               
                </div>
            </div>
            </div>
            <!-- Modal eliminar producto -->
                "; ?>
                </tr>
    
                <?php } ?>

            </tbody>
            </table>
             <!----boton agregar Producto---->
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#producto">
             Agregar producto
            </button>
               </div>
               <!-----tabla productos fin-->
            </div>
        </div>
        </div><!---fin tabs -productos--->
      </div> 
   
  </section>

  <!--HOME END-->

      <!---modal agregar riscos-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tabla Risco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="procesos.php" method="POST">
        <label for=""> Nombre Risco</label>
        <input class="form-control form-control-sm" name="nombreRisco" type="text" aria-label=".form-control-sm example" required>
        <div class="row">
        <div class="col-md-7">
        <label for="">Peso Maximo</label>
        <input class="form-control form-control-sm" name="pesoMax" type="text" aria-label=".form-control-sm example" required>
        </div>
        <div class="col-md-5 py-4">
        <select name="unidadMasa" id="" class="form-control form-control-sm" >
            <option value="gramo">Gramo</option>
            <option value="kilogramo">Kilogramo</option>
        </select>
        </div>
        </div>
        <label for="">Calorias min</label>
        <input class="form-control form-control-sm" name="caloriaMin" type="number" aria-label=".form-control-sm example" required>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
            <!--modal agregar riscos--->


            
      <!---modal agregar Usuarios-->
      <div class="modal fade" id="usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tabla Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="procesos.php" method="POST">
        <label for=""> Nombre Usuario</label>
        <input class="form-control form-control-sm" name="NombreUsuario" type="text" aria-label=".form-control-sm example" required>
        <label for="">Cedula</label>
        <input class="form-control form-control-sm" name="CedulaUsuario" type="text" aria-label=".form-control-sm example" required>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardarU">Guardar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
            <!--modal agregar Usuarios--->

            
      <!---modal agregar Producto-->
      <div class="modal fade" id="producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tabla Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="procesos.php" method="POST">
        <label for=""> Nombre Producto</label>
        <input class="form-control form-control-sm" name="NombreProducto" type="text" aria-label=".form-control-sm example" required>
        <div class="row">
        <div class="col-md-7">
        <label for="">Peso </label>
        <input class="form-control form-control-sm" name="Peso" type="text" aria-label=".form-control-sm example" required>
        </div>
        <div class="col-md-5 py-4">
        
        <select name='unidadMasa' id='' class="form-control form-control-sm">
          <option value='gramo'>Gramo</option>
          <option value='kilogramo'>Kilogramo</option>
        </select>
        </div>
        </div>
       

     

        <label for="">Calorias </label>
        <input class="form-control form-control-sm" name="Calorias" type="number" aria-label=".form-control-sm example" required>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardarP">Guardar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
            <!--modal agregar Producto--->


               <!---modal registrar escalador -->
      <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro Maleta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="procesos.php" method="POST">
      <label for="">Usuarios </label>
        <Select id="usuario" name ="usuario" class="form-control form-control-sm">
                     <?php 
                       include('./conexion.php');
                      $query = "SELECT * FROM usuario ";
                      $resultado = $conex->query($query);
                      ?>
                        <option>seleccione un usuario</option>
                        <?php
                        while ($row = $resultado->fetch()) { 
                        ?>
                        <option  value="<?php echo $row['IdUsuario'] ?>" ><?php echo $row['NombreUsuario']?></option>
                       <?php } ?> 
                   </Select>
                    <div class="row">
                    <div class="col-md-12">
                    <label for="">Riscos </label>
                  
                    <select name="riscos1" id="riscos1" class="form-control form-control-sm">
                    <?php
                      include('conexion.php');
                    $query = "SELECT IdRiscos, NombreRisco FROM riscos ORDER BY NombreRisco ASC ";
                      $resultado = $conex->query($query);

                      ?>
                    <option vlaue="0">Selecionar risco</option>
                    <?php 
                        while ($row = $resultado->fetch()) { ?>
                        <option value="<?php echo $row['IdRiscos'] ?>"><?php echo $row['NombreRisco'] ?></option>
                          <?php  }  ?> 
                          </select>
                          </div>

                        <div class="row"> 
                        <div class="col-md-6">
                        <div> Peso Maximo: <select name="ps" id="ps" class="form-control form-control-sm">  </select> </div>
                        </div>
                        <div class="col-md-6">
                        <div> Calorias Minimas: <select name="min" id="min" class="form-control form-control-sm">  </select></div>
                        </div>
                        </div>
                    </div><!---fin div row--->

                       <!---detalle producto--->
                       <div class="row">
                    <div class="col-md-12">
                    <label for="">Producto </label>
                  
                    <select name="producto1" id="producto1" class="form-control form-control-sm">
                    <?php
                      include('conexion.php');
                     $query = "SELECT IdProducto, NombreProducto FROM productos ORDER BY NombreProducto ASC ";
                      $resultado = $conex->query($query);

                      ?>
                    <option vlaue="0">Selecionar producto</option>
                    <?php 
                        while ($row = $resultado->fetch()) { ?>
                        <option value="<?php echo $row['IdProducto'] ?>"><?php echo $row['NombreProducto'] ?></option>
                          <?php  }  ?> 
                          </select>
                          </div>

                        <div class="row"> 
                        <div class="col-md-6">
                        <div> Peso : <select name="Pp" id="Pp" class="form-control form-control-sm">  </select> </div>
                        </div>
                        <div class="col-md-6">
                        <div> Calorias : <select name="Cp" id="Cp" class="form-control form-control-sm">  </select></div>
                        </div>
                        </div>
                    </div><!---fin div row--->
                       <!---- fin detalle producto---->

                     <label for="">Cantidad</label>
                      <input class="form-control form-control-sm" name="Cantidad" type="number" aria-label=".form-control-sm example" required><br>
                       
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardarRegistro">Guardar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

  <!--modal para registrar escalador--->

    
  <script>
        var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })


      function openRisco(riscoName) {
  var i;
  var x = document.getElementsByClassName("risco");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(riscoName).style.display = "block";
}
  </script>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/datos.js"></script>

</body>
</html>