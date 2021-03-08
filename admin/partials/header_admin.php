<?php     
    require '../config/constants.php';
    require 'partials/login_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admin.css">
    <!-- Boostrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    
    <!-- Fonts  -->
    <link rel="stylesheet" href="/fonts/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/fontawesome.min.css">
    <title>Admin</title>
</head>
<body>

<!-- Menu Sections Start -->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>
                    <a href="manage_admin.php">Admin</a>
                </li>
                <li>
                    <a href="manage_food.php">Món ăn</a>
                </li>
                <li>
                    <a href="manage_order.php">Đặt hàng</a>
                </li>
                <li>
                    <a href="logout.php">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>
<!-- Menu Sections End -->