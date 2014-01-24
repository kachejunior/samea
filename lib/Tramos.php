<?php
//require_once 'BaseDatos.php';
class Tramos {
    private $id;
    private $origen;
    private $destino;
    private $precio;
    private $tiempo;
    
    public function __construct() {
        $this->id = null;
        $this->origen = null;
        $this->destino = null;
        $this->precio = null;
        $this->tiempo = null;
    }
    
    public function getId(){ return $this->id;}
    public function getOrigen(){ return $this->origen;}
    public function getDestino(){ return $this->destino;}
    public function getPrecio(){ return $this->precio;}
    public function getTiempo(){ return $this->tiempo;}
    
    public function setOrigen($origen) { $this->origen = $origen;}
    public function setDestino($destino) { $this->destino = $destino;}
    public function setPrecio($precio) { $this->precio = $precio;}
    public function setTiempo($tiempo) { $this->tiempo = $tiempo;}
	
    public function get($id){
        $bd = new BaseDatos();
        $consulta = 'select * from samea_tramos where id_tramos_pk ='
                  . (int)$id;
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->id = $resultado['id_tramos_pk'];
        $this->origen = $resultado['id_terminales_origen_fk'];
        $this->destino = $resultado['id_terminales_destino_fk'];
        $this->precio = $resultado['precio'];
        $this->tiempo = $resultado['tiempo'];
    }

    public function getAll(){
        $bd = new BaseDatos();
        $consulta = 'select id_tramos_pk, b.descripcion as origen, c.descripcion as destino, precio, tiempo'
                  . ' from samea_tramos a'
                  . ' join samea_terminales b on a.id_terminales_origen_fk = b.id_terminales_pk'
                  . ' join samea_terminales c on a.id_terminales_destino_fk = c.id_terminales_pk'
                  . ' order by id_tramos_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function getAllOrigen($origen){
        $bd = new BaseDatos();
        $consulta = 'select id_tramos_pk, b.descripcion as origen, c.descripcion as destino, precio, tiempo'
                  . ' from samea_tramos a'
                  . ' join samea_terminales b on a.id_terminales_origen_fk = b.id_terminales_pk'
                  . ' join samea_terminales c on a.id_terminales_destino_fk = c.id_terminales_pk'
                  . ' where id_terminales_origen_fk ='.$origen
                  . ' order by id_tramos_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set(){
        $bd = new BaseDatos();
        $consulta = 'update samea_tramos set'
                  . " id_terminales_origen_fk = '" . $this->getOrigen() . "',"
                  . " id_terminales_destino_fk = '" . $this->getDestino() . "',"
                  . " precio = '" . $this->getPrecio() . "',"
                  . " tiempo = '" . $this->getTiempo() . "'"
                  . ' where id_tramos_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $consulta = 'insert into samea_tramos (id_terminales_origen_fk, id_terminales_destino_fk, precio, tiempo) values '
                  . "('" . $this->origen . "', '" . $this->destino . "', '" . $this->precio . "', '" . $this->tiempo . "')";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_tramos'
                  . ' where id_tramos_pk=' . (int)$this->getId();
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }

    public function toJson(){
        $jsondata = array();
        $jsondata['id'] = $this->getId();
        $jsondata['origen'] = $this->getOrigen();
        $jsondata['destino'] = $this->getDestino();
        $jsondata['precio'] = $this->getPrecio();
        $jsondata['tiempo'] = $this->getTiempo();
        echo json_encode($jsondata);
    }
}
?>
