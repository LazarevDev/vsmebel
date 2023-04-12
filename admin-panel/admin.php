<?php 
require_once('../require/db.php');

if(isset($_GET['edit'])){
    $getEdit = $_GET['edit'];

    $queryEdit = mysqli_query($db, "SELECT * FROM `products` WHERE `id` = '$getEdit'");
    $requireQueryEdit = mysqli_fetch_array($queryEdit);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        if(!empty($_FILES['file']['name'])){
            // если обложка есть обновляем все

            // Добавляем запись 
            $target = "../img/cover/".basename($_FILES['file']['name']);
            $file = $_FILES['file']['name'];

            if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                $updateProducts = mysqli_query($db, "UPDATE `products` 
                SET `cover` = '$file', `name` = '$name', `category` = '$category', `count` = '$count', `price` = '$price', `description` = '$description' WHERE `id` = '$getEdit'");
                header('Location: admin.php');
                exit;

        
            }else{  
                exit("Ошибка");
            }
        }else{
            echo "Файл пуст";
            $updateProducts = mysqli_query($db, "UPDATE `products` 
            SET `name` = '$name', `category` = '$category', `count` = '$count', `price` = '$price', `description` = '$description' WHERE `id` = '$getEdit'");
            // если обложки нет обновляем все кроме обложки

            header('Location: admin.php');
            exit;
        }
    
    
    }

    echo "Редактировать";


}elseif(isset($_GET['delete'])){
    $getDelete = $_GET['delete'];

    $queryDelete = mysqli_query($db, "DELETE FROM `products` WHERE `id` = '$getDelete'");

    header('Location: admin.php');
    exit;
}else{
    echo "Добавить товар";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        
        // Добавляем запись 
        $target = "../img/cover/".basename($_FILES['file']['name']);
        $file = $_FILES['file']['name'];
    
    
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            $queryAddProduct = "INSERT INTO `products` (`cover`, `name`, `category`, `count`, `price`, `description`) VALUES ('$file', '$name', '$category', '$count', '$price', '$description')";
            $resultAddProduct = mysqli_query($db, $queryAddProduct) or die(mysqli_error($db));
        }else{  
            exit("Ошибка");
        }
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file"><br>
        <input type="text" name="name" placeholder="Название" value="<?php if(!empty($getEdit)){ echo $requireQueryEdit['name']; } ?>"><br>
        <input type="text" name="category" list="category" placeholder="Категория товара" value="<?php if(!empty($getEdit)){ echo $requireQueryEdit['category']; } ?>"><br>
            <datalist id="category">
            <!-- <option value="Boston"> -->
        </datalist>

        <input type="text" name="count" placeholder="Введите кол-во товара" value="<?php if(!empty($getEdit)){ echo $requireQueryEdit['count']; } ?>"><br>
        <input type="text" name="price" placeholder="Цена" value="<?php if(!empty($getEdit)){ echo $requireQueryEdit['price']; } ?>"><br>
        <textarea name="description" placeholder="Введите описание" id=""><?php if(!empty($getEdit)){ echo $requireQueryEdit['description']; } ?></textarea><br>
        <input type="submit" name="submit" value="Загрузить">
        <a href="../index.php">Главная страница</a>
    </form>
    

    <section>
        <div class="container">
        <hr>
            <?php  
                $queryRow = mysqli_query($db, "SELECT * FROM `products` ORDER BY `id` DESC");
                while($row = mysqli_fetch_array($queryRow)){
                    echo $row['name']."-".$row['category']."<br> 
                    <a href='admin.php?edit=".$row['id']."'>Редактировать</a> <a href='admin.php?delete=".$row['id']."'>Удалить</a><hr>";
                }
            ?>
        </div>
    </section>
</body>
</html>