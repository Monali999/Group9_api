<?php
class db{
    public $db_conn;
    public $host = "localhost";
	public $username = "root";
    public $password = "";
    public $db = 'group9';
    
    public function connect() {
        try {			
            $this->db_conn = new PDO ("mysql:host=$this->host; dbname=$this->db", $this->username, $this->password);
            $this->db_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $this->db_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->db_conn;
        }
        catch(PDOException $e) {
            var_dump($e->getTrace());
            return $e->getMessage();            
        }
    }
}

?>