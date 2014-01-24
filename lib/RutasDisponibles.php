<?php 
class RutasDisponibles {
	private $idTramo;
	private $idViaje;
	private $hora;
	private $precio;
	private $asientos;
	
	 public function __construct() {
        $this->idTramo= null;
        $this->idViaje = null;
        $this->hora = null;
        $this->precio = null;
        $this->asientos = null;
    }
	
	public function getId(){ return $this->idViaje;}
    public function getViaje(){ return $this->idTramo;}
    public function getHora(){ return $this->hora;}
    public function getPrecio(){ return $this->precio;}
    public function getAsientos(){ return $this->asientos;}
    
    public function getAll($origen, $destino, $fecha){
        $bd = new BaseDatos();
        $consulta = ' select asientos_disponibles, hora_salida, id_tramos_pk as viaje, id_viajes_pk as tramo, precio '
				   .' from samea_viajes, samea_tramos, samea_viajes_tramos'
				   .' where id_viajes_pfk=id_viajes_pk  and id_tramos_pk =id_tramos_pfk'
				   ." and id_terminales_origen_fk='$origen' and id_terminales_destino_fk='$destino' and fecha='$fecha'";
        $bd->consulta($consulta);
        return ($bd->getAllFilas());
    }
}
?>