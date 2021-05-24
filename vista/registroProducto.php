<?php 
include("../controlador/controladorCategoria.php");
$listarCategoria= $ControladorCategoria->listarCategoria();

include("../controlador/controladorMarca.php");
$listarMarca= $ControladorMarca->listarMarca();

session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorAcceso.php");
$listaUsuarios = $Controlador->listarUsuario();
$nombre=$_SESSION['nombreUsuario'];
$rol=$_SESSION['IdRol'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Registrar Producto</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>
<body>

 <!--aca por medio del include se incluye el sidebar-->
 <?php include 'sidebar.php'; ?>
 <!--aca por medio del include se incluye el sidebar-->

<div class="container mt-4">
        <div class="card border-info">

<div class="card-header bg-dark text-white">

<h2 align="center"> Registro De Producto</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmProducto" id="frmRol" method="POST" action="../controlador/controlador.php">
        <label >Nombre Producto</label>
        <input  type="text" name="nombreProducto" id="nombreProducto"  class="form-control">
        <br>
        <label >Categoria Producto</label>
        <!--no olvidad que el name y el id es los mismos nombre en el controlador del isset   $Controlador->registroProducto($_POST['idCategoria'],$_POST['idMarca']); -->
        <select  name="idCategoria" id="idCategoria" class="form-control">

            <option value="">seleccione</option>
            <?php 
            foreach($listarCategoria as $categoria)
            {
                ?>
                 <option value="<?php echo $categoria['IdCategoria']?>">
                 <?php echo $categoria['NombreCategoria'],"  ID=  ".$categoria['IdCategoria']?>

                </option>
                
                <?php
            }
            ?>
        </select>
        <br>
        <label >Marca Producto</label>
        <select  name="idMarca" id="idMarca" class="form-control">

            <option value="">seleccione</option>
            <?php 
            foreach($listarMarca as $marca)
            {
                ?>
                 <option value="<?php echo $marca['IdMarca']?>">
                 <?php echo $marca['NombreMarca'],"  ID=  ".$marca['IdMarca']?>

                </option>
                
                <?php
            }
            ?>
        </select>

        <br>
        <label >Valor Producto</label>
        <input type="number" name="valorProducto" id="valorProducto" step="0.1"  class="form-control">
        <br>
        <label >Stock Producto</label>
        <input type="number" name="stockProducto" id="stockProducto"   class="form-control">
        <br>

        <label >Stock  Maximo Producto</label>
        <input type="number" name="stockMaximoProducto" id="stockMaximoProducto"   class="form-control">
        <br>
        <label >Stock Minimo Producto</label>
        <input type="number" name="stockMinimoProducto" id="stockMinimoProducto"   class="form-control">
        <br>
        <label >Estado</label>
        <select  name="estadoProducto" id="estadoProducto"name="" class="form-control">
            <option value="">seleccione</option>
            <option value="1">activo</option>
            <option value="0">inactivo</option>
        </select>
        <br>
        <br>
        
        <button type="submit" name="registroProducto" class="btn btn-primary">Registrar</button>
       
       
        

    </form>
    
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="js/scripts.js"></script>
<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->
</html>