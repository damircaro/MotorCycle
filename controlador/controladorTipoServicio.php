<?php


include("../modelo/TipoServicio.php");
include("../modelo/crudTipoServicio.php");
require_once('conexion.php');



class controladorTipoServicio
{

    public function __construct(){}

    public function listarTipoServicio()
    {
        $crudTipoServicio= new crudTipoServicio();//metodo para hacer la peticion de modelo Tipo servicio
        return $crudTipoServicio->listarTipoServicio();// retonar los valores del metodo listar
    }

    public function registroTipoServicio($nombreTipoServicio,$estadoTipoServicio)
    {
        $tipoServicio= new TipoServicio();//crear un objeto tiposervicio

        $crudTipoServicio= new crudTipoServicio();//metodo para hacer la peticion de modelo Tipo servicio
        
        $tipoServicio->setNombreTipoServicio($nombreTipoServicio);
        $tipoServicio->setEstadoTipoServicio($estadoTipoServicio);

        $crudTipoServicio->registroTipoServicio($tipoServicio);

        header('location: ../vista/listarTipoServicios.php');
    }
    public function BuscarTipoServicio($idTipoServicio)
    {
        $crudTipoServicio= new crudTipoServicio();//metodo para hacer la peticion de modelo Tipo servicio
        return $crudTipoServicio->BuscarTipoServicio($idTipoServicio); 
    }
    public function actualizarTipoServicio($idTipoServicio,$nombreTipoServicio,$estadoTipoServicio)
    {
        $tipoServicio= new TipoServicio();//crear un objeto tiposervicio

        
        $tipoServicio->setIdTipoServicio($idTipoServicio);
        $tipoServicio->setNombreTipoServicio($nombreTipoServicio);
        $tipoServicio->setEstadoTipoServicio($estadoTipoServicio);
        $crudTipoServicio= new crudTipoServicio();//metodo para hacer la peticion de modelo Tipo servicio

        $crudTipoServicio->actualizarTipoServicio($tipoServicio);

        header('location: ../vista/listarTipoServicios.php');
    }
    public function eliminarTipoServicio($idTipoServicio)
    {
        $crudTipoServicio= new crudTipoServicio();//metodo para hacer la peticion de modelo Tipo servicio
        return $crudTipoServicio->eliminarTipoServicio($idTipoServicio); 
    }




}

$ControladorTipoServicio=new  controladorTipoServicio();

if(isset($_GET['registroTipoServicio']))
{
    header('location: ../vista/registroTipoServicio.php');

}

if(isset($_POST['registroTipoServicio']))
{
    $ControladorTipoServicio->registroTipoServicio($_POST['nombreTipoServicio'],$_POST['estadoTipoServicio']);
    
}
if(isset($_POST['editarTipoServicio']))
{
    header('location: ../vista/editarTipoServicio.php?idTipoServicio='.$_POST['idTipoServicio']);

}

if(isset($_POST['actualizarTipoServicio']))
{
    $ControladorTipoServicio->actualizarTipoServicio($_POST['idTipoServicio'],$_POST['nombreTipoServicio'],$_POST['estadoTipoServicio']);
    
}
if(isset($_POST['eliminarTipoServicio'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorTipoServicio->eliminarTipoServicio($_POST['idTipoServicio']);
}



?>