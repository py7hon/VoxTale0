<?php
include("config.php");
session_start();

if(!empty($_POST['log']) && !empty($_POST['pass'] && 
    !empty($_POST['class']))){
    $log = $_POST['log'];
    $pass = $_POST['pass'];
    $pass_rpt = $_POST['pass_rpt'];
    $class = $_POST['class'];
} else header('Location: register_form.php');

if($pass != $pass_rpt){
    echo "Password mismatch!";
    exit();
}

if(mysqli_connect_errno() != 0){
    echo "Conn error: ".mysqli_connect_error();
} else {
    if($res = $conn -> query(sprintf("SELECT * FROM user WHERE login = '%s'",
    mysqli_real_escape_string($conn, $log)))){
        if($res -> num_rows == 0){
            $conn -> query(sprintf("INSERT INTO user(login, pass, class) 
            VALUES('%s', md5('%s'), '%s')", 
            mysqli_real_escape_string($conn, $log),
            mysqli_real_escape_string($conn, $pass),
            mysqli_real_escape_string($conn, $class)));
            header('Location: index.php');

        } else {
            echo "Login is used!";
        }

    } else {
        echo "Database connection error!";
    }
}
?>