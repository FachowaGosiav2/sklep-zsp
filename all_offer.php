<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    session_start();
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query("SELECT ao.id, users_id, u.user_name, ao.product_name, ao.price, ao.content, ao.is_announcement FROM announcement_and_orders ao LEFT JOIN users u ON u.id = ao.users_id WHERE is_announcement = 1 ;");
    $y2 = $y->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <?php
    echo "twoje oferty<br>";
    for($i = 0; $i < count($y2); $i++){
        echo 'Numer ogłoszenia to '.$y2[$i]['id'].'<br>';
        echo 'Nazwa produktu '.$y2[$i]['product_name'].'<br>';
        echo 'Cena produktu '.$y2[$i]['price'].'<br>';
        echo 'Opisz<br>'.$y2[$i]['content'].'<br>';
        echo '<a href="edit.php?no_offer='.$y2[$i]['id'].'">szczeguły</a>'.'<br>';
        echo '<a href="edit.php?la_offer='.$y2[$i]['id'].'">kup</a>'.'<br>';
    }
    $x->close();
    ?>
</body>
</html>