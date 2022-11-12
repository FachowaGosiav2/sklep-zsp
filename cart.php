<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    session_start();
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query("SELECT ao.id, users_id, u.user_name, ao.product_name, ao.price, ao.content, ao.is_order FROM announcement_and_orders ao LEFT JOIN users u ON u.id = ao.users_id WHERE is_order = 1 AND users_id = ". $_SESSION['id'].";");
    $y2 = $y->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <?php
    echo "twoje oferty<br>";
    for($i = 0; $i < count($y2); $i++){
        echo 'Numer kupna to '.$y2[$i]['id'].'<br>';
        echo 'Nazwa produktu '.$y2[$i]['product_name'].'<br>';
        echo 'Cena produktu '.$y2[$i]['price'].'<br>';
        echo 'Opisz<br>'.$y2[$i]['content'].'<br>';
        echo '<a href="edit.php?sale='.$y2[$i]['id'].'">konktet</a>'.'<br>';
    }
    ?>
</body>
</html>