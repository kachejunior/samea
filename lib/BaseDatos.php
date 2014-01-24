<?php
class BaseDatos {
    private $db;
    private $result;
    private static $dbhost = 'localhost';
    private static $dbname = 'samea';
    private static $dbport = '5432';
    private static $dbuser = 'postgres';
    private static $dbpasswd = 'anyelys';
    
    public function __construct() {
        try{
            $this->db = new PDO("pgsql:dbname=" . self::$dbname . ";host=". self::$dbhost
                      . " port=" . self::$dbport, self::$dbuser, self::$dbpasswd);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function consulta($sql){
        try{
            $this->result = $this->db->query($sql);
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function getFila(){
        try{
            return ($this->result->fetch());
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }

    public function getAllFilas(){
        try{
            return ($this->result->fetchAll());
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }
    
    public function getColumnna(){
        try{
            return ($this->result->fetchColumn());
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }

    public function getNumFilas(){
        try{
            return ($this->result->rowCount());
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }
    
}

?>
