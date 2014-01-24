<?php

class Autobuses {
    private $placa;
    private $marca;
    private $modelo;
    private $asientos;
    
    public function __construct() {
        $this->placa = null;
        $this->marca = null;
        $this->modelo = null;
        $this->asientos = null;
    }
    
    /*Devuelve la placa del Autobus*/
    public function getPlaca(){ return $this->placa;}
    /*Devuelve la marca del Autobus*/
    public function getMarca(){ return $this->marca;}
    /*Devuelve el modelo del Autobus*/
    public function getModelo(){ return $this->modelo;}
    /*Devuelve la placa del Autobus*/
    public function getAsientos(){ return $this->asientos;}

    public function setPlaca($placa){ $this->placa = $placa;}
    public function setMarca($marca){ $this->marca = $marca;}
    public function setModelo($modelo){ $this->modelo = $modelo;}
    public function setAsientos($asientos){ $this->asientos = $asientos;}
    

    public function get($placa){
        $bd = new BaseDatos();
        $consulta = "select * from samea_autobuses where id_autobuses_placa_pk ='"
                  . $placa . "'";
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->setPlaca($resultado['id_autobuses_placa_pk']);
        $this->setMarca($resultado['marca']);
        $this->setModelo($resultado['modelo']);
        $this->setAsientos($resultado['n_asientos']);
    }

    public function getAll(){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_autobuses order by id_autobuses_placa_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $consulta = 'update samea_autobuses set'
                  . " marca = '" . $this->getMarca() . "',"
                  . " modelo = '" . $this->getModelo() . "',"
                  . " n_asientos = " . $this->getAsientos()
                  . " where id_autobuses_placa_pk = '" . $this->getPlaca() ."'";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $consulta = 'insert into samea_autobuses values '
                  . "('" . $this->getPlaca() . "','". $this->getMarca() ."','"
                  . $this->getModelo(). "',". $this->getAsientos().")";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_autobuses'
                  . " where id_autobuses_placa_pk = '" . $this->getPlaca() ."'";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['placa'] = $this->getPlaca();
        $jsondata['marca'] = $this->getMarca();
        $jsondata['modelo'] = $this->getModelo();
        $jsondata['asientos'] = $this->getAsientos();
        echo json_encode($jsondata);
    }
}

?>
