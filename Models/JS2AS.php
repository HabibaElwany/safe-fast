<?php
require_once("junloc.php");
/**
 * Created by PhpStorm.
 * User: tofee
 * Date: 5/9/2019
 * Time: 9:39 PM
 */
$Arr = [];
$i = 0;
$location = new junloc();
foreach($_POST as $key => $value) {
     $Arr[i] = $value;
     $i++;
}
for ($x = 0; $x<sizeof($Arr);$x+=2){
    $location->lon = $Arr[$x];
    $location->lat = $Arr[$x+1];
    $location->insert();
}