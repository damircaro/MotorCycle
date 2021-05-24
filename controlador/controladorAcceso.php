<?php
require_once("conexion.php");
require_once("../modelo/Acceso.php");
require_once("../modelo/crudAcceso.php");
class ControladorAcceso{
public function __construct()
{
    
}
public function listarUsuario(){
    //Metodo para hacer la peticion al modelo productos
    $crudAcceso= new  crudAcesso();//Crear un objeto de la clase crud Producto
    return $crudAcceso->listarUsuario();//Retornando los valores del metodo listar productos
   
}
public function registrarUsuario($nombreUsuario,$passwordEncritado,$rol,$estado,$correo){
    $salt = md5($_POST['password']);
    $passwordEncritado = crypt($_POST['password'],$salt);
    $usuario = new Acesso();
    $usuario->setNombre($nombreUsuario);
    $usuario->setPassword($passwordEncritado);
    $usuario->setRol($rol);
    $usuario->setEstado($estado);    
    $usuario->setCorreo($correo);  
  

    $crudAcceso = new crudAcesso();
    $crudAcceso->registrarUsuario($usuario);
    header('Location:../vista/listaUsuarios.php');  
    
   

    }
public function validarAcceso($nombreUsuario,$passwordEncritado){
    $salt = md5($_POST['password']);
    $passwordEncritado = crypt($_POST['password'],$salt);
    $acceso = new Acesso();
    $acceso->setNombre($nombreUsuario);
    $acceso->setPassword($passwordEncritado);
    $crudAcceso = new crudAcesso();
    return $crudAcceso->validarAcesso($acceso);
}



}
$controladorAcesso = new controladorAcceso();

if(isset($_POST['validarAcesso'])){
$usuario=($controladorAcesso->validarAcceso($_POST['nombreUsuario'],$_POST['password']));
if($usuario->getExiste()==1){
    
    session_start();
    $_SESSION['nombreUsuario']=$usuario->getNombre();
    $_SESSION['IdRol']=$usuario->getRol();
    header('Location:../vista/dashboard.php');



}
else{
    header('Location:../index.html');
}
 

}
else if(isset($_GET['cerrarSesion'])){
    session_start();
    session_destroy();
    header('Location:../index.html');
}
$Controlador=new ControladorAcceso();



if(isset($_GET['registrarUsuario'])){
    header('Location:../vista/registrarUsuario.php');
}
if(isset($_POST['registrarUsuario'])){
    $Controlador->registrarUsuario($_POST['nombre'],$_POST['password'],$_POST['rol'],$_POST['estado'],$_POST['correo']);
    echo $_POST['nombreProducto'];
}



?>