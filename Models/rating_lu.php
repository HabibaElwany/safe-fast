<?php
require_once("db.php");
class rating_lu{
    public $id;
    public $rating;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO rating_lu (rating) VALUES
        ('".$this->rating."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM rating_lu WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['rating'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE rating_lu SET rating='".$this->rating."' WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>