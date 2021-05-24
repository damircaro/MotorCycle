<?php 

class TipoServicio
{
    private $idTipoServicio;
    private $nombre;
    private $estado;


    public function __construct(){}

    public function setIdTipoServicio($idTipoServicio)
    {
        $this->idTipoServicio=$idTipoServicio;

    }

    public function setNombreTipoServicio($nombre)
    {
        $this->nombreTipoServicio=$nombre;

    }

    public function setEstadoTipoServicio($estado)
    {
        $this->estadoTipoServicio=$estado;

    }

    public function getIdTipoServicio()
    {
        return $this->idTipoServicio;
    }

    public function getNombreTipoServicio()
    {
        return $this->nombreTipoServicio;
    }
    public function getEstadoTipoServicio()
    {
        return $this->estadoTipoServicio;
    }


}
?>