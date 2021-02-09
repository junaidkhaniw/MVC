<?php

class Database {

    public $host      = HOST;
    public $user      = USER;
    public $password  = PASSWORD;
    public $database  = DATABASE;

    public $result;

    public function __construct() {
        
        try {
            
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);

        }
        catch (PDOException $e) {

            echo "Database Connection Error: " . $e->getMessage();

        }

    }

    //Allows us to write queries
    public function query($sql, $params = []) {
 
        if (empty($params)) {
            $this->result = $this->con->prepare($sql);
            return $this->result->execute();
        }
        else {
            $this->result = $this->con->prepare($sql);
            return $this->result->execute($params);
        }
    }

    public function rowCount() { 
        return $this->result->rowCount();
    }

    public function fetch() {
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    public function fetchall() {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

}

?>