<?php

class Database{

    private $host = "localhost";
    private $db_name = "API";
    private $db_username = "root";
    private $db_password = "";
    
    public $connection;

    public function getConnection(){

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
            $this->connection->exec("set names UTF8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        
        return $this->connection;

    }
}