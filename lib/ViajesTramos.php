<?php
//require_once 'BaseDatos.php';
class ViajesTramos {
    private $viaje;
    private $tramo;
    private $hora;
    
    public function __construct() {
        $this->viaje = null;
        $this->tramo = null;
        $this->hora = null;
    }
    
    public function getViaje(){ return $this->viaje;}
    public function getTramo(){ return $this->tramo;}
    public function getHora(){ return $this->hora;}
    
    public function setViaje($viaje) { $this->viaje = $viaje;}
    public function setTramo($tramo) { $this->tramo = $tramo;}
    public function setHora($hora) { $this->hora = $hora;}
	
    public function get($viaje, $tramo){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_viajes_tramos where id_viajes_pfk ='
                  . (int)$viaje. ' and id_tramos_pfk ='. (int)$tramo;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->viaje = $resultado['id_viajes_pfk'];
        $this->tramo = $resultado['id_tramos_pfk'];
        $this->hora = $resultado['hora_salida'];
    }


    public function getAll(){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select *'
                  . ' from samea_viajes_tramos'
                  . ' order by id_viajes_pfk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllViaje($viaje){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select id_viajes_pfk, id_tramos_pfk, hora_salida, precio, tiempo,'
                  . ' c.descripcion as origen, d.descripcion as destino'
                  . ' from samea_viajes_tramos a'
                  . ' join samea_tramos b on a.id_tramos_pfk = b.id_tramos_pk'
                  . ' join samea_terminales c on b.id_terminales_origen_fk = c.id_terminales_pk'
                  . ' join samea_terminales d on b.id_terminales_destino_fk = d.id_terminales_pk'
                  . ' where id_viajes_pfk = '.(int) $viaje
                  . ' order by id_viajes_pfk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllFechaOD($fecha,$origen,$destino){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select id_viajes_pfk, id_tramos_pfk, hora_salida, precio, tiempo,'
                  . ' c.descripcion as origen, d.descripcion as destino, asientos_disponibles'
                  . ' from samea_viajes_tramos a'
                  . ' join samea_tramos b on a.id_tramos_pfk = b.id_tramos_pk'
                  . ' join samea_terminales c on b.id_terminales_origen_fk = c.id_terminales_pk'
                  . ' join samea_terminales d on b.id_terminales_destino_fk = d.id_terminales_pk'
                  . ' join samea_viajes e on a.id_viajes_pfk = e.id_viajes_pk'
                  . ' where e.fecha = \''.$fecha. '\''
                  . ' and b.id_terminales_origen_fk = '. $origen
                  . ' and b.id_terminales_destino_fk = '. $destino
                  . ' order by id_viajes_pfk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $consulta = 'insert into samea_viajes_tramos (id_viajes_pfk, id_tramos_pfk, hora_salida) values '
                  . "(" . $this->viaje . "," . $this->tramo.",'" . $this->hora . "')";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function set($tramo){
        $bd = new BaseDatos();
        $consulta = 'update samea_viajes_tramos set'
                  . ' id_tramos_pfk = '. (int) $this->getTramo()
                  . ", hora_salida = '". $this->getHora()
                  . "' where id_viajes_pfk =" . (int) $this->getViaje()
                  . ' and id_tramos_pfk = '. (int)  $tramo;
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_viajes_tramos'
                  . ' where id_viajes_pfk =' . (int)$this->getViaje()
                  . ' and id_tramos_pfk = '. (int)  $this->getTramo();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['viaje'] = $this->getViaje();
        $jsondata['tramo'] = $this->getTramo();
        $jsondata['hora'] = $this->getHora();
        echo json_encode($jsondata);
    }
}
?>
