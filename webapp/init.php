<?php
$DB_NAME = "graduation";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_HOST = "localhost";
$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if(!$con)
{
    echo "conectiom error ";
}
else
{
    echo "<h3> database connection succes";
}
?>