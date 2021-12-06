<?php
    session_start();

    $password = $_POST["password"];
    $error = "Incorrect Password! Please Try Again!";

    if (!isset( $_POST['submitted'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else if($password == "password1"){
        $_SESSION['password'] = $password;
        header('Location:' . '../templates/trainer.php'); 
    }else{
        $_SESSION['error'] = $error;
        header('Location: ../index.php');
    }
?>