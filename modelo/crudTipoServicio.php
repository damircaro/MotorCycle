<?php 

class crudTipoServicio
{


    public function __construct(){}

    public function listarTipoServicio()
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM tiposervicios
         ORDER BY Nombre ASC');//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetchAll();//retorna todo el listado de la consulta


    }
    public function registroTipoServicio($tipoServicio)
    {
        $mensaje="";
        $Db= Db ::Conectar();//cadena de conexion
        $sql= $Db->prepare('INSERT INTO tiposervicios (Nombre,Estado)
        VALUES (:nombreTipoServicio,:estadoTipoServicio)');
        $sql->bindvalue('nombreTipoServicio',$tipoServicio->getNombreTipoServicio());
        $sql->bindvalue('estadoTipoServicio',$tipoServicio->getEstadoTipoServicio());
        try {
            $sql->execute();
            $mensaje = "Registro Exitoso";
        } catch (Exception  $e) 
        {
            $mensaje =$e->getMessage();
            
        }
        Db ::CerrarConexion($Db);
        return $mensaje;
        
    }
    public function BuscarTipoServicio($idTipoServicio)
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query("SELECT * FROM tiposervicios 
        WHERE IdTipoSer=$idTipoServicio");//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetch();//retorna un registro
     
    }
    public function actualizarTipoServicio($tipoServicio)
    {
        $mensaje = "";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare(' UPDATE   tiposervicios SET 
        Nombre=:nombreTipoServicio,
        Estado=:estadoTipoServicio
        WHERE IdTipoSer=:idTipoServicio');
         $sql->bindvalue('nombreTipoServicio',$tipoServicio->getNombreTipoServicio());
         $sql->bindvalue('estadoTipoServicio',$tipoServicio->getEstadoTipoServicio());
         $sql->bindvalue('idTipoServicio',$tipoServicio->getIdTipoServicio());
         try {
             $sql->execute();
             $mensaje = "Registro Exitoso";
         } catch (Exception  $e) 
         {
             $mensaje =$e->getMessage();
             
         }
         Db ::CerrarConexion($Db);
         return $mensaje;
        
    }
    public function eliminarTipoServicio($idTipoServicio)
    {
        $mensaje ="";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('DELETE FROM tiposervicios 
        WHERE IdTipoSer=:idTipoServicio
        ');
         $sql->bindValue('idTipoServicio', $idTipoServicio);
         try{
            $sql->execute();
            $mensaje="Eliminacion Exitosa";
        }
        catch(Exception $e){
            $mensaje=$e->getMessage();
    
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    
        
    }


    
    
}

?>