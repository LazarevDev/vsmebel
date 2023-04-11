<?php 
session_start();
require_once('../require/key.php');

if(!empty($_SESSION['login']) AND !empty($_SESSION['password'])){
    $sessionLogin = $_SESSION['login'];
    $sessionPassword = $_SESSION['password'];

    if($sessionLogin == $loginPanel AND $sessionPassword == $passwordPanel){

    }else{
        header('Location: login.php');
    }


}else{
    header('Location: login.php');
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
        <input type="file" name="file"><br>
        <input type="text" name="name" placeholder="Название"><br>
        <input type="text" name="category" placeholder="Категория товара"><br>
        <input type="text" name="count" placeholder="Введите кол-во товара"><br>
        <input type="text" name="price" placeholder="Цена"><br>
        <textarea name="description" placeholder="Введите описание" id=""></textarea><br>
        <input type="submit" name="submit" value="Загрузить">
    </form>
</body>
</html>