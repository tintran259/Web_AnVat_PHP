<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title?></title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style_detail.css">
    <link rel="stylesheet" href="css/style-order.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>

  <body>
    <div class="wapper-web">
    <!-- Navbar Section Starts Here -->
    <section class="navbar-header">
    <div class="container">
         <div class="logo">
            <a href="index.php" title="Logo">
               <img
               src="images/logoMix.png"
               alt="Restaurant Logo"
               class="logo_mixi"
               />
            </a>
         </div>
         <div class="cart">
            <div class="cart_form-search">
               <a href="food-search.php" class="icon_search">
                  <img src="images/search.png"   class="icon_search-img" alt="GioHnang">
               </a>
               <input type="text" class="input-search" placeholder="Tìm kiếm đồ ăn ...">
            </div>
            <div class="cart_press">
               <div class="noti">
                  <p class="number_noti">01</p>
               </div>
               <a href="order.php" class="btn_cart">
                  <img src="images/cart.png"   class="icon_cart" alt="GioHnang">
               </a>
            </div>
         </div>
      </div>
    </section>
  
<!-- Navbar Section Ends Here -->
