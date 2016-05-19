<?php
class Database {

    public $connection;

    /**
     * Opens a connection to the DB
     */

    public function __construct() {

        $this->username="root";
        $this->password="";
        try {
          //  $this->connection = new PDO('mysql:host=localhost;dbname=test', $this->username, $this->password);
             $this->connection = new PDO("mysql:host=localhost;dbname=test;", 'root', '');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    } 

}
?>