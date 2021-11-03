<?php 

$DbServerName = "localhost";
$DbUsername = "root";
$DbPassword = "";
$DbName = "registrationandlogin";

$conn = mysqli_connect($DbServerName,$DbUsername, $DbPassword, $DbName);

if(!$conn){
    die("Connection failed!");
}