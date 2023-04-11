<?php 
    session_start();
    require_once('require/db.php');
    
    if(!empty($_SESSION['loginProfile']) AND !empty($_SESSION['passwordProfile'])){
        $sessionLoginProfile = $_SESSION['loginProfile'];
        $sessionPasswordProfile = $_SESSION['passwordProfile'];


                
        $queryProfile = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$sessionLoginProfile' AND `password` = '$sessionPasswordProfile' "); 
        $resultProfile = mysqli_fetch_array($queryProfile);


    
        if($sessionLoginProfile == $resultProfile['login'] AND $sessionPasswordProfile == $resultProfile['password']){
            require_once('content-profile.php');
        }else{
            require_once('login-profile.php');
        }
    }else{
        require_once('login-profile.php');
    }
    
    
?>
