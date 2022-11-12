<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    ?>
</head>
<body>
    <form method="POST">
        Login:
        <input type="text" name="user_name"><br>
        Hasło:
        <input type="password" name='password'><br>
        Email
        <input type="mail" name="mail"><br>
        <button type="submit">Zarejestruje się</button>   
    </form>

    <?php
    if(isset($_POST["user_name"]) and isset($_POST['password']) and isset($_POST["mail"])){
        $y = "INSERT INTO `users`(`user_name`, `email`, `is_admin`, `password`) VALUES ('".$_POST["user_name"]."','".$_POST["mail"]."','0','".$_POST["password"]."')";
        $x->query($y);
        $x->close();
        header('Location: log.php');
    }
    $x->close();
    ?>
</body>
</html>