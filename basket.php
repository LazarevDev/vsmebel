<?php 
session_start();
require_once('require/db.php');

$loginProfile = $_SESSION['loginProfile'];

if(isset($_GET['id'])){
    $addBasket = $_GET['id'];

    $queryAddBasket = "INSERT INTO `basket` (`id_product`, `login`) VALUES ('$addBasket', '$loginProfile')";
    $resultAddBasket = mysqli_query($db, $queryAddBasket) or die(mysqli_error($db));

    header('Location: basket.php');
    exit;

}elseif(isset($_GET['loginDelete'])){
    $loginDelete = $_GET['loginDelete'];
    $queryDelete = mysqli_query($db, "DELETE FROM `basket` WHERE `login` = '$loginDelete'");

    header('Location: basket.php');
    exit;
}else{
    // Проверяем есть ли в бд "basket" товары 
    $queryBasket = mysqli_query($db, "SELECT * FROM `basket` WHERE `login` = '$loginProfile'");
    $resultBasket = mysqli_fetch_array($queryBasket);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/basket.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('require/header.php'); ?>
    <?php  
    if(!empty($resultBasket['id'])){
        $queryRowBasket = mysqli_query($db, "SELECT * FROM `basket` LEFT JOIN `products` ON basket.id_product = products.id WHERE basket.login = '$loginProfile'");
        while($row = mysqli_fetch_array($queryRowBasket)){
            echo $row['name']."-".$row['price']." <a href='buy.php'>Заказать</a><br>";
        }
    }else{
        echo "Корзина пустая";
    }
    ?>
    <br>
    <a href="basket.php?loginDelete=<?php echo $loginProfile; ?>">Очистить корзину</a><br>
    <a href="index.php">Главная страница</a>

    

</body>
</html>