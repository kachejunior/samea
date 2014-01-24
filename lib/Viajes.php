<?php
//require_once 'BaseDatos.php';
class Viajes {
    private $id;
    private $autobus;
    private $chofer;
    private $asientos;
    private $fecha;
    
    public function __construct() {
        $this->id = null;
        $this->autobus = null;
        $this->chofer = null;
        $this->asientos = null;
        $this->fecha = null;
    }
    
    public function getId(){ return $this->id;}
    public function getAutobus(){ return $this->autobus;}
    public function getChofer(){ return $this->chofer;}
    public function getAsientos(){ return $this->asientos;}
    public function getFecha(){ return $this->fecha;}
    
    public function setAutobus($autobus) { $this->autobus = $autobus;}
    public function setChofer($chofer) { $this->chofer = $chofer;}
    public function setAsientos($asientos) { $this->asientos = $asientos;}
    public function setFecha($fecha) { $this->fecha = $fecha;}
	
    public function get($id){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select * from samea_viajes where id_viajes_pk ='
                  . (int)$id;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->id = $resultado['id_viajes_pk'];
        $this->autobus = $resultado['id_autobuses_placa_fk'];
        $this->chofer = $resultado['id_choferes_cedula_fk'];
        $this->asientos = $resultado['asientos_disponibles'];
        $this->fecha = $resultado['fecha'];
    }


    public function getAll(){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select *'
                  . ' from samea_viajes'
                  . ' order by id_viajes_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllFecha($fecha){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select *'
                  . ' from samea_viajes'
                  . " where fecha ='". $fecha ."'"
                  . ' order by id_viajes_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllPasajeros($viaje){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 
                 'select id_boletos_pk as boleto, id_pasajero_cedula_pk as cedula, nombre, apellido,'
                .' d.descripcion as origen, e.descripcion as destino'
                .' from samea_boletos a'
                .' join samea_pasajero b on a.id_pasajero_cedula_fk = b.id_pasajero_cedula_pk'
                .' join samea_tramos c on a.id_tramos_fk = c.id_tramos_pk'
                .' join samea_terminales d on c.id_terminales_origen_fk = d.id_terminales_pk'
                .' join samea_terminales e on c.id_terminales_destino_fk = e.id_terminales_pk'
                .' join samea_viajes f on a.id_viajes_fk = f.id_viajes_pk'
                . " where a.id_viajes_fk = ".$viaje
                  . ' order by cedula';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $consulta = 'update samea_viajes set'
                  . " id_autobuses_placa_fk = '" . $this->getAutobus() . "',"
                  . " id_choferes_cedula_fk = '" . $this->getChofer() . "',"
                  . " fecha = '" . $this->getFecha() . "'"
                  . ' where id_viajes_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $sql = "select n_asientos from samea_autobuses where id_autobuses_placa_pk = '". $this->getAutobus(). "'";
        $bd->consulta($sql);
        $asientos = $bd->getColumnna();
        $consulta = 'insert into samea_viajes (id_autobuses_placa_fk, id_choferes_cedula_fk, asientos_disponibles, fecha) values '
                  . "('" . $this->autobus . "', '" . $this->chofer . "',". $asientos.", '" . $this->fecha . "')";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_viajes'
                  . ' where id_viajes_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['id'] = $this->getId();
        $jsondata['autobus'] = $this->getAutobus();
        $jsondata['chofer'] = $this->getChofer();
        $jsondata['asientos'] = $this->getAsientos();
        $jsondata['fecha'] = $this->getFecha();
        echo json_encode($jsondata);
    }
    
    public function calcularAsientosDisponibles() {
        $bd = new BaseDatos();
        $sql = "select n_asientos from samea_autobuses where id_autobuses_placa_pk = '". $this->getAutobus(). "'";
        $sql2 = 'select count(*) as total from samea_BOLETOS where id_viajes_fk = '. $this->getId();
        $bd->consulta($sql);
        $asientos = $bd->getColumnna();
        $bd->consulta($sql2);
        $ocupados = $bd->getColumnna();
        $disponibles = $asientos -$ocupados;
        $this->setAsientos($disponibles);
        $consulta = 'update samea_viajes set'
                  . " asientos_disponibles = " . $this->getAsientos()
                  . ' where id_viajes_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
    }

}
?>
