<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query('SELECT `user_name`, `password` FROM `users`;');
    $y2 = $y->fetch_all(MYSQLI_ASSOC)
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
    <?php
    $x = 0;
    if(isset($_POST['login']) && isset($_POST['password'])){
        for($i = 0; $i < count($y2); $i++){
            if($y2[$i]['user_name'] == $_POST['login']){
                if($y2[$i]['password'] == $_POST['password']){
                    $x = 1;
                    break;
                }
            }
        }
    }
    if ($x == 1){
        echo 'Udało ci się zalogować';
    }
    else{
        echo 'nie udało ci się';
    }
    ?>
    
</body>
</html>