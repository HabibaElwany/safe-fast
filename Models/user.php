<?php
require_once("db.php");
class user{
    public $id;
    public $username;
    public $password;
    public $email;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO user (username, password, email) 
        VALUES ('".$this->username."','".$this->password."','".$this->email."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM user WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['username'];
            echo $row['password'];
            echo $row['email'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE user SET username='".$this->username."',password='".$this->password."',email='".$this->email."'
      WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>