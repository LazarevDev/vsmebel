<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/new-products.css">
    <title>Document</title>
</head>
<body>
    
    <?php require_once('require/header.php'); ?>

    <section class="product">
        <div class="container">
            <div class="sectionTitle">
                <h2>Кресло Людвиг</h2>
            </div>

            <div class="productContainer">
                <div class="contentImg">
                    <div class="albumImg">
                        <div class="productImg"><img src="img/cover-product.png" alt=""></div>
                        <div class="productImg"><img src="img/cover-product.png" alt=""></div>
                        <div class="productImg"><img src="img/cover-product.png" alt=""></div>
                    </div>

                    <div class="productCover">
                        <img src="img/cover-product.png" alt="">
                    </div>
                </div>

                <div class="contentInformation">
                    <div class="rating">
                        <img src="img/star.png" alt="">
                        <p>4.8 | 14 отзывов</p>
                    </div>

                    <div class="price">
                        <h3>8 999 ₽</h3>
                    </div>

                    <div class="btnProductContent">
                        <a href="#" class="btnBasketProduct">В корзину</a>
                        <p>Доступно для доставки 11 шт</p>
                    </div>
                </div>
            </div>

            <div class="productDescription">
                <div class="sectionTitle">
                    <h2>Описание</h2>
                </div>

                <p>Кресло Людвиг претендует на центральную роль в чайной зоне гостиной, 
                    в кабинете или будуаре. Обивка из прочного велюра дополнена 
                    декоративным кантом из искусственной кожи под цвет ножек. 
                    Небольшой вес конструкции оставляет возможность для перемещения. 
                    Подушечка под поясницу в комплекте позволит расслабить спину и 
                    устроиться с максимальным комфортом. Боковые части спинки создают 
                    вокруг сидящего человека эффект защищенного пространства, в котором 
                    можно уединиться со своими мыслями. Эта модель доступна только в тех 
                    вариантах обивки, которые представлены в нашем ассортименте.</p>
            </div>
        </div>
    </section>




    <section class="newProducts">
        <div class="container">
            <div class="sectionTitle">
                <h2>Новинки</h2>
            </div>

            <div class="newProductsContainer">
                <?php 
                
                for ($i=0; $i < 10; $i++) { ?>
                    <div class="newProductBlock">
                        <div class="newProductCover">
                            <img src="img/cover-product.png" alt="">
                        </div>

                        <div class="newProductInformation">
                            <h3>8 999 ₽</h3>
                            <h2>Кресло Людвиг</h2>

                            <div class="newRating">
                                <img src="img/star.png" alt="">

                                <p>4.8 | 14 отзывов</p>
                            </div>

                            <div class="newProductBtn">
                                <a href="" class="newMore">Подробнее</a>
                                <a href="" class="newBasket"><img src="img/product-basket.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php }
                
                ?>
            </div>
        </div>
    </section>
</body>
</html>