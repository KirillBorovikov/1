<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_main.css'/>
    <title>Menu</title>
</head>
<body>
<p>Your ammount of money is:
<?php
error_reporting(0);

include 'config.php';
$name= $_COOKIE["Name"];
$dblocation = "localhost";
$dbname = "boxing";
$dbuser = "root";
$dbpasswd = "drkiller94";
$dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);

$query = "select money from accounts where account_name='$name' ";
$ath = mysqli_query ($dbcnx, $query );
$test = mysqli_fetch_array($ath);
$money=$test['money'];
echo $money;
if(!$ath)
{
    echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
    exit();
}
?>
</p>
<form action="Look.html" method="GET">
    <p><input class= "LOOK" type="submit" value="Look the Tables"></p>
</form>
<form action="make_bet.php" method="GET">
    <p><input class= "LOOK" type="submit" value="Make a Bet"></p>
</form>
<form action="Look_bet.php" method="GET">
    <p><input class= "LOOK" type="submit" value="Look my Bets"></p>
</form>

</body>
</html>