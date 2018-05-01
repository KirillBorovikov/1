<head>
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_look.css'/>
    <title>Make a bet</title>
</head>
<?php

error_reporting(0);
include 'config.php';
$dblocation = "localhost";
$name= $_COOKIE["Name"];
$dbname = "boxing";
$dbuser = "root";
$dbpasswd = "drkiller94";
$dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);
?>
    <h1> Input data to make a bet</h1>
    <form action="make_bet.php" method="GET">

        <p></p><select size="4" name="Fighter" style="width: 173px;" id="fighter_select">
            <option disabled>Select Fighter</option>
        </select></p>
        <?php
        $ath = mysqli_query($dbcnx,"select * from fighter;");
        $fighters = array();
        $fighters_id = array();
        if($ath)
        {
            for($i=0;$fighter = mysqli_fetch_array($ath);$i++)
            {
                $fighters[] = $fighter['name'] . ' ' . $fighter['last_name'];
                $fighters_id[] = $fighter['id_fighter'];
            }
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }

        $js_array = '[';
        $n = count($fighters);
        for ($i = 0; $i < $n; $i++)
        {
            $js_array = $js_array . '[\'' . $fighters[$i] . '\', ' .  $fighters_id[$i] . ']';
            if ($i != $n-1)
            {
                $js_array = $js_array . ',';
            }
        }
        $js_array = $js_array . ']';

        ?>
        <script type="text/javascript">
            select = document.getElementById('fighter_select');
            var fighters = <?php echo $js_array ;?>;
            var n = fighters.length;
            for (var i = 0; i < n; i++)
            {
                var opt = document.createElement('option');
                opt.value = fighters[i][1];
                opt.innerHTML = fighters[i][0];
                select.appendChild(opt);
            }
        </script>

        <p></p><select size="4" name="Championship" style="width: 173px;" id="championship_select">
            <option disabled>Select championship</option>
        </select></p>
        <?php
        $ath = mysqli_query($dbcnx,"select * from championships;");
        $championships = array();
        $championships_id = array();
        if($ath)
        {
            for($i=0;$championship = mysqli_fetch_array($ath);$i++)
            {
                $championships[] = $championship['championship_name'];
                $championships_id[] = $championship['id_championship'];
            }
        }
        else
        {
            echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
            exit();
        }

        $js_array = '[';
        $n = count($championships);
        for ($i = 0; $i < $n; $i++)
        {
            $js_array = $js_array . '[\'' . $championships[$i] . '\', ' .  $championships_id[$i] . ']';
            if ($i != $n-1)
            {
                $js_array = $js_array . ',';
            }
        }
        $js_array = $js_array . ']';

        ?>
        <script type="text/javascript">
            select = document.getElementById('championship_select');
            var championships = <?php echo $js_array ;?>;
            var n = championships.length;
            for (var i = 0; i < n; i++)
            {
                var opt = document.createElement('option');
                opt.value = championships[i][1];
                opt.innerHTML = championships[i][0];
                select.appendChild(opt);
            }
        </script>
        <p><input class="Line" name="Place" required placeholder="Fighters place"></p>
        <p><input class="Line" name="Money" required placeholder="Money"></p>
        <p><input style="width: 173px;" name="Put_Bet" type="submit" value="Add Bet"></p>
    </form>
<?php
if($_GET['Put_Bet'])
{

    $ath2 = mysqli_query($dbcnx, "select id_bet from bets_for_user_$name;");
    $num = mysqli_num_rows($ath2) + 1;

    $M = $_GET['Money'];
    $P = $_GET['Place'];
    $C = $_GET['Championship'];
    $F = $_GET['Fighter'];

    $query4 = "select money from accounts where account_name='$name' ";
    $ath4 = mysqli_query ($dbcnx, $query4 );
    $test = mysqli_fetch_array($ath4);
    $money=$test['money'];

    $ath5 = mysqli_query($dbcnx, "select id_record from championships_fighters
                                where  championship_id = '$C';");
    $num1 =  mysqli_num_rows($ath5);

    if($money-$M<0)
    {
        ?>
        <script type="text/javascript">
            setTimeout(alert("Not enough money!"), 1000);
            document.location.href = "User_main.php";
        </script>
        <?php
    }
    else if ($P>$num1 )
    {
        ?>
        <script type="text/javascript">
            setTimeout(alert("There are less competeives than you wrote place!"), 1000);
            document.location.href = "User_main.php";
        </script>
        <?php
    }
    else if($P<0)
    {
        ?>
        <script type="text/javascript">
            setTimeout(alert("Places cant be below zero!"), 1000);
            document.location.href = "User_main.php";
        </script>
        <?php
    }
    else
    {
        $query = "INSERT INTO bets_for_user_$name VALUES ('$num','$F','$C','$P','$M')";
        $ath1 = mysqli_query($dbcnx, $query);
        if (!$ath1)
        {
            echo "<p><b>Error: " . mysqli_error($dbcnx) . "</b><p>";
            exit();
        }
        $query = "update accounts set money=money-$M where accounts.account_name='$name'";
        $ath1 = mysqli_query($dbcnx, $query);
        if (!$ath1)
        {
            echo "<p><b>Error: " . mysqli_error($dbcnx) . "</b><p>";
            exit();
        }

        ?>
        <script type="text/javascript">
            setTimeout(alert("Bet successfully placed !"), 1000);
            document.location.href = "User_main.php";
        </script>
        <?php
    }

}

