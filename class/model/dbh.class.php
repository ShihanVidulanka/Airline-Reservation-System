<?php 
class Dbh{
    private $serverName;
    private $userName;
    private $password;
    private $dbName;

    private $db;

    public function connect(){
        $this->serverName ="localhost";
        $this->userName ="root";
        $this->password ="";
        $this->dbName ="airline_reservation_system";
        $dns = "mysql:host={$this->serverName};dbname={$this->dbName}";

        try {
            $connection = new PDO($dns,$this->userName,$this->password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db=$connection;
            // echo "Connection Successfull";
            return $this->db;
        } catch (Exception $e) {
            echo "<p>".$e->getMessage()."</p>";
        }
        return $this->db;
        
    }
}

?>