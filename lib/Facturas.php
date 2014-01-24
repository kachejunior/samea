<?php
//require_once 'BaseDatos.php';
class Facturas {
    private $id;
    private $cedula;
    private $fecha;
    private $hora;
    private $aNombre;
    
    public function __construct() {
        $this->id = null;
        $this->cedula = null;
        $this->fecha = null;
        $this->hora = null;
        $this->aNombre = null;
    }
    
    public function getId(){ return $this->id;}
    public function getCedula(){ return $this->cedula;}
    public function getFecha(){ return $this->fecha;}
    public function getHora(){ return $this->hora;}
    public function getANombre(){ return $this->aNombre;}
    
    public function setCedula($cedula) { $this->cedula = $cedula;}
    public function setANombre($aNombre) { $this->aNombre = $aNombre;}
	
    public function get($id){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_facturas where id_facturas_pk ='
                  . (int)$id;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->id = $resultado['id_facturas_pk'];
        $this->cedula = $resultado['cedula'];
        $this->fecha = $resultado['fecha'];
        $this->hora = $resultado['hora'];
        $this->aNombre = $resultado['a_nombre'];
    }

    public function getAll(){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_facturas order by id_facturas_pk desc';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllCedula($cedula){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_facturas'
                  . " where cedula = '". $cedula
                  . "' order by id_facturas_pk";
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $consulta = 'update samea_facturas set'
                  . " cedula = '" . $this->getCedula() . "',"
                  . " a_nombre = '" . $this->getANombre() . "'"
                  . ' where id_facturas_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $this->fecha = date('d-m-Y');
        $this->hora = date('H:i:s');
        $bd = new BaseDatos();
        $consulta = 'insert into samea_facturas (cedula, fecha, hora, a_nombre) values '
                  . "('" . $this->cedula . "', '" . $this->fecha . "', '" . $this->hora . "','".$this->aNombre."')";
        $bd->consulta($consulta);
        $sql = "select currval('samea_facturas_id_facturas_pk_seq'::regclass)";
        $bd->consulta($sql);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = ' delete from samea_facturas'
                  . ' where id_facturas_pk=' . (int)$this->getId();
	    echo 'alert ("'.$consulta.'");';
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['id'] = $this->getId();
        $jsondata['cedula'] = $this->getCedula();
        $jsondata['fecha'] = $this->getFecha();
        $jsondata['hora'] = $this->getHora();
        $jsondata['aNombre'] = $this->getANombre();
        echo json_encode($jsondata);
    }
}
?>
