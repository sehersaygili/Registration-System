<?php

$dbServerName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="loginsystem";

$conn = mysqli_connect($dbServerName,$dbUsername,$dbPassword,$dbName);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>
