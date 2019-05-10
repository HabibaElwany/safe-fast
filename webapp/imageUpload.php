<?php
require "init.php";

$u_id = "1";
$image = $_POST['image'];
$Address ="cairo,egypt,yacoub artin";
$result_id = "0";
$name = "img";
$sql_query = "INSERT INTO dataset (`u_id`, `image`, `Address`, `result_id`, `name`) 
VALUES ('$u_id','$image' , '$Address' , '$result_id' , '$name') "; 
//$sql_query = "SELECT `image` FROM `dataset` WHERE `id` = '$id'";

if($con->query($sql_query)===true)
{
    echo "<h3> data insert success";
    echo "succesfully";
}
else
{
    echo "error inserting" .mysqli_error($con);
    echo $sql_query;
}

?>
