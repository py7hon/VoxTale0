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
                </div>

                <div id="right">
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
