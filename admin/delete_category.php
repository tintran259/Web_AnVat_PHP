<?php
    // Kết nối với file constants.php
    require('../config/constants.php');

    if(isset($_GET['cate_id']) AND isset($_GET['cate_image']))
    {
        $id = $_GET['cate_id'];
        $image = $_GET['cate_image'];

        if($image != "")
        {
            $path = "../images/category/".$image;
            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='error'>Xóa ảnh thất bại</div>";
                header('location:'.SITEURL.'admin/manage_category.php');
                die();
            }
        }
        $sql = "DELETE FROM categories WHERE cate_id = $id";
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['delete'] = "<div class='success'>Xóa thành công</div>";
            header('location:'.SITEURL.'admin/manage_category.php');
        }else
        {
            $_SESSION['delete'] = "<div class='error'>Xóa thành thất bại</div>";
            header('location:'.SITEURL.'admin/manage_category.php');
        }

    }else{
        header('location:'.SITEURL.'admin/manage_category.php');
    }
?>