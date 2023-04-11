    <?php
    
    if(isset($_POST['submitRegister'])){
        
        $name = $_POST['name'];
        $lastName = $_POST['lastname'];
        $login = $_POST['login'];
        $password = md5($_POST['password']);


        $query = "INSERT INTO `users` (login, name, lastname, password) VALUES ('$login', '$name', '$lastName','$password')";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $_SESSION['loginProfile'] = $login;
        $_SESSION['passwordProfile'] = $password;

        header('Location: profile.php');
        exit;
    }

    if(isset($_POST['submitLogin'])){
        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' and `password` = '$password'");
        $result = mysqli_fetch_array($query);

        if(!empty($result)){
            $_SESSION['loginProfile'] = $login;
            $_SESSION['passwordProfile'] = $password;

            header('Location: profile.php');
            exit;
        }
    
    
    }

    ?>
    
    <form action="" method="post">
        <h2>Вход</h2>    
        <input type="text" name="login" placeholder="Введите логин"><br>
        <input type="password" name="password" placeholder="Введите пароль"><br>
        <input type="submit" name="submitLogin" value="Войти">
    </form>


    
    <form action="" method="post">
        <h2>Регистрация</h2>    
        <input type="text" name="name" placeholder="Введите имя"><br>
        <input type="text" name="lastname" placeholder="Введите фамилию"><br>
        <input type="text" name="login" placeholder="Введите логин"><br>
        <input type="password" name="password" placeholder="Введите пароль"><br>
        <input type="submit" name="submitRegister" value="Войти">
    </form>
