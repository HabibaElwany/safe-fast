<?php
require_once("db.php");
class favorites{
    public $id;
    public $u_id;
    public $placelon;
    public $placelat;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO favorites (u_id, placelon, placelat) 
        VALUES ('".$this->u_id."','".$this->placelon."','".$this->placelat."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM favorites WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['u_id'];
            echo $row['placelon'];
            echo $row['placelat'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE favorites SET u_id='".$this->u_id."',placelon='".$this->placelon."',placelat='".$this->placelat."'
      WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>