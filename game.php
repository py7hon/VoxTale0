<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location:");
}
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
                <div id="menu">
                    <div class="button">News</div>
                    <div class="button">Resources</div>
                    <div class="button">Equipment</div>
                    <div class="button">Buildings and army</div>
                    <div class="button">Private messages</div>
                    <div class="button">Account</div>
                    <div class="button">Logout</div>
                </div>

                <div id="right">
                    <div class="bar">Top players</div>
                    <div class="bar">Lottery winners</div>
                </div>

                <div id="content">
                <?php
                    echo "Logged as ".$_SESSION['login']."<br>";
                ?>
                <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>
