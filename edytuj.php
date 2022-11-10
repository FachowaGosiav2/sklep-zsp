<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    session_start();
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    $y = $x->query("SELECT `id`, `product_name`, `price`, `content` FROM `announcement_and_orders` WHERE is_announcement = 1 AND id = ".$_GET['oferta'].";");
    $y2 = $y->fetch_array(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <?php 
    echo '
    <form method="POST">
        Zmianan nazwy <input type="text" name="product_name" value="'.$y2['product_name'].'">
        Zmiana ceny <input type="text" name="price" value="'.$y2['price'].'">
        Zmianan opisu <input type="text" name="content" value="'.$y2['content'].'">
        <button type="submit">Edytuj</button>
    </form>
    ';

        if(isset($_POST['product_nameproduct_name']) and isset($_POST['price']) and isset($_POST['content'])){
            $y = $x->query("UPDATE `announcement_and_orders` SET `product_name`='".$_POST['product_name']."',`price`='".$_POST['price']."',`content`='".$_POST['content']."' WHERE id = ".$_GET['oferta'].";");
            mysqli_query($x, $y);
        }
    ?>
</body>
</html>