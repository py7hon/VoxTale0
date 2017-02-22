<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location:");
}
$login = $_SESSION['login'];
$class = $_SESSION['class'];
?>
<html>
    <head>
        <title>VoxTale0</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/game.css" type="text/css">
        <link rel="stylesheet" href="css/snow.css" type="text/css">
    </head>

    <body>
        <div id="snow">
            <div id="title">
                VoxTale0
            </div>
            
            <div id="container">
                <?php
                    include("menu.php");
                ?>

                <div id="right">
                    <div class="bar">
                    <?php
                        include("top.php");
                    ?>
                    </div>
                    <div class="bar">
                    <?php
                        include("lottery.php");
                    ?>
                    </div>
                </div>

                <div id="content">
                <?php
                    echo "<center><img height='128' src='img/";
                    switch($class){
                        case 'm':
                            echo "miku.png'><br>Welcome Miku";
                            break;
                        case 'g':
                            echo "gumi.png'><br>Welcome Gumi";
                            break;
                        case 'r':
                            echo "rin.png'><br>WelcomeRin";
                            break;
                        case 'l':
                            echo "luka.png'><br>Welcome Luka";
                            break;
                    }
                    echo "-san!<br>Login: <b>".$login."</b><br>";
                    echo "<form action='chg_pass.php' method='POST'>";
                    echo "Current pass: <input type='password'' name='pass'><br>";
                    echo "Pass change: <input type='password'' name='pass_chg'><br>";
                    echo "Repeat change: <input type='password'' name='pass_chg_rpt'><br>";
                    echo "<input type='submit' value='Change'></form>";
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
