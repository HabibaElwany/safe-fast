<?php
require_once("db.php");
class roadrating{
    public $id;
    public $u_id;
    public $path;
    public $rating_id;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO roadrating (u_id, path, rating_id) 
        VALUES ('".$this->u_id."','".$this->path."','".$this->rating_id."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM roadrating WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['u_id'];
            echo $row['path'];
            echo $row['rating_id'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE roadrating SET u_id='".$this->u_id."',path='".$this->path."',rating_id='".$this->rating_id."'
      WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>