<?php 

include("../modelo/Cliente.php");
include("../modelo/crudCliente.php");
require_once("conexion.php");

class controladorCliente
{

    public function __construct(){}


    public function listarCliente()
    {
        $crudCliente= new crudCliente(); 
        return $crudCliente->listarCliente();

    }
    public function registroCliente($documentoCliente,$nombreCliente,$celularCliente,$placaCliente)
    {
        $cliente = new Cliente();//crear objeto de tipo cliente
        $crudCliente= new crudCliente(); 
        
        $cliente->setDocumentoCliente($documentoCliente);//asignar valores a los atributos
        $cliente->setNombreCliente($nombreCliente);
        $cliente->setCelularCliente($celularCliente);
        $cliente->setPlacaCliente($placaCliente);
      
        
        $crudCliente->registroCliente($cliente);

        header('location: ../vista/listarClientes.php');
    }
    public function buscarCliente($idCliente)
    {
        $crudCliente= new crudCliente(); 
        return $crudCliente->buscarCliente($idCliente);

    }
    public function actualizarCliente($idCliente,$documentoCliente,$nombreCliente,$celularCliente,$placaCliente)
    {
        $cliente = new Cliente();//crear objeto de tipo cliente
        
        
        $cliente->setIdCliente($idCliente);
        $cliente->setDocumentoCliente($documentoCliente);
        $cliente->setNombreCliente($nombreCliente);//asignar valores a los atributos
        $cliente->setCelularCliente($celularCliente);//asignar valores a los atributos
        $cliente->setPlacaCliente($placaCliente);//asignar valores a los atributos
        

        $crudCliente= new crudCliente(); 
        $crudCliente->actualizarCliente($cliente);

        header('location: ../vista/listarClientes.php');
    }
    public function eliminarCliente($idCliente){
        $crudCliente= new crudCliente(); 
         return $crudCliente->eliminarCliente($idCliente);
    }


}
$ControladorCliente = new controladorCliente();//crear un objeto de la clase 


if(isset($_GET['registroCliente']))
{
    header('location: ../vista/registroCliente.php');
    //header sirve para reedirecionar
}
if(isset($_POST['registroCliente']))
{
    $ControladorCliente->registroCliente($_POST['documentoCliente'],$_POST['nombreCliente'],$_POST['celularCliente'],$_POST['placaCliente']);
    
}
if(isset($_POST['editarCliente']))
{
    header('location: ../vista/editarCliente.php?idCliente='.$_POST['idCliente']);

}
if(isset($_POST['actualizarCliente']))
{
    $ControladorCliente->actualizarCliente($_POST['idCliente'],$_POST['documentoCliente'],$_POST['nombreCliente'],$_POST['celularCliente'],$_POST['placaCliente']);
    
}
if(isset($_POST['eliminarCliente'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorCliente->eliminarCliente($_POST['idCliente']);
}



?>