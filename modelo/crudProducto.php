<?php 

class crudProducto
{
    public function __construct ()
    {}
    public function listarProductos()
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM productos  p JOIN categorias c ON p.IdCategoria=c.IdCategoria
        JOIN marcas m ON p.IdMarca=m.IdMarca
        ORDER BY Nombre ASC');//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetchAll();//retorna todo el listado de la consulta
    }

    public function registroProducto($producto)
    {
        $mensaje="";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare('INSERT INTO productos  (Nombre,IdCategoria,IdMarca,Valor,Stock,StockMaximo,StockMinimo,Estado)
        VALUES (:nombreProducto,:idCategoria,:idMarca,:valorProducto,:stockProducto,:stockMaximoProducto,:stockMinimoProducto,:estadoProducto)');
        $sql->bindvalue('nombreProducto',$producto->getNombreProducto());
        $sql->bindvalue('idCategoria',$producto->getIdCategoria());
        $sql->bindvalue('idMarca',$producto->getIdMarca());
        $sql->bindvalue('valorProducto',$producto->getValorProducto());
        $sql->bindvalue('stockProducto',$producto->getStockProducto());
        $sql->bindvalue('stockMaximoProducto',$producto->getStockMaximoProducto());
        $sql->bindvalue('stockMinimoProducto',$producto->getStockMinimoProducto());
        $sql->bindvalue('estadoProducto',$producto->getEstadoProducto());
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

    // lo primero para hacer una edicion es buscar el producto en la base de datos
    public function buscarProducto($idProducto)
    {
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->query("SELECT * FROM productos 
        WHERE IdProducto=$idProducto");//defirnir busqueda    ueda consulta
        $sql->execute();//ejecutar consulta
        Db ::CerrarConexion($Db);
        return $sql->fetch();//retorna un registro
    }

    public function actualizarProducto($producto)
    {
        $mensaje = "";
        $Db =Db ::Conectar();//cadena de conexion
        $sql = $Db->prepare(' UPDATE   productos SET 
        Nombre=:nombreProducto,
        IdCategoria=:idCategoria,
        IdMarca=:idMarca,
        Valor=:valorProducto,
        Stock=:stockProducto,
        StockMaximo=:stockMaximoProducto,
        StockMinimo=:stockMinimoProducto,
        Estado=:estadoProducto
        WHERE IdProducto=:idProducto');
       

        $sql->bindvalue('nombreProducto',$producto->getNombreProducto());
        $sql->bindvalue('idCategoria',$producto->getIdCategoria());
        $sql->bindvalue('idMarca',$producto->getIdMarca());
        $sql->bindvalue('valorProducto',$producto->getValorProducto());
        $sql->bindvalue('stockProducto',$producto->getStockProducto());
        $sql->bindvalue('stockMaximoProducto',$producto->getStockMaximoProducto());
        $sql->bindvalue('stockMinimoProducto',$producto->getStockMinimoProducto());
        $sql->bindvalue('estadoProducto',$producto->getEstadoProducto());
        $sql->bindvalue('idProducto',$producto->getIdProducto());
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
    public function eliminarProducto($idProducto) {
        $mensaje ="";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('DELETE FROM productos 
        WHERE IdProducto=:idProducto
        ');
         $sql->bindValue('idProducto', $idProducto);
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