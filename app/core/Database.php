<?php

class Database {
    private $connection = null;
    public $query = null;

    private $host = "localhost";
    private $port = "3306";
    private $dbname = "auto_accessories";
    private $charset = "utf8mb4";
    private $user = "root";
    private $password = "";

    private function connect(){
        try{
            if(!$this->connection){
                $this->connection = new PDO(
                    "mysql:host=$this->host;
                    port=$this->port;
                    dbname=$this->dbname;
                    charset=$this->charset",
                    $this->user,
                    $this->password
                );
            }
            return $this->connection;
        }catch(PDOException $e){
            echo "Error connecting to database: " . $e->getMessage();
            return null;
        }
    }

    public function getAll($sql,$args = []){
        if($this->connect() === null) return null;
        $this->query = $this->connect()->prepare($sql);
        $this->query->execute($args);
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRow($sql,$args = []){
        if($this->connect() === null) return null;
        $this->query = $this->connect()->prepare($sql);
        $this->query->execute($args);
        return $this->query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($sql, $args = []) {
        $this->query = $this->connect()->prepare($sql);
        return ($this->query->execute($args)) ? $this->connect()->lastInsertId() : 0;
    }
    
    public function update($sql, $args = []) {
        $this->query = $this->connect()->prepare($sql);
        return ($this->query->execute($args)) ? $this->query->rowCount() : 0;
    }
    

    public function rowCount($sql, $args = []) {
        if($this->connect() === null) return null;
        $this->query = $this->connect()->prepare($sql);
        $this->query->execute($args);
        return $this->query->rowCount();
    }

    public function deleteRow($sql, $args = []) {
        if($this->connect() === null) return false;
        $this->query = $this->connect()->prepare($sql);
        return $this->query->execute($args);
    }
}