<?php
$server='localhost:3308';
$user='UserPharma';
$pwd='Pharma';
$db='pharmaliv';
$conn=mysqli_connect($server, $user, $pwd, $db);
if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: ". mysqli_connect_error();
 exit();
}
?> 