<?php
class crudAcesso{

    public function __construct(){}
    
    public function validarAcesso($usuario){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare("SELECT * FROM usuarios 
        WHERE Nombre=:nombre AND Password=:password AND estado=1");
        $sql->bindValue('nombre',$usuario->getNombre());
        $sql->bindValue('password',$usuario->getPassword());
        $sql->execute();
        try{
            $sql->execute();
            $usuario->getExiste(0);
           if($sql->rowCount()>0)
           {
               $datosUsuario= $sql->fetch();
               $usuario->setPassword('');
               $usuario->setExiste(1);
               $usuario->setRol($datosUsuario['IdRol']);

           }
        }
        catch(Exception $e){
           echo $e->getMessage();
    
        }
        Db::CerrarConexion($Db);
        return $usuario;


    }
    public function listarUsuario(){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query('SELECT * FROM usuarios ORDER BY Nombre ASC');
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    
    }
    public function registrarUsuario($usuario){
        $mensaje = "";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('INSERT INTO usuarios(Nombre,Password,IdRol,Estado,Correo) VALUES(:nombre,:password,:rol,:estado,:correo)');
        $sql->bindValue('nombre',$usuario->getNombre());
        $sql->bindValue('password',$usuario->getPassword());
        $sql->bindValue('rol',$usuario->getRol());
        $sql->bindValue('estado',$usuario->getEstado());
        $sql->bindValue('correo',$usuario->getCorreo());
        try{
            $sql->execute();
            $mensaje="Registro Exitoso";
        }
        catch(Exception $e){
            $mensaje=$e->getMessage();
    
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    
    }
}
    ?>