<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    session_start();
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    
    if(isset($_GET['offer'])){
        if(isset($_POST['product_name']) and isset($_POST['price']) and isset($_POST['content'])){
            $q = "UPDATE `announcement_and_orders` SET `product_name`='".$_POST['product_name']."',`price`='".$_POST['price']."',`content`='".$_POST['content']."' WHERE id = ".$_GET['offer'].";";
            $x->query($q);
        }
    }
    if(isset($_GET['offer'])){
        $y = $x->query("SELECT `id`, `product_name`, `price`, `content` FROM `announcement_and_orders` WHERE is_announcement = 1 AND id = ".$_GET['offer'].";");
    }
    if(isset($_GET['sale'])){
        $y = $x->query("SELECT `id`, `product_name`, `price`, `content` FROM `announcement_and_orders` WHERE is_order = 1 AND id = ".$_GET['sale'].";");
    }
    if(isset($_GET['la_offer'])){
        $y = $x->query("SELECT `id`, `product_name`, `price`, `content` FROM `announcement_and_orders` WHERE is_announcement = 1 AND id = ".$_GET['la_offer'].";");
    }
    if(isset($_GET['no_offer'])){
        $y = $x->query("SELECT `id`, `product_name`, `price`, `content` FROM `announcement_and_orders` WHERE is_announcement = 1;");
    }
    $y2 = $y->fetch_array(MYSQLI_ASSOC);
    if(isset($_GET['la_offer'])){
        if(isset($_POST['product_name']) and isset($_POST['price']) and isset($_POST['content'])){
            $q = "UPDATE `announcement_and_orders` 
            SET `is_order` = 1, `is_announcement` = 0, `users_id` = '". $_SESSION['id']."', `product_name`='".$_POST['product_name']."',`price`='".$_POST['price']."',`content`='".$_POST['content']."' WHERE id = ".$_GET['la_offer'].";";
            $x->query($q);
            header('Location: cart.php');
        }
    }
    ?>
</head>
<body>
    <?php 
    echo '
    <form method="POST">
        Zmianan nazwy <input type="text" name="product_name" value="'.$y2['product_name'].'">
        Zmiana ceny <input type="text" name="price" value="'.$y2['price'].'">
        Zmianan opisu <input type="text" name="content" value="'.$y2['content'].'">';
        if(isset($_GET['offer'])){
         echo '<button type="submit">Edytuj</button>';
        }
        if(isset($_GET['la_offer'])){
            echo '<button type="submit">Kup</button>';
           }
    echo '</form>';

    $x->close();
    ?>
</body>
</html>