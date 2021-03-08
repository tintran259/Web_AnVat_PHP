<?php
    require 'partials/header_admin.php';
?>

<?php 
    if(isset($_GET['food_id']))
    {
        $id = $_GET['food_id'];

        $sql2 = "SELECT * FROM foods WHERE food_id = $id";

        $res2 = mysqli_query($conn, $sql2);

        $row = mysqli_fetch_assoc($res2);

        $title = $row['food_title'];
        $description = $row['food_description'];
        $price = $row['food_price'];
        $current_img = $row['food_image'];
    }
    else
    {
        // Chuyển đến trang quản lý admin
        header('location:'.SITEURL.'admin/manage_food.php');
    }
?>
<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Cập nhât món ăn</h2>

            <?php
            // kiem tra thong bao
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];// Hiện thị phiên thông báo
                    unset($_SESSION['upload']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                }
            ?>
            
            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl_add">
                    <tr>
                        <td>Tên món ăn </td>
                        <td><input type="text" name="food_title" value="<?php echo $title;?>"></td>
                    </tr>
                    <tr>
                        <td>Mô tả món ăn </td>
                        <td><textarea name="food_description" cols="30" rows="5"><?php echo $description;?></textarea></td>
                    </tr>
                    <tr>
                        <td>Giá món ăn: </td>
                        <td><input type="number" name="food_price" value="<?php echo $price;?>"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh hiện tại: </td>
                        <td>
                            <?php
                                if($current_img == "")
                                {
                                    echo "<div class='error'>Không có ảnh nào được thêm</div>";
                                }
                                else{
                                    ?>
                                        <img src="<?php echo SITEURL;?>images/foods/<?php echo $current_img;?>" style="object-fit: cover;" width="210px" height="120px">
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh mới: </td>
                        <td><input type="file" name="food_image"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="food_id" value="<?php echo $id;?>">
                            <input type="hidden" name="current_image" value="<?php echo $current_img;?>">
                            
                            <input type="submit" name="submit" value="Cập nhật món ăn" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>

            <!-- <?php
                if(isset($_POST['submit']))
                {
                    $id = $_POST['food_id'];
                    $title = $_POST['food_title'];
                    $description = $_POST['food_description'];
                    $price = $_POST['food_price'];
                    $current_img = $_POST['current_image'];

                    if(isset($_FILES['food_image']['name']))
                    {
                        $image = $_FILES['food_image']['name'];

                        if($image!="")
                        {
                            $ext = end(explode('.',$image));

                            $image = "Food_".rand(000,999).'.'.$ext;

                            $source_path = $_FILES['food_image']['tmp_name'];

                            $destination_path = "../images/foods/".$image;

                            // Bước cuối cùng upload ảnh lên
                            $upload = move_uploaded_file($source_path,$destination_path);

                            // Kiểm tra ảnh đã được upload hay chưa
                            // Nếu ảnh không upload được thì sẽ dừng xử lý và chuyển đến với thông báo lỗi
                            if($upload==false){
                                // Thiet lap thong bao
                                $_SESSION['upload'] = "<div class='error'>Không thể tải ảnh lên</div>";
                                header('location:'.SITEURL.'admin/manage_food.php');
                                // Dừng xử lí
                                die();
                            }

                            if($current_img!="")
                            {
                                $remove_path = "../images/foods/".$current_img;
                                
                                $remove = unlink($remove_path);

                                if($remove == false)
                                {
                                    $_SESSION['remove_failed'] = "<div class='error'>Không thể xóa ảnh hiện tại</div>";
                                    header('location:'.SITEURL.'admin/manage_food.php');
                                    // Dừng xử lí
                                    die();
                                }
                            }
                        }
                        else
                        {
                            $image = $current_img;
                        }
                    }
                    else
                    {
                        $image = $current_img;
                    }

                    $sql = "UPDATE foods SET
                            food_title = '$title',
                            food_description = '$description',
                            food_price = '$price',
                            food_image = '$image'
                            WHERE food_id = $id
                        ";

                    $res2 = mysqli_query($conn, $sql);

                    if($res2 == true)
                    {
                        $_SESSION['update'] = "<div class='success'>Cập nhật món ăn thành công</div>";
                        header('location:'.SITEURL.'admin/manage_food.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Cập nhật món ăn thất bại</div>";
                        header('location:'.SITEURL.'admin/manage_food.php');
                    }
                } 
            ?> -->
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require 'partials/footer_admin.php'
?>
