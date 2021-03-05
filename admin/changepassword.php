<?php
    require('partials/header_admin.php');
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Thay đổi mật khẩu Admin</h2>

            <?php
            // 1. Lấy ra id của admin được chọn
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            
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
                        <td>Mật khẩu hiện tại: </td>
                        <td><input type="password" name="current_password" placeholder="Nhập vào mật khẩu hiện tại"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu mới: </td>
                        <td><input type="password" name="new_password" placeholder="Nhập vào mật khẩu mới"></td>
                    </tr>
                    <tr>
                        <td>Xác nhật mật khẩu: </td>
                        <td><input type="password" name="confrim_password" placeholder="Xác nhận lại mật khẩu"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Thay đổi mật khẩu" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
<!-- MainContent Sections End -->


<?php
    require('partials/footer_admin.php');
?>
<?php
    // kiểm tra nút đã được đc click hay chưa
    if(isset($_POST['submit'])){

        // 1. Lấy data từ Form
        $id = $_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confrim_password=md5($_POST['confrim_password']);

        // 2. Kiểm tra user với id hiện tại và mật khẩu hiện tại có tồn tại hay không
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$current_password'";

        // Thực thi câu lệnh
        $res = mysqli_query($conn,$sql);

        if($res == true){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // Tài khoản người dùng tồn tại và có thể thay đổi mật khẩu
                // Kiểm tra 2 mật khẩu có trùng khớp với nhau hay không
                if($new_password == $confrim_password){
                    // Cập nhật mật khẩu
                    $sql2 = "UPDATE admin SET
                        password='$new_password'
                        WHERE id = $id;
                    ";

                    // Thực thi câu lệnh 
                    $res2 = mysqli_query($conn, $sql2);

                    // Kiểm tra câu lệnh đã được thực thi hay chưa
                    if($res2 == true){
                        $_SESSION['change_pwd'] = "<div class='success'>Thay đổi mật khẩu thành công</div>";
                        header('location:'.SITEURL.'admin/manage_admin.php');
                    }else {
                        $_SESSION['change_pwd'] = "<div class='error'>Thay đổi mật khẩu thất bại</div>";
                        header('location:'.SITEURL.'admin/manage_admin.php');
                    }
                }else {
                    // Chuyển đến trang quản lý admin với thông báo lỗi
                    $_SESSION['pwd_not_match'] = "<div class='error'>Mật khẩu không trùng khớp</div>";
                    header('location:'.SITEURL.'admin/manage_admin.php');
                }
            }else {
                $_SESSION['user_not_found'] = "<div class='error'>Tài khoản này không tồn tại</div>";
                //Chuyển đến trang quản lý admin
                header('location:'.SITEURL.'admin/manage_admin.php');
            }
        }
    }

?>
