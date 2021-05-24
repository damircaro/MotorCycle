<?php

include("../controlador/controladorCliente.php");
$cliente=$ControladorCliente->buscarCliente($_GET['idCliente']);
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
  <title>Editar Cliente</title>
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

<h2 align="center"> Editar Cliente</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmCliente" id="frmRol" method="POST" action="../controlador/controladorCliente.php">
    <label >Id Cliente</label>
        <input type="text" readonly name="idCliente" value="<?php echo $cliente['IdCliente']?>" id="idCliente"  class="form-control" >
        <br>
        <label >Documento  Cliente</label>
        <input type="text" name="documentoCliente" value="<?php echo $cliente['Documento']?>" id="documentoCliente"  class="form-control">
        <br>
        <label >Nombre Cliente</label>
        <input type="text" name="nombreCliente" value="<?php echo $cliente['Nombre']?>" id="nombreCliente"  class="form-control">
        <br>
        <label >Celular  Cliente</label>
        <input type="text" name="celularCliente" value="<?php echo $cliente['Celular']?>" id="celularCliente"  class="form-control">
        <br>
        <label >Placa Cliente</label>
        <input type="text" name="placaCliente" value="<?php echo $cliente['Placa']?>" id="placaCliente"  class="form-control">
        <br>
        <button type="submit" name="actualizarCliente" class="btn btn-primary">Guardar Cambios</button>
       
       
        

    </form>
</div>
</div>
</body>
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