<?php
    require('partials/header_admin.php');
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Cập nhật Loại Món Ăn</h2>

            <?php
                if(isset($_GET['cate_id']))
                {

                    $id = $_GET['cate_id'];

                    $sql = "SELECT * FROM categories WHERE cate_id = $id";

                    $res = mysqli_query($conn,$sql);


                    $count = mysqli_num_rows($res);
                    if($count == 1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['cate_title'];
                        $current_img = $row['cate_image'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else{
                        $_SESSION['no_category_found']="<div class='error'>Không tìm thấy loại món ăn này</div>";
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage_category.php');
                } 
            ?>
            
            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl_add">
                    <tr>
                        <td>Tên loại món ăn: </td>
                        <td><input type="text" name="title" value="<?php echo $title?>"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh hiện tại: </td>
                        <td>
                            <?php
                                if($current_img!="")
                                {
                                    ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $current_img;?>" width="200px" height="100px" style="object-fit: cover;">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='error'>Không có ảnh nào được thêm</div>";
                                } 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh mới: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Đặc điểm: </td>
                        <td>
                            <input <?php if($featured=="Có"){echo "checked";}?> type="radio" name="featured" value="Có"> Có 
                            <input <?php if($featured=="Không"){echo "checked";}?> type="radio" name="featured" value="Không"> Không
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái: </td>
                        <td>
                            <input <?php if($active=="Có"){echo "checked";}?> type="radio" name="active" value="Có"> Có 
                            <input <?php if($active=="Không"){echo "checked";}?> type="radio" name="active" value="Không"> Không
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_img" value="<?php echo $current_img;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Cập nhật loại món ăn" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
           <?php
                if(isset($_POST['submit']))
                {
                    // 1. Lay gtri tu update form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_img = $_POST['current_img'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    
                    // 2. Up hình mới nếu được chọn
                    if(isset($_FILES['image']['name']))
                    {
                        $image = $_FILES['image']['name'];
                        if($image!="")
                        {
                            // Tự động đổi tên cho hình
                            $tmp = explode('.',$image);
                            $ext = end($tmp);

                            $image = "Food_Category_".rand(000,999).'.'.$ext;

                            $source_path = $_FILES['image']['tmp_name'];

                            $destination_path = "../images/category/".$image;

                            // Bước cuối cùng upload ảnh lên
                            $upload = move_uploaded_file($source_path,$destination_path);

                            // Kiểm tra ảnh đã được upload hay chưa
                            // Nếu ảnh không upload được thì sẽ dừng xử lý và chuyển đến với thông báo lỗi
                            if($upload==false){
                                // Thiet lap thong bao
                                $_SESSION['upload'] = "<div class='error'>Không thể tải ảnh lên</div>";
                                header('location:'.SITEURL.'admin/manage_category.php');
                                // Dừng xử lí
                                die();
                            }

                            // Xóa đi ảnh hiện tại
                            if($current_img!="")
                            {   
                                $remove_path = "../images/category/".$current_img;
                                $remove = unlink($remove_path);

                                if($remove == false)
                                {
                                    $_SESSION['failed_remove'] = "<div class='error'>Không thể xóa ảnh hiện tại</div>";
                                    header('location:'.SITEURL.'admin/manage_category.php');
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

                    // 3. Update db
                    $sql2 = "UPDATE categories SET
                        cate_title = '$title',
                        cate_image = '$image',
                        featured = '$featured',
                        active = '$active'
                        WHERE cate_id = $id
                    ";

                    // 4. Thực thi câu lệnh
                    $res = mysqli_query($conn,$sql2);

                    if($res == true)
                    {
                        $_SESSION['update'] = "<div class='success'>Cập nhật thành công</div>";
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
                    else{
                        $_SESSION['update'] = "<div class='error'>Cập nhật thất bại</div>";
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
                }
           ?>
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require('partials/footer_admin.php');
?>

