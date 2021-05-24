<?php

require_once("conexion.php");
include("../modelo/Producto.php");
include("../modelo/crudProducto.php");



class Controlador
{
    public function __construct(){}

    //aqui listo los productos 

    public function listarProductos()
    {
        $crudProducto = new crudProducto(); //metodo para hacer la peticion de modelo producto
        return $crudProducto->listarProductos(); //retornar los valores del metodo listar productos
    }

    public function registroProducto($nombreProducto,$idCategoria,$idMarca,$valorProducto,$stockProducto,$stockMaximoProducto,$stockMinimoProducto,$estadoProducto)
    {
        $producto = new Producto();//crear objeto de tipo producto
        $crudProducto = new crudProducto(); 
        
        $producto->setNombreProducto($nombreProducto);//asignar valores a los atributos
        $producto->setIdCategoria($idCategoria);
        $producto->setIdMarca($idMarca);
        $producto->setValorProducto($valorProducto);
        $producto->setStockProducto($stockProducto);
        $producto->setStockMaximoProducto($stockMaximoProducto);
        $producto->setStockMinimoProducto($stockMinimoProducto);
        $producto->setEstadoProducto($estadoProducto);
        
        $crudProducto->registroProducto($producto);

        header('location: ../vista/listarProductos.php');
    }

    // lo primero para hacer una edicion es buscar el producto en la base de datos
    public function buscarProducto($idProducto)
    {
        $crudProducto=new crudProducto();
        return $crudProducto->buscarProducto($idProducto);

    }
    public function actualizarProducto($idProducto,$nombreProducto,$idCategoria,$idMarca,$valorProducto,$stockProducto,$stockMaximoProducto,$stockMinimoProducto,$estadoProducto)
    {
        $producto = new Producto();//crear objeto de tipo producto
        
        
        $producto->setIdProducto($idProducto);
        $producto->setNombreProducto($nombreProducto);//asignar valores a los atributos
        $producto->setIdCategoria($idCategoria);
        $producto->setIdMarca($idMarca);
        $producto->setValorProducto($valorProducto);
        $producto->setStockProducto($stockProducto);
        $producto->setStockMaximoProducto($stockMaximoProducto);
        $producto->setStockMinimoProducto($stockMinimoProducto);
        $producto->setEstadoProducto($estadoProducto);

        $crudProducto = new crudProducto(); 
        $crudProducto->actualizarProducto($producto);

        header('location: ../vista/listarProductos.php');
    }
    public function eliminarProducto($idProducto){
        $crudProducto = new crudProducto();
         return $crudProducto->eliminarProducto($idProducto);
    }
  

    


}
$Controlador = new Controlador();//crear un objeto de la clase producto

if(isset($_GET['registroProducto']))
{
    header('location: ../vista/registroProducto.php');
    //header sirve para reedirecionar
}
if(isset($_POST['registroProducto']))
{
    $Controlador->registroProducto($_POST['nombreProducto'],$_POST['idCategoria'],$_POST['idMarca'],$_POST['valorProducto'],$_POST['stockProducto'],$_POST['stockMaximoProducto'],$_POST['stockMinimoProducto'],$_POST['estadoProducto']);
    
}

if(isset($_POST['editarProducto']))
{
    header('location: ../vista/editarProducto.php?idProducto='.$_POST['idProducto']);

}
if(isset($_POST['actualizarProducto']))
{
    $Controlador->actualizarProducto($_POST['idProducto'],$_POST['nombreProducto'],$_POST['idCategoria'],$_POST['idMarca'],$_POST['valorProducto'],$_POST['stockProducto'],$_POST['stockMaximoProducto'],$_POST['stockMinimoProducto'],$_POST['estadoProducto']);
    
}
if(isset($_POST['eliminarProducto'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $Controlador->eliminarProducto($_POST['idProducto']);
}


?>