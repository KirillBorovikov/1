<head>
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_look.css'/>
    <title>Look Tables</title>
</head>
<?php
error_reporting(0);
include 'config.php';
$dblocation = "localhost";
$dbname = "boxing";
$dbuser = "root";
$name= $_COOKIE["Name"];
$dbpasswd = "drkiller94";
$dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);
    if($_GET['fighter'])
    {

        $ath = mysqli_query($dbcnx,"select * from fighter;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID fighter</td><td>Weight category</td><td>Raiting</td><td>Name
            </td><td>Last name</td><td>ID trainer</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($fighter = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$fighter['id_fighter']."&nbsp;</td><td>".$fighter['weight_category']."
    &nbsp </td><td>".$fighter['raiting']."&nbsp;</td><td>".$fighter['name']."&nbsp;</td><td>".$fighter['last_name']."&nbsp;</td><td>".
                    $fighter['trainer_id']."&nbsp;</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error()."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }

    }
    else if($_GET['trainer'])
    {
        $ath = mysqli_query($dbcnx,"select * from trainer;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID trainer</td><td>Name</td><td>Last name</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($trainer = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$trainer['id_trainer']."&nbsp;</td><td>".$trainer['trainer_name']."
                &nbsp </td><td>".$trainer['trainer_lname']."&nbsp;</td><tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
    }
    else if($_GET['stadiums'])
    {
        $ath = mysqli_query($dbcnx,"select * from stadiums;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID stadium</td><td>Name</td><td>Fondation year</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($stadiums = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$stadiums['id_stadium']."&nbsp;</td><td>".$stadiums['stadium_name']."
                &nbsp </td><td>".$stadiums['fondation_year']."&nbsp;</td><tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
    }
    else if($_GET['championships'])
    {
        $ath = mysqli_query($dbcnx,"select * from championships;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID championship</td><td>Fighters number</td><td>Championship raiting</td><td>Prize fond
            </td><td>Championship name</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($championships = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$championships['id_championship']."&nbsp;</td><td>".$championships['fighters_number']."
    &nbsp </td><td>".$championships['championship_raiting']."&nbsp;</td><td>".$championships['prize_fond']."&nbsp;</td><td>".
                    $championships['championship_name']."&nbsp;</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
    }
    else if($_GET['champs_stad'])
    {
        $ath = mysqli_query($dbcnx,"select * from championships_stadiums;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID record</td><td>ID stadium</td><td>ID championship
            </td><td>Ticket price</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($champs_stad = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$champs_stad['id_record']."&nbsp;</td><td>".$champs_stad['stadium_id']."
    &nbsp </td><td>".$champs_stad['championship_id']."&nbsp;</td><td>".
                    $champs_stad['ticket_price']."&nbsp;</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
    }
    else if($_GET['champs_fight'])
    {
        $ath = mysqli_query($dbcnx,"select * from championships_fighters;");
        if($ath)
        {
            // Определяем таблицу и заголовок
            echo "<table border=1>";
            echo "<tr><td>ID record</td><td>ID fighter</td><td>ID championship
            </td><td>Tournament position</td></tr>";
            // Так как запрос возвращает несколько строк, применяем цикл
            while($champs_fight = mysqli_fetch_array($ath))
            {
                echo "<tr><td>".$champs_fight['id_record']."&nbsp;</td><td>".$champs_fight['fighter_id']."
    &nbsp </td><td>".$champs_fight['championship_id']."&nbsp;</td><td>".
                    $champs_fight['tournament_position']."&nbsp;</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }
        if($name=="Admin")
        {
            ?>
            <form action="main.html" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
        else
        {
            ?>
            <form action="User_main.php" method="GET">
                <p><input class= "button" name="to_menu" type="submit" value="Back to menu"></p>
            </form>
            <?php
        }
    }
?>