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

    
</body>
</html>