
<?php
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
  <title> Marcas Productos</title>
  <link href="css/styles.css" rel="stylesheet" />
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>
<body>
  <!--aca por medio del include se incluye el sidebar-->
<?php include 'sidebar.php'; ?>
 <!--aca por medio del include se incluye el sidebar-->
<div class="container mt-4">
<div class="card border-infos">

<div class="card-header bg-dark text-white">
<a href="../controlador/controladorMarca.php?registroMarca" class="btn btn-primary">nuevo</a>

<h2 align="center"> Marcas Productos</h2>
</div>
</div>
<div class="card-body">
<table class="display" style="width:100%" id="tablaProductos">
<thead>
<tr>
<th >Id Marca</th>
<th >Nombre Marcas</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php 

foreach($listarMarca as $marca)
{
    ?>
    <tr>
    <td><?php echo $marca['IdMarca'];  ?></td>
    <td><?php echo $marca['NombreMarca'];  ?></td>
    <td>
    <form method="POST" action="../controlador/controladorMarca.php">
         <input hidden name="idMarca" value="<?php echo $marca['IdMarca'];?>"/>
        <button type="submit" name="editarMarca"class="btn btn-warning">Editar</button>
        <button type="button" name="eliminar" class="btn btn-danger" onclick="eliminarMarca(<?php echo $marca['IdMarca'];?>)">Eliminar</button>
       
    </form>
    
    
    </tr>
    <?php 
}
?>
</tbody>
</table>

</div>
</div>
    
    
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="js/scripts.js"></script>

<!-- links data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.24/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.24/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- fin links data table -->

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

<script>
$(document).ready(function() {
    $('#tablaProductos').DataTable({
        "language": {
            "lengthMenu": "Mostrar cantidad registros _MENU_  por página",
            "zeroRecords": "Nothing found - sorry",
            "info": "Mostrar paginas _PAGE_ en _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            'search':'Buscar',
            'paginate':{'next':'Siguiente','previous':'Anterior'}
        }

    });
} );



</script>
<script >
 function eliminarMarca(idMarca){

let formData = new FormData();
formData.append('idMarca',idMarca);
formData.append('eliminarMarca','');
Swal.fire({
    title: '¿Esta usted seguro de eliminar la Marca?',
    icon:'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si borrar '
}).then((result) => {
if (result.isConfirmed) {

  $.ajax({
      url:'../controlador/controladorMarca.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          alert(response);
      }
  });
Swal.fire(
  'Eliminado!',
  'El registro ha sido eliminado',
  'warning'
);
}
});

}</script>

</html>