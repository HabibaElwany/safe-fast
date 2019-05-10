<?php
require_once("db.php");
class g_lu{
    public $id;
    public $gender;

    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM g_lu WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['gender'];
        }
        $DBobject->disconnect();
    }
}
?>