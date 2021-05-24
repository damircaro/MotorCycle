<?php 

class Cliente
{
    private $idCliente;
    private $documento;
    private $nombre;
    private $celular;
    private $placa;

    public function __construct(){}

    public function setIdCliente($idCliente)
    {
        $this->idCliente=$idCliente;
    }
    public function setDocumentoCliente($documento)
    {
        $this->documentoCliente=$documento;
    }
    public function setNombreCliente($nombre)
    {
        $this->nombreCliente=$nombre;
    }
    public function setCelularCliente($celular)
    {
        $this->celularCliente=$celular;
    }
    public function setPlacaCliente($placa)
    {
        $this->placaCliente=$placa;
    }

    public function  getIdCliente()
    {
        return $this->idCliente;
    }
    public function  getNombreCliente()
    {
        return $this->nombreCliente;
    }
    public function  getDocumentoCliente()
    {
        return $this->documentoCliente;
    }
   
    public function  getCelularCliente()
    {
        return $this->celularCliente;
    }
    public function  getPlacaCliente()
    {
        return $this->placaCliente;
    }







}




?>