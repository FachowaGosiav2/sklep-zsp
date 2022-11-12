<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query('SELECT `id`, `user_name`, `password` FROM `users`;');
    $y2 = $y->fetch_all(MYSQLI_ASSOC);
    session_start();
    ?>
</head>
<body>
    <form method="POST">
        Login:
        <input type="text" name="login"><br>
        Hasło:
        <input type="password" name='password'><br>
        <button type="submit">Zaloguj się</button>
    </form>
    <form action="register.php">
        <input type="submit" value="register" />
    </form>
    <?php
    $x2 = 0;
    if(isset($_POST['login']) && isset($_POST['password'])){
        for($i = 0; $i < count($y2); $i++){
            if($y2[$i]['user_name'] == $_POST['login']){
                if($y2[$i]['password'] == $_POST['password']){
                    $x2 = 1;
                    $_SESSION['id'] = $y2[$i]['id'];
                    $_SESSION['user_name'] = $_POST['login'];
                    header("Location: or.php");
                    break;
                }
            }
        }
    }
    if ($x2 == 1){
        echo 'Udało ci się zalogować';
    }
    else{
        echo 'nie udało ci się';
    }
    $x->close();
    ?>
    
</body>
</html>