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
    if($stmt = $conn -> prepare("SELECT * FROM user WHERE login = ?")){
    if(!($stmt -> bind_param('s', $log))) echo $stmt -> error;
    if(!($stmt -> execute())) echo $stmt -> error;
    
    $res = $stmt -> get_result();

    if($res -> num_rows == 0){
        $stmt -> close();
        if($stmt = $conn -> prepare("INSERT INTO user(login, pass, class) VALUES (?, md5(?), ?)")){
            if(!($stmt -> bind_param('sss', $log, $pass, $class))) echo $stmt -> error;
            if(!($stmt -> execute())) echo $stmt -> error();
            $stmt -> close();
            header('Location: index.php');
            } echo $conn -> error;
        } else {
        echo "Login is used!";
        }
    } else echo $conn -> error;
}

?>