<?php 
require_once('require/db.php');



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/new-products.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('require/header.php') ?>

    <section class="slider">
        <div class="container">
            <div class="sliderItem"><img src="img/cover.png" alt=""></div>
        </div>
    </section>

    <section class="newProducts">
        <div class="container">
            <div class="sectionTitle">
                <h2>Новинки</h2>
            </div>

            <div class="newProductsContainer">
                <?php 
                $queryProducts = mysqli_query($db, "SELECT * FROM `products` ORDER BY `id` DESC");
                while ($rowProducts = mysqli_fetch_array($queryProducts)) { ?>
                    <div class="newProductBlock">
                        <div class="newProductCover">
                            <img src="img/cover/<?php echo $rowProducts['cover']; ?>" alt="">
                        </div>

                        <div class="newProductInformation">
                            <h3><?php echo $rowProducts['price']; ?> ₽</h3>
                            <h2><?php echo $rowProducts['name']; ?></h2>

                            <div class="newRating">
                                <img src="img/star.png" alt="">

                                <p>4.8 | 14 отзывов</p>
                            </div>

                            <div class="newProductBtn">
                                <a href="product.php?id=<?php echo $rowProducts['id']; ?>" class="newMore">Подробнее</a>
                                <a href="basket.php?id=<?php echo $rowProducts['id']; ?>" class="newBasket"><img src="img/product-basket.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>