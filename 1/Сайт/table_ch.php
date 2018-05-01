<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_Add.css'/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.mmenu.js"></script>
    <title>Edit table</title>
</head>
<body>

<?php
error_reporting(0);

include 'config.php';
$dblocation = "localhost";
$dbname = "boxing";
$dbuser = "root";
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
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
        exit();
    }
    ?>
    <form action="table_ch.php" method="GET">
       <p><input class="button" name="Add_fighter" type="submit" value="Add row"></p>
    </form>
    <form action="table_ch.php" method="GET">
        <p><input class= "button" name="Delete_fighter" type="submit" value="Delete row"></p>
    </form>
    <?php
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
    ?>
    <form action="table_ch.php" method="GET">
        <p><input class="button" name="Add_trainer" type="submit" value="Add row"></p>
    </form>
    <form action="table_ch.php" method="GET">
        <p><input class= "button" name="Delete_trainer" type="submit" value="Delete row"></p>
    </form>
<?php
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
}
else if($_GET['Add_fighter'])
{
    ?>
    <h1> Input data to add in table</h1>
    <form action="table_ch.php" method="GET">
       <p><select name="Category" size="4" style="width: 173px;">
                <option disabled>Weight Category</option>
                <option selected value="Heavy">Heavy</option>
                <option value="Half-heavy">Half-heavy</option>
                <option value="Super-heavy">Super-heavy</option>
            </select></p>
        <p><input class="Line" name="Raiting"  required placeholder="Raiting"></p>
        <p><input class="Line" name="Name"  required placeholder="Name"></p>
        <p><input class="Line" name="Last_name"  required placeholder="Last Name"></p>
        <select size="4" name="Trainer" style="width: 173px;" id="trainer_select">
            <option disabled>Select Trainer</option>
        </select>
        <?php
        $ath = mysqli_query($dbcnx,"select * from trainer;");
        $trainers = array();
        $trainers_id = array();
        if($ath)
        {
            for($i=0;$trainer = mysqli_fetch_array($ath);$i++)
            {
                $trainers[] = $trainer['trainer_name'] . ' ' . $trainer['trainer_lname'];
                $trainers_id[] = $trainer['id_trainer'];
            }
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }

        $js_array = '[';
        $n = count($trainers);
        for ($i = 0; $i < $n; $i++)
        {
            $js_array = $js_array . '[\'' . $trainers[$i] . '\', ' .  $trainers_id[$i] . ']';
            if ($i != $n-1)
            {
                $js_array = $js_array . ',';
            }
        }
        $js_array = $js_array . ']';

        ?>
        <script type="text/javascript">
            select = document.getElementById('trainer_select');
            var trainers = <?php echo $js_array ;?>;
            var n = trainers.length;
            for (var i = 0; i < n; i++)
            {
                var opt = document.createElement('option');
                opt.value = trainers[i][1];
                opt.innerHTML = trainers[i][0];
                select.appendChild(opt);
            }
         </script>

        <p><input style="width: 173px;" name="Put_fighter" type="submit" value="Add row"></p>
    </form>
<?php
}
else if($_GET['Put_fighter'])
{
    $ath = mysqli_query($dbcnx,"select * from fighter;");
    $ath5 = mysqli_query($dbcnx, "select id_fighter from fighter;");
    $num =  mysqli_num_rows($ath5)+1;
        $ID=$num;
        $CAT=$_GET['Category'];
        $R=$_GET['Raiting'];
        $N =$_GET['Name'];
        $L =$_GET['Last_name'];
        $T =$_GET['Trainer'];

        $query = "INSERT INTO fighter VALUES ('$ID','$CAT','$R','$N', '$L', '$T')";


        $ath1 = mysqli_query ($dbcnx, $query );
        if($ath1)
        {

        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }



    ?>
        <script type="text/javascript">
        document.location.href = "main.html";
        </script>
    <?php

}
else if($_GET['Delete_fighter'])
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
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
        exit();
    }
    ?>

    <h1> Select fighter ID to delete</h1>
    <form action="table_ch.php" method="GET">
        <p><input class="Line" name="ID" required placeholder="Fighter ID"></p>
        <p><input style="width: 173px;" name="Out_fighter" type="submit" value="Delete row"></p>
    </form>

    <?php
}
else if($_GET['Out_fighter'])
{

    $ID=$_GET['ID'];
    $query = "DELETE FROM fighter WHERE id_fighter='$ID'";

    $ath1 = mysqli_query ($dbcnx, $query );
    if(!$ath1)
    {
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
        exit();
    }



?>
    <script type="text/javascript">
        document.location.href = "main.html";
    </script>
<?php

}
else if($_GET['Add_trainer'])
{
?>
    <h1> Input data to add in table</h1>
    <form action="table_ch.php" method="GET">

        <p><input class="Line" name="Name"  required placeholder="Name"></p>
        <p><input class="Line" name="Last_name"  required placeholder="Last Name"></p>

        <p><input style="width: 173px;" name="Put_trainer" type="submit" value="Add row"></p>
    </form>
    <?php
}
else if($_GET['Put_trainer'])
{
$ath = mysqli_query($dbcnx,"select * from trainer;");
$b = 0;
while($trainer = mysqli_fetch_array($ath))
{
$d1=$trainer['id_trainer'];
if($_GET['ID']==$d1)
{


?>
    <script type="text/javascript">
        setTimeout(alert("ATTENTION! ID you selected already used, use another"),1000);
        document.location.href = "Choose.html";
    </script>
<?php
$b=1;
}

}
if($b == 0)
{

    $ath5 = mysqli_query($dbcnx, "select id_trainer from trainer;");
    $num =  mysqli_num_rows($ath5)+1;
    $ID=$num;
    $N =$_GET['Name'];
    $L =$_GET['Last_name'];


    $query = "INSERT INTO trainer VALUES ('$ID','$N', '$L')";


    $ath1 = mysqli_query ($dbcnx, $query );
    if($ath1)
    {

    }
    else
    {
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
        exit();
    }


}
?>
    <script type="text/javascript">
        document.location.href = "main.html";
    </script>
    <?php

}
else if($_GET['Delete_trainer'])
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
    ?>

    <h1> Select trainer ID to delete</h1>
    <form action="table_ch.php" method="GET">
        <p><input class="Line" name="ID" required placeholder="Trainer ID"></p>
        <p><input style="width: 173px;" name="Out_trainer" type="submit" value="Delete row"></p>
    </form>

    <?php
}
else if($_GET['Out_trainer'])
{
    $ID=$_GET['ID'];
    $query = "DELETE FROM trainer WHERE id_trainer='$ID'";

    $ath1 = mysqli_query ($dbcnx, $query );
    if(!$ath1)
    {
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
        exit();
    }



    ?>
    <script type="text/javascript">
        document.location.href = "main.html";
    </script>
    <?php

}
?>

</body>
</html>