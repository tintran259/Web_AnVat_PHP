<?php
    require('../config/constants.php');
    
    if(isset($_GET['food_id']) && isset($_GET['food_id']))
    {
        $id = $_GET['food_id'];
        $image = $_GET['food_image'];

        if($image!="")
        {
            $path="../images/foods/".$image;

            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['upload'] = "<div class='error'>Không thể xóa ảnh</div>";
                // Chuyển đến trang quản lý admin
                header('location:'.SITEURL.'admin/manage_food.php');
                die();
            }
        }

        $sql = "DELETE FROM foods WHERE food_id = $id";

        $res = mysqli_query($conn,$sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Xoá món ăn thành công</div>";
            // Chuyển đến trang quản lý admin
            header('location:'.SITEURL.'admin/manage_food.php');
            die();
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Xóa món ăn thất bại</div>";
            // Chuyển đến trang quản lý admin
            header('location:'.SITEURL.'admin/manage_food.php');
            die();
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Xóa admin thất bại</div>";
        // Chuyển đến trang quản lý admin
        header('location:'.SITEURL.'admin/manage_food.php');
    }
?>