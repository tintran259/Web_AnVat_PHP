<?php
    // Kết nối với file constants.php
    require('../config/constants.php');

    // 1. Lấy id của admin để xóa
    $id = $_GET['id'];

    // 2. Tạo truy vấn để có thể xóa admin
    $sql = "DELETE FROM admin WHERE id = $id";

    // Thực thi lệnh truy vấn
    $res = mysqli_query($conn, $sql);

    // Kiểm tra lệnh truy vấn có thực thi thành công hay không
    if($res == true){
        // Thực thi lệnh truy vấn thành công và thông tin admin đã được xóa
        $_SESSION['delete'] = "<div class='success'>Xóa admin thành công</div>";
        // Chuyển đến trang quản lý admin
        header('location:'.SITEURL.'admin/manage_admin.php');
    }else{
        $_SESSION['delete'] = "<div class='error'>Xóa admin thất bại</div>";
        // Chuyển đến trang quản lý admin
        header('location:'.SITEURL.'admin/manage_admin.php');
    }
?>