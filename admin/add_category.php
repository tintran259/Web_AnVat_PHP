<?php
    require 'partials/header_admin.php';
?>
<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Thêm Loại Món Ăn</h2>

            <?php
            // kiem tra thong bao
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];// Hiện thị phiên thông báo
                    unset($_SESSION['upload']);// Hủy phiên thông báo
                }
            ?>
            
            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl_add">
                    <tr>
                        <td>Tên loại món ăn: </td>
                        <td><input type="text" name="title" placeholder="Nhập vào loại món"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Đặc điểm: </td>
                        <td>
                            <input type="radio" name="featured" value="Có"> Có 
                            <input type="radio" name="featured" value="Không"> Không
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái: </td>
                        <td>
                            <input type="radio" name="active" value="Có"> Có 
                            <input type="radio" name="active" value="Không"> Không
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Thêm loại món ăn" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
           <?php
            if(isset($_POST['submit']))
            {
                // 1. Lấy gtri từ form loại món ăn
                $title = $_POST['title'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured = "Không";
                }
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active = "Không";
                }

                // Kiểm tra hình đã được chọn hay chưa
                if(isset($_FILES['image']['name'])){
                    // Tải ảnh lên
                    // Để có thể tải ảnh lên ta cần tên ảnh, nguồn dẫn và đích dẫn
                    $image = $_FILES['image']['name'];

                    // Chỉ up hình khi hình được chọn
                    if($image!="")
                    {
                        // Tự động đổi tên cho hình
                        $ext = end(explode('.',$image));

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
                            header('location:'.SITEURL.'admin/add_category.php');
                            // Dừng xử lí
                            die();
                        }
                    }
                }else
                {
                    // Không tải ảnh lên và thiết lập ảnh với gtri trống
                    $image = "";
                }
                
                // 2. Tạo câu lệnh thêm loại món ăn trong db
                $sql = "INSERT INTO categories SET
                    cate_title = '$title',
                    cate_image = '$image',
                    featured = '$featured',
                    active = '$active'
                ";

                // 3. Thực thi câu lệnh
                $res = mysqli_query($conn, $sql);

                // 4. Kiểm tra đã được thêm vào hay chưa
                if($res == true){
                    $_SESSION['add'] = "<div class='success'>Thêm loại món ăn thành công</div>";
                    // Chuyển đến trang quản lý loại món ăn
                    header('location:'.SITEURL.'admin/manage_category.php');
                }else{
                    $_SESSION['add'] = "<div class='error'>Thêm loại món ăn thất bại</div>";
                    // Chuyển đến trang quản lý loại món ăn
                    header('location:'.SITEURL.'admin/add_category.php');
                }
            }   
           ?>
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require 'partials/footer_admin.php'
?>
