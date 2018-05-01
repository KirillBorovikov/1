<?php
$dblocation = 'localhost';
$dbname = 'boxing';
$dbuser = $_GET['User'];
$dbpasswd = $_GET['Pass'];
$dbcnx = @mysqli_connect($dblocation,"root","drkiller94");
setcookie("Name",$_GET['User'],time()+100000);
if (!$dbcnx)
{
    echo( "<P>Incorrect DB name or password.</P>" );
    exit();
}
if (!@mysqli_select_db($dbcnx,$dbname))
{
    echo( "<P>At current moment DB not avaible.</P>" );
    exit();
}
    $ath = mysqli_query($dbcnx,"select * from accounts;");
    $b = 0;
    $b1 =0;

    while($account = mysqli_fetch_array($ath))
    {

        $d1=$account['account_name'];
        if($dbuser==$d1)
        {
            $b=1;
        }

    }
    if($b==1)
    {

        $ath1 = mysqli_query($dbcnx,"select * from accounts;");
        while($account1 = mysqli_fetch_array($ath1))
        {

            $d2=$account1['account_pass'];
            if($dbpasswd==$d2)
            {
                $b1=1;
            }

        }
    }

    if($b==1 && $b1==0)
    {

        ?>
        <script type="text/javascript">
            setTimeout(alert("ATTENTION! Password is incorrect, please try again"),1000);
            document.location.href = "Enter.html";
        </script>
        <?php

    }

    else if($b==0 && $b1 ==0)
    {
        ?>
        <script type="text/javascript">
            setTimeout(alert("ATTENTION! Name is incorrect or doesnt exist, please try again"),1000);
            document.location.href = "Enter.html";
        </script>
        <?php
    }
    else if($b==1 && $b1 ==1)
    {
        if($dbuser =="Admin")
        {


            ?>
            <script type="text/javascript">
                document.location.href = "main.html";
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
                document.location.href = "User_main.php";
            </script>
            <?php
        }

    }

    ?>