<?php
    require 'partials/header_admin.php'
?>

<!-- MainContent Sections Start -->
    <div class="main_content">
        <div class="wrapper">
            <h2>Dashboard</h2>
            <br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<!-- MainContent Sections End -->

<?php
    require 'partials/footer_admin.php'
?>