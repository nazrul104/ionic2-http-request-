<?php
 include("database.php");

 class uppClass extends Database {

    function __construct() {
        parent::__construct();
    }

    public function countUsers() {
        $stmt = $this->connection->prepare("SELECT * FROM user");
        $stmt->execute();
        return count( $stmt->fetchAll(PDO::FETCH_ASSOC) );
    }

}
 $obj = new uppClass();
 echo $obj->countUsers();

?>