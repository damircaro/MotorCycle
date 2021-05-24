<?php 

class Producto{

private $id;
private $nombre;
private $idCategoria;
private $idMarca;
private $valor;
private $stock;
private $stockMinimo;
private $stockMaximo;
private $estado;


public function __construct(){}

public function setIdProducto($id)
{
    $this->idProducto=$id;

}

public function setNombreProducto($nombre)
{
    $this->nombreProducto=$nombre;

}

public function setIdCategoria($idCategoria)
{
    $this->idCategoria=$idCategoria;

}
public function setIdMarca($idMarca)
{
    $this->idMarca=$idMarca;

}
public function setValorProducto($valor)
{
    $this->valorProducto=$valor;

}
public function setStockProducto($stock)
{
    $this->stockProducto=$stock;

}
public function setStockMaximoProducto($stockMaximo)
{
    $this->stockMaximoProducto=$stockMaximo;

}
public function setStockMinimoProducto($stockMinimo)
{
    $this->stockMinimoProducto=$stockMinimo;

}

public function setEstadoProducto($estado)
{
    $this->estadoProducto=$estado;
}

public function getIdProducto()
{
    return $this->idProducto;
}
public function getNombreProducto()
{
    return $this->nombreProducto;
}
public function getIdCategoria()
{
    return $this->idCategoria;
}
public function getIdMarca()
{
    return $this->idMarca;
}
public function getValorProducto()
{
    return $this->valorProducto;
}
public function getStockProducto()
{
    return $this->stockProducto;
}
public function getStockMaximoProducto()
{
    return $this->stockMaximoProducto;
}
public function getStockMinimoProducto()
{
    return $this->stockMinimoProducto;
}
public function getEstadoProducto()
{
    return $this->estadoProducto;
}



}



?> 