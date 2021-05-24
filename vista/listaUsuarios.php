<?php 
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
  <title>Usuarios</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body class="sb-nav-fixed">


 <!--aca por medio del include se incluye el sidebar-->
 <?php include 'sidebar.php'; ?>
 <!--aca por medio del include se incluye el sidebar-->
 
        <div class="container-fluid">
       
          <h1 class="mt-4">Tabla de Usuarios</h1>   
          
          
          <a class="btn btn-success" href="registroUsuario.php" <?php if($rol!=1){ ?> style="display: none;" <?php } ?> type="button">
              <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Nuevo
            </a>
          <div class="card mb-4">
         
          <div class="card mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<th>IdUsuario</th>
<th>Nombre</th>
<th>Rol</th>
<th>Estado</th>
<th<?php if($rol!=1){ ?> style="display: none;" <?php } ?>>Correo</th>
<th>Acciones</th>
</thead>
<tbody>
<?php
foreach($listaUsuarios as $usuarios) {
    ?>

    <tr>
    <td><?php echo $usuarios['IdUsuario'];?></td>
    <td><?php echo $usuarios['Nombre'];?></td>    
    <td><?php echo $usuarios['IdRol'];?></td>
    <td><?php echo $usuarios['Estado'];?></td>
    <td <?php if($rol!=1){ ?> style="display: none;" <?php } ?>><?php echo $usuarios['Correo'];?></td>
    <td>
    <form action="../controlador/controlador.php" method="POST">
    <input type="hidden" name="idProducto" value="<?php echo $producto['idProducto'];?>">
    <button type="submit" <?php if($rol!=1){ ?> style="display: none;" <?php } ?> name="editarProducto" class="btn btn-primary">Editar</button>
    <button type="button" <?php if($rol!=1){ ?> style="display: none;" <?php } ?> name="eliminar" class="btn btn-primary" onclick="eliminarUsuario(<?php echo $producto['IdUsuario']; ?>)">Eliminar</button>
    </form>
    
    <a href="#" class="btn btn-warning">Habilitar</a></td>
    
    </tr>
    <?php
}
?>

</tbody>
</table>
              </div>
             
            </div>
          </div>
        
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; MOTORCYCLE</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>