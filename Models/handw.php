<?php
require_once("db.php");
class handw{
    public $id;
    public $u_id;
    public $homelon;
    public $homelat;
    public $worklon;
    public $worklat;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO handw (u_id, homelon, homelat, worklon, worklat) VALUES
        ('".$this->u_id."','".$this->homelon."','".$this->homelat."','".$this->worklon."','".$this->worklat."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM handw WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['u_id'];
            echo $row['homelon'];
            echo $row['homelat'];
            echo $row['worklon'];
            echo $row['worklat'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE handw SET homelon='".$this->homelon."',homelat='".$this->homelat."',worklon='".$this->worklon."',worklat='".$this->worklat."'
        WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }

}
?>