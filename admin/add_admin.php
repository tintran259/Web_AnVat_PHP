<?php
    require 'partials/header_admin.php';
?>
<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Thêm Admin</h2>

            <?php
            // kiem tra thong bao
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                }
            ?>
            
            <form action="" method="post">
                <table class="tbl_add">
                    <tr>
                        <td>Họ tên: </td>
                        <td><input type="text" name="fname" placeholder="Nhập vào họ tên"></td>
                    </tr>
                    <tr>
                        <td>Tài khoản: </td>
                        <td><input type="text" name="username" placeholder="Nhập vào tài khoản"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu: </td>
                        <td><input type="password" name="password" placeholder="Nhập vào mật khẩu"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Thêm admin" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require 'partials/footer_admin.php'
?>

<?php
    // Xử lý form add
    if(isset($_POST['submit'])){

        // dat ten bien
        $fname = $_POST['fname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // mã hóa mật khẩu
        
        // truy van
        $sql = "INSERT INTO admin SET
            name = '$fname',
            username = '$username',
            password = '$password'
        ";

        // Thực thi lệnh truy vấn
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        // Kiểm tra nếu câu lệnh được thực thi thì sẽ được thêm vào bảng dữ liệu 
        if($res == TRUE){
            
            // Tạo phiện giá trị để xuất thông tin ra màn hình
            $_SESSION['add'] = "<div class='success'>Thêm admin thành công</div>";

            //Chuyển đến trang quản lý admin
            header('location:'.SITEURL.'admin/manage_admin.php');
        }else{
           // Tạo phiện giá trị để xuất thông tin ra màn hình
           $_SESSION['add'] = "<div class='error'>Thêm admin thất bại</div>";

           //Chuyển đến trang quản lý admin
           header('location:'.SITEURL.'admin/add_admin.php');
        }
    }

?>