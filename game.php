<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location:");
}
$login = $_SESSION['login'];
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
                    echo "Logged as ".$login."<br>";
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
