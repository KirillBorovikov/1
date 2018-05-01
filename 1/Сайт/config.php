<?php
$dblocation = 'localhost';
$dbname = 'boxing';
$dbuser = 'root';
$dbpasswd = 'drkiller94';
$dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd);
$ddd=@mysqli_select_db($dbname, $dbcnx);
?>