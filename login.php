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
    if($stmt = @$conn -> prepare("SELECT * FROM user WHERE login = ? AND pass = md5(?)")){
        if(!($stmt -> bind_param('ss', $log, $pass))) echo $stmt -> error;
        if(!($result = $stmt -> execute())) echo $stmt -> error;
        $res = $stmt->get_result();

        if($res -> num_rows > 0){

            $row = mysqli_fetch_assoc($res);

            $_SESSION['login'] = $row['login'];
            echo $_SESSION['login'];
            $stmt -> close(); 
            header('Location: game.php');

        } else {
            echo "Login error!";
        }

    } else echo $conn -> error;
}
?>