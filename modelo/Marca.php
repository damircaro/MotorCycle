<?php

class Marca
{
private $idMarca;
private $nombre;

public function __construct(){}

public function setIdMarca($idMarca)
{
    $this->idMarca=$idMarca;
}
public function setNombreMarca($nombre)
{
    $this->nombreMarca=$nombre;
}

public function getIdMarca()
{
    return $this->idMarca;
}
public function getNombreMarca()
{
    return $this->nombreMarca;
}



}

?>