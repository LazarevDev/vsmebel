<?php
session_start();
require_once('require/db.php');

$loginProfile = $_SESSION['loginProfile'];



$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$loginProfile'");
$result = mysqli_fetch_array($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('require/header.php'); ?>

    <section class="profile">
        <div class="container">
            <?php 
            echo $result['name']." - ".$result['lastname']."<br>"; 

            if($result['role'] == 1){
                
                echo "<a href='admin-panel/admin.php'>Панель администратора</a>";
            }
            ?><br>
        <a href="logout.php">Выход</a>
    </div>
    </section>
</body>
</html>