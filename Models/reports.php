<?php
require_once("db.php");
class reports{
    public $id;
    public $u_id;
    public $type_id;
    public $feedback;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO reports (u_id, type_id, feedback) 
        VALUES ('".$this->u_id."','".$this->type_id."','".$this->feedback."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM reports WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['u_id'];
            echo $row['type_id'];
            echo $row['feedback'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE reports SET u_id='".$this->u_id."',type_id='".$this->type_id."',feedback='".$this->feedback."'
      WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>