<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    session_start();
    $x = new mysqli('127.0.0.1', 'root', '', 'mydb');
    ?>
</head>
<body>
    <form method="POST">
        Nazwa produktu:
        <input type="text" name="name"><br>
        Cena:
        <input type="taxt" name='cost'><br>
        Opis
        <input type="text" name="content"><br>
        <button type="submit">Zamieść ogłoszenie</button>   
    </form>
    <?php
        if(isset($_POST['name']) and isset($_POST['cost']) and isset($_POST['content'])){
            $q = "INSERT INTO `announcement_and_orders`(`users_id`, `product_name`, `price`, `content`, `is_announcement`, `is_order`) VALUES ('". $_SESSION['id']."','".$_POST['name']."','".$_POST['cost']."','".$_POST['content']."','1','0');";
            $x->query($q);
        }
        $x->close();
    ?>
</body>
</html>