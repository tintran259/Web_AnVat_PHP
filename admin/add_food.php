<?php
    require 'partials/header_admin.php';
?>
<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Thêm Admin</h2>

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
                        <td><input type="text" name="food_title" placeholder="Nhập vào tên món ăn"></td>
                    </tr>
                    <tr>
                        <td>Mô tả món ăn </td>
                        <td><textarea name="food_description" cols="30" rows="5" placeholder="Mô tả món ăn"></textarea></td>
                    </tr>
                    <tr>
                        <td>Giá món ăn: </td>
                        <td><input type="number" name="food_price"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh: </td>
                        <td><input type="file" name="food_image"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Thêm món ăn" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $title = $_POST['food_title'];
                    $description = $_POST['food_description'];
                    $price = $_POST['food_price'];

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
                                header('location:'.SITEURL.'admin/add_food.php');
                                // Dừng xử lí
                                die();
                            }
                        }

                        $sql2 = "INSERT INTO foods SET
                            food_title = '$title',
                            food_description = '$description',
                            food_price = '$price',
                            food_image = '$image'
                        ";

                        $res = mysqli_query($conn, $sql2);

                        if($res == true)
                        {
                            $_SESSION['add'] = "<div class='success'>Thêm món ăn thành công</div>";
                            header('location:'.SITEURL.'admin/manage_food.php');
                        }
                        else
                        {
                            $_SESSION['add'] = "<div class='error'>Thêm món ăn thất bại</div>";
                            header('location:'.SITEURL.'admin/manage_food.php');
                        }
                    }
                    else
                    {
                        $image = "";
                    }

                } 
            ?>
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require 'partials/footer_admin.php'
?>
