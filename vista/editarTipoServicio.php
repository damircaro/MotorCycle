<?php



include("../controlador/controladorTipoServicio.php");
$tipoServicio=$ControladorTipoServicio->BuscarTipoServicio($_GET['idTipoServicio']);



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
  <title>Editar Tipo Servicio</title>
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

<h2 align="center"> Editar Tipo Servico</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmTipoServicio" id="frmRol" method="POST" action="../controlador/controladorTipoServicio.php">
    <label >Id Tipo Servicio</label>
        <input type="text" readonly name="idTipoServicio" value="<?php echo $tipoServicio['IdTipoSer']?>" id="idTipoServicio"  class="form-control" >
        <br>
        <label >Nombre Tipo Servicio</label>
        <input type="text" name="nombreTipoServicio" value="<?php echo $tipoServicio['Nombre']?>" id="nombreTipoServicio"  class="form-control">
        <br>

        <label >Estado</label>
        <select  name="estadoTipoServicio" id="estadoTipoServicio" class="form-control">
            <option value="">seleccione</option>
            <option value="1" <?php if ($tipoServicio['Estado']==1){?> selected <?php }?>>activo</option>
            <option value="0"<?php if($tipoServicio['Estado']==0){?> selected <?php }?>>inactivo</option>
        </select>
        <br>

        <button type="submit" name="actualizarTipoServicio" class="btn btn-primary">Guardar Cambios</button>
       
       
        

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