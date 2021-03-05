<?php     
    //Xác thực hệ thống
    // Kiểm tra người dùng đã đăng nhập hay chưa
    if(!isset($_SESSION['user'])){
        $_SESSION['no_login_message'] = "<div class='error text-center'>Đăng nhập trước đi đê bạn ei!!!</div>";
        //Chuyển đến trang đăng nhập 
        header('location:'.SITEURL.'admin/login.php');
    }    
?>