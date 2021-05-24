<?php 

class crudMarca
{
    public function __construct ()
    {}

    public function listarMarca()
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM marcas
         ORDER BY NombreMarca ASC');//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetchAll();//retorna todo el listado de la consulta
    }

    public function  registroMarca($marca)
    {
        $mensaje="";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare('INSERT INTO marcas  (NombreMarca)
        VALUES (:nombreMarca)');
        $sql->bindvalue('nombreMarca',$marca->getNombreMarca());
       
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
    public function  buscarMarca($idMarca)
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query("SELECT * FROM marcas 
        WHERE IdMarca=$idMarca");//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetch();//retorna un registro
    }
    public function actualizarMarca($marca)
    {
        $mensaje = "";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare(' UPDATE   marcas SET 
        NombreMarca=:nombreMarca
        WHERE IdMarca=:idMarca');
        $sql->bindvalue('nombreMarca',$marca->getNombreMarca());
        $sql->bindvalue('idMarca',$marca->getIdMarca());
        try {
            $sql->execute();
            $mensaje = "Actualizasion Exitoso";
        } catch (Exception  $e) 
        {
            $mensaje =$e->getMessage();
            
        }
        Db ::CerrarConexion($Db);
        return $mensaje;
        
    }
    public function eliminarMarca($idMarca) {
        $mensaje ="";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('DELETE FROM marcas 
        WHERE IdMarca=:idMarca
        ');
         $sql->bindValue('idMarca', $idMarca);
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