<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type='text/css' rel='stylesheet' href='style_Add.css'/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.mmenu.js"></script>
    <title>Register page</title>
</head>
<body>
<h1> Input desirable name and password</h1>
<form action="register.php" method="GET">

    <p><input class="Line" name="Name"  required placeholder="Account name"></p>
    <p><input class="Line" name="Password"  required placeholder="Password"></p>
    <p><input style="width: 173px;" name="Put_account" type="submit" value="Finish"></p>
</form>

    <?php
    error_reporting(0);
    $dblocation = "localhost";
    $dbname = "boxing";
    $dbuser = "root";
    $dbpasswd = "drkiller94";
    $dbcnx = @mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);
    if($_GET['Put_account'])
    {
        $ath = mysqli_query($dbcnx, "select account_name from accounts;");
        $b = 0;
        while ($account = mysqli_fetch_array($ath))
        {
            $d1 = $account['account_name'];

            if ($_GET['Name'] == $d1)
            {


                ?>
                <script type="text/javascript">
                    setTimeout(alert("ATTENTION! Name you selected already used, use another"), 1000);
                    document.location.href = "Enter.html";
                </script>
                <?php
                $b = 1;
            }

        }

        if ($b == 0)
        {
            $ath2 = mysqli_query($dbcnx, "select id_account from accounts;");
            $num =  mysqli_num_rows($ath2)+1;

            $N =$_GET['Name'];
            $P =$_GET['Password'];

            $query = "INSERT INTO accounts VALUES ('$num','$N','$P','1000')";
            $ath1 = mysqli_query ($dbcnx, $query );
            if(!$ath1)
            {
                echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
                exit();
            }
            $query1 = "create table bets_for_user_$N (
                      id_bet int(15) AUTO_INCREMENT,
                      id_fighter int (20) NOT NULL,
                      id_championship int (20) NOT NULL,
                      place int (20) NOT NULL,
                      money int (20) NOT NULL,
                      PRIMARY KEY (id_bet) 
                      );";
            $ath2 = mysqli_query ($dbcnx, $query1 );
            if(!$ath2)
            {
                echo "<p><b>Error: ".mysqli_error($dbcnx)."</b><p>";
                exit();
            }
        ?>
        <script type="text/javascript">
            setTimeout(alert("Registration Successfull!"),1000);
            document.location.href = "Enter.html";
        </script>
        <?php
        }


    }
?>

</body>
</html>