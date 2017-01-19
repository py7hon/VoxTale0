<?php
include("config.php");
session_start();

if(!empty($_POST['log']) && !empty($_POST['pass'])){
    $log = $_POST['log'];
    $pass = $_POST['pass'];
} else header('Location: index.php');

if(mysqli_connect_errno() != 0){
    echo "Conn error: ".mysqli_connect_error();
} else {
    if($res = @$conn -> query(sprintf("SELECT * FROM user WHERE login = '%s' AND pass = md5('%s')",
    mysqli_real_escape_string($conn, $log), 
    mysqli_real_escape_string($conn, $pass)))){
        if($res -> num_rows > 0){
            $ans = $res -> fetch_assoc();
            $_SESSION['login'] = $ans['login'];
            echo $_SESSION['login'];
            $res -> free_result();  
            header('Location: game.php');

        } else {
            echo "Login error!";
        }

    } else {
        echo "Database connection error!";
    }
}
?>