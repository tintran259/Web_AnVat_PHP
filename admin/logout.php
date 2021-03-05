<?php
    include('../config/constants.php');
    // 1. Hủy phiên làm việc
    session_destroy();// Hủy phiên làm việc của user
    
    // 2. Chuyển đến trang đăng nhập admin 
    header('location:'.SITEURL.'admin/login.php');
?>