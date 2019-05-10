<?php
require_once("db.php");
class result{
    public $id;
    public $result;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO result (result) 
        VALUES ('".$this->result."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM result WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['result'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE result SET result='".$this->result."' WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }
}
?>