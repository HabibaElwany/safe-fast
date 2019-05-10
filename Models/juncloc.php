<?php
require_once("db.php");
class junloc{
    public $id;
    public $lon;
    public $lat;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO junloc (lon, lat) VALUES ('".$this->lon."','".$this->lat."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM junloc";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['lon'];
            echo $row['lat'];
        }
        $DBobject->disconnect();
    }
    public function delete(){
        $DBobject = new DB();
        $sql = "DELETE FROM junloc";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        $DBobject->disconnect();
    }
}
?>