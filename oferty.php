<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    $y = "SELECT ao.id, users_id, u.user_name, ao.product_name, ao.price, ao.content, ao.is_announcement FROM announcement_and_orders ao LEFT JOIN users u ON u.id = ao.users_id WHERE is_announcement = 1 AND users_id = ". $_SESSION['id'].";";
    session_start();
    ?>
</head>
<body>
    <?php
    echo $_SESSION['user_name'];
    ?>
</body>
</html>