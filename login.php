<?php
include("config.php");
session_start();

if(isset($_POST['log']) && isset($_POST['pass'])){
    $log = $_POST['log'];
    $pass = $_POST['pass'];
} else header('Location: index.php');

if(mysqli_connect_errno() != 0){
    echo "Conn error: ".mysqli_connect_error();
} else {
    $res = @$conn -> query("SELECT * FROM user WHERE login = '$log' AND pass = '$pass'");
    $num = $res -> num_rows;
    if($num > 0){
        $ans = $res -> fetch_assoc();
        $_SESSION['login'] = $ans['login'];
        echo $_SESSION['login'];

        $res -> free_result();  
        header('Location: game.php');              
    } else {
        echo "Blad logowania!";
        exit();
    }

}