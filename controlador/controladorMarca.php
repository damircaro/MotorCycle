<?php

include("../modelo/Marca.php");
include("../modelo/crudMarca.php");
require_once("conexion.php");

class controladorMarca
{
    public function __construct(){}

    public function listarMarca()
    {
        $crudMarca= new crudMarca(); //metodo para hacer la peticion de modelo Marca
        return $crudMarca->listarMarca(); //retornar los valores del metodo listar Marca
    }

    public function registroMarca($nombreMarca)
    {
        $marca = new Marca();//crear objeto de tipo marca
        $marca->setNombreMarca($nombreMarca);//asignar valores a los atributos
        $crudMarca = new crudMarca(); 
        $crudMarca->registroMarca($marca);

        header('location: ../vista/listarMarcas.php');
    }
    public function buscarMarca($idMarca)
    {
        $crudMarca= new crudMarca(); //metodo para hacer la peticion de modelo Marca
        return $crudMarca->buscarMarca($idMarca);

    }
    public function actualizarMarca($idMarca,$nombreMarca)
    {
        $marca = new Marca();//crear objeto de tipo marca
        
        
        $marca->setIdMarca($idMarca);
        $marca->setNombreMarca($nombreMarca);//asignar valores a los atributos
      

        $crudMarca = new crudMarca(); 
        $crudMarca->actualizarMarca($marca);

        header('location: ../vista/listarMarcas.php');
    }
    public function eliminarMarca($idMarca){
        $crudMarca = new crudMarca(); 
        return $crudMarca->eliminarMarca($idMarca);
   }
    

}




$ControladorMarca = new controladorMarca();//crear un objeto de la clase 

if(isset($_GET['registroMarca']))
{
    header('location: ../vista/registroMarca.php');
    //header sirve para reedirecionar
}
if(isset($_POST['registroMarca']))
{
    $ControladorMarca->registroMarca($_POST['nombreMarca']);
    
}
if(isset($_POST['editarMarca']))
{
    header('location: ../vista/editarMarca.php?idMarca='.$_POST['idMarca']);

}
if(isset($_POST['actualizarMarca']))
{
    $ControladorMarca->actualizarMarca($_POST['idMarca'],$_POST['nombreMarca']);
    
}
if(isset($_POST['eliminarMarca'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorMarca->eliminarMarca($_POST['idMarca']);
}

?>