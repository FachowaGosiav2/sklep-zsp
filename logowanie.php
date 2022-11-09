<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query('SELECT `user_name`, `password` FROM `users`;');
    ?>
</head>
<body>
    <form method="$_POST">
        Login:
        <input type="text" name="login"><br>
        Hasło:
        <input type="password" name='password'><br>
        <button type="submit">Zaloguj się</button>
    </form>
    <?php
    if(isset($_POST('login')) and isset($_POST('password'))){
        while($y2 = $y->fetch_all(MYSQLI_ASSOC)){
            if()
        }
    }
    ?>
    
</body>
</html>