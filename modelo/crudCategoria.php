<?php 

class crudCategoria
{
    public function __construct ()
    {}

    public function listarCategoria()
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM categorias
         ORDER BY NombreCategoria ASC');//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetchAll();//retorna todo el listado de la consulta
    }
    

    public function  registroCategoria($categoria)
    {
        $mensaje="";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare('INSERT INTO categorias  (NombreCategoria)
        VALUES (:nombreCategoria)');
        $sql->bindvalue('nombreCategoria',$categoria->getNombreCategoria());
       
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
    public function  buscarCategoria($idCategoria)
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query("SELECT * FROM categorias 
        WHERE IdCategoria=$idCategoria");//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetch();//retorna un registro
    }
    public function actualizarCategoria($categoria)
    {
        $mensaje = "";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare(' UPDATE   categorias SET 
        NombreCategoria=:nombreCategoria
        WHERE IdCategoria=:idCategoria');
        $sql->bindvalue('nombreCategoria',$categoria->getNombreCategoria());
        $sql->bindvalue('idCategoria',$categoria->getIdCategoria());
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
    public function eliminarCategoria($idCategoria) {
        $mensaje ="";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('DELETE FROM categorias 
        WHERE IdCategoria=:idCategoria
        ');
         $sql->bindValue('idCategoria', $idCategoria);
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