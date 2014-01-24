<?php

abstract class Persona {
    private $cedula;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $telefono;
    
    #Metodo Constructor de la clase
    public function __construct() {
    $this->cedula = null;
    $this->nombre = null;
    $this->apellido = null;
    $this->fechaNacimiento = null;
    $this->telefono = null;
    }
    
    #Metodo que retorna el valor del tributo cedula
    public function getCedula(){ return $this->cedula;}
    
    #Metodo que retorna el valor del tributo nombre
    public function getNombre(){ return $this->nombre;}
    
    #Metodo que retorna el valor del tributo apellido
    public function getApellido(){ return $this->apellido;}
    
    #Metodo que retorna el valor del tributo fechaNacimiento
    public function getFechaNacimiento(){ return $this->fechaNacimiento;}

    #Metodo que retorna el valor del tributo telefono
    public function getTelefono(){ return $this->telefono;}


    
    #Metodo que permite modifica el valor del atributo cedula
    public function setCedula($cedula){ $this->cedula = $cedula;}

    #Metodo que permite modifica el valor del atributo nombre
    public function setNombre($nombre){ $this->nombre = $nombre;}

    #Metodo que permite modifica el valor del atributo apellido
    public function setApellido($apellido){ $this->apellido = $apellido;}

    #Metodo que permite modifica el valor del atributo fechaNacimiento
    public function setFechaNacimiento($fechaNacimiento){ $this->fechaNacimiento = $fechaNacimiento;}

    #Metodo que permite modifica el valor del atributo telefono
    public function setTelefono($telefono){ $this->telefono = $telefono;}
    
    public function toJson(){
        $jsondata = array();
        $jsondata['cedula'] = $this->getCedula();
        $jsondata['nombre'] = $this->getNombre();
        $jsondata['apellido'] = $this->getApellido();
        $jsondata['nacimiento'] = $this->getFechaNacimiento();
        $jsondata['telefono'] = $this->getTelefono();
        echo json_encode($jsondata);
    }
    
    ###Metodos Abstractos
    abstract public function get($cedula);
    abstract public function getAll();
    abstract public function set($cedula);
    abstract public function guardarNuevo();
    abstract public function remove();
}

?>
