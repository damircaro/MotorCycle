<?php


include("../modelo/Categoria.php");
include("../modelo/crudCategoria.php");
require_once("conexion.php");


class controladorCategoria
{
    public function __construct(){}


    public function listarCategoria()
    {
        $crudCategoria= new crudCategoria(); //metodo para hacer la peticion de modelo producto
        return $crudCategoria->listarCategoria(); //retornar los valores del metodo listar productos
    }

    public function registroCategoria($nombreCategoria)
    {
        $categoria = new Categoria();//crear objeto de tipo producto
        $categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
        $crudCategoria = new crudCategoria(); 
        $crudCategoria->registroCategoria($categoria);

        header('location: ../vista/listarCategorias.php');
    }


     // lo primero para hacer una edicion es buscar el producto en la base de datos
     public function buscarCategoria($idCategoria)
     {
        $crudCategoria = new crudCategoria(); 
         return $crudCategoria->buscarCategoria($idCategoria);
 
     }
     public function actualizarCategoria($idCategoria,$nombreCategoria)
     {
         $categoria = new Categoria();//crear objeto de tipo categoria
         
         
         $categoria->setIdCategoria($idCategoria);
         $categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
       
 
         $crudCategoria = new crudCategoria(); 
         $crudCategoria->actualizarCategoria($categoria);
 
         header('location: ../vista/listarCategorias.php');
     }
     public function eliminarCategoria($idCategoria){
        $crudCategoria = new crudCategoria(); 
         return $crudCategoria->eliminarCategoria($idCategoria);
    }
  
  
    

}
$ControladorCategoria = new controladorCategoria();//crear un objeto de la clase 


if(isset($_GET['registroCategoria']))
{
    header('location: ../vista/registroCategoria.php');
    //header sirve para reedirecionar
}
if(isset($_POST['registroCategoria']))
{
    $ControladorCategoria->registroCategoria($_POST['nombreCategoria']);
    
}
if(isset($_POST['editarCategoria']))
{
    header('location: ../vista/editarCategoria.php?idCategoria='.$_POST['idCategoria']);

}
if(isset($_POST['actualizarCategoria']))
{
    $ControladorCategoria->actualizarCategoria($_POST['idCategoria'],$_POST['nombreCategoria']);
    
}
if(isset($_POST['eliminarCategoria'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorCategoria->eliminarCategoria($_POST['idCategoria']);
}



?>