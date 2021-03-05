<?php
    //Bắt đầu phiên làm việc
    session_start();

    // Tạo ra những hằng số để chứa những giá trị không được lặp lại
    define('SITEURL','http://localhost/MeAnVat_PHP/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','meanvat');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // ket noi database
    $db_select = mysqli_select_db($conn, DB_NAME)or die(mysqli_error($conn)); //Chọn Database
    
?>