<?php
require_once 'Persona.php';
class Pasajeros extends Persona{

    public function __construct() {
        parent::__construct();
    }
    
    public function get($cedula){
        $bd = new BaseDatos();
        $consulta = "select * from samea_pasajero where id_pasajero_cedula_pk ='"
                  . $cedula . "'";
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $bd->consulta($consulta);
        $resultado = $bd->getFila();
        $this->setCedula($resultado['id_pasajero_cedula_pk']);
        $this->setNombre($resultado['nombre']);
        $this->setApellido($resultado['apellido']);
        $this->setFechaNacimiento($resultado['nacimiento']);
        $this->setTelefono($resultado['telefono']);
    }

    public function getAll(){
        $bd = new BaseDatos();
        $bd->consulta("SET datestyle TO postgres, dmy;");
        $consulta = 'select * from samea_pasajero order by id_pasajero_cedula_pk';
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }

    public function set($cedula){
        $bd = new BaseDatos();
        $consulta = 'update samea_pasajero set'
                  . " id_pasajero_cedula_pk = '" . $this->getCedula() . "',"
                  . " nombre = '" . $this->getNombre() . "',"
                  . " apellido = '" . $this->getApellido() . "',"
                  . " nacimiento = '" . $this->getFechaNacimiento() ."',"
                  . " telefono = '" . $this->getTelefono() ."'"
                  . " where id_pasajero_cedula_pk = '" . $cedula ."'";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function guardarNuevo() {
        $bd = new BaseDatos();
        $consulta = 'insert into samea_pasajero values '
                  . "('" . $this->getCedula() . "','". $this->getApellido() ."','"
                  . $this->getNombre(). "','". $this->getFechaNacimiento()."','"
                  . $this->getTelefono()."')";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
    
    public function remove(){
        $bd = new BaseDatos();
        $consulta = 'delete from samea_pasajero'
                  . " where id_pasajero_cedula_pk = '" . $this->getCedula() ."'";
        $bd->consulta($consulta);
        return ($bd->getColumnna());
    }
}
?>
