<?php

class Soins{

    private $connection;
    private $table = "soins";

    public $id;
    public $name;
    public $details;
    public $price;
    public $time;
    public $tag_id;
    public $tag_name;
    public $created_at;

    /*
    * Construct database connection with $db
    *
    * @param $db
    */
    public function __construct($db){

        $this->connection = $db;

    }

    /*
    * Read products
    *
    * @return void
    */

    public function read(){

        $sql = "SELECT t.name as tag_name, p.id, p.name, p.time p.details, p.price, p.time, p.tag_id, p.created_at FROM " . $this->table . " p LEFT JOIN tags t ON p.tag_id = t.id ORDER BY p.created_at DESC";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query;

    }

    /*
    * Read one product
    *
    * @return void
    */

    public function readOne(){

        $sql = "SELECT t.name as tag_name, p.id, p.name, p.details,p.time, p.price, p.tag_id, p.created_at FROM " . $this->table . " p LEFT JOIN tags t ON p.tag_id = t.id WHERE p.id = ? LIMIT 0,1";

        $query = $this->connection->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute(1, $this->id);
        
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->details = $row['details'];
        $this->time = $row['time'];
        $this->tag_id = $row['tag_id'];
        $this->tag_name = $row['tag_name'];

    }

    /*
    * Create products
    *
    * @return void
    */

    public function create(){

        //$sql = "INSERT INTO " . $this->table . " SET name=:name, details=:details, price=:price, tag_id=:tag_id";

        $sql = "INSERT INTO " . $this->table . " (name, details, price, time, tag_id) VALUES (:name, :details, :price, :time, :tag_id)";


        $query = $this->connection->prepare($sql);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->details=htmlspecialchars(strip_tags($this->details));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->tag_id=htmlspecialchars(strip_tags($this->tag_id));

        $query->bindParam(":name", $this->name);
        $query->bindParam(":details", $this->details);
        $query->bindParam(":price", $this->price);
        $query->bindParam(":time", $this->time);
        $query->bindParam(":tag_id", $this->tag_id);

        if($query->execute()){
            return true;
        }
        return false;

    }

    /*
    * Delete products
    *
    * @return void
    */

    public function delete(){

        $sql = "DELETE FROM " .$this->table . " WHERE id = ?";
        
        $query = $this->connection->prepare($sql);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $query->bindParam(1, $this->id);

        if($query->execute()){
            return true;
        }
        return false;

    }

    /*
    * Update products
    *
    * @return void
    */

    public function update(){

        $sql = "UPDATE " . $this->table . " SET name = :name, price = :price, details = :details, time = :time, tag_id = :tag_id WHERE id = :id";

        $query = $this->connection->prepare($sql);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->details=htmlspecialchars(strip_tags($this->details));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->tag_id=htmlspecialchars(strip_tags($this->tag_id));

        $query->bindParam(':id', $this->id);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':details', $this->details);
        $query->bindParam(':time', $this->time);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':tag_id', $this->tag_id);

        if($query->execute()){
            return true;
        }
        return false;

    }

}