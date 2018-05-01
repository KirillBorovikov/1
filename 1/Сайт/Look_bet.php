<head>
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_look.css'/>
    <title>Look Bets</title>
</head>
<?php
error_reporting(0);

include 'config.php';
$name= $_COOKIE["Name"];
$dblocation = "localhost";
$dbname = "boxing";
$dbuser = "root";
$dbpasswd = "drkiller94";
$dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);

$ath = mysqli_query($dbcnx,"select id_bet,name,last_name,championship_name,place,money 
from bets_for_user_q,fighter,championships 
where bets_for_user_q.id_fighter=fighter.id_fighter and
bets_for_user_q.id_championship=championships.id_championship;;");
if($ath)
{
    // Определяем таблицу и заголовок
    echo "<table border=1>";
    echo "<tr><td>ID Bet</td><td>Name</td><td>Last Name</td><td>Championship
            </td><td>Place</td><td>Money</td></tr>";
    // Так как запрос возвращает несколько строк, применяем цикл
    while($fighter = mysqli_fetch_array($ath))
    {
        echo "<tr><td>".$fighter['id_bet']."&nbsp;</td><td>".$fighter['name']."
    &nbsp </td><td>".$fighter['last_name']."&nbsp;</td><td>".$fighter['championship_name']."&nbsp;</td><td>".$fighter['place']."&nbsp;</td><td>".
            $fighter['money']."&nbsp;</td></tr>";
    }
    echo "</table>";
}
else
{
    echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
    exit();
}
?>
    <form action="User_main.php" method="GET">
        <p><input class="button" name="go_back" type="submit" value="Back to menu"></p>
    </form>

<?php