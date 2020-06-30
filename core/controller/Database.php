<?php
/*
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="topbd";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);

		//IMPORTANTE - Pare el uso de tildes, eñes y otros caracteres especiales
		$acentos = $con->query("SET NAMES 'utf8'");
		
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}

*/

class Database {
	public static $db;
	public static $con;
	function Database(){
		$dbopts = parse_url(getenv('DATABASE_URL'));

		$this->user=$dbopts["user"];
        $this->driver = 'pgsql';$this->password=$dbopts["pass"];$this->host=$dbopts["host"];$this->port=$dbopts["port"];$this->ddbb=ltrim($dbopts["path"],'/';
	}

	function connect(){
		$con = new mysqli($this->driver,$this->host,$this->port,$this->user,$this->password,$this->ddbb);

		//IMPORTANTE - Pare el uso de tildes, eñes y otros caracteres especiales
		$acentos = $con->query("SET NAMES 'utf8'");
		
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}


?>
