<?php 
    include "../controlador/conexion.php";
    include "../modelo/Acceso.php";

    $nombre = $_POST['nombre'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
    $p1=sha1($p1);

       

$Db =Db ::Conectar();//cadena de conexion
$sql = $Db->query("UPDATE usuarios set Password='$p1' where Nombre='$nombre' ");//insertar datos 
$sql->execute();//ejecutar consulta
Db ::CerrarConexion($Db);
$sql->bindValue('nombre',$nombre->getNombre());


echo "<script> alert('Contraseña cambiada');location='index.html'</script>";
        
    }else{
        echo "<script> alert('Error de Cambio');location='reset.php'</script>";
    }
?>