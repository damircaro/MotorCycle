<?php
class Acesso{
private $nombre;
private $password;
private $existe;
private $rol;
private $estado;
private $correo;

public function __construct(){}

public function setNombre($nombre){
    $this->nombre =$nombre;
}public function setPassword($password){
    $this->password =$password;
}
public function setExiste($existe){
    $this->existe =$existe;
}
public function setRol($rol){
    $this->rol =$rol;
}
public function setEstado($estado){
    $this->estado =$estado;
}
public function setCorreo($correo){
    $this->correo =$correo;
}
public function getNombre(){
    return $this->nombre;
}
public function getPassword(){
    return $this->password;
}
public function getExiste(){
    return $this->existe;
}
public function getRol(){
    return $this->rol;
}

public function getEstado(){
    return $this->estado;
}
public function getCorreo(){
    return $this->correo;
}

}
?>