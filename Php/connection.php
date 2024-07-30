<?php

$userName = "root";
$password = "";
$server = "localhost";
$db = "webtesting";

$con = mysqli_connect($server, $userName,$password,$db);

if($con){
    // echo " Success";
}
else{
    die("no connection". mysqli_connect_error());
}
?>