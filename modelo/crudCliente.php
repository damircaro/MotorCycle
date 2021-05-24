<?php 

class crudCliente
{

    public function __construct(){}


    public function listarCliente()
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM clientes  
        ORDER BY Nombre ASC');//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetchAll();//retorna todo el listado de la consulta

    }
    public function registroCliente($cliente)
    {
        $mensaje="";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare('INSERT INTO clientes  (Documento,Nombre,Celular,Placa)
        VALUES (:documentoCliente,:nombreCliente,:celularCliente,:placaCliente)');
        $sql->bindvalue('documentoCliente',$cliente->getDocumentoCliente());
        $sql->bindvalue('nombreCliente',$cliente->getNombreCliente());
        $sql->bindvalue('celularCliente',$cliente->getCelularCliente());
        $sql->bindvalue('placaCliente',$cliente->getPlacaCliente());
       
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
   // lo primero para hacer una edicion es buscar el cliente en la base de datos
   public function buscarCliente($idCliente)
   {
       $Db =Db ::Conectar();//cadena de conexion
       $sql = $Db->query("SELECT * FROM clientes
       WHERE IdCliente=$idCliente");//defirnir busqueda    ueda consulta
       $sql->execute();//ejecutar consulta
       Db ::CerrarConexion($Db);
       return $sql->fetch();//retorna un registro
   }

   public function actualizarCliente($cliente)
   {
       $mensaje = "";
       $Db =Db ::Conectar();//cadena de conexion
       $sql = $Db->prepare(' UPDATE   clientes SET 
       Documento=:documentoCliente,
       Nombre=:nombreCliente,
       Celular=:celularCliente,
       Placa=:placaCliente
       
       WHERE IdCliente=:idCliente');
      

       $sql->bindvalue('documentoCliente',$cliente->getDocumentoCliente());
       $sql->bindvalue('nombreCliente',$cliente->getNombreCliente());
       $sql->bindvalue('celularCliente',$cliente->getCelularCliente());
       $sql->bindvalue('placaCliente',$cliente->getPlacaCliente());
      
       $sql->bindvalue('idCliente',$cliente->getIdCliente());
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
   public function eliminarCliente($idCliente) {
       $mensaje ="";
       $Db = Db::Conectar();//Cadena de conexion
       $sql= $Db->prepare('DELETE FROM clientes 
       WHERE IdCliente=:idCliente
       ');
        $sql->bindValue('idCliente', $idCliente);
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