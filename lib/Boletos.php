<?php
//require_once 'BaseDatos.php';
class Boletos {
    private $id;
    private $factura;
    private $cedula;
    private $viaje;
    private $tramo;
    
    public function __construct() {
        $this->id = null;
        $this->factura = null;
        $this->cedula = null;
        $this->viaje = null;
        $this->tramo = null;
    }
    
    public function getId(){ return $this->id;}
    public function getFactura(){ return $this->factura;}
    public function getCedula(){ return $this->cedula;}
    public function getViaje(){ return $this->viaje;}
    public function getTramo(){ return $this->tramo;}
    
    public function setFactura($factura) { $this->factura = $factura;}
    public function setCedula($cedula) { $this->cedula = $cedula;}
    public function setViaje($viaje) { $this->viaje = $viaje;}
    public function setTramo($tramo) { $this->tramo = $tramo;}
	
    public function get($id){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_boletos where id_boletos_pk ='
                  . (int)$id;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->id = $resultado['id_boletos_pk'];
        $this->factura = $resultado['id_facturas_fk'];
        $this->cedula = $resultado['id_pasajero_cedula_fk'];
        $this->viaje = $resultado['id_viajes_fk'];
        $this->tramo = $resultado['id_tramos_fk'];
    }

    public function getAll(){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_boletos'
                  . ' order by id_boletos_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllFactura($factura){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select id_boletos_pk as boleto, id_pasajero_cedula_pk as cedula, nombre, apellido,'
                .' d.descripcion as origen, e.descripcion as destino, a.id_viajes_fk as viaje'
                .' from samea_boletos a'
                .' join samea_pasajero b on a.id_pasajero_cedula_fk = b.id_pasajero_cedula_pk'
                .' join samea_tramos c on a.id_tramos_fk = c.id_tramos_pk'
                .' join samea_terminales d on c.id_terminales_origen_fk = d.id_terminales_pk'
                .' join samea_terminales e on c.id_terminales_destino_fk = e.id_terminales_pk'
                .' join samea_viajes f on a.id_viajes_fk = f.id_viajes_pk'
                . " where a.id_facturas_fk = ".$factura
                  . ' order by id_boletos_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllFacturaPasajeros($factura){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_boletos a'
                  . ' join samea_pasajeros b on  a.id_pasajero_cedula_fk = b.id_pasajero_cedula_pk'
                  . ' where id_facturas_fk ='.$factura
                  . ' order by id_tramos_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $viaje = new Viajes();
        $viaje->get($this->getViaje());
        if ($viaje->getAsientos() <= 0)
            return "Error... No hay Boletos Disponibles";
        $consulta = 'update samea_boletos set'
                  . " id_facturas_fk = '" . $this->getFactura() . "',"
                  . " id_pasajero_cedula_fk = '" . $this->getCedula() . "',"
                  . " id_viajes_fk = '" . $this->getViaje() . "',"
                  . " id_tramos_fk = '" . $this->getTramo() . "'"
                  . ' where id_boletos_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        $viaje->calcularAsientosDisponibles();
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        
        $viaje = new Viajes();
        $viaje->get($this->getViaje());
        if ($viaje->getAsientos() <= 0)
            return "Error... No hay Boletos Disponibles";
        $consulta = 'insert into samea_boletos (id_facturas_fk, id_pasajero_cedula_fk, id_viajes_fk, id_tramos_fk) values '
                  . "('" . $this->factura . "', '" . $this->cedula . "', '" . $this->viaje . "', '" . $this->tramo . "')";
        $bd->consulta($consulta);
        $viaje->calcularAsientosDisponibles();
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_boletos'
                  . ' where id_boletos_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        $viaje = new Viajes();
        $viaje->get($this->getViaje());
        $viaje->calcularAsientosDisponibles();
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['id'] = $this->getId();
        $jsondata['factura'] = $this->getFactura();
        $jsondata['cedula'] = $this->getCedula();
        $jsondata['viaje'] = $this->getViaje();
        $jsondata['tramo'] = $this->getTramo();
        echo json_encode($jsondata);
    }
}
?>
