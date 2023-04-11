<?php
session_start();
require_once('../require/key.php');

if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);

    if($login == $loginPanel AND $password == $passwordPanel){
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        header('Location: admin.php');
        exit;
    }else{
        exit('Неверно введенные данные');
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>