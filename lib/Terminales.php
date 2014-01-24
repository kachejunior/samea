<?php
//require_once 'BaseDatos.php';
class Terminales {
    private $id;
    private $descripcion;
    
    public function __construct() {
        $this->id = null;
        $this->descripcion = null;
    }
    
    public function getId(){ return $this->id;}
    public function getDescripcion(){ return $this->descripcion;}
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion;}

    public function get($id){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_terminales where id_terminales_pk ='
                  . (int)$id;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->id = $resultado['id_terminales_pk'];
        $this->descripcion = $resultado['descripcion'];
    }

    public function getAll(){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_terminales order by id_terminales_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $consulta = 'update samea_terminales set'
                  . " descripcion = '" . $this->getDescripcion() . "'"
                  . ' where id_terminales_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $consulta = 'insert into samea_terminales (descripcion) values '
                  . "('" . $this->descripcion . "')";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_terminales'
                  . ' where id_terminales_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['id'] = $this->getId();
        $jsondata['descripcion'] = $this->getDescripcion();
        echo json_encode($jsondata);
    }
}
?>
